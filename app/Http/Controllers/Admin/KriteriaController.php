<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Kriteria;
use App\Models\Parameter;
use App\Models\Configurasi;
use App\Models\SubKriteria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Validator;

class KriteriaController extends Controller
{
    function index()
    {
        $data = Kriteria::with('parameter')->orderBy('kode_kriteria', 'ASC')->get();

        $config = Configurasi::first();
        $data_index = [
            'data' => $data,
            'config' => $config,
        ];
        return view('admin.kriteria.index', $data_index);
    }


    function update(Request $req)
    {

        $id = $req->kode_kriteria;
        $data = Kriteria::where('kode_kriteria', $id)->first();
        $bobot = Kriteria::sum('bobot_kriteria');
    
        // Calculate the new total weight
        $newTotalBobot = $bobot - $data->bobot_kriteria + $req->bobot_kriteria;
        
        if ($newTotalBobot > 100) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['bobot_kriteria' => 'Maksimal bobot tidak boleh melebihi 100%.']);
        }
    
        $validator = Validator::make($req->all(), [
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required|numeric|max:100',
            'jenis_atribut' => 'required|in:B,C',
        ]);
    
        $validator->setAttributeNames([
            'kode_kriteria' => 'Kode Kriteria',
            'nama_kriteria' => 'Nama Kriteria',
            'bobot_kriteria' => 'Bobot Kriteria',
        ]);
    
        $validator->setCustomMessages([
            'required' => 'Kolom :attribute wajib diisi.',
            'max' => ':attribute tidak boleh lebih dari :max %',
            'numeric' => ':attribute harus berupa angka.',
        ]);
    
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }
    

        $data_kriteria = [
            'kode_kriteria' => Str::upper($req->kode_kriteria),
            'nama_kriteria' => $req->nama_kriteria,
            'bobot_kriteria' => $req->bobot_kriteria,
            'jenis_atribut' => $req->jenis_atribut,
        ];
        // dd($data_kriteria);
        try {

            $data->update($data_kriteria);
            return redirect()->route('admin.kriteria.index')->with('success', 'Data Berhasil Ubah');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
    }


    function parameter(Request $req)
    {
        $config = Configurasi::first();
        $_i = $req->_i;

        $kriteria = Kriteria::where('kode_kriteria', $_i)->first();
        if ($kriteria) {
            $parameterQuery = Parameter::where('kode_kriteria', $_i);

            if ($kriteria->jenis_atribut === 'B') {
                $parameter = $parameterQuery->orderBy('bobot', 'DESC')->get();
            } elseif ($kriteria->jenis_atribut === 'C') {
                $parameter = $parameterQuery->orderBy('bobot', 'ASC')->get();
            }

            $data = [
                'parameter' => $parameter,
                'kriteria' => $kriteria,
                'config' => $config,
            ];

            return view('admin.kriteria.parameter', $data);
        }
        return abort(404);
    }



    public function sub_destroy($id)
    {

        $result = Parameter::where('id', $id)->first()->delete();
        if ($result) {
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }




    function store(Request $req)
    {

        $bobot = Kriteria::sum('bobot_kriteria');
    
    // Calculate the new total weight if the current bobot_kriteria is added
    $newTotalBobot = $bobot + $req->bobot_kriteria;
    
    if ($newTotalBobot > 100) {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['bobot_kriteria' => 'Total bobot tidak boleh melebihi 100.']);
    }

    // Continue with validation and saving if the total weight is valid
    $validator = Validator::make($req->all(), [
        'kode_kriteria' => 'required|unique:kriteria,kode_kriteria',
        'nama_kriteria' => 'required',
        'bobot_kriteria' => 'required|numeric|max:100',
        'jenis_atribut' => 'required|in:B,C',
    ]);

    // Set custom attribute names and messages
    $validator->setAttributeNames([
        'kode_kriteria' => 'Kode Kriteria',
        'nama_kriteria' => 'Nama Kriteria',
        'bobot_kriteria' => 'Bobot Kriteria',
    ]);

    $validator->setCustomMessages([
        'required' => 'Kolom :attribute wajib diisi.',
        'max' => ':attribute tidak boleh lebih dari :max %',
        'numeric' => ':attribute harus berupa angka.',
    ]);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
    }

        $data = [
            'kode_kriteria' => Str::upper($req->kode_kriteria),
            'nama_kriteria' => $req->nama_kriteria,
            'bobot_kriteria' => $req->bobot_kriteria,
            'jenis_atribut' => $req->jenis_atribut,
        ];
        try {
            Kriteria::create($data);
            return redirect()->back()->with('success', 'Data Berhasil Disimpan');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
    }

    function parameter_store(Request $req)
    {

        $operator = $req->operator;

        if ($operator == '>=' || '<=') $val = $operator . $req->value;
        if ($operator == '-') $val = $req->value1 . $operator . $req->value2;
        $data = [
            'kode_kriteria' => $req->kode_kriteria,
            'nilai_v' => $val,
            'bobot' => $req->bobot,
        ];
        try {
            Parameter::create($data);
            return redirect()->back()->with('success', 'Data Berhasil Disimpan');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
    }

    public function destroy($id)
    {
        $result = Kriteria::where('kode_kriteria', $id)->first();
        $sub = Parameter::where('kode_kriteria', $result->kode_kriteria)->delete();
        $penilaian = Penilaian::where('kode_kriteria',  $result->kode_kriteria)->delete();
        $result->delete();
        if ($result) {
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}

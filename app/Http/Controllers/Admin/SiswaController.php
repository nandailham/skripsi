<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public $componen = [
        'nama',
        'jenis_kelamin',
        'kelas_siswa',
    ];

    public function index()
    {
        $poli = $this->getPoliklinik();
        if (Auth::user()->role == 'pegawai') {
            $data = Siswa::all();
        } else {
            $data = Siswa::all();
        }
        $componen = array_diff($this->componen, []);
        return view('admin.siswa.index', compact('data', 'componen'));
    }
    

    //    

    function create()
    {
        return view('admin.siswa.form');
    }

    function edit(Request $req)
    {
        $data = Siswa::findOrFail($req->_i);
        return view('admin.siswa.form', compact('data'));
    }

    function saveData(Request $req)
    {
        $rules = [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'kelas_siswa' => 'required|numeric',

        ];

        // Validate the request data
        $validator = Validator::make($req->all(), $rules);

        // Redirect back with errors and input data if validation fails
        if ($validator->fails()) {
            $errorMessages = implode('<br>', array_map(function ($error) {
                return "- {$error}";
            }, $validator->errors()->all()));
            return redirect()->back()->withInput()->with('error', $errorMessages);
        }


        $data = $req->only($this->componen);
        $data_main = [
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'kelas_siswa' => $data['kelas_siswa'],
        ];
        $url = '/admin/siswa';

        DB::beginTransaction();
        try {
            if ($req->_i) {
                $e = Siswa::findOrFail($req->_i);
                $e->update($data_main);
            } else {
                $e = Siswa::create($data_main);
            }

            DB::commit();

            return redirect()->to($url)->with('success', 'Data Berhasil Disimpan');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Data Gagal Disimpan: ' . $e->getMessage());
        }
    }


    function store(Request $req)
    {
        return $this->saveData($req);
    }

    function update(Request $req)
    {
        return $this->saveData($req);
    }

    public function destroy(Request $req)
    {
        DB::beginTransaction();
        try {
            $siswa = Siswa::findOrFail($req->id);

            $siswa->delete(); // Hapus data siswa

            DB::commit();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Data Gagal Dihapus: ' . $e->getMessage());
        }
    }

    public function penilaian() {
        $siswa = Siswa::find(request('_i'));
        $kriteria = Kriteria::all();
    
        // Fetch existing penilaian data for the student
        $penilaian = Penilaian::where('id_siswa', $siswa->id)->get()->keyBy('kode_kriteria');
    
        $data = [
            'siswa' => $siswa,
            'kriteria' => $kriteria,
            'penilaian' => $penilaian
        ];
    
        return view('admin.siswa.penilaian', $data);
    }

    public function penilaian_store(Request $request) {
        $id_siswa = $request->input('id_siswa');
        $nilai = $request->input('nilai'); // This is an associative array with kode_kriteria as keys
    
        foreach($nilai as $kode_kriteria => $value) {
            Penilaian::updateOrCreate(
                ['id_siswa' => $id_siswa, 'kode_kriteria' => $kode_kriteria, 'id_user' => Auth::user()->id],
                ['nilai' => $value]
            );
        }
    
        return redirect()->back()->with('success', 'Penilaian berhasil disimpan');
    }

}

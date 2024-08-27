<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Configurasi;
use App\Models\Kriteria;
use App\Models\Parameter;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    function index() 
    {
        $e = Configurasi::all();

        $kriteria = Kriteria::count();
        $sub_kriteria = Parameter::count();
        $data = [
            'config' => $e ? $e->first() : '',
            'kriteria' => $kriteria,
            'sub_kriteria' => $sub_kriteria,
        ];

        return view('admin.configurasi.create', $data);
    }

    function store(Request $req)
    {

        $_id = $req->_id;

        $data = [
            'kriteria' => $req->kriteria,
            'parameter' => $req->parameter,
        ];
        try {
            if ($_id) {
                $e = Configurasi::find($_id);
                $e->update($data);
                return redirect()->route('admin.konfigurasi.index')->with('success', 'Data berhasil di update');
            } else {
                $e = Configurasi::create($data);
                return redirect()->route('admin.konfigurasi.index')->with('success', 'Data berhasil di simpan');
            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }
}

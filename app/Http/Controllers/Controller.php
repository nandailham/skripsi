<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\Poliklinik;

// use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /* default function
    $data = array (
        wire
        index [untuk data di index]
        model
    )
    */

    protected static $data = [];
    protected  $filter = [];


    function filter(){
        /*
        untuk merubah $this->filter yang digunakan untuk index filter
        jika hanya berupa text filter bisa langsung di masukkan ke dalam s
            tatic $data[index][datasend]

        modelnya hampir sama dengan form di livewire, tapi harus required dibawah ini:
            n = name
            f = field
        */
    }

    function data_list(){
        /*
        untuk merubah static::$data
        */
    }


    private function table_data(){
        $this->data_list();
        $this->filter();
        $data = static::$data['index']??null;
        if(!$data) abort(500);

        $data['title'] = static::$data['title']??null;
        $data['datasend']['model'] =  static::$data['model']??null;
        $data['datasend']['filter'] = $data['datasend']['filter'] ?? $this->filter;

        $data['permission'] = static::$data['permission'] ?? $data['datasend']['model'];
        return $data;

    }

  
    function index(){
        $data = $this->table_data();
        role_type('R', $data['permission']);
        return view('layout.table', $data);
    }

    // index of trash
    function trash(){
        $data = $this->table_data();
        role_type('D', $data['permission'] );
        return view('layout.table', $data);
    }

    function restore(Request $req){
        $this->data_list();
        $model_name = static::$data['model']??null;
        $permission = static::$data['permission'] ?? $model_name;
        if(!$model_name) return;
        if(!soft_delete($model_name)) return set_res('Data tidak valid!',false);
        role_type('D', $permission);

        $model = '\App\Models\\'.$model_name;

        $data = $model::onlyTrashed()->where('id',$req->_i)->first();
        if(!$data) return set_res('Data tidak ditemukan!',false);
        $this->cekCascade($model,$data,false);
        $data->restore();
        return set_res('Data berhasil dikembalikan!',true);
    }


    protected function cekCascade($model,$data, $delete=true){
        $e = new $model;
        if( method_exists($e,'getCascade') && $e->getCascade()){
            $relations = $e->getCascade();
            foreach ($relations as $relation) {
                //delete
                if($delete){
                    foreach ($data->{$relation}()->get() as $item) {
                        $item->delete();
                    }
                }
                // restore
                else{
                    // masih ngebug ketika hapus dari cascade atau hapus manual masih di kembalikan semua
                    // foreach ($data->{$relation}()->withTrashed()->get() as $item) {
                    //     $item->restore();
                    // }
                }

            }

        }
    }
    
    function model_delete($req){
        if(!$req->ajax()) abort(401);
        $this->data_list();
        $model_name = static::$data['model']??null;
        if(!$model_name) return;
        $permission = static::$data['permission'] ?? $model_name;

        role_type('D', $permission );
        if(isset(static::$data['index']['datasend']['delete']) && !static::$data['index']['datasend']['delete']) return;

        $model = '\App\Models\\'.$model_name;
        return $model;
    }

    function destroy(Request $req){
       
        $model = $this->model_delete($req);
        if(!$model) return set_res('Akses ditolak!');
        
        $model_name = static::$data['model'];
        try{
            if($req->trash){
                if(soft_delete($model_name)){
                    $data = $model::onlyTrashed()->where('id',$req->_i)->first();
                    if(!$data) return set_res('Data tidak ditemukan!',false);

                    $delete = $data->forceDelete();
                }else return set_res('Permintaan tidak valid!',false);

            }else{

                $data = $model::findOrFail($req->_i);
                $this->cekCascade($model,$data);
                $delete = $data->delete();

            }

            if($delete) return set_res('Data berasil dihapus',true);
            else return set_res('Data tidak boleh dihapus');
        }catch(QueryException $e){
            return set_res('Gagal menghapus data!');
        }

    }

    function add_data_form($data=null){
        $wire = static::$data['wire']??null;
        if(!$wire) abort('401');

        $data['title'] = static::$data['title'] ?? null;
        if(isset(static::$data['raw'])) $data['raw'] = static::$data['raw'];

        $data['permission'] = static::$data['permission'] ?? (static::$data['model']??null);

        $value = ['wire' => $wire,'data' => $data];
        $use_info = static::$data['use_info'] ?? false;
        if($use_info && isset(static::$data['index']['info'])){
            $value['info'] = static::$data['index']['info'];
            $value['info_width'] = static::$data['index']['info_width'];
        }

        return $value;

    }

    function create(){
        $this->data_list();
        $model_name = static::$data['model']??null;
        static::$data['permission'] = static::$data['permission'] ?? $model_name;
        role_type('C', static::$data['permission'] );
        if(isset(static::$data['index']['datasend']['create']) && !static::$data['index']['datasend']['create'])  return url_back();

        $data = $this->add_data_form();
        return view('layout.form',$data);
    }

    function edit(Request $req){
        $this->data_list();
        $model_name = static::$data['model']??null;
        static::$data['permission'] = static::$data['permission'] ?? $model_name;
        role_type('U', static::$data['permission'] );
        if(isset(static::$data['index']['datasend']['edit']) && !static::$data['index']['datasend']['edit'])  return url_back();

        $model = '\App\Models\\'.static::$data['model'];
        $data = $model::findOrFail($req->_i);

        $data = $this->add_data_form($data);
        return view('layout.form',$data);
    }


    protected function getPoliklinik()
    {
        if (Auth::user()->role == 'pegawai') {
            return Poliklinik::find(Auth::user()->poliklinik_id);
        }
        return null;
    }


}

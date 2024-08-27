<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class CKEditorController extends Controller
{
    public function upload(Request  $req){
        if($req->hasFile('upload')){
            // $originName = $req->file('upload')->getClientOriginalName();
            // $fileName = pathinfo($originName, PATHINFO_FILENAME);
            // $extension = $req->file('upload')->getClientOriginalExtension();
            // $fileName = $fileName.'-'.time().'.'.$extension;
            
            // $req->file('upload')->move(public_path('media'), $fileName);

            $fileName = time().'-'.uniqid().'.'.$req->file('upload')->getClientOriginalExtension();

            $img = Image::make($req->file('upload'))->save('media/'.$fileName,60);

            $url = asset('media/'.$fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> $img ? 1 : 0, 'url'=> $url]);
        }

    }
}

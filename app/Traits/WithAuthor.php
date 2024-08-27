<?php
namespace App\Traits;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;


trait WithAuthor{
    protected static function bootWithAuthor(){

        static::saving(function ($model) {
            $userID =  Auth::id();

            if($model->exists){
                $model->updated_by = $userID;
            }else{
                $model->created_by = $userID;
            }
        });

    }
}

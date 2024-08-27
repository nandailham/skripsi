<?php
namespace App\Traits;

trait SoftCascade{
    protected static function bootSoftCascade()
    {
    
        static::deleting(function($resource) {
            foreach (static::$soft_cascade??[] as $relation) {
                dd($resource->{$relation}()->get() );
                foreach ($resource->{$relation}()->get() as $item) {
                    $item->delete();
                }
            }
        });
    
        // belum bisaaaaa
        static::restoring(function($resource) {
            dd($resource->customer()->get());
            foreach (static::$soft_cascade??[] as $relation) {
                foreach ($resource->{$relation}()->withTrashed()->get() as $item) {
                    $item->restore();
                }
            }
        });
        
    }
}

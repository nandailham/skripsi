<?php


namespace App\Common;
use Illuminate\Database\Schema\Blueprint;

class MyBlueprint extends Blueprint
    {
        public function author ($precision = 0)
        {
            $this->uuid('created_by', $precision)->nullable();
            $this->uuid('updated_by', $precision)->nullable();
        }
    }





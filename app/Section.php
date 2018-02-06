<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Section extends Model
{
    use softDeletes;

    public function books(){
        return $this->hasMany('App\book','section_id','id');

    }

}

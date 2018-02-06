<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    public function section(){
        return $this->belongsTo('App\Section');
    }
    public  function authors(){
        return $this->belongsToMany('App\author','books_authors_relationship','book_id','author_id');
    }
}

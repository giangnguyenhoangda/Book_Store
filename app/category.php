<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    protected $table='category';
    protected $primaryKey='category_id';
    public $timestamps=false;

    public function getAllBook()
    {
    	return $this->hasMany('App\Book','category_id','category_id');
    }

}

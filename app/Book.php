<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='book';
    public $timestamps=false;
    protected $primaryKey='book_id';

    public function getCategory()
    {
    	return $this->belongsTo('App\category','category_id','category_id');
    }

    public function getAuthor()
    {
    	return $this->belongsTo('App\Author','author_id','author_id');
    }
}

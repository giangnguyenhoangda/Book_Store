<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table='author';
    public $timestamps=false;
    protected $primaryKey='author_id';
}

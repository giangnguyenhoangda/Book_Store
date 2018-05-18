<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    protected $table='order_details';
    public $timestamps=false;
    protected $primaryKey='order_id';
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $name;
    public $qty;
    public $price;
    public $datetime;
    public $total;
}

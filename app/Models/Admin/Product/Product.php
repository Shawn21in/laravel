<?php

namespace App\Models\Admin\Product;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "product";
    protected $primaryKey ="prId";
    protected $fillable = [
        "prId",
        "prname",
        "prcontent",
        "prphoto"
    ];    
}

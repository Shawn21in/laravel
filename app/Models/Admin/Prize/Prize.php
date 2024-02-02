<?php

namespace App\Models\Admin\Prize;


use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    public $timestamps = false;
    protected $table = "prize";
    protected $primaryKey = "Id";
    protected $fillable = [
        "Id",
        "title",
        "content",
        "photo",
        "num"
    ];
}

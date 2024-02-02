<?php

namespace App\Models\Admin\Qa;

use Illuminate\Database\Eloquent\Model;

class Qa extends Model
{
    //laravel預設新增時間欄位, false掉就不會產生
    public $timestamps = false;
    protected $table = "qa";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "title",
        "content"
    ];
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Prize\Prize;
use Illuminate\Http\Request;

class FrontPrizeController extends Controller
{
    public function getList()
    {
        return response()->json(Prize::all());
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use Illuminate\Http\Request;

class FrontProductController extends Controller
{
    public function getList(){
        $list=Product::all();
        return response()->json($list);
    }
}

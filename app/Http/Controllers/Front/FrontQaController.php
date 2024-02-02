<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Qa\Qa; //才會出現這行
use Illuminate\Http\Request;
//下方,Qa要用選的
class FrontQaController extends Controller
{
    public function list()
    {
        $list = Qa::get();
        // $list = Qa::all(); 另一種用法
        
        return response()->json($list);
    }
}
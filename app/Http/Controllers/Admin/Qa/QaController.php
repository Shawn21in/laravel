<?php

namespace App\Http\Controllers\Admin\Qa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Qa\Qa;//這一行才會生成
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class QaController extends Controller
{

    public function index(){
        return view('welcome');
    }


    public function list()
    {   
        //要用選的  ::first();只撈第一筆,兩個::是靜態方法可以直接呼叫,其他要用new
        $list = Qa::get();
        return view("admin.qa.list", compact("list"));//compact("list")裡面丟的就是Models資料表裡建立的Qa.php抓的資料,用get();的方式get抓全部admin.qa是資料夾對應到views\admin\qa檔案名為list副檔名一定須為.balde.php
    }

    public function add()
    {
        return view("admin.qa.add");
    }

    public function insert(Request $req)
    {
        $qa = new Qa();
        $qa->title = $req->title;
        $qa->content = $req->content;
        $qa->save();

        Session::flash("message1", "已新增");
        $list = Qa::get();
        //正常Session會一值存在記憶體裡面,用來放置已登入狀態,這邊只需要顯示一次所以用flash"message1"不是固定格式,可自定義
        return view("admin.qa.list", compact("list"));
        // return redirect("/admin/qa/list");
    }

    public function edit(Request $req)
    {
        // find: 在全部的qa中尋找, $req->Id 傳進來的Id
        //相當於 SELECT * FROM qa WHERE Id = xxx
        $qa = Qa::find( $req->Id );

        // compact:將資料傳到網頁中
        return view("admin.qa.edit", compact("qa"));

    }
    
    public function update(Request $req)
    {
        $qa = Qa::find($req->Id);
        $qa->title = $req->title;
        $qa->content = $req->content;
        $qa->save();
        Session::flash("message1", "已修改");
        //正常Session會一值存在記憶體裡面,用來放置已登入狀態,這邊只需要顯示一次所以用flash"message1"不是固定格式,可自定義
        return redirect("/admin/qa/list");
    }

    public function delete(Request $req)
    {
        Qa::destroy($req->Id);

        return redirect("/admin/qa/list");
    }
}

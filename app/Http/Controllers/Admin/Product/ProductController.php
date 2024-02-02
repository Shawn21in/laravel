<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function list(){
        $list = Product::get();
        return view("admin.product.list",compact("list"));
    }
    public function add(){
        
        return view("admin.product.add");
        
    }
    public function insert(Request $abc){
        echo(microtime());//用微秒是因為防止同1秒上傳多張圖片導致圖片成稱相同
        
        $times = explode(" ", microtime());
        $prphoto = $abc->prphoto;
        //%Y_%m_%d_%H_%M_%S大小寫有固定
        $photoName = strftime("%Y_%m_%d_%H_%M_%S_",$times[1]).substr($times[0], 2, 3).".".$prphoto->extension();

        // 如果public資料夾下沒有images資料夾
        if(!file_exists("images")){
            // 建立一個資料夾, 權限777, 可讀取, 寫入, 執行
            mkdir("images",0777);
        }
        // 如果public/images資料夾下沒有prize資料夾
        if(!file_exists("images/product")){
            // 建立一個資料夾, 權限777, 可讀取, 寫入, 執行
            mkdir("images/product",0777);
        }
        //php 上傳檔案會暫存在temp資料夾下
        //將上傳的檔案由暫存資料夾移至images/prize資料夾下
        $prphoto->move("images/product", $photoName);

        $product = new Product();
        $product->prname = $abc->prname;
        $product->prcontent = $abc->prcontent;
        $product->prphoto = $photoName;
        $product->save();

        //用選的,才會自動 use Illuminate\Support\Facades\Session;
        Session::flash("message1","已新增");
        return redirect("/admin/product/list");
    }
    public function edit(Request $req){
        $product = Product::find($req->prId);

        return view("admin.product.edit", compact("product"));
    }
    public function update(Request $req){
        $product = Product::find($req->prId);
        $prphoto = $req->prphoto; //$req->photo;<--資料庫的值丟給-->$photo

        //如果有上傳圖檔
        if(!empty($prphoto)){ //<--$photo裡面如果沒有資料庫的值,代表沒有原圖
            // 將原有圖檔從資料夾中刪除
            @unlink("images/product/".$product->prphoto);

            $times = explode(" ", microtime());
            // 變更上傳檔案名稱(用時間排序)

            $photoName = strftime("%Y_%m_%d_%H_%M_%S_",$times[1]).substr($times[0], 2, 3).".".$prphoto->extension();
            $prphoto->move("images/product", $photoName);
        }else{
            //如果沒有更新圖片
            $photoName = $product->prphoto;
        }

        $product->prname = $req->prname;
        $product->prcontent = $req->prcontent;
        $product->prphoto = $photoName;
        $product->save();
        Session::flash("message1", "已修改");
        //正常Session會一值存在記憶體裡面,用來放置已登入狀態,這邊只需要顯示一次所以用flash"message1"不是固定格式,可自定義
        return redirect("/admin/product/list");
    }
    public function delete(Request $req){

        $product = Product::find($req->prId);

        if(!empty($product->prphoto)){
            @unlink("images/product/".$product->prphoto);

        }
        $product->delete();
        //Product::destroy($req->prId);
        Session::flash("message1", "已刪除");
        return redirect("/admin/product/list");
    }
}

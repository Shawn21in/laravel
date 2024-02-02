<?php

namespace App\Http\Controllers\Admin\Prize;

use App\Http\Controllers\Controller;
use App\Models\Admin\Prize\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;//下面要用選的

class PrizeController extends Controller
{
    public function list(){
        $list = Prize::get();
        return view("admin.prize.list", compact("list"));        
    }

    public function add()
    {
        return view("admin.prize.add");
    }

    public function insert(Request $req){
        echo(microtime());//用微秒是因為防止同1秒上傳多張圖片導致圖片成稱相同
        
        $times = explode(" ", microtime());
        $photo = $req->photo;
        //%Y_%m_%d_%H_%M_%S大小寫有固定
        $photoName = strftime("%Y_%m_%d_%H_%M_%S_",$times[1]).substr($times[0], 2, 3).".".$photo->extension();

        // 如果public資料夾下沒有images資料夾
        if(!file_exists("images")){
            // 建立一個資料夾, 權限777, 可讀取, 寫入, 執行
            mkdir("images",0777);
        }
        // 如果public/images資料夾下沒有prize資料夾
        if(!file_exists("images/prize")){
            // 建立一個資料夾, 權限777, 可讀取, 寫入, 執行
            mkdir("images/prize",0777);
        }
        //php 上傳檔案會暫存在temp資料夾下
        //將上傳的檔案由暫存資料夾移至images/prize資料夾下
        $photo->move("images/prize", $photoName);

        $prize = new Prize();
        $prize->title = $req->title;
        $prize->content = $req->content;
        $prize->photo = $photoName;
        $prize->num = $req->num;
        $prize->save();

        //用選的,才會自動 use Illuminate\Support\Facades\Session;
        Session::flash("message1","已新增");
        return redirect("/admin/prize/list");
    }

    public function edit(Request $abc){
        $prize = Prize::find($abc->Id);

        return view("admin.prize.edit", compact("prize"));
    }

    public function update(Request $req)
    {
        $prize = Prize::find($req->Id);
        $photo = $req->photo; //$req->photo;<--資料庫的值丟給-->$photo

        //如果有上傳圖檔
        if(!empty($photo)){ //<--$photo裡面如果沒有資料庫的值,代表沒有原圖
            // 將原有圖檔從資料夾中刪除
            @unlink("images/prize/".$prize->photo);

            $times = explode(" ", microtime());
            // 變更上傳檔案名稱(用時間排序)

            $photoName = strftime("%Y_%m_%d_%H_%M_%S_",$times[1]).substr($times[0], 2, 3).".".$photo->extension();
            $photo->move("images/prize", $photoName);
        }else{
            //如果沒有更新圖片
            $photoName = $prize->photo;
        }

        $prize->title = $req->title;
        $prize->content = $req->content;
        $prize->photo = $photoName;
        $prize->num = $req->num;
        $prize->save();
        Session::flash("message1", "已修改");
        //正常Session會一值存在記憶體裡面,用來放置已登入狀態,這邊只需要顯示一次所以用flash"message1"不是固定格式,可自定義
        return redirect("/admin/prize/list");
    }

    public function delete(Request $req)
    {
        Prize::destroy($req->Id);

        return redirect("/admin/prize/list");
    }
}

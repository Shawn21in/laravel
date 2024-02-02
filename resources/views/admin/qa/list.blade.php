<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<script>
    @if (Session::has("message1"))
        alert(" {{ Session::get('message1') }} ");
    @endif

    // if(Session::has("message1")){
    //     alert(" {{ Session::get('message1') }} ");
    // }
    function doDelete(Id)
    {
        if(confirm("確定刪除?"))
        {
        //這種方式是危險的,要用post的方式
            location.href="delete/"+Id;
        }
    }
</script> 
</head>

<body>
@foreach($list as $data)<!-- $list的原因是因為 -->
<div>標題 : {{ $data->title }}
    &nbsp;&nbsp;<a href="add">新增</a>
    &nbsp;&nbsp;<a href="edit/{{ $data->Id }}">修改</a>
    <!-- &nbsp;&nbsp;<a href="delete/{{ $data->Id }}">刪除</a> -->
    &nbsp;&nbsp;<a href="javascript:doDelete('{{ $data->Id }}')">刪除</a>

</div><!--title是資料庫欄位名稱-->
<div>內容 : {{ $data->content }}</div>
@endforeach
<!--
app\Http\Admin\Qa\QaController.php裡面
public function list()
    {   
        $list = Qa::get();
        return view("admin.qa.list", compact("list"));//compact
        
        compact("list")這裡面是list
    -->

</body>
</html>
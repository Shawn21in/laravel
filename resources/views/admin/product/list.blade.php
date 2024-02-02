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
<div><a href="add">新增獎項</a></div>
@foreach($list as $data)
<div>產品名稱 : {{ $data->prname }}
&nbsp;&nbsp;
產品內容 : {{$data->prcontent}}

@if(!empty($data->prphoto))
    <!-- 根目錄由public開始 -->
<div>
圖片 : <img src="/images/product/{{$data->prphoto}}" width="30%" height="30%">
</div>
@endif
&nbsp;&nbsp;<a href="edit/{{ $data->prId }}">修改</a>
    &nbsp;&nbsp;<a href="javascript:doDelete('{{ $data->prId }}')">刪除</a>
    <hr />
@endforeach
</body>
</html>
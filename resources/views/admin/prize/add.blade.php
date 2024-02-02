<script>
    function check(){
        var title = document.getElementById("title").value;
        var num = document.getElementById("num").value;
        var content = document.getElementById("content").value;
        if(title == "" || num== "" || content== "" )
        {
            return false;
        }

    }

</script>
<!-- onsubmit="return check()" -->
<!-- enctype="multipart/form-data"需要上傳圖片都需要加上這一行(不管何種框架語言) -->
<form method="post" action="insert" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    獎項 : <input type="text" id="title" name="title"><br />
    名額 : <input type="text" id="num" name="num"><br />
    內容 : <input type="text" id="content" name="content"><br />
    圖檔 : <input type="file" id="photo" name="photo"><br />
    
    <input type="submit" value="確定" onclick="return check()">
</form>
<!--
    laravel要在網頁輸出php的格式
    兩個大括號是php輸出
    csrf_field() <-token語法,權杖,
    {{ csrf_field() }}為了讓網站知道這個程式是從自己網站內來的,要加上一個token,讓網站對自己識別,知道這隻程式不是其他非法的地方強行塞的
    所以所有表單都要塞這一段
-->
<script>
    function check(){
        var title = document.getElementById("title").value;
        var content = document.getElementById("content").value;
        if(title == "" || content== "" )
        {
            return false;
        }

    }

</script>
<!-- onsubmit="return check()" -->
<form method="post" action="insert" >
    {{ csrf_field() }}
    
    標題 : <input type="text" id="title" name="title"><br />
    內容 : <textarea cols="80" rows="5" id="content" name="content"></textarea>
    <br />
    <input type="submit" value="確定" onclick="return check()">
</form>
<!--
    laravel要在網頁輸出php的格式
    兩個大括號是php輸出
    csrf_field() <-token語法,權杖,
    {{ csrf_field() }}為了讓網站知道這個程式是從自己網站內來的,要加上一個token,讓網站對自己識別,知道這隻程式不是其他非法的地方強行塞的
    所以所有表單都要塞這一段
-->
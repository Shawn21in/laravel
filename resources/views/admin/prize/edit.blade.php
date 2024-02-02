<form method="post" action="../update" enctype="multipart/form-data">
    <input type="hidden" name="Id" value="{{ $prize->Id}}" >
    {{ csrf_field() }}
    獎項 : <input type="text" name="title" value="{{ $prize->title }}"><br />
    名額 : <input type="text" name="num" value="{{ $prize->num }}"><br />
    內容 : <input type="text" name="content" value="{{ $prize->content }}" size="80"><br />
    圖檔 : <input type="file" name="photo">
    @if(!empty($prize->photo))
    <!-- 根目錄由public開始 -->
    <div>
    原圖 : <img src="/images/prize/{{$prize->photo}}" width="30%" height="30%">
    </div>
    @endif
    <input type="submit" value="確定">
</form>
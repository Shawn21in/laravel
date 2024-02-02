<form method="post" action="../update">
    <input type="hidden" name="Id" value="{{ $qa->Id}}" >
    {{ csrf_field() }}
    標題 : <input type="text" name="title" value="{{ $qa->title }}"><br />
    內容 : <textarea cols="80" rows="5" name="content">{{ $qa->content}}</textarea><br />
    <input type="submit" value="確定">
    
</form>
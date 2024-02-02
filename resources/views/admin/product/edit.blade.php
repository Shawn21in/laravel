<form method="post" action="../update" enctype="multipart/form-data">
    <input type="hidden" name="prId" value="{{ $product->prId}}" >
    {{ csrf_field() }}
    產品名稱 : <input type="text" name="prname" value="{{ $product->prname }}"><br />
    產品內容 : <input type="text" name="prcontent" value="{{ $product->prcontent }}" size="80"><br />
    產品圖檔 : <input type="file" name="prphoto">
    @if(!empty($product->prphoto))
    <!-- 根目錄由public開始 -->
    <div>
    原圖 : <img src="/images/product/{{$product->prphoto}}" width="30%" height="30%">
    </div>
    @endif
    <input type="submit" value="確定">
</form>
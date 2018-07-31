<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Product List</h1>
    <ul>
        @foreach($product as $products)
            <li>
                <img src="{{$products->image}}" alt="" style="width: 150px">
                <p>Name :</p>{{$products->name}}
                (<a href="/product/{{$products->id}}/edit">Sửa</a> | <a href="{{$products->id}}" class="btn-delete">Xoá</a>)
            </li>
        @endforeach
    </ul>
<script>
    $('btn-delete').click(function () {
       var productId = $(this).attr('href');
       alert(productId);
       var user_confirm = confirm('Bạn có chắc không');
       if(user_confirm){
           $ajax({
              url: 'http://localhost:8000/product/' + productId,
              method : 'DELETE',
              data : {
                  '_token' : "{{ csrf_token() }}"
              },
              success:function (response) {
                  alert('Xóa thành công');
                  window.location.reload();
              },
              error:function(){
                  alert('error');
              }
           });
       }else{
           alert('I am not OKE');
       }
    });
</script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Product form</h1>
    </div>
    <div class="row">
        <form action="/product/create" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Product Name :</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                </select>
            </div>
            <div class="form-group">
                <label>Product Description :</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Price :</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label>Image :</label>
                <input type="text" name="image" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary">
                <input type="reset" value="Reset" class="btn btn-dark">
            </div>
        </form>
    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<h2>Create  Product</h2>

<div class="container">
<form action="{{url('/manage_product')}}" method="POST" class="form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id ?? '' }}">
    <div class="row">
      <div class="col-25">
        <label for="name">Product_name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="product_name" placeholder="product_name.." value="{{ $product->name ?? '' }}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="price">Price</label>
      </div>
      <div class="col-75">
        <input type="text" id="price" name="price" placeholder="price.." value="{{ $product->price ?? '' }}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="quantity">Quantity</label>
      </div>
      <div class="col-75">
      <input type="text" id="quantity" name="quantity" placeholder="quantity.." value="{{ $product->quantity ?? '' }}">
    </div>
    </div>
    <div class="row">
            <div class="col-25">
                <label for="category">Category</label>
            </div>
            <div class="col-75">
                <select id="category" name="category">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    <div class="row">
      <div class="col-25">
        <label for="desc">Product Description</label>
      </div>
      <div class="col-75">
        <textarea id="desc" name="desc" placeholder="Write something.." style="height:200px">{{ $product->description ?? '' }}</textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>

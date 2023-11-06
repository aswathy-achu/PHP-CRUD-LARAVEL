<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Category List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">PHP CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('product_list') }}">Product List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category_list') }}">Category List</a>
                </li>
            </ul>
        </div>
    </nav>   
<div class="main-content">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
            <div class="card-body">
               <a href="{{route('createproduct')}}" class="btn btn-primary">+ Create New Product</a>
                <div class="col-lg-12 grid-margin">
                    
                </div>
                <div class="table-responsive col-12 col-md-12 col-lg-12">
                    <table id="data-table" class="table table-hover align-middle mb-0 dataTable ">
                <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Category Name</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('.dataTable').dataTable({
       processing: true,
       serverSide: true,
       destroy: true,
       ajax: "{{route('get-product')}}",
       columns: [
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                }, 
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'quantity', name: 'quantity'},
                {data: 'category', name: 'category'},
                {data: 'description', name: 'description'},
                {data: 'action', name: 'action'},
                ] 
    });
});
</script>
    
</body>
</html>

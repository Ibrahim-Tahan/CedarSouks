@extends('layouts.master')
@section('content')

@section('customcss')
<style>
  button{
    height:50px;
    width:150px;
    font-size:25px;
   background-color:#00796b;
   font-weight: 600;

    }
  button:hover{
    background-color:gray;
  }
.content-table {
    width:100%;
    margin: 25px auto; 
    font-size: 0.9em;
    min-width: 600px; 
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.content-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
}

.content-table th,
.content-table td {
    padding: 12px 15px;
}

.content-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}


    </style>
@endsection

<body>
@section('title')
    <div class="page-title-container">
        <h1 class="page-title">Shopping Cart</h1>
    </div>
@endsection
<form >
    <table class="content-table">
        <thead>
          <tr>
            <th>Category</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($orderDetails as $itm)
          <tr>
          <td>{{$productCategoryName}}</td>
            <td> {{ $productName }}</td>
            <td> {{ $productPrice }}</td>
            <td></td>
          </tr>
@endforeach
          <tr>
          <tr class="active-row">
            <td> Total Price:</td>

</tr>
 </tbody>
            </table>
</form>
<script>
      function redirectToCartPage(url) {
        window.location.href = url;
    }
    </script>
</body>
@endsection
@extends('layouts.master')
@section('customcss')
<style>
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
        <h1 class="page-title">Saved products:</h1>
    </div>
@endsection

@section('content')
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
        @foreach ($wishlists as $wishlist)
<tr>
    <td>{{$wishlist->getProduct->getCategory->name}}</td>
    <td>{{ $wishlist->getProduct->name }}</td>
    <td>{{ $wishlist->getProduct->price }}$</td>
    <td>{{ $wishlist->getProduct->description }}</td>
    <td>
        <form action="{{ route('wishlist',['id' => $wishlist->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="wishlist_id" value="{{ $wishlist->id }}">
            <a href="{{route('wishlist',['id'=>$wishlist->id])}}"  value="delete">Delete </a>      
                
            </form>
    </td>
</tr>
@endforeach


        </tbody>
    </table>
@endsection
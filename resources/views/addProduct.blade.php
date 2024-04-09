
@section('content')
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

.category-section {
    display: none;
}

.category-section.active {
    display: block;
}

    </style>

@extends('layouts.master')

@section('title')
    <div class="page-title-container">
        <h1 class="page-title">Add product</h1>
    </div>
@endsection
@section('content')
<form action="{{ route('products.store') }}" method="post">

        @csrf
        <table class="content-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Store name</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="name" placeholder="Name"></td>
                    <td><input type="number" name="price" placeholder="Price"></td>
                    <td><input type="text" name="description" placeholder="Description"></td>
                    <td><input type="text" name="store_name" placeholder="Store name"></td>
                    <td><input type="text" name="category" placeholder="Category"></td>

                </tr>
             
                <tr class="active-row">
                    <td>Total Price:</td>
                  
                </tr>
            </tbody>
        </table>
        <button> Add product</button>
    </form>
@endsection

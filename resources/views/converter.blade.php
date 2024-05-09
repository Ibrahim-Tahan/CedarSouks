@extends('layouts.master')
@section('title')
    <div class="page-title-container">
        <h1 class="page-title">Currency converter</h1>
    </div>
@endsection

@section('content')

@section('customcss')
<style>
  button{
    height:50px;
    width:150px;
    font-size:25px;
   font-weight: 600;

    }
  button:hover{
    background-color:gray;
  }
  .quantity-btn {
    width: 30px;
    height: 30px;
    font-size: 20px;
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

<form action="{{ route('cartView') }}" method="get">
    @csrf
    @php
        $totalPrice=0;
    @endphp
    <label for="input">Enter </label>
    <input type="number" name="Prc_in_usd" class="quantity-input" value="{{ $totalPrice }}">
    <input type="text" name="to_curr" value="">
    <button type="submit" >Back to cart</button>
</form>


</body>
@endsection

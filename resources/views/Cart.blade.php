@extends('layouts.master')
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
@section('title')
    <div class="page-title-container">
        <h1 class="page-title">Shopping Cart</h1>
    </div>
@endsection
<form>
    <table class="content-table">
        <thead>
            <tr>
                <th>Store</th>
                <th>Category</th>
                <th>Order id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPrice=0;
            @endphp
            @foreach($orderDetails as $itm)
                @php
                    $totalPrice+=$itm->getProducts->price*$itm->quantity;
                @endphp
                <tr>
                <td>{{$itm->getProducts->getCategory->getStores->name}}</td>
                    <td>{{ $itm->getProducts->getCategory->name }}</td>
                    <td>{{$itm->getOrders->id}}</td>
                    <td>{{ $itm->getProducts->name }}</td>
                    <td>{{ $itm->getProducts->price }}$</td>
                    <td>{{ $itm->getProducts->description }}</td>
                    <td>
            <input type="number" name="quantity" class="quantity-input" value="{{ $itm->quantity }}" min="1" readonly>    
                    </td>
                   <td>
                        <form action="{{route('deleteProduct',['id'=>$itm->id]) }}" method="post">
                            @csrf
                            <a href="{{route('deleteProduct',['id'=>$itm->id]) }}" value="delete">Remove item</a>
                        </form>
                    </td>
                </tr>
            @endforeach
          <tr class="active-row">
    <td>Total Price:</td>
    <td class="total-price">{{ $totalPrice }} $</td> 
</tr>
            <tr>
                <td>
                <td>
    @if (!$orderDetails->isEmpty())
        <form action="{{ route('CheckoutPage', ['id' => $orderDetails->first()->getOrders->id]) }}" method="post">
            @csrf
            <button type="submit">Proceed to checkout with ({{ $totalPrice }}$)</button>
        </form>
    @endif
</td>

                </td>
            </tr>
        </tbody>
    </table>
</form>


</body>
@endsection
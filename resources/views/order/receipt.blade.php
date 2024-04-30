<!DOCTYPE html>
<html>
<head>
  <title>Receipt</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f8f8f8;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .receipt-info {
      margin-bottom: 20px;
    }

    .receipt-info label {
      font-weight: bold;
      color: #555;
    }

    .receipt-info span {
      margin-left: 10px;
      color: #333;
    }

    .receipt-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .receipt-table th,
    .receipt-table td {
      text-align: left;
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }

    .receipt-table th {
      background-color: #f2f2f2;
      font-weight: bold;
      color: #555;
    }

    .receipt-table td {
      color: #333;
    }
  </style>
</head>
<body>
  <h1>Receipt</h1>

  <div class="receipt-info">
    <label>Order ID:</label>
    <span>{{$od->orderId}}</span>
  </div>

  <div class="receipt-info">
    <label>Name of the User:</label>
    <span>{{$user->fullname}}</span>
  </div>

  <div class="receipt-info">
    <label>Name of the Store:</label>
    <span>{{$store->name}}</span>
  </div>

  <div class="receipt-info">
    <label>Name of the Product:</label>
    <span>{{$products->name}}</span>
  </div>

  <div class="receipt-info">
    <label>Name of the Store Owner:</label>
    <span>{{$data->fullname}}</span>
  </div>

  <div class="receipt-info">
    <label>Quantity:</label>
    <span>{{$od->quantity}}</span>
  </div>

  <table class="receipt-table">
    <thead>
      <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$products->name}}</td>
        <td>{{$od->quantity}}</td>
        <td>{{$products->price}}</td>
        <td>{{ $products->price * $od->quantity }}</td>
      </tr>
    </tbody>
  </table>
</body>
</html>
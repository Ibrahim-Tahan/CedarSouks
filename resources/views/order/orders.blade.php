<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to Style HTML Tables with CSS</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <style>
        .store-title {
            text-align: center;
            color: #009879;
        }
        
        .search-bar {
            position: absolute;
            top: 230px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }
        
        .search-input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 300px;
            max-width: 100%;
        }
        
        .search-button {
            padding: 8px 16px;
            background-color: #009879;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .success-message {
            text-align: center;
            color: #009879;
            background-color: #f0f8f4;
            padding: 5px;
            margin-bottom: 40px;
            border: 1px solid #c3e6e0;
            border-radius: 4px;
            position: absolute;
            top: 30px;
            left: 48.5%;
            transform: translateX(-50%);
            justify-content: center;
        }
        
        /* New CSS for the search button */
        .search-button {
            margin-left: 10px; /* Add some space between the input and button */
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        
        .search-button:hover {
            background-color: #007d68; /* Change the background color on hover */
        }

        .content-table {
            /* Add any necessary styles for the table */
            width: 100%;
        }

        .content-table th,
        .content-table td {
            padding: 8px;
        }

        /* New CSS for the button */
        .return-button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .return-button {
            padding: 10px 20px;
            background-color: #009879;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: absolute;
            top: 630px;
            left: 44%;
        }

        .return-button:hover {
            background-color: #007d68;
        }
    </style>
</head>
<body>
    <div>
        <h1 class="store-title">Choose an Order Details</h1>
    </div>
    <div class="search-bar">
        <form action="{{ route('date',['id' => $id]) }}" method="post">
            @csrf
            <input type="date" name="start-date" required>
            <input type="date" name="end-date" required>
            <button class="search-button" type="submit">Search</button>
        </form>
    </div>
        <br><br>
    </div>

    <div style="overflow-x:auto;padding-top:110px;">
        <table class="content-table">
            <thead>
            <tr>
                <th>OrderId</th>
                <th>ProductId</th>
                <th>Quantity</th>
                <th>Details</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orderDetails as $order)
                    <tr>
                        <td>{{$order->orderId}}</td>
                        <td>{{$order->productId}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>
                        <form action="{{ route('detail2', ['id' =>$order->id]) }}" method="get">
                        @csrf
                                <button type="submit">View Details</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add a button to returnto the homepage -->
    <div class="return-button-container">
        <a href="/allorder" class="return-button">Return to Order Pages</a>
    </div>
</body>
</html>
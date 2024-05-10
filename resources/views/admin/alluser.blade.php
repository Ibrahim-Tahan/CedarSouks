<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CedarSouks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #009879;
            margin-bottom: 30px;
        }

        .success-message {
            text-align: center;
            color: #009879;
            margin-bottom: 20px;
        }

        .filter-form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-form label {
            margin-right: 10px;
            font-weight: bold;
        }

        .filter-form select {
            padding: 6px;
            font-size: 16px;
        }

        .filter-form button {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #009879;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .home-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #009879;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin-left:38%;
            margin-bottom:3%;
        }

        .home-button:hover {
            background-color: #007f6c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 30%;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #009879;
            color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <h1>All User Info</h1>
        <a href="/admin" class="home-button">Return to Home Page</a>
        @if(Session::has('success'))
        <div class="success-message">
            <p>{{Session::get('success')}}</p>
        </div>
        @endif
        <form class="filter-form" method="post" action="{{ route('filter') }}">
            @csrf
            <label for="user-type">Filter by:</label>
            <select id="user-type" name="type">
                <option value="ALL">All</option>
                <option value="Buyer">Buyer</option>
                <option value="Seller">Seller</option>
            </select>
            <button type="submit">Filter</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Reset Password</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $obj)
                <tr>
                    <td>{{$obj->id}}</td>
                    <td>{{$obj->fullname}}</td>
                    <td>{{$obj->email}}</td>
                    <td>{{$obj->user_type}}</td>
                    <td>
                        <form action="{{ route('reset', ['id' => $obj->id]) }}" method="get">
                            @csrf
                            <button type="submit">Reset Password</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
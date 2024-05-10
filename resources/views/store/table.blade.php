<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CedarSouks</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <style>
        .store-title {
            text-align: center;
            color: #009879;
        }

        .success-message {
            background-color: #e6f4ea;
            color: #009879;
            padding: 10px;
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
            position:absolute;
            top:84%;
        }

        /* Styles for the "Return to Homepage" button */
        .homepage-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #009879;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            position:absolute;
            top:5%;
        }

        .homepage-link:hover {
            background-color: #007d6d;
        }
    </style>
</head>
<body>
    @if(Session::has('success'))
    <div class="success-message">
        {{Session::get('success')}}
    </div>
    @endif
    <div>
        <h1 class="store-title">Your Store Title</h1>
    </div>
    <a href="/homepage" class="homepage-link">Return to Homepage</a> <!-- Add this line -->
    <table class="content-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Action</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $obj)
            @if($obj->isApproved=="approved")
            <tr>
                <td>{{$obj->name}}</td>
                <td>{{$obj->address}}</td>
                <td>
                    <form action="{{ route('delete',['id'=>$obj->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('store.show', ['id' => $obj->id]) }}">View</a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>
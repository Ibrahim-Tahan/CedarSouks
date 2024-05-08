<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class='row'>
            <div class='col-md-12'>
                <div class="card">
                 
                    <div class="card-body">
                    <table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:10%">Product</th>
            <th style="width:10%">Store</th>
            <th style="width:10%">Category</th>
            <th style="width:10%">Name</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <img src="{{ asset('img') }}/{{ $product->getProducts->image }}" width="100" height="100" class="img-responsive"/>
                        </div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $product->getProducts->name }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="storename">{{ $product->getProducts->getCategory->getStores->name }}</td>
                <td data-th="categoryname">{{ $product->getProducts->getCategory->name }}</td>
                <td data-th="productname">{{ $product->getProducts->name }}</td>
                <td data-th="Price">${{ $product->getProducts->price }}</td>
                <td data-th="Quantity">{{ $product->quantity }}</td>
                <td class="actions" data-th="">
                    <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align:right;">
                <h3><strong>Total: ${{ $totalPrice }}</strong></h3>
            </td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;">
                <form action="{{ route('ChangeOrderStatus') }}" method="post">
                    @csrf
                    <input type='hidden' name="total" value="{{ $totalPrice }}">
                    <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                </form>
                <form action="/session" method="POST">
                    @csrf
                    <input type='hidden' name="total" value="{{ $totalPrice }}">
                    <input type='hidden' name="productname" value="Products you bought:">
                    <button class="btn btn-danger" type="submit"><i class="fa fa-arrow-left"></i> Go to payment</button>
                </form>
            </td>
        </tr>
    </tfoot>
</table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

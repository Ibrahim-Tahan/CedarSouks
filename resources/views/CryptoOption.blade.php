
<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
@csrf
    <div class="row" style="margin-bottom:50px;">
        <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                    Deluxe Package
                    0.05 BTC
                </div>
            </p>
            <input type="hidden" name="amount" value="0.05"> {{-- required --}}
            <input type="hidden" name="coin" value="BTC"> {{-- required -- Make sure you have set up your BTC wallet and have added it in your config file--}}
            <input type="hidden" name="name" value="username">
            <input type="hidden" name="metadata" value="email" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            
            <p>
                <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                </button>
            </p>
        </div>
    </div>
</form>

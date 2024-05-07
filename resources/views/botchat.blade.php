@extends("layouts.chat")

@section('navigation')
        <div class="container">
            <div class=" navbar-collapse " id="navbarCollapse">
                <ul class="navbar-nav mx-auto">
                    <a href="" class="navbar-brand">
                        <h2 class="d-inline align-middle"><strong>Bot Chat</strong></h2>
                    </a>
                </ul>

            </div>
        </div>
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
<script>
    var botmanWidget = {
        aboutText: 'Start the conversation with Hi',
        introMessage: "WELCOME"
    };
</script>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endsection

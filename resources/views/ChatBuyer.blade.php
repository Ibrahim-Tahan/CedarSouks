@extends('layouts.master')
@section('content')
<div class="chat-container">
  <div id="messageContainer">

    @foreach($messages as $message)
    <div style="text-align:{{ $message->senderid == $id ? 'right' : 'left' }}; 
            background-color: {{ $message->senderid == $id ? 'rgba(0, 123, 255, 0.8)' : 'rgba(40, 167, 69, 0.8)' }};
            color: {{ $message->senderid == $id ? 'rgba(255, 255, 255, 0.9)' : 'rgba(0, 0, 0, 0.9)' }};
            padding: 10px; 
            margin-bottom: 10px; 
            border-radius: 8px;
            max-width: 70%;
            margin: 10px auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow-wrap: break-word;">
    <span>{{ $message->message }}</span>
</div>
    @endforeach
  </div>
    <div class="message-input-container">
      <form method="post" action="{{ route('buyeraddmsg') }}" style="width: 100%">
        @csrf
        <input type="hidden" name="buyerid" value="{{ $id }}">
        <input type="hidden" name="sellerid" value="{{ $seller->id }}">
        <input type="text" name="sellermessage" id="sellerMessageInput" required placeholder="Type a message..." style="width: 85%">
        <button id="sendButton" type="submit" style="width: 10%">Send</button>
      </form>
    </div>
</div>
@endsection
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
  Pusher.logToConsole = true;

  var pusher = new Pusher('8afc80f76f5c20b2e617', {
    cluster: 'eu'
  });

  var channel = pusher.subscribe('my-channel{{ $id }}');
  channel.bind('my-event{{ $id }}', function(data) {
    var messageContainer = document.getElementById('messageContainer');
      var messageDiv = document.createElement('div');
      messageDiv.style.textAlign = data.message.senderid == {{ $id }} ? 'right' : 'left';
      messageDiv.style.backgroundColor = data.message.senderid == {{ $id }} ? 'rgba(0, 123, 255, 0.8)' : 'rgba(40, 167, 69, 0.8)';
      messageDiv.style.color = data.senderid == {{ $id }} ? 'rgba(255, 255, 255, 0.9)' : 'rgba(0, 0, 0, 0.9)';
      messageDiv.style.padding = '10px';
      messageDiv.style.marginBottom = '10px';
      messageDiv.style.borderRadius = '8px';
      messageDiv.innerHTML = '<p>' + data.message.message + '</p>';
      messageContainer.appendChild(messageDiv);  


  });
</script>



<script>
  window.onload = function() {
      window.scrollTo(0, document.body.scrollHeight);
  };
</script>


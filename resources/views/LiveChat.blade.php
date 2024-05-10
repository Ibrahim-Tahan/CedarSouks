<!DOCTYPE html>
<head>
  <title>CedarSouks</title>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>

    Pusher.logToConsole = true;

    var pusher = new Pusher('0b7345f48f6ff15d8be8', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>
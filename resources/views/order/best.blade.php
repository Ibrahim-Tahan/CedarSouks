<!DOCTYPE html>
<html>
<head>
  <title>Best-Selling Item</title>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
    }
    
    .container {
      width: 400px;
      margin: 0 auto;
      text-align: center;
      padding: 30px 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
    }
    
    p {
      color: #666;
      margin-bottom: 10px;
    }
    
    h2 {
      color: #ff4081;
      font-size: 20px;
      margin-bottom: 5px;
    }
    
    #quantity {
      font-size: 16px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Best-Selling Item</h1>
    <p>The best-selling item is:</p>
    <h2 id="item">Loading...</h2>
    <p id="quantity"></p>
  </div>

  <script>
    // Replace the following values with your actual data
    var bestItem = "Product XYZ";
    var quantity = 100;

    // Update the HTML elements with the actual values
    document.getElementById("item").innerHTML = bestItem;
    document.getElementById("quantity").innerHTML = "Quantity sold: " + quantity;
  </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Home</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    /* CSS styles */
    body {
      font-family: 'Montserrat', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    header, footer {
      background-color: #007bff;
      color: #fff;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header {
      padding: 30px 40px;
    }

    header h1 {
      font-size: 32px;
      font-weight: 700;
      margin: 0;
    }

    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    nav ul li {
      margin-right: 30px;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
      font-size: 18px;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    nav ul li a:hover {
      color: #e6e6e6;
    }

    footer {
      padding: 40px;
      font-size: 18px;
      text-align: center;
    }

    main {
      padding: 60px 40px;
    }

    .options {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 40px;
    }

    .option {
      background-color: #fff;
      padding: 40px;
      text-align: center;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .option:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .option h3 {
      margin-top: 0;
      font-size: 24px;
      font-weight: 700;
      color: #333;
    }

    .option p {
      margin-bottom: 0;
      color: #666;
    }

    .option a {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 24px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .option a:hover {
      background-color: #0056b3;
    }

    .search-bar {
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .search-bar input[type="text"] {
      padding: 10px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
    }

    .search-bar button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
    }

    .search-bar button:hover {
      background-color: #0056b3;
    }
    
    /* New styles for store details */
    .store {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      margin-bottom: 20px;
    }

    .store img {
      max-width: 100%;
      height: 200px; /* Set the desired height for the images */
      object-fit: cover; /* Ensure the images maintain aspect ratio */
      border-radius: 6px;
      margin-bottom: 20px;
       }

    .store h4 {
      margin-top: 0;
      font-size: 18px;
      font-weight: 600;
      color: #333;
    }

    .store p{
      margin-bottom: 0;
      color: #666;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Welcome, {{$data->fullname}}</h1>
    <nav>
      <ul>
        <li><a href="add-store.html">Add Order</a></li>
        <li><a href="update2">Change User Info</a></li>
        <li><a href="logout">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h2 style="font-size: 28px; font-weight: 700; margin-bottom: 40px;">Your Options As a Buyer</h2>
    <div class="search-bar">
    <form action="{{ route('searchstore') }}" method="post">
    @csrf
      <input type="text" placeholder="Search..." name="name">
      <button>Search</button>
    </form>
    </div>
    <div class="options">
      @foreach ($stores as $store)
      @if($store->isApproved=="approved")
      <div class="option">
        <div class="store">
          <img class="store-image" src="{{ $store->path }}" alt="Store 1">
          <h4>{{ $store->name }}</h4>
          <p>{{ $store->description }}</p>
          <p>{{ $store->location }}</p>
        </div>
        <!-- Miguel -->
        <a href="/createorder">Go to Shop</a>
        <!-- Miguel -->
      </div>
      @endif($store->isApproved=="approved")
      @endforeach
    </div>
  </main>

  <footer>
    <p>&copy; 2024 Your Company. All rights reserved.</p>
  </footer>
</body>
</html>
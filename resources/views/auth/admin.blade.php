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
  </style>
</head>
<body>
  <header>
    <h1>Welcome,Admin</h1>
    <nav>
      <ul>
      <li><a href="/allstore">All Store</a></li>
        <li><a href="/alluser">All User</a></li>
        <li><a href="logout">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h2 style="font-size: 28px; font-weight: 700; margin-bottom: 40px;">Your Options As a Admin</h2>
    <div class="options">
      <div class="option">
        <h3>All Store</h3>
        <p>Check All store.</p>
        <a href="/allstore">Go to All Store</a>
      </div>
      <div class="option">
        <h3>All User Info</h3>
        <p>Check all User.</p>
        <a href="/alluser">Check All User Info</a>
      </div>
      <div class="option">
        <h3>Logout</h3>
        <p>Sign out of your account.</p>
        <a href="logout">Logout</a>
      </div>
    </div>
  </main>

  <footer>
    <p>&copy; 2024 Your Company. All rights reserved.</p>
  </footer>
</body>
</html>
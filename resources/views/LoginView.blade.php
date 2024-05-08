<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Basic CSS styles for the login form */
        .login-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-input {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('CheckLogin') }}">
            @csrf
            <div>
                <label for="email">Email</label>
                <input class="login-input" type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input class="login-input" type="password" id="password" name="password" required>
            </div>
            <div>
                <button type="submit" class="login-button">Login</button>
            </div>
        </form>
    </div>
</body>
</html>

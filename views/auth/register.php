<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Peukan Rumoh</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f0f0f0;
        }

        .container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
            padding-left: 7%;
            background-image: url('assets/images/loginBackground.jpg');
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        .login-header {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .register-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .register-form input[type="text"],
        .register-form input[type="email"],
        .register-form input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1.2rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .register-form button {
            width: 100%;
            padding: 0.75rem;
            background-color: #1e90ff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .register-form button:hover {
            background-color: #0f6dc2;
        }

        .login-link {
            margin-top: 1rem;
            text-align: center;
        }

        .alert-error {
            color: red;
            background-color: #ffe0e0;
            border: 1px solid red;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border-radius: 4px;
        }

        .alert-success {
            color: green;
            background-color: #e0ffe0;
            border: 1px solid green;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border-radius: 4px;
        }
    </style>
<body>
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <h1>Daftar</h1>
            </div>

            <div class="register-form">

                <form action="index.php?c=auth&a=register" method="POST">
                    <div class="login-nama">
                        <label for="name">Nama Lengkap: </label>
                        <input type="text" id="name" name="name" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="login-username">
                        <label for="username">Username: </label>
                        <input type="text" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="login-email">
                        <label for="email">Email: </label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="login-password">
                        <label for="password">Password: </label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>

                    <button type="submit">Daftar</button>

                    <div class="login-link">
                        <p>Sudah punya akun? <a href="index.php?c=auth&a=login">Login di sini</a></p>
                    </div> 
                </form>
            </div>
        </div>

    </div>
</body>
</html>
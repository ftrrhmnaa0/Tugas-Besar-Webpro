<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Penjual - Peukan Rumoh</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            min-height: 600px;
            display: flex;
        }

        .login-left {
            flex: 1;
            background: linear-gradient(45deg, #4CAF50, #45a049);
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
            position: relative;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .login-left h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            z-index: 1;
            position: relative;
        }

        .login-left p {
            font-size: 1.1rem;
            line-height: 1.6;
            z-index: 1;
            position: relative;
        }

        .login-right {
            flex: 1;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h2 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4CAF50;
            background: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.2);
        }

        .error-message {
            background: #ffebee;
            color: #c62828;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #f44336;
            font-size: 0.9rem;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #4CAF50, #45a049);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(76, 175, 80, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .form-footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #e1e5e9;
        }

        .form-footer a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #45a049;
        }

        .buyer-link {
            margin-top: 15px;
        }

        .buyer-link a {
            color: #666;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                margin: 10px;
            }

            .login-left, .login-right {
                padding: 40px 30px;
            }

            .login-left h1 {
                font-size: 2rem;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }
        }

        .icon {
            width: 24px;
            height: 24px;
            margin-right: 10px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <h1>🏪 Peukan Rumoh</h1>
            <p>Bergabunglah dengan platform e-commerce terdepan untuk menjual produk lokal Anda. Mulai berjualan hari ini dan raih kesuksesan bersama ribuan penjual lainnya.</p>
        </div>
        
        <div class="login-right">
            <div class="form-header">
                <h2>Login Penjual</h2>
                <p>Masuk ke akun penjual Anda</p>
            </div>

            <?php if (isset($error) && $error): ?>
                <div class="error-message">
                    ⚠️ <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="login">
                        📧 Email atau Username
                    </label>
                    <input type="text" id="login" name="login" required 
                           placeholder="Masukkan email atau username"
                           value="<?= htmlspecialchars($_POST['login'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label for="password">
                        🔒 Password
                    </label>
                    <input type="password" id="password" name="password" required 
                           placeholder="Masukkan password">
                </div>

                <button type="submit" class="btn-login">
                    🚀 Masuk ke Dashboard
                </button>
            </form>

            <div class="form-footer">
                <p>Belum punya akun penjual? 
                    <a href="index.php?c=sellerauth&a=register">Daftar Sekarang</a>
                </p>
                <div class="buyer-link">
                    <p><a href="index.php?c=auth&a=login">Login sebagai Pembeli</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        // Simple form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const login = document.getElementById('login').value.trim();
            const password = document.getElementById('password').value;

            if (!login || !password) {
                e.preventDefault();
                alert('Semua field harus diisi!');
                return;
            }

            if (password.length < 6) {
                e.preventDefault();
                alert('Password minimal 6 karakter!');
                return;
            }
        });

        // Add loading state to button
        document.querySelector('.btn-login').addEventListener('click', function() {
            this.innerHTML = '⏳ Memproses...';
            this.disabled = true;
        });
    </script> -->
</body>
</html>
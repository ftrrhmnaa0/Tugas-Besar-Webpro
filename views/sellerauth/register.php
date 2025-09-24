<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjual - Peukan Rumoh</title>
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
            padding: 20px;
        }

        .register-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            min-height: 700px;
        }

        .register-left {
            flex: 1;
            background: linear-gradient(45deg, #4CAF50, #45a049);
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
            position: relative;
        }

        .register-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .register-left h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            z-index: 1;
            position: relative;
        }

        .register-left p {
            font-size: 1.1rem;
            line-height: 1.6;
            z-index: 1;
            position: relative;
            margin-bottom: 30px;
        }

        .benefits {
            z-index: 1;
            position: relative;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .benefit-item::before {
            content: '✓';
            background: rgba(255,255,255,0.2);
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-weight: bold;
        }

        .register-right {
            flex: 1.2;
            padding: 40px;
            overflow-y: auto;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
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
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .form-group label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #4CAF50;
            background: white;
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(76, 175, 80, 0.2);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .error-message {
            background: #ffebee;
            color: #c62828;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #f44336;
            font-size: 0.9rem;
        }

        .success-message {
            background: #e8f5e8;
            color: #2e7d32;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #4caf50;
            font-size: 0.9rem;
        }

        .btn-register {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #4CAF50, #45a049);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
        }

        .btn-register:active {
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

        .password-requirements {
            font-size: 0.8rem;
            color: #666;
            margin-top: 5px;
            display: none;
        }

        .password-requirements.show {
            display: block;
        }

        .requirement {
            margin: 2px 0;
        }

        .requirement.valid {
            color: #4CAF50;
        }

        .requirement.invalid {
            color: #f44336;
        }

        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
                margin: 10px;
            }

            .register-left, .register-right {
                padding: 30px 20px;
            }

            .register-left h1 {
                font-size: 2rem;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-left">
            <h1>🏪 Peukan Rumoh</h1>
            <p>Mulai perjalanan bisnis online Anda bersama kami. Jangkau lebih banyak pelanggan dan tingkatkan penjualan dengan platform yang mudah digunakan.</p>
            
            <div class="benefits">
                <div class="benefit-item">Jangkauan pelanggan yang luas</div>
                <div class="benefit-item">Dashboard penjual yang mudah</div>
                <div class="benefit-item">Sistem pembayaran yang aman</div>
                <div class="benefit-item">Dukungan pelanggan 24/7</div>
                <div class="benefit-item">Biaya transaksi kompetitif</div>
            </div>
        </div>
        
        <div class="register-right">
            <div class="form-header">
                <h2>Daftar Sebagai Penjual</h2>
                <p>Buat akun penjual baru</p>
            </div>

            <?php if (isset($error) && $error): ?>
                <div class="error-message">
                    ⚠️ <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success) && $success): ?>
                <div class="success-message">
                    ✅ <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="" id="registerForm">
                <div class="form-group">
                    <label for="nama_toko">
                        🏪 Nama Toko
                    </label>
                    <input type="text" id="nama_toko" name="nama_toko" required 
                           placeholder="Contoh: Toko Sayur Segar"
                           value="<?= htmlspecialchars($_POST['nama_toko'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label for="alamat_toko">
                        📍 Alamat Toko
                    </label>
                    <textarea id="alamat_toko" name="alamat_toko" required 
                              placeholder="Masukkan alamat lengkap toko Anda"><?= htmlspecialchars($_POST['alamat_toko'] ?? '') ?></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="username">
                            👤 Username
                        </label>
                        <input type="text" id="username" name="username" required 
                               placeholder="Username unik"
                               value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">
                            📧 Email
                        </label>
                        <input type="email" id="email" name="email" required 
                               placeholder="email@contoh.com"
                               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">
                            🔒 Password
                        </label>
                        <input type="password" id="password" name="password" required 
                               placeholder="Minimal 6 karakter">
                        <div class="password-requirements" id="passwordReq">
                            <div class="requirement" id="length">• Minimal 6 karakter</div>
                            <div class="requirement" id="letter">• Mengandung huruf</div>
                            <div class="requirement" id="number">• Mengandung angka</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">
                            🔒 Konfirmasi Password
                        </label>
                        <input type="password" id="confirm_password" name="confirm_password" required 
                               placeholder="Ulangi password">
                    </div>
                </div>

                <button type="submit" class="btn-register">
                    🚀 Daftar Sekarang
                </button>
            </form>

            <div class="form-footer">
                <p>Sudah punya akun? 
                    <a href="index.php?c=sellerauth&a=login">Login di sini</a>
                </p>
                <p style="margin-top: 10px;">
                    <a href="../auth/login.php">Login sebagai Pembeli</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Password validation
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        const passwordReq = document.getElementById('passwordReq');
        const form = document.getElementById('registerForm');

        password.addEventListener('focus', function() {
            passwordReq.classList.add('show');
        });

        password.addEventListener('input', function() {
            const value = this.value;
            const length = document.getElementById('length');
            const letter = document.getElementById('letter');
            const number = document.getElementById('number');

            // Check length
            if (value.length >= 6) {
                length.classList.add('valid');
                length.classList.remove('invalid');
            } else {
                length.classList.add('invalid');
                length.classList.remove('valid');
            }

            // Check letter
            if (/[a-zA-Z]/.test(value)) {
                letter.classList.add('valid');
                letter.classList.remove('invalid');
            } else {
                letter.classList.add('invalid');
                letter.classList.remove('valid');
            }

            // Check number
            if (/[0-9]/.test(value)) {
                number.classList.add('valid');
                number.classList.remove('invalid');
            } else {
                number.classList.add('invalid');
                number.classList.remove('valid');
            }
        });

        // Form validation
        form.addEventListener('submit', function(e) {
            const formData = new FormData(form);
            let isValid = true;
            let errorMessage = '';

            // Check if all fields are filled
            for (let [key, value] of formData.entries()) {
                if (!value.trim()) {
                    isValid = false;
                    errorMessage = 'Semua field harus diisi!';
                    break;
                }
            }

            // Check password requirements
            const passwordValue = password.value;
            if (passwordValue.length < 6) {
                isValid = false;
                errorMessage = 'Password minimal 6 karakter!';
            }

            // Check password confirmation
            if (passwordValue !== confirmPassword.value) {
                isValid = false;
                errorMessage = 'Konfirmasi password tidak sesuai!';
            }

            // Check email format
            const email = document.getElementById('email').value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                isValid = false;
                errorMessage = 'Format email tidak valid!';
            }

            // Check username (no spaces, minimum 3 characters)
            const username = document.getElementById('username').value;
            if (username.length < 3 || /\s/.test(username)) {
                isValid = false;
                errorMessage = 'Username minimal 3 karakter dan tidak boleh mengandung spasi!';
            }

            if (!isValid) {
                e.preventDefault();
                alert(errorMessage);
                return;
            }

            // Add loading state
            const submitBtn = document.querySelector('.btn-register');
            submitBtn.innerHTML = '⏳ Mendaftarkan...';
            submitBtn.disabled = true;
        });

        // Real-time password confirmation check
        confirmPassword.addEventListener('input', function() {
            if (this.value && this.value !== password.value) {
                this.style.borderColor = '#f44336';
            } else {
                this.style.borderColor = '#e1e5e9';
            }
        });

        // Username validation (real-time)
        document.getElementById('username').addEventListener('input', function() {
            const value = this.value;
            if (/\s/.test(value)) {
                this.style.borderColor = '#f44336';
            } else {
                this.style.borderColor = '#e1e5e9';
            }
        });
    </script>
</body>
</html>

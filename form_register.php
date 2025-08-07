<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน | Bangkok Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1A4B8C;
            --secondary: #E31C25;
            --accent: #FFC72C;
            --success: #28A745;
            --blue-light: #5D8FC2;
            --red-light: #EE6C6C;
            --yellow-light: #FFDE7D;
            --bg-primary: #F8F9FA;
            --bg-card: #FFFFFF;
            --text-primary: #212529;
            --text-secondary: #495057;
            --border: #DEE2E6;
        }
        
        * {
            box-sizing: border-box;
            font-family: 'Sarabun', sans-serif;
            margin: 0;
            padding: 0;
        }
        
        body {
            background: linear-gradient(135deg, #F1F5F9 0%, #E9ECEF 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        /* Decorative elements with Thai pattern */
        .thai-pattern {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="%23E31C25" stroke-width="0.5" stroke-dasharray="5,5" opacity="0.1"/></svg>');
            background-size: 100px 100px;
            z-index: 0;
            opacity: 0.3;
        }

        .container {
            background: var(--bg-card);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(0, 0, 0, 0.02);
            padding: 40px;
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 10;
            border: 1px solid rgba(255, 255, 255, 0.5);
            animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
            position: relative;
            overflow: hidden;
        }

        .logo-text {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: -0.5px;
        }

        .logo-text span {
            color: var(--secondary);
        }

        h1 {
            color: var(--text-primary);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .subtitle {
            color: var(--text-secondary);
            font-size: 16px;
            font-weight: 400;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
            animation: slideInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            animation-fill-mode: both;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 15px;
            color: var(--text-primary);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .label-icon {
            color: var(--primary);
            font-size: 16px;
        }

        .input-container {
            position: relative;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            color: var(--text-primary);
            background: var(--bg-card);
            transition: all 0.2s ease;
            outline: none;
        }

        input::placeholder {
            color: var(--text-secondary);
            opacity: 0.6;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 75, 140, 0.1);
        }

        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 16px;
            transition: all 0.2s ease;
            pointer-events: none;
        }

        .password-toggle {
            cursor: pointer;
            pointer-events: all;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .password-hint {
            margin-top: 8px;
            padding: 10px 12px;
            background-color: rgba(26, 75, 140, 0.05);
            border-radius: 6px;
            border-left: 3px solid var(--primary);
            font-size: 13px;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .password-hint i {
            color: var(--success);
            font-size: 14px;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #153E75 0%, #C8171F 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 75, 140, 0.2);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 24px 0;
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 500;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--border), transparent);
        }

        .divider::before {
            margin-right: 16px;
        }

        .divider::after {
            margin-left: 16px;
        }

        .login-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 14px;
            background-color: rgba(26, 75, 140, 0.05);
            border: 1px solid rgba(26, 75, 140, 0.1);
            border-radius: 8px;
            color: var(--primary);
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.2s ease;
            gap: 8px;
        }

        .login-link:hover {
            background-color: rgba(26, 75, 140, 0.1);
            border-color: var(--primary);
        }

        .privacy-notice {
            margin-top: 20px;
            padding: 12px;
            background-color: rgba(40, 167, 69, 0.05);
            border-radius: 6px;
            border: 1px solid rgba(40, 167, 69, 0.1);
            font-size: 12px;
            color: var(--text-secondary);
            text-align: center;
            line-height: 1.5;
        }

        .privacy-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .privacy-link:hover {
            text-decoration: underline;
        }

        /* Animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Form animation delays */
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }

        .submit-btn { animation-delay: 0.5s; }
        .divider { animation-delay: 0.6s; }
        .login-link { animation-delay: 0.7s; }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                margin: 15px;
                border-radius: 8px;
            }

            h1 {
                font-size: 24px;
            }

            .logo-text {
                font-size: 22px;
            }

            .logo-icon {
                width: 40px;
                height: 40px;
                font-size: 20px;
            }
        }

        /* Validation states */
        input:valid:not(:placeholder-shown) {
            border-color: var(--success);
        }

        input:valid:not(:placeholder-shown) + .input-icon {
            color: var(--success);
        }

        /* Focus states */
        .form-group:focus-within label {
            color: var(--primary);
        }
    </style>
</head>

<body>
    <!-- Thai pattern background -->
    <div class="thai-pattern"></div>

    <div class="container">
        <div class="logo-section"> 
            <div class="logo">
                <div class="logo-icon">BMS</div>
            </div>
            
            <h1>สร้างบัญชีผู้ใช้ใหม่</h1>
            <p class="subtitle">
                เข้าสู่ระบบเพื่อใช้งานบริการคอสร์เรียนทั้งหมด
            </p>
        </div>

        <form action="process_register.php" method="POST">
            <div class="form-group">
                <label for="username">
                    <i class="fas fa-user label-icon"></i>
                    ชื่อผู้ใช้
                </label>
                <div class="input-container">
                    <input id="username" name="username" type="text" placeholder="กรอกชื่อผู้ใช้" required>
                    <i class="fas fa-check-circle input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope label-icon"></i>
                    อีเมล
                </label>
                <div class="input-container">
                    <input id="email" name="email" type="email" placeholder="example@bangkoksolutions.com" required>
                    <i class="fas fa-at input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="Password1">
                    <i class="fas fa-lock label-icon"></i>
                    รหัสผ่าน
                </label>
                <div class="input-container">
                    <input id="Password1" name="Password1" type="password" placeholder="สร้างรหัสผ่าน" required>
                    <i class="fas fa-eye password-toggle input-icon" onclick="togglePassword('Password1', this)"></i>
                </div>
                <div class="password-hint">
                    <i class="fas fa-shield-alt"></i>
                    <span>รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร และประกอบด้วยตัวพิมพ์ใหญ่ พิมพ์เล็ก และตัวเลข</span>
                </div>
            </div>

            <div class="form-group">
                <label for="Password2">
                    <i class="fas fa-check-double label-icon"></i>
                    ยืนยันรหัสผ่าน
                </label>
                <div class="input-container">
                    <input id="Password2" name="Password2" type="password" placeholder="กรอกรหัสผ่านอีกครั้ง" required>
                    <i class="fas fa-eye password-toggle input-icon" onclick="togglePassword('Password2', this)"></i>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-user-plus"></i>
                สร้างบัญชี
            </button>


            <div class="divider">หรือ</div>

            <a href="Login.php" class="login-link">
                <i class="fas fa-sign-in-alt"></i>
                มีบัญชีอยู่แล้ว? เข้าสู่ระบบ
            </a>
        </form>
    </div>

    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Add form validation feedback
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                if (this.validity.valid && this.value.length > 0) {
                    this.style.borderColor = 'var(--success)';
                } else if (this.value.length > 0) {
                    this.style.borderColor = 'var(--secondary)';
                } else {
                    this.style.borderColor = 'var(--border)';
                }
            });
        });

        // Password strength indicator
        document.getElementById('Password1').addEventListener('input', function() {
            const password = this.value;
            const hint = this.parentElement.nextElementSibling;
            
            if (password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /\d/.test(password)) {
                hint.style.borderLeftColor = 'var(--success)';
                hint.style.backgroundColor = 'rgba(40, 167, 69, 0.05)';
            } else {
                hint.style.borderLeftColor = 'var(--primary)';
                hint.style.backgroundColor = 'rgba(26, 75, 140, 0.05)';
            }
        });

        // Confirm password matching
        document.getElementById('Password2').addEventListener('input', function() {
            const password1 = document.getElementById('Password1').value;
            const password2 = this.value;
            
            if (password2.length > 0) {
                if (password1 === password2) {
                    this.style.borderColor = 'var(--success)';
                } else {
                    this.style.borderColor = 'var(--secondary)';
                }
            }
        });
    </script>
</body>
</html>
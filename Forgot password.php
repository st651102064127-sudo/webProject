<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลืมรหัสผ่าน | Bangkok Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1A4B8C;
            --secondary: #E31C25;
            --accent: #FFC72C;
            --success: #28A745;
            --error: #DC3545;
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

        /* Thai pattern background */
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

        h2 {
            color: var(--text-primary);
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
            line-height: 1.3;
        }

        .subtitle {
            color: var(--text-secondary);
            font-size: 15px;
            font-weight: 400;
            margin-bottom: 30px;
            text-align: center;
            line-height: 1.5;
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            border: 1px solid rgba(40, 167, 69, 0.2);
            color: var(--success);
        }

        .alert-error {
            background-color: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.2);
            color: var(--error);
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
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
        }

        .password-toggle {
            cursor: pointer;
        }

        .password-toggle:hover {
            color: var(--primary);
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
            margin-top: 10px;
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

        .back-link {
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
            margin-top: 20px;
        }

        .back-link:hover {
            background-color: rgba(26, 75, 140, 0.1);
            border-color: var(--primary);
        }

        .password-strength {
            margin-top: 10px;
            height: 4px;
            background-color: var(--border);
            border-radius: 2px;
            overflow: hidden;
        }

        .strength-meter {
            height: 100%;
            width: 0;
            background-color: var(--error);
            transition: all 0.3s ease;
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

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                margin: 15px;
                border-radius: 8px;
            }

            h2 {
                font-size: 22px;
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
    </style>
</head>
<body>
    <!-- Thai pattern background -->
    <div class="thai-pattern"></div>

    <div class="container">
        <div class="logo-section">
            <div class="logo">
                <div class="logo-icon">BS</div>
                <div class="logo-text">Bangkok<span>Solutions</span></div>
            </div>
            
            <h2>รีเซ็ตรหัสผ่าน</h2>
            <p class="subtitle">กรุณากรอกอีเมลและรหัสผ่านใหม่ที่ต้องการใช้</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="email_account">
                    <i class="fas fa-envelope label-icon"></i>
                    อีเมล
                </label>
                <div class="input-container">
                    <input id="email_account" name="email_account" type="email" placeholder="กรอกอีเมลที่ลงทะเบียนไว้" required>
                    <i class="fas fa-at input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="new_password">
                    <i class="fas fa-lock label-icon"></i>
                    รหัสผ่านใหม่
                </label>
                <div class="input-container">
                    <input id="new_password" name="new_password" type="password" placeholder="กรอกรหัสผ่านใหม่" required>
                    <i class="fas fa-eye password-toggle input-icon" onclick="togglePassword('new_password', this)"></i>
                </div>
                <div class="password-strength">
                    <div class="strength-meter" id="password-strength-meter"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="confirm_password">
                    <i class="fas fa-check-double label-icon"></i>
                    ยืนยันรหัสผ่านใหม่
                </label>
                <div class="input-container">
                    <input id="confirm_password" name="confirm_password" type="password" placeholder="กรอกรหัสผ่านใหม่อีกครั้ง" required>
                    <i class="fas fa-eye password-toggle input-icon" onclick="togglePassword('confirm_password', this)"></i>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-sync-alt"></i>
                เปลี่ยนรหัสผ่าน
            </button>

            <a href="login.php" class="back-link">
                <i class="fas fa-arrow-left"></i>
                กลับไปหน้าเข้าสู่ระบบ
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

        // Password strength indicator
        document.getElementById('new_password').addEventListener('input', function() {
            const password = this.value;
            const meter = document.getElementById('password-strength-meter');
            let strength = 0;
            
            // Check length
            if (password.length >= 8) strength += 1;
            if (password.length >= 12) strength += 1;
            
            // Check for mixed case
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;
            
            // Check for numbers
            if (/\d/.test(password)) strength += 1;
            
            // Check for special chars
            if (/[^a-zA-Z0-9]/.test(password)) strength += 1;
            
            // Update meter
            if (password.length === 0) {
                meter.style.width = '0%';
                meter.style.backgroundColor = 'var(--border)';
            } else if (strength <= 2) {
                meter.style.width = '33%';
                meter.style.backgroundColor = 'var(--error)';
            } else if (strength <= 4) {
                meter.style.width = '66%';
                meter.style.backgroundColor = 'var(--accent)';
            } else {
                meter.style.width = '100%';
                meter.style.backgroundColor = 'var(--success)';
            }
        });

        // Confirm password matching
        document.getElementById('confirm_password').addEventListener('input', function() {
            const password = document.getElementById('new_password').value;
            const confirmPassword = this.value;
            
            if (confirmPassword.length > 0) {
                if (password === confirmPassword) {
                    this.style.borderColor = 'var(--success)';
                } else {
                    this.style.borderColor = 'var(--error)';
                }
            } else {
                this.style.borderColor = 'var(--border)';
            }
        });
    </script>
</body>
</html> 
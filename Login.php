<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ | Bangkok Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ... (CSS ส่วนเดิม) ... */
        :root {
            --primary: #1A4B8C;
            --secondary: #E31C25;
            --accent: #FFC72C;
            --success: #28A745;
            --error: #DC3545;
            --bg-primary: #F8F9FA;
            --bg-card: #FFFFFF;
            --text-primary: #212529;
            --text-secondary: #495057;
            --border: #DEE2E6;
            --transition: all 0.3s ease;
        }
        
        * {
            box-sizing: border-box;
            font-family: 'Sarabun', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--bg-primary);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: var(--bg-card);
            padding: 3rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* เพิ่ม CSS สำหรับโลโก้ */
        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo-container img {
            width: 150px; /* กำหนดขนาดโลโก้ตามต้องการ */
            height: auto;
            object-fit: contain;
        }

        .login-container h1 {
            text-align: center;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 2rem;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            padding-right: 3rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 1rem;
            color: var(--text-primary);
            transition: var(--transition);
        }

        .input-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 75, 140, 0.2);
        }

        .input-group label {
            position: absolute;
            top: 0.75rem;
            left: 1rem;
            color: var(--text-secondary);
            pointer-events: none;
            transition: var(--transition);
            background-color: var(--bg-card);
            padding: 0 5px;
            transform: translateY(0);
        }

        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: -0.75rem;
            left: 0.5rem;
            font-size: 0.75rem;
            color: var(--primary);
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-secondary);
        }

        .links-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            font-size: 0.875rem;
        }

        .links-container a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .links-container a:hover {
            text-decoration: underline;
        }

        .submit-btn {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--primary);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .submit-btn:hover {
            background-color: #153A6D;
        }
        
        .submit-btn .fas {
            margin-right: 8px;
        }
        
        .divider {
            text-align: center;
            position: relative;
            margin: 2rem 0;
            font-size: 0.875rem;
            color: var(--text-secondary);
        }
        
        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background-color: var(--border);
        }
        
        .divider::before {
            left: 0;
        }
        
        .divider::after {
            right: 0;
        }

        .register-link {
            display: block;
            width: 100%;
            text-align: center;
            padding: 0.75rem;
            color: var(--primary);
            border: 2px solid var(--primary);
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .register-link:hover {
            background-color: var(--primary);
            color: #fff;
        }
        
        .register-link .fas {
            margin-right: 8px;
        }

        .alert-success {
            color: var(--success);
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
        }

        .alert-error {
            color: var(--error);
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="img/Logo_บริษัท-removebg-preview.png" alt="BMS Logo">
        </div>

        <h1>เข้าสู่ระบบ</h1>

        <?php 
        if (isset($_GET['register_success'])) {
            echo '<div class="alert-success"><i class="fas fa-check-circle"></i> ลงทะเบียนสำเร็จแล้ว! โปรดเข้าสู่ระบบ</div>';
        }
        if (isset($_GET['logout_success'])) {
            echo '<div class="alert-success"><i class="fas fa-check-circle"></i> ออกจากระบบสำเร็จ</div>';
        }
        ?>

        <form action="process_login.php" method="post">
            <div class="input-group">
                <input type="email" id="email" name="email_account" placeholder=" " required>
                <label for="email">อีเมล</label>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password_account" placeholder=" " required>
                <label for="password">รหัสผ่าน</label>
                <span class="toggle-password" onclick="togglePassword('password', this)"><i class="fas fa-eye"></i></span>
            </div>

            <div class="links-container">
                <div></div>
                <a href="Forgot password.php">ลืมรหัสผ่าน?</a>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-sign-in-alt"></i>
                เข้าสู่ระบบ
            </button>

            <div class="divider">หรือ</div>

            <a href="form_register.php" class="register-link">
                <i class="fas fa-user-plus"></i>
                สร้างบัญชีใหม่
            </a>
        </form>
    </div>

    <script>
        //... (JavaScript ส่วนเดิม) ...
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            const fontAwesomeIcon = icon.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                fontAwesomeIcon.classList.remove('fa-eye');
                fontAwesomeIcon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                fontAwesomeIcon.classList.remove('fa-eye-slash');
                fontAwesomeIcon.classList.add('fa-eye');
            }
        }

        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                if (this.validity.valid && this.value.length > 0) {
                    this.style.borderColor = 'var(--success)';
                } else if (this.value.length > 0) {
                    this.style.borderColor = 'var(--error)';
                } else {
                    this.style.borderColor = 'var(--border)';
                }
            });
        });
    </script>
</body>
</html>
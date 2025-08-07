<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ | Bangkok Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
</head>

<body>
    <!-- Thai pattern background -->
    <div class="thai-pattern"></div>

    <div class="container">
        <div class="logo-section">
            <div class="logo">
                <div class="logo-icon">BMS</div>
                <br>
                <div class="logo-text">Bangkok Web
                <br>
                <span>Solutions</span></div>
            </div>

            <h1>เข้าสู่ระบบ</h1>
            <p class="subtitle">
                เรียนรู้คอร์สเรียนกับ<span>ผู้เชี่ยวชาญจากหลากหลายสาขา</span>
            </p>
        </div>

        <form action="{{route('User.login.session')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email_account">
                    <i class="fas fa-envelope label-icon"></i>
                    อีเมล
                </label>
                <div class="input-container">
                    <input id="email_account" name="email_account" type="email" placeholder="example@bangkoksolutions.com" required>
                    <i class="fas fa-at input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="password_account">
                    <i class="fas fa-lock label-icon"></i>
                    รหัสผ่าน
                </label>
                <div class="input-container">
                    <input id="password_account" name="password_account" type="password" placeholder="กรอกรหัสผ่าน" required>
                    <i class="fas fa-eye password-toggle input-icon" onclick="togglePassword('password_account', this)"></i>
                </div>
                <div class="forgot-password">
                    <br>
                    <a href="Forgot password.php">ลืมรหัสผ่าน?</a>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-sign-in-alt"></i>
                เข้าสู่ระบบ
            </button>

            <div class="divider">หรือ</div>

            <a href="{{route('User.register')}}" class="register-link">
                <i class="fas fa-user-plus"></i>
                สร้างบัญชีใหม่
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
    </script>
</body>
</html>

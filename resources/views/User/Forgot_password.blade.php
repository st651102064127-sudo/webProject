<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลืมรหัสผ่าน | Bangkok Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Forgotpassword.css') }}">
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

        <form method="POST" action="{{ route('User.Forgot.Submit') }}">
            @csrf
            @if (session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><i class="fas fa-exclamation-triangle"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="email_account">
                    <i class="fas fa-envelope label-icon"></i>
                    อีเมล
                </label>
                <div class="input-container">
                    <input id="email_account" name="email_account" type="email" placeholder="กรอกอีเมลที่ลงทะเบียนไว้"
                        required>
                    <i class="fas fa-at input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="new_password">
                    <i class="fas fa-lock label-icon"></i>
                    รหัสผ่านใหม่
                </label>
                <div class="input-container">
                    <input id="new_password" name="new_password" type="password" placeholder="กรอกรหัสผ่านใหม่"
                        required>
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
                    <input id="confirm_password" name="confirm_password" type="password"
                        placeholder="กรอกรหัสผ่านใหม่อีกครั้ง" required>
                    <i class="fas fa-eye password-toggle input-icon"
                        onclick="togglePassword('confirm_password', this)"></i>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-sync-alt"></i>
                เปลี่ยนรหัสผ่าน
            </button>

            <a href="{{ route('User.Login') }}" class="back-link">
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

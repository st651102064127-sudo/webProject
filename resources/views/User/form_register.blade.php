<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ลงทะเบียน | Bangkok Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/form_register.css') }}" />
    <style>
        .text-danger { color: red; font-size: 0.9em; margin-top: 0.2em; }
        .alert-danger { background-color: #f8d7da; color: #842029; padding: 1em; margin-bottom: 1em; border-radius: 4px; }
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

        {{-- แสดง error รวม --}}
        @if ($errors->any())
            <div class="alert-danger">
                <ul style="margin:0; padding-left: 1.2em;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST" novalidate>
            @csrf

            <div class="form-group">
                <label for="username">
                    <i class="fas fa-user label-icon"></i>
                    ชื่อผู้ใช้
                </label>
                <div class="input-container">
                    <input id="username" name="username" type="text" placeholder="กรอกชื่อผู้ใช้" value="{{ old('username') }}" required />
                    <i class="fas fa-check-circle input-icon"></i>
                </div>
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope label-icon"></i>
                    อีเมล
                </label>
                <div class="input-container">
                    <input id="email" name="email" type="email" placeholder="example@bangkoksolutions.com" value="{{ old('email') }}" required />
                    <i class="fas fa-at input-icon"></i>
                </div>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock label-icon"></i>
                    รหัสผ่าน
                </label>
                <div class="input-container">
                    <input id="password" name="password" type="password" placeholder="สร้างรหัสผ่าน" required />
                    <i class="fas fa-eye password-toggle input-icon" onclick="togglePassword('password', this)"></i>
                </div>
                <div class="password-hint">
                    <i class="fas fa-shield-alt"></i>
                    <span>รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร และประกอบด้วยตัวพิมพ์ใหญ่ พิมพ์เล็ก และตัวเลข</span>
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">
                    <i class="fas fa-check-double label-icon"></i>
                    ยืนยันรหัสผ่าน
                </label>
                <div class="input-container">
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="กรอกรหัสผ่านอีกครั้ง" required />
                    <i class="fas fa-eye password-toggle input-icon" onclick="togglePassword('password_confirmation', this)"></i>
                </div>
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-user-plus"></i>
                สร้างบัญชี
            </button>

            <div class="divider">หรือ</div>

            <a href="{{ route('User.Login') }}" class="login-link">
                <i class="fas fa-sign-in-alt"></i>
                มีบัญชีอยู่แล้ว? เข้าสู่ระบบ
            </a>
        </form>
    </div>

    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

        // Add form validation feedback
        document.querySelectorAll("input").forEach((input) => {
            input.addEventListener("input", function () {
                if (this.validity.valid && this.value.length > 0) {
                    this.style.borderColor = "var(--success)";
                } else if (this.value.length > 0) {
                    this.style.borderColor = "var(--secondary)";
                } else {
                    this.style.borderColor = "var(--border)";
                }
            });
        });

        // Password strength indicator
        document.getElementById("password").addEventListener("input", function () {
            const password = this.value;
            const hint = this.parentElement.nextElementSibling;

            if (
                password.length >= 8 &&
                /[A-Z]/.test(password) &&
                /[a-z]/.test(password) &&
                /\d/.test(password)
            ) {
                hint.style.borderLeftColor = "var(--success)";
                hint.style.backgroundColor = "rgba(40, 167, 69, 0.05)";
            } else {
                hint.style.borderLeftColor = "var(--primary)";
                hint.style.backgroundColor = "rgba(26, 75, 140, 0.05)";
            }
        });

        // Confirm password matching
        document
            .getElementById("password_confirmation")
            .addEventListener("input", function () {
                const password1 = document.getElementById("password").value;
                const password2 = this.value;

                if (password2.length > 0) {
                    if (password1 === password2) {
                        this.style.borderColor = "var(--success)";
                    } else {
                        this.style.borderColor = "var(--secondary)";
                    }
                }
            });
    </script>
</body>
</html>

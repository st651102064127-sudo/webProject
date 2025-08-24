<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดคอร์ส | Bangkok Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="{{ asset('css/coreses.css') }}">
</head>

<body>
    <nav>
        <a href="#" class="logo">
            <div class="logo-icon">
                <img src="{{ asset('Image/Logo.png') }}" alt="BMS Logo"
                    style="width:100%; height:100%; object-fit:contain;">
            </div>
            Bangkok Web Solution
        </a>
        <div class="nav-actions">
            <a href={{ route('index') }} class="nav-link">หน้าแรก</a>
            <a href="{{ route('user.show') }}" class="nav-link">คอร์สเรียน</a>
            <a href={{ route('about') }} class="nav-link">เกี่ยวกับเรา</a>
            <a href={{ route('contace') }} class="nav-link">ติดต่อ</a>

            @if (@empty(session('user_fullname')))
                <a href={{ route('User.Login') }} class="login-btn-nav">
                    <i class="fas fa-sign-in-alt"></i>
                    เข้าสู่ระบบ
                </a>
            @endif
        </div>
    </nav>

    <section class="course-header">
        <div class="detail-container header-content">
            <h1 class="course-title">{{ $result['title'] }}</h1>
            <div class="course-meta">
                <span class="course-category">{{ $result['category'] }}</span>
                <span class="course-instructor"><i class="fas fa-user"></i> {{ $result['instructor'] }}</span>
                <span class="course-duration"><i class="far fa-clock"></i> {{ $result['duration'] }} ชั่วโมง</span>
                <span class="course-level"><i class="fas fa-signal"></i> {{ $result['level'] }}</span>
            </div>
        </div>
    </section>

    <div class="detail-container">
        <div class="course-main">
            <div class="course-content">
                <h2 class="section-title">เกี่ยวกับคอร์สนี้</h2>
                <p class="course-description">
                    {{ $result['description'] }}
                </p>

                <div class="course-syllabus">
                    <h2 class="section-title">เนื้อหาคอร์ส</h2>
                    @foreach ($result['syllabuses'] as $item)
                        <div class="syllabus-item">
                            <span>{{ $item['title'] }}</span>
                            <span>{{ $item['duration'] }}</span>

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="course-sidebar">
                <div class="course-card">
                    <div class="course-price">
                        {{ $result['price'] == 0 ? 'ฟรี' : $result['price'] . ' บาท' }}
                    </div>
                    @if (!session('user_fullname'))
                        <!-- ผู้ใช้ยังไม่ login -->
                        <a href="{{ route('User.Login') }}" class="enroll-btn">กรุณาเข้าสู่ระบบ</a>
                    @elseif ($enrollment)
                        <!-- ผู้ใช้ login และลงทะเบียนแล้ว -->
                        <a href="javascript:void(0)" class="enroll-btn enrolled"
                            style="background-color: #000; color: #fff; cursor: default;">
                            ลงทะเบียนแล้ว
                        </a>
                    @else
                        <!-- ผู้ใช้ login แต่ยังไม่ได้ลงทะเบียน -->
                        <a href="{{ route('user.payment', $result['course_id']) }}" class="enroll-btn">
                            ลงทะเบียนเรียน
                        </a>
                    @endif

                    <a href={{ route('user.show') }} class="detail-btn">กลับสู่หน้าคอร์สทั้งหมด</a>

                    <ul class="course-features">
                        @foreach ($result['features'] as $feature)
                            <li>
                                <span class="feature-label">{{ $feature['feature_name'] }}:</span>
                                <span class="feature-value">{{ $feature['feature_value'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


    </div>

    @if (session('status'))
        <script>
            Swal.fire({
                title: "{{ session('message') }}",
                icon: "{{ session('status') }}",
                confirmButtonText: "OK"
            });
        </script>
    @endif
</body>

</html>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดคอร์ส | Bangkok Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1A4B8C;
            --primary-light: rgba(26, 75, 140, 0.1);
            --secondary: #E31C25;
            --secondary-light: rgba(227, 28, 37, 0.1);
            --accent: #FFC72C;
            --bg-light: #F8F9FA;
            --text-dark: #212529;
            --text-muted: #6C757D;
            --border: #DEE2E6;
            --card-shadow: 0 5px 15px rgba(0,0,0,0.05);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.6;
            margin: 0;
            overflow-x: hidden;
        }
        
        .detail-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Navigation Bar (เหมือนใน courses.php) */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background-color: #1A4B8C;
            color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            margin-right: 0.75rem;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            position: relative;
            transition: var(--transition);
        }

        .login-btn-nav, .logout-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background-color: var(--primary);
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .login-btn-nav:hover, .logout-btn:hover {
             background-color: #3e5ea3;
        }

        .greeting {
            color: var(--accent);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .greeting i {
            font-size: 1.2rem;
        }
        
        /* Course Detail Header */
        .course-header {
            background: linear-gradient(135deg, var(--primary), #0D2C5A);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }
        
        .header-content {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .course-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
        }
        
        .course-meta {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .course-category {
            background-color: var(--secondary);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .course-instructor, .course-duration, .course-level {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255,255,255,0.9);
        }
        
        /* Course Detail Main Content */
        .course-main {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .course-content {
            background-color: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--card-shadow);
        }
        
        .section-title {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50%;
            height: 3px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            border-radius: 2px;
        }
        
        .course-description {
            margin-bottom: 2rem;
            line-height: 1.8;
        }
        
        .course-syllabus {
            margin-top: 2rem;
        }
        
        .syllabus-item {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .syllabus-item:last-child {
            border-bottom: none;
        }
        
        /* Course Sidebar */
        .course-sidebar {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .course-card {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
        }
        
        .course-price {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 1.5rem;
        }
        
        .enroll-btn {
            display: block;
            width: 100%;
            padding: 1rem;
            text-align: center;
            background-color: var(--secondary);
            color: white;
            border-radius: 8px;
            font-weight: 600;
            transition: var(--transition);
            text-decoration: none;
            margin-bottom: 1rem;
        }
        
        .enroll-btn:hover {
            background-color: #C2161D;
            box-shadow: 0 5px 15px rgba(227, 28, 37, 0.4);
        }
        
        .detail-btn {
            display: block;
            width: 100%;
            padding: 1rem;
            text-align: center;
            background-color: var(--primary);
            color: white;
            border-radius: 8px;
            font-weight: 600;
            transition: var(--transition);
            text-decoration: none;
        }
        
        .detail-btn:hover {
            background-color: #153E75;
            box-shadow: 0 5px 15px rgba(26, 75, 140, 0.4);
        }
        
        .course-features {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .course-features li {
            padding: 0.7rem 0;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
        }
        
        .course-features li:last-child {
            border-bottom: none;
        }
        
        /* Related Courses */
        .related-courses {
            margin-bottom: 3rem;
        }
        
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .course-card .course-img {
            height: 150px;
            background-size: cover;
            background-position: center;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            position: relative;
            display: flex;
            align-items: flex-start;
            padding: 0.75rem;
        }
        
        .course-card .course-category {
            font-size: 0.8rem;
        }
        
        .course-card .course-info {
            padding: 1.5rem;
        }
        
        .course-card .course-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 0.5rem;
        }
        
        .course-card .course-instructor {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
        }
        
        .course-card .course-meta {
            display: flex;
            gap: 1rem;
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 1rem;
        }
        
        .course-card .course-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 1rem;
        }
        
        .course-card .course-btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 0.75rem 1rem;
            background-color: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .course-card .course-btn:hover {
            background-color: #153E75;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .course-main {
                grid-template-columns: 1fr;
            }
            
            .course-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .course-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <nav>
        <a href="#" class="logo">
            <div class="logo-icon">
                <img src="img/Logo_บริษัท-removebg-preview.png" alt="BMS Logo" style="width:100%; height:100%; object-fit:contain;">
            </div>
            Bangkok Web Solution
        </a>
        <div class="nav-actions">
            <a href="main_landing.php" class="nav-link">หน้าแรก</a>
            <a href="courses.php" class="nav-link">คอร์สเรียน</a>
            <a href="about.php" class="nav-link">เกี่ยวกับเรา</a>
            <a href="contace.php" class="nav-link">ติดต่อ</a>
            
            <a href="Login.php" class="login-btn-nav">
                <i class="fas fa-sign-in-alt"></i>
                เข้าสู่ระบบ
            </a>
        </div>
    </nav>

    <?php
    // ข้อมูลคอร์ส (ในทางปฏิบัติควรดึงจากฐานข้อมูล)
    $courses = [
        1 => [
            'title' => 'Python สำหรับผู้เริ่มต้น',
            'category' => 'การเขียนโปรแกรม',
            'instructor' => 'ดร.สมชาย วัฒนธร',
            'duration' => '12 ชั่วโมง',
            'level' => 'เริ่มต้น',
            'price' => 'ฟรี',
            'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'description' => 'คอร์สนี้จะสอนพื้นฐานการเขียนโปรแกรมด้วยภาษา Python ตั้งแต่เริ่มต้นจนสามารถเขียนโปรแกรมพื้นฐานได้ เหมาะสำหรับผู้ที่ไม่มีพื้นฐานมาก่อน โดยจะเรียนรู้ผ่านตัวอย่างและแบบฝึกหัดที่เข้าใจง่าย',
            'syllabus' => [
                ['title' => 'บทที่ 1: พื้นฐาน Python', 'duration' => '2 ชั่วโมง'],
                ['title' => 'บทที่ 2: ตัวแปรและประเภทข้อมูล', 'duration' => '2 ชั่วโมง'],
                ['title' => 'บทที่ 3: เงื่อนไขและลูป', 'duration' => '3 ชั่วโมง'],
                ['title' => 'บทที่ 4: ฟังก์ชัน', 'duration' => '2 ชั่วโมง'],
                ['title' => 'บทที่ 5: โครงสร้างข้อมูล', 'duration' => '3 ชั่วโมง'],
            ],
            'features' => [
                'รูปแบบการสอน' => 'วิดีโอและแบบฝึกหัด',
                'ภาษา' => 'ภาษาไทย',
                'ใบประกาศนียบัตร' => 'มี',
                'การเข้าถึง' => 'ตลอดชีพ'
            ]
        ],
        2 => [
            'title' => 'Digital Marketing 2023',
            'category' => 'การตลาด',
            'instructor' => 'คุณสตรีรัตน์ อัศวรุ่งเรือง',
            'duration' => '8 ชั่วโมง',
            'level' => 'กลาง',
            'price' => '1,290 บาท',
            'image' => 'https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'description' => 'เรียนรู้กลยุทธ์ Digital Marketing ล่าสุดในปี 2023 ที่จะช่วยให้คุณทำการตลาดออนไลน์ได้อย่างมีประสิทธิภาพ ครอบคลุมทุกช่องทางทั้ง Facebook, Instagram, Google Ads และอื่นๆ',
            'syllabus' => [
                ['title' => 'บทที่ 1: พื้นฐาน Digital Marketing', 'duration' => '1 ชั่วโมง'],
                ['title' => 'บทที่ 2: การตลาดผ่าน Facebook', 'duration' => '2 ชั่วโมง'],
                ['title' => 'บทที่ 3: การตลาดผ่าน Instagram', 'duration' => '1 ชั่วโมง'],
                ['title' => 'บทที่ 4: Google Ads', 'duration' => '2 ชั่วโมง'],
                ['title' => 'บทที่ 5: การวัดผลและการปรับปรุง', 'duration' => '2 ชั่วโมง'],
            ],
            'features' => [
                'รูปแบบการสอน' => 'วิดีโอและเคสศึกษา',
                'ภาษา' => 'ภาษาไทย',
                'ใบประกาศนียบัตร' => 'มี',
                'การเข้าถึง' => '1 ปี'
            ]
        ],
        3 => [
            'title' => 'UI/UX Design Fundamentals',
            'category' => 'การออกแบบ',
            'instructor' => 'คุณอรุณี ศิลปะเจริญ',
            'duration' => '10 ชั่วโมง',
            'level' => 'เริ่มต้น',
            'price' => '990 บาท',
            'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'description' => 'เรียนรู้พื้นฐานการออกแบบ UI/UX ตั้งแต่หลักการเบื้องต้นจนถึงการสร้าง Prototype',
            'syllabus' => [
                ['title' => 'บทที่ 1: Introduction to UI/UX', 'duration' => '2 ชั่วโมง'],
                ['title' => 'บทที่ 2: User Research', 'duration' => '3 ชั่วโมง'],
                ['title' => 'บทที่ 3: Wireframing and Prototyping', 'duration' => '5 ชั่วโมง'],
            ],
            'features' => [
                'รูปแบบการสอน' => 'วิดีโอและโปรเจกต์',
                'ภาษา' => 'ภาษาไทย',
                'ใบประกาศนียบัตร' => 'มี',
                'การเข้าถึง' => '2 ปี'
            ]
        ],
        4 => [
            'title' => 'Data Science ด้วย Python',
            'category' => 'ข้อมูลและการวิเคราะห์',
            'instructor' => 'ดร.วิทยา ข้อมูลชาญ',
            'duration' => '15 ชั่วโมง',
            'level' => 'ขั้นสูง',
            'price' => '2,490 บาท',
            'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'description' => 'เจาะลึกการวิเคราะห์ข้อมูลด้วย Python และไลบรารีที่จำเป็น เช่น Pandas, Matplotlib, และ Scikit-learn',
            'syllabus' => [
                ['title' => 'บทที่ 1: Data Manipulation with Pandas', 'duration' => '5 ชั่วโมง'],
                ['title' => 'บทที่ 2: Data Visualization', 'duration' => '4 ชั่วโมง'],
                ['title' => 'บทที่ 3: Machine Learning Concepts', 'duration' => '6 ชั่วโมง'],
            ],
            'features' => [
                'รูปแบบการสอน' => 'วิดีโอและแบบฝึกหัดโค้ด',
                'ภาษา' => 'ภาษาไทย/อังกฤษ',
                'ใบประกาศนียบัตร' => 'มี',
                'การเข้าถึง' => 'ตลอดชีพ'
            ]
        ],
    ];

    // รับค่า ID จาก URL
    $courseId = isset($_GET['id']) ? intval($_GET['id']) : 1;
    
    // ตรวจสอบว่ามีคอร์สนี้หรือไม่
    if (!isset($courses[$courseId])) {
        $courseId = 1; // ใช้คอร์สแรกเป็นค่าเริ่มต้นหากไม่พบ
    }
    
    $course = $courses[$courseId];
    ?>

    <section class="course-header">
        <div class="detail-container header-content">
            <h1 class="course-title"><?php echo htmlspecialchars($course['title']); ?></h1>
            <div class="course-meta">
                <span class="course-category"><?php echo htmlspecialchars($course['category']); ?></span>
                <span class="course-instructor"><i class="fas fa-user"></i> <?php echo htmlspecialchars($course['instructor']); ?></span>
                <span class="course-duration"><i class="far fa-clock"></i> <?php echo htmlspecialchars($course['duration']); ?></span>
                <span class="course-level"><i class="fas fa-signal"></i> <?php echo htmlspecialchars($course['level']); ?></span>
            </div>
        </div>
    </section>

    <div class="detail-container">
        <div class="course-main">
            <div class="course-content">
                <h2 class="section-title">เกี่ยวกับคอร์สนี้</h2>
                <p class="course-description">
                    <?php echo htmlspecialchars($course['description']); ?>
                </p>
                
                <div class="course-syllabus">
                    <h2 class="section-title">เนื้อหาคอร์ส</h2>
                    <?php foreach ($course['syllabus'] as $item): ?>
                        <div class="syllabus-item">
                            <span><?php echo htmlspecialchars($item['title']); ?></span>
                            <span><?php echo htmlspecialchars($item['duration']); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="course-sidebar">
                <div class="course-card">
                    <div class="course-price"><?php echo htmlspecialchars($course['price']); ?></div>
                    <a href="enroll.php?id=<?php echo $courseId; ?>" class="enroll-btn">ลงทะเบียนเรียน</a>
                    <a href="courses.php" class="detail-btn">กลับสู่หน้าคอร์สทั้งหมด</a>
                    
                    <ul class="course-features">
                        <?php foreach ($course['features'] as $label => $value): ?>
                            <li>
                                <span class="feature-label"><?php echo htmlspecialchars($label); ?>:</span>
                                <span class="feature-value"><?php echo htmlspecialchars($value); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <section class="related-courses">
            <h2 class="section-title">คอร์สอื่นๆ ที่น่าสนใจ</h2>
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-img" style="background-image: url('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
                        <span class="course-category">การออกแบบ</span>
                    </div>
                    <div class="course-info">
                        <h3 class="course-title">UI/UX Design Fundamentals</h3>
                        <div class="course-instructor">
                            <i class="fas fa-user"></i> คุณอรุณี ศิลปะเจริญ
                        </div>
                        <div class="course-meta">
                            <span class="course-duration"><i class="far fa-clock"></i> 10 ชั่วโมง</span>
                            <span class="course-level"><i class="fas fa-signal"></i> เริ่มต้น</span>
                        </div>
                        <div class="course-price">990 บาท</div>
                        <a href="course-detail.php?id=3" class="course-btn">ดูรายละเอียด</a>
                    </div>
                </div>
                
                <div class="course-card">
                    <div class="course-img" style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab27c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
                        <span class="course-category">ข้อมูลและการวิเคราะห์</span>
                    </div>
                    <div class="course-info">
                        <h3 class="course-title">Data Science ด้วย Python</h3>
                        <div class="course-instructor">
                            <i class="fas fa-user"></i> ดร.วิทยา ข้อมูลชาญ
                        </div>
                        <div class="course-meta">
                            <span class="course-duration"><i class="far fa-clock"></i> 15 ชั่วโมง</span>
                            <span class="course-level"><i class="fas fa-signal"></i> ขั้นสูง</span>
                        </div>
                        <div class="course-price">2,490 บาท</div>
                        <a href="course-detail.php?id=4" class="course-btn">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
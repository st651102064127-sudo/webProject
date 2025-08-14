<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คอร์สเรียน | Bangkok Solutions</title>
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
        
        .courses-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* --- Navigation Bar (New) --- */
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

        /* .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--secondary);
            transition: var(--transition);
        } */

        .nav-link:hover::after {
            width: 100%;
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
        
        /* --- Header Section --- */
        .courses-header {
            background: #212529;
            color: white;
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
            margin-bottom: 3rem;
            text-align: center;
        }
        
        .courses-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="white" stroke-width="0.5" stroke-dasharray="5,5" opacity="0.2"/></svg>');
            background-size: 100px 100px;
            z-index: 1;
        }
        
        .header-content {
            position: relative;
            z-index: 2;
        }
        
        .header-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .header-subtitle {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* --- Filter Section (New) --- */
        .filter-section {
            background-color: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
            margin-top: -80px; /* Adjust to pull it up over the header */
            position: relative;
            z-index: 10;
        }
        
        .filter-group {
            margin-bottom: 1rem;
        }
        
        .filter-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .filter-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        
        .filter-tag {
            padding: 0.5rem 1rem;
            background-color: var(--primary-light);
            color: var(--primary);
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
            border: 1px solid transparent;
        }
        
        .filter-tag:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .filter-tag.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        /* --- Course Sections --- */
        .featured-section, .all-courses-section {
            margin-bottom: 3rem;
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
        
        /* --- Courses Grid & Card --- */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }
        
        .course-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            position: relative;
            opacity: 0;
            transform: translateY(20px);
            display: none; /* hidden by default, shown by JS */
        }
        
        .course-card.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .course-img {
            height: 160px;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .course-category {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background-color: var(--secondary);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .course-info {
            padding: 1.5rem;
        }
        
        .course-title {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }
        
        .course-instructor {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .course-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        
        .course-duration, .course-level {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }
        
        .course-price {
            font-weight: 700;
            color: var(--secondary);
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        
        .course-btn {
            display: block;
            width: 100%;
            padding: 0.7rem;
            text-align: center;
            background-color: var(--primary);
            color: white;
            border-radius: 8px;
            font-weight: 600;
            transition: var(--transition);
            text-decoration: none;
        }
        
        .course-btn:hover {
            background-color: #153E75;
            box-shadow: 0 5px 15px rgba(26, 75, 140, 0.4);
        }
        
        /* --- Responsive Design --- */
        @media (max-width: 768px) {
            .courses-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .filter-tags {
                justify-content: center;
            }

            .header-title {
                font-size: 2.5rem;
            }

            nav {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-actions {
                flex-direction: column;
                gap: 1rem;
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
            
            <!-- <?php if ($isLoggedIn): ?>
                <div class="greeting">
                    <i class="fas fa-user-circle"></i> สวัสดี, <?php echo htmlspecialchars($_SESSION['email_account']); ?>
                </div>
                <a href="logout.php" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    ออกจากระบบ
                </a>
            <?php else: ?> -->
                <a href="Login.php" class="login-btn-nav">
                    <i class="fas fa-sign-in-alt"></i>
                    เข้าสู่ระบบ
                </a>
            <?php endif; ?>
        </div>
    </nav>
    <section class="courses-header">
        <div class="courses-container header-content">
            <h1 class="header-title">คอร์สเรียนทั้งหมด</h1>
            <p class="header-subtitle">
                ค้นหาคอร์สเรียนที่เหมาะกับคุณ จากหลากหลายหมวดหมู่และระดับความยาก
            </p>
        </div>
    </section>

    <div class="courses-container">
        <section class="filter-section">
            <div class="filter-group">
                <h3 class="filter-title">หมวดหมู่</h3>
                <div class="filter-tags">
                    <div class="filter-tag active" data-filter="all">ทั้งหมด</div>
                    <div class="filter-tag" data-filter="programming">การเขียนโปรแกรม</div>
                    <div class="filter-tag" data-filter="marketing">การตลาด</div>
                    <div class="filter-tag" data-filter="design">การออกแบบ</div>
                    <div class="filter-tag" data-filter="business">ธุรกิจ</div>
                    <div class="filter-tag" data-filter="data">ข้อมูลและการวิเคราะห์</div>
                </div>
            </div>
            
            <div class="filter-group">
                <h3 class="filter-title">ระดับความยาก</h3>
                <div class="filter-tags">
                    <div class="filter-tag active" data-filter="all">ทั้งหมด</div>
                    <div class="filter-tag" data-filter="beginner">เริ่มต้น</div>
                    <div class="filter-tag" data-filter="intermediate">กลาง</div>
                    <div class="filter-tag" data-filter="advanced">ขั้นสูง</div>
                </div>
            </div>
        </section>

        <section class="featured-section">
            <h2 class="section-title">คอร์สเรียนแนะนำ</h2>
            <div class="courses-grid">
                <div class="course-card" data-category="programming" data-level="beginner">
                    <div class="course-img" style="background-image: url('https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
                        <span class="course-category">การเขียนโปรแกรม</span>
                    </div>
                    <div class="course-info">
                        <h3 class="course-title">Python สำหรับผู้เริ่มต้น</h3>
                        <div class="course-instructor">
                            <i class="fas fa-user"></i> ดร.สมชาย วัฒนธร
                        </div>
                        <div class="course-meta">
                            <span class="course-duration"><i class="far fa-clock"></i> 12 ชั่วโมง</span>
                            <span class="course-level"><i class="fas fa-signal"></i> เริ่มต้น</span>
                        </div>
                        <div class="course-price">ฟรี</div>
                        <a href="courses_detail.php" class="course-btn">ดูรายละเอียด</a>
                    </div>
                </div>

                <div class="course-card" data-category="marketing" data-level="intermediate">
                    <div class="course-img" style="background-image: url('https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
                        <span class="course-category">การตลาด</span>
                    </div>
                    <div class="course-info">
                        <h3 class="course-title">Digital Marketing 2023</h3>
                        <div class="course-instructor">
                            <i class="fas fa-user"></i> คุณสตรีรัตน์ อัศวรุ่งเรือง
                        </div>
                        <div class="course-meta">
                            <span class="course-duration"><i class="far fa-clock"></i> 8 ชั่วโมง</span>
                            <span class="course-level"><i class="fas fa-signal"></i> กลาง</span>
                        </div>
                        <div class="course-price">1,290 บาท</div>
                        <a href="courses_detail.php" class="course-btn">ดูรายละเอียด</a>
                    </div>
                </div>

                <div class="course-card" data-category="business" data-level="intermediate">
                    <div class="course-img" style="background-image: url('https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
                        <span class="course-category">ธุรกิจ</span>
                    </div>
                    <div class="course-info">
                        <h3 class="course-title">การบริหารทีมยุคดิจิทัล</h3>
                        <div class="course-instructor">
                            <i class="fas fa-user"></i> คุณธนวัฒน์ พิพัฒน์ธนากุล
                        </div>
                        <div class="course-meta">
                            <span class="course-duration"><i class="far fa-clock"></i> 6 ชั่วโมง</span>
                            <span class="course-level"><i class="fas fa-signal"></i> กลาง</span>
                        </div>
                        <div class="course-price">1,590 บาท</div>
                        <a href="courses_detail.php" class="course-btn">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="all-courses-section">
            <h2 class="section-title">คอร์สเรียนทั้งหมด</h2>
            <div class="courses-grid">
                <div class="course-card" data-category="design" data-level="beginner">
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
                        <a href="courses_detail.php" class="course-btn">ดูรายละเอียด</a>
                    </div>
                </div>

                <div class="course-card" data-category="data" data-level="advanced">
                    <div class="course-img" style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
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
                        <a href="courses_detail.php" class="course-btn">ดูรายละเอียด</a>
                    </div>
                </div>

                <div class="course-card" data-category="marketing" data-level="intermediate">
                    <div class="course-img" style="background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
                        <span class="course-category">การตลาด</span>
                    </div>
                    <div class="course-info">
                        <h3 class="course-title">Content Marketing สมัยใหม่</h3>
                        <div class="course-instructor">
                            <i class="fas fa-user"></i> คุณวรรณา สร้างสรรค์
                        </div>
                        <div class="course-meta">
                            <span class="course-duration"><i class="far fa-clock"></i> 7 ชั่วโมง</span>
                            <span class="course-level"><i class="fas fa-signal"></i> กลาง</span>
                        </div>
                        <div class="course-price">1,190 บาท</div>
                        <a href="courses_detail.php" class="course-btn">ดูรายละเอียด</a>
                    </div>
                </div>

                <div class="course-card" data-category="programming" data-level="advanced">
                    <div class="course-img" style="background-image: url('https://images.unsplash.com/photo-1563986768609-322da13575f3?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
                        <span class="course-category">การเขียนโปรแกรม</span>
                    </div>
                    <div class="course-info">
                        <h3 class="course-title">Web Development Full Stack</h3>
                        <div class="course-instructor">
                            <i class="fas fa-user"></i> คุณพัฒน์ พัฒนาการ
                        </div>
                        <div class="course-meta">
                            <span class="course-duration"><i class="far fa-clock"></i> 20 ชั่วโมง</span>
                            <span class="course-level"><i class="fas fa-signal"></i> ขั้นสูง</span>
                        </div>
                        <div class="course-price">3,290 บาท</div>
                        <a href="courses_detail.php" class="course-btn">ดูรายละเอียด</a>
                    </div>
                </div>

                <div class="course-card" data-category="business" data-level="intermediate">
                    <div class="course-img" style="background-image: url('https://images.unsplash.com/photo-1434626881859-194d67b2b86f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
                        <span class="course-category">ธุรกิจ</span>
                    </div>
                    <div class="course-info">
                        <h3 class="course-title">การเงินสำหรับผู้ประกอบการ</h3>
                        <div class="course-instructor">
                            <i class="fas fa-user"></i> ดร.เศรษฐ์ เงินล้าน
                        </div>
                        <div class="course-meta">
                            <span class="course-duration"><i class="far fa-clock"></i> 9 ชั่วโมง</span>
                            <span class="course-level"><i class="fas fa-signal"></i> กลาง</span>
                        </div>
                        <div class="course-price">1,390 บาท</div>
                        <a href="courses_detail.php" class="course-btn">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filter functionality
            document.querySelectorAll('.filter-tag').forEach(tag => {
                tag.addEventListener('click', function() {
                    const parentTags = this.closest('.filter-group').querySelectorAll('.filter-tag');
                    parentTags.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    filterCourses();
                });
            });

            // Intersection Observer for scroll animation
            const courseCards = document.querySelectorAll('.course-card');
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            // Function to filter courses
            function filterCourses() {
                const activeCategories = Array.from(document.querySelectorAll('.filter-group:nth-child(1) .filter-tag.active')).map(tag => tag.dataset.filter);
                const activeLevels = Array.from(document.querySelectorAll('.filter-group:nth-child(2) .filter-tag.active')).map(tag => tag.dataset.filter);
                
                document.querySelectorAll('.course-card').forEach(card => {
                    const cardCategory = card.dataset.category;
                    const cardLevel = card.dataset.level;

                    const categoryMatch = activeCategories.includes('all') || activeCategories.includes(cardCategory);
                    const levelMatch = activeLevels.includes('all') || activeLevels.includes(cardLevel);
                    
                    if (categoryMatch && levelMatch) {
                        card.style.display = 'block';
                        observer.observe(card); // Re-observe card to animate when it becomes visible
                    } else {
                        card.style.display = 'none';
                        observer.unobserve(card); // Stop observing hidden cards
                    }
                });
            }

            // Initial call to set initial display state
            filterCourses();
        });
    </script>
</body>
</html>
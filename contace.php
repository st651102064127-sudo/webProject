<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ติดต่อเรา | Bangkok Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Sarabun', sans-serif;
        }

        body {
            font-family: 'Sarabun', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.6;
            margin: 0;
            overflow-x: hidden;
        }

        /* Utility Classes */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 5%;
        }

        /* Navigation - Adjusted for new theme */
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

        .logo:hover {
            transform: translateY(-2px);
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
        
        .nav-link.active {
            /* color: #000000FF; */
            font-weight: 600;
        }
        
        /* .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: #4c70d4;
        } */
            

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--secondary);
            transition: var(--transition);
        }

        .login-btn-nav {
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

        .login-btn-nav:hover {
            background-color: #3e5ea3;
        }
        
        /* Contact Section */
        .contact-section {
            padding: 5rem 5% 8rem;
            flex-grow: 1;
        }
        
        .contact-header {
            text-align: center;
            margin-bottom: 4rem;
        }
        
        .contact-title {
            font-size: 3rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .contact-subtitle {
            font-size: 1.2rem;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .contact-main {
            display: flex;
            gap: 3rem;
            background: #ffffff;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #e0e0e0;
        }
        
        .contact-form-section, .contact-info-section {
            flex: 1;
        }
        
        .contact-form-section h3, .contact-info-section h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #555;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }
        
        .form-input, .form-textarea {
            width: 100%;
            padding: 14px 18px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            background-color: #f7f9fc;
            color: #333;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: #4c70d4;
            box-shadow: 0 0 0 3px rgba(76, 112, 212, 0.2);
        }
        
        .form-textarea {
            resize: vertical;
            min-height: 150px;
        }
        
        .submit-button {
            width: 100%;
            padding: 16px;
            background-color: #4c70d4;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1rem;
            box-shadow: 0 8px 20px rgba(76, 112, 212, 0.3);
        }
        
        .submit-button:hover {
            background-color: #3e5ea3;
            transform: translateY(-2px);
        }
        

        .contact-info-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .contact-info-item {
            display: flex;
            gap: 1.5rem;
            align-items: flex-start;
        }
        
        .contact-info-icon-wrapper {
            min-width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #4c70d4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            box-shadow: 0 4px 15px rgba(76, 112, 212, 0.4);
        }
        
        .contact-info-text {
            display: flex;
            flex-direction: column;
        }
        
        .contact-info-text strong {
            font-size: 1.2rem;
            color: #2c3e50;
            margin-bottom: 0.2rem;
        }

        .contact-info-text span, .contact-info-text a {
            font-size: 1rem;
            color: #666;
            text-decoration: none;
            line-height: 1.5;
            transition: color 0.3s ease;
        }
        
        .contact-info-text a:hover {
            color: #4c70d4;
        }

        /* Map Section */
        .map-section {
            margin-top: 4rem;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #e0e0e0;
        }

        .map-section iframe {
            width: 100%;
            height: 450px;
            border: none;
        }
        
        /* Footer */
        footer {
            background: #ffffff;
            padding: 4rem 5% 2rem;
            border-top: 1px solid #e0e0e0;
            color: #666;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            max-width: 1300px;
            margin: 0 auto 3rem;
        }

        .footer-logo {
            font-size: 1.6rem;
            color: #333;
        }

        .footer-description {
            font-size: 1rem;
            color: #888;
        }

        .social-links .social-link {
            background: #f0f2f5;
            color: #666;
        }

        .social-links .social-link:hover {
            background: #4c70d4;
            color: #ffffff;
            transform: translateY(-2px);
        }
        
        .footer-title {
            color: #2c3e50;
            font-size: 1.2rem;
        }

        .footer-title::after {
            background: #4c70d4;
        }
        
        .footer-links a {
            color: #666;
            font-size: 1rem;
        }

        .footer-links a i {
            color: #4c70d4;
            font-size: 0.8rem;
        }
        
        .footer-links a:hover {
            color: #4c70d4;
        }

        .copyright {
            color: #888;
            font-size: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .contact-main {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                gap: 1rem;
            }
            .logo {
                font-size: 1.6rem;
                margin-bottom: 1rem;
            }
            .nav-actions {
                flex-direction: column;
                gap: 1rem;
            }
            .contact-title {
                font-size: 2.2rem;
            }
            .contact-subtitle {
                font-size: 1rem;
            }
            .contact-main {
                padding: 2rem;
                gap: 2.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .contact-title {
                font-size: 1.8rem;
            }
            .contact-info-item {
                gap: 1rem;
            }
            .contact-info-text strong {
                font-size: 1.1rem;
            }
            .contact-info-text span, .contact-info-text a {
                font-size: 0.9rem;
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
            <a href="contace.php" class="nav-link active">ติดต่อ</a>
            <a href="Login.php" class="login-btn-nav">
                <i class="fas fa-sign-in-alt"></i>
                เข้าสู่ระบบ
            </a>
        </div>
    </nav>
    
    <section class="contact-section">
        <div class="container">
            <div class="contact-header">
                <h2 class="contact-title">ติดต่อเรา</h2>
                <p class="contact-subtitle">
                    เรายินดีรับฟังทุกข้อสงสัยและข้อเสนอแนะ กรุณากรอกแบบฟอร์มด้านล่าง
                    หรือติดต่อเราผ่านช่องทางอื่นๆ ได้เลยครับ
                </p>
            </div>
            
            <div class="contact-main">
                <section class="contact-form-section">
                    <h3>ส่งข้อความหาเรา</h3>
                    <form id="contactForm">
                        <div class="form-group">
                            <label for="name" class="form-label">
                                <i class="fas fa-user"></i>
                                ชื่อ-นามสกุล
                            </label>
                            <input type="text" class="form-input" id="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i>
                                อีเมล
                            </label>
                            <input type="email" class="form-input" id="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" class="form-label">
                                <i class="fas fa-tag"></i>
                                หัวข้อ
                            </label>
                            <input type="text" class="form-input" id="subject" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message" class="form-label">
                                <i class="fas fa-comment"></i>
                                ข้อความ
                            </label>
                            <textarea class="form-textarea" id="message" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="submit-button">
                            <i class="fas fa-paper-plane"></i>
                            ส่งข้อความ
                        </button>
                    </form>
                </section>
                
                <section class="contact-info-section">
                    <h3>ช่องทางการติดต่ออื่นๆ</h3>
                    <ul class="contact-info-list">
                        <li class="contact-info-item">
                            <div class="contact-info-icon-wrapper">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <strong>ที่อยู่</strong>
                                <span>182 หมู่บ้านตะวันรุ่ง 7 ถนนลาดพร้าว 64 แยก 4 แขวงวังทองหลาง เขตวังทองหลาง กรุงเทพฯ 10310</span>
                            </div>
                        </li>
                        
                        <li class="contact-info-item">
                            <div class="contact-info-icon-wrapper">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <strong>โทรศัพท์</strong>
                                <a href="tel:029339750">02-933-9750-1</a>
                            </div>
                        </li>
                        
                        <li class="contact-info-item">
                            <div class="contact-info-icon-wrapper">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <strong>อีเมล</strong>
                                <a href="mailto:info@bangkokwebsolution.com">info@bangkokwebsolution.com</a>
                            </div>
                        </li>

                        <li class="contact-info-item">
                            <div class="contact-info-icon-wrapper">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-info-text">
                                <strong>เวลาทำการ</strong>
                                <span>จันทร์-ศุกร์ 9:00-17:30 น.</span>
                            </div>
                        </li>
                    </ul>
                </section>
            </div>
            
            <section class="map-section">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.291770054707!2d100.59339671483034!3d13.76615569046777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b13c7d6c697%3A0x6d9539d04f210d70!2z4Lir4Lin4LiE4Liy4Lir4LiB4Lix4Lij4Lix4Lir4LiZ4LmM4Lih4LiX4Liy4LiV4Liw4Lih4Liy4Lij4Liy4Lij4LmA4LiK4Lix4LiZ4LiB4Lij4Liw4Lih4Liy4Lij!5e0!3m2!1sth!2sth!4v1628174409395!5m2!1sth!2sth" allowfullscreen="" loading="lazy"></iframe>
            </section>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div>
                <a href="#" class="footer-logo">
                    <div class="footer-logo-icon">
                        <img src="img/Logo_บริษัท-removebg-preview.png" alt="BMS Logo" style="width:100%; height:100%; object-fit:contain;">
                    </div>
                    Bangkok Web Solution
                </a>
                <p class="footer-description">
                    Bangkok Web Cost คือแพลตฟอร์มพัฒนาทักษะสำหรับองค์กรยุคใหม่
                    ที่ช่วยยกระดับศักยภาพทีมงานด้วยคอร์สเรียนคุณภาพสูง
                    และระบบติดตามผลลัพธ์แบบเรียลไทม์
                </p>
                <div class="social-links">
                    <a href="https://www.facebook.com/BangkokWebSolution" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.youtube.com/channel/UC9YdXCaiyNGQXVxm1f1u9pQ" class="social-link"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div>
                <h4 class="footer-title">เมนูหลัก</h4>
                <ul class="footer-links">
                    <li><a href="main_landing.php"><i class="fas fa-chevron-right"></i> หน้าแรก</a></li>
                    <li><a href="courses.php"><i class="fas fa-chevron-right"></i> คอร์สเรียนทั้งหมด</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> สำหรับองค์กร</a></li>
                    <li><a href="about.php"><i class="fas fa-chevron-right"></i> เกี่ยวกับเรา</a></li>
                    <li><a href="contact.php"><i class="fas fa-chevron-right"></i> ติดต่อเรา</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-title">หมวดหมู่คอร์ส</h4>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-chevron-right"></i> การพัฒนาทีม</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> เทคโนโลยี</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> การตลาด</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> การเงิน</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> การบริหาร</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-title">ข้อมูลติดต่อ</h4>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> 182 หมู่บ้านตะวันรุ่ง 7 ถนนลาดพร้าว 64 แยก 4 แขวงวังทองหลาง เขตวังทองหลาง กรุงเทพฯ 10310</a></li>
                    <li><a href="#"><i class="fas fa-phone-alt"></i> 02-933-9750-1</a></li>
                    <li><a href="#"><i class="fas fa-envelope"></i> info@bangkokwebsolution.com</a></li>
                    <li><a href="#"><i class="fas fa-clock"></i> จันทร์-ศุกร์ 9:00-17:30 น.</a></li>
                </ul>
            </div>
        </div>

        <div class="copyright">
            © ลิขสิทธิ์ 2021 บริษัท บางกอก เว็บ โซลูชั่น จำกัด.
        </div>
    </footer>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;
            
            if(name && email && subject && message) {
                alert('ส่งข้อความสำเร็จ! เราจะติดต่อกลับไปหาคุณในเร็วๆนี้');
                this.reset();
            } else {
                alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');
            }
        });
    </script>
</body>
</html>
<?php
session_start();
$isLoggedIn = isset($_SESSION['email_account']);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangkok Course - แพลตฟอร์มออนไลน์สำหรับองค์กร</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Sarabun', sans-serif;
        }
        
        body {
            overflow-x: hidden;
            background-color: #0c1220;
            color: #e0e7ff;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            border-bottom: 1px solid rgba(99, 102, 241, 0.2);
        }

        /* Animated Background */
        .geometric-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            top: 0;
            left: 0;
            z-index: 0;
        }
        
        .shape {
            position: absolute;
            opacity: 0.08;
            animation: pulse 10s infinite ease-in-out;
            filter: blur(20px);
        }
        
        .shape-1 {
            width: 600px;
            height: 600px;
            background: linear-gradient(45deg, #8b5cf6, #ec4899);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            top: -150px;
            right: -150px;
        }
        
        .shape-2 {
            width: 500px;
            height: 500px;
            background: linear-gradient(45deg, #3b82f6, #10b981);
            border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%;
            bottom: -200px;
            left: -200px;
            animation-delay: 3s;
        }

        .shape-3 {
            width: 400px;
            height: 400px;
            background: linear-gradient(45deg, #f59e0b, #ef4444);
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
            top: 40%;
            left: 25%;
            animation-delay: 6s;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.08; }
            50% { transform: scale(1.15) rotate(5deg); opacity: 0.15; }
        }

        /* Navigation */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
            position: relative;
            z-index: 20;
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(99, 102, 241, 0.1);
        }
        
        .logo {
            display: flex;
            align-items: center;
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.3s ease;
        }
        
        .logo:hover {
            transform: translateY(-3px);
        }
        
        .logo-icon {
            width: 100px;
            height: 100px;
            /* background: linear-gradient(135deg, #6366f1, #8b5cf6); */
            border-radius: 12px;
            margin-right: 15px;
            /* display: flex; */
            align-items: center;
            justify-content: center;
            /* color: white; */
            font-weight: bold;
            /* box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4); */
        }
        
        .nav-actions {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        
        .nav-link {
            color: #c7d2fe;
            font-size: 1.1rem;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            padding: 8px 0;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: #ffffff;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }

        .logout-btn, .login-btn-nav {
            padding: 0.75rem 1.8rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .login-btn-nav {
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
            color: white;
            border: none;
        }
        
        .login-btn-nav:hover {
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.1);
            color: #e0e7ff;
            border: 1px solid rgba(99, 102, 241, 0.3);
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
        }
        
        .greeting {
            color: #c7d2fe;
            font-size: 1.2rem;
            font-weight: 600;
            background: rgba(99, 102, 241, 0.15);
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 5rem;
            padding: 5% 8%;
            max-width: 1600px;
            margin: auto;
            position: relative;
            z-index: 5;
        }
        
        .content-left {
            flex: 1;
            max-width: 700px;
        }
        
        .content-left h1 {
            color: white;
            font-size: 3.8rem;
            line-height: 1.15;
            margin-bottom: 1.5rem;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        
        .brand-highlight {
            font-weight: 800;
            background: linear-gradient(to right, #818cf8, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            position: relative;
        }
        
        .brand-highlight::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(to right, #818cf8, #c084fc);
            opacity: 0.3;
            border-radius: 4px;
            z-index: -1;
        }
        
        .subtitle {
            font-size: 2.2rem;
            font-weight: 600;
            color: #a5b4fc;
            margin-bottom: 2rem;
        }
        
        .main-message {
            color: #c7d2fe;
            font-size: 1.4rem;
            line-height: 1.7;
            margin-bottom: 3rem;
            max-width: 600px;
        }
        
        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            margin-top: 3rem;
        }
        
        .cta-button {
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            padding: 1.1rem 2.5rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }
        
        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .cta-button:hover::before {
            left: 100%;
        }
        
        .cta-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.6);
        }
        
        .cta-button.secondary {
            background: transparent;
            border: 2px solid #6366f1;
            color: #c7d2fe;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.2);
        }
        
        .cta-button.secondary:hover {
            background: rgba(99, 102, 241, 0.1);
        }
        
        .cta-button i {
            font-size: 1.3rem;
        }

        .content-right {
            flex: 1;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image-container {
            position: relative;
            width: 100%;
            max-width: 650px;
            height: 500px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            background: linear-gradient(45deg, #1e293b, #0f172a);
            border: 1px solid rgba(99, 102, 241, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .hero-image {
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(30, 41, 59, 0.7), rgba(15, 23, 42, 0.9)), 
                        url('https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .hero-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            width: 100%;
            max-width: 500px;
        }
        
        .stat-card {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 16px;
            padding: 1.8rem;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            border-color: rgba(99, 102, 241, 0.4);
            background: rgba(15, 23, 42, 0.8);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        
        .stat-value {
            font-size: 3rem;
            font-weight: 700;
            color: #818cf8;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: #c7d2fe;
            font-weight: 500;
        }

        /* Features Section */
        .features-section {
            padding: 8rem 5%;
            background: linear-gradient(to bottom, #0f172a, #0c1220);
            position: relative;
            z-index: 1;
        }
        
        .section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 5rem;
        }
        
        .section-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: white;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            border-radius: 2px;
        }
        
        .section-subtitle {
            font-size: 1.4rem;
            color: #a5b4fc;
            line-height: 1.6;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            max-width: 1300px;
            margin: 0 auto;
        }
        
        .feature-card {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 20px;
            padding: 2.5rem 2rem;
            text-align: center;
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(99, 102, 241, 0.4);
            background: rgba(15, 23, 42, 0.7);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.8rem;
            font-size: 2rem;
            color: white;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
        }
        
        .feature-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1.2rem;
        }
        
        .feature-description {
            font-size: 1.1rem;
            color: #c7d2fe;
            line-height: 1.6;
        }

        /* Footer */
        footer {
            background: #53605976;
            padding: 5rem 5% 2rem;
            border-top: 1px solid rgba(99, 102, 241, 0.1);
            position: relative;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            max-width: 1300px;
            margin: 0 auto 4rem;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
            text-decoration: none;
            margin-bottom: 1.5rem;
        }
        
        .footer-logo-icon {
            width: 50%;
            height: 50px;
            /* background: linear-gradient(135deg, #6366f1, #8b5cf6); */
            border-radius: 12px;
            margin-right: 15px;
            /* display: flex; */
            align-items: center;
            justify-content: center;
            /* color: white; */
            font-weight: bold;
            /* box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4); */
        }
        
        .footer-description {
            font-size: 1.1rem;
            color: #a5b4fc;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-link {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(99, 102, 241, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #c7d2fe;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            transform: translateY(-3px);
        }
        
        .footer-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1.8rem;
            position: relative;
            padding-bottom: 0.8rem;
        }
        
        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            border-radius: 2px;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 1rem;
        }
        
        .footer-links a {
            color: #a5b4fc;
            text-decoration: none;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .footer-links a i {
            color: #6366f1;
            font-size: 0.9rem;
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(99, 102, 241, 0.1);
            color: #a5b4fc;
            font-size: 1.1rem;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .main-content {
                flex-direction: column;
                text-align: center;
                padding: 5rem 5%;
            }
            
            .content-left {
                max-width: 100%;
                margin-bottom: 4rem;
            }
            
            .content-left h1 {
                font-size: 3.2rem;
            }
            
            .main-message {
                margin: 0 auto 2rem;
            }
            
            .cta-buttons {
                justify-content: center;
            }
            
            .hero-image-container {
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            nav {
                padding: 1.2rem 5%;
                flex-wrap: wrap;
            }
            
            .logo {
                font-size: 1.6rem;
                margin-bottom: 1rem;
            }
            
            .nav-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .content-left h1 {
                font-size: 2.6rem;
            }
            
            .subtitle {
                font-size: 1.8rem;
            }
            
            .main-message {
                font-size: 1.2rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                gap: 1.2rem;
            }
            
            .cta-button {
                width: 100%;
                justify-content: center;
            }
            
            .hero-stats {
                grid-template-columns: 1fr;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 480px) {
            .greeting {
                display: none;
            }
            
            .content-left h1 {
                font-size: 2.2rem;
            }
            
            .subtitle {
                font-size: 1.5rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .feature-card {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="hero-section">
        <div class="geometric-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
        
        <nav>
            <a href="#" class="logo">
                <div class="logo-icon">
                    <img src="img/Logo_บริษัท-removebg-preview.png" alt="BMS Logo" style="width:100%; height:100%; object-fit:contain;">
                </div>
                Bangkok Web Solotion
            </a>
            <div class="nav-actions">
                <a href="Home.php" class="nav-link">หน้าแรก</a>
                <a href="#" class="nav-link">คอร์สเรียน</a>
                <a href="#" class="nav-link">สำหรับองค์กร</a>
                <a href="about.php" class="nav-link">เกี่ยวกับเรา</a>
                <a href="contace.php" class="nav-link">ติดต่อ</a>
                
                <?php if ($isLoggedIn): ?>
                    <div class="greeting">
                        <i class="fas fa-user-circle"></i> สวัสดี, <?php echo htmlspecialchars($_SESSION['email_account']); ?>
                    </div>
                    <a href="logout.php" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        ออกจากระบบ
                    </a>
                <?php else: ?>
                    <a href="Login.php" class="login-btn-nav">
                        <i class="fas fa-sign-in-alt"></i>
                        เข้าสู่ระบบ
                    </a>
                <?php endif; ?>
            </div>
        </nav>
        
        <div class="main-content">
            <div class="content-left">
                <h1>ยกระดับทักษะทีมของคุณด้วย <span class="brand-highlight">Course</span></h1>
                <div class="subtitle">แพลตฟอร์มพัฒนาทักษะสำหรับองค์กรสมัยใหม่</div>
                <p class="main-message">
                    Bangkok Course มอบโซลูชั่นการฝึกอบรมแบบครบวงจรสำหรับองค์กรยุคใหม่ 
                    เพิ่มศักยภาพทีมงานด้วยคอร์สเรียนคุณภาพสูงจากผู้เชี่ยวชาญ 
                    พร้อมระบบติดตามผลการฝึกอบรมแบบเรียลไทม์
                </p>
                <div class="cta-buttons">
                    <a href="Login.php" class="cta-button">
                        <i class="fas fa-play-circle"></i> เริ่มต้นทันที
                    </a>
                    <a href="#" class="cta-button secondary">
                        <i class="fas fa-book-open"></i> ดูคอร์สทั้งหมด
                    </a>
                </div>
            </div>
            
            <div class="content-right">
                <div class="hero-image-container">
                    <div class="hero-image">
                        <div class="hero-stats">
                            <div class="stat-card">
                                <div class="stat-value">500+</div>
                                <div class="stat-label">คอร์สเรียนคุณภาพ</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-value">98%</div>
                                <div class="stat-label">ความพึงพอใจผู้ใช้</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-value">2,500+</div>
                                <div class="stat-label">องค์กรที่ไว้วางใจ</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-value">24/7</div>
                                <div class="stat-label">บริการสนับสนุน</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="features-section">
        <div class="section-header">
            <h2 class="section-title">ทำไมต้องเรา</h2>
            <p class="section-subtitle">
                แพลตฟอร์มพัฒนาทักษะที่ออกแบบมาเพื่อตอบโจทย์องค์กรยุคใหม่ 
                ด้วยเทคโนโลยีล้ำสมัยและเนื้อหาคุณภาพสูง
            </p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <h3 class="feature-title">คอร์สเรียนคุณภาพสูง</h3>
                <p class="feature-description">
                    คอร์สเรียนที่ออกแบบโดยผู้เชี่ยวชาญด้านต่างๆ เนื้อหาอัปเดตตามเทรนด์ล่าสุด 
                    พร้อมแบบฝึกหัดและโปรเจคจริง
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="feature-title">วิเคราะห์ผลลัพธ์</h3>
                <p class="feature-description">
                    ระบบติดตามและวิเคราะห์ผลการเรียนแบบเรียลไทม์ ช่วยให้องค์กร
                    วัดประสิทธิภาพการฝึกอบรมได้อย่างแม่นยำ
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 class="feature-title">เรียนได้ทุกที่ทุกเวลา</h3>
                <p class="feature-description">
                    เข้าถึงคอร์สเรียนได้จากทุกอุปกรณ์ ทั้งคอมพิวเตอร์ แท็บเล็ต และสมาร์ทโฟน 
                    โดยไม่จำกัดเวลา
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3 class="feature-title">สำหรับองค์กรโดยเฉพาะ</h3>
                <p class="feature-description">
                    ระบบจัดการผู้เรียนระดับองค์กร พร้อมฟีเจอร์กำหนดบทเรียนเฉพาะทีม 
                    และระบบรายงานผลแบบครบวงจร
                </p>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="footer-content">
            <div>
                <a href="#" class="footer-logo">
                    <div class="footer-logo-icon">
                        <img src="img/Logo_บริษัท-removebg-preview.png" alt="BMS Logo" style="width:100%; height:100%; object-fit:contain;">
                    </div>
                    Bangkok Web Solotion
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
                    <li><a href="#"><i class="fas fa-chevron-right"></i> หน้าแรก</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> คอร์สเรียนทั้งหมด</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> สำหรับองค์กร</a></li>
                    <li><a href="about.php"><i class="fas fa-chevron-right"></i> เกี่ยวกับเรา</a></li>
                    <li><a href="contace.php"><i class="fas fa-chevron-right"></i> ติดต่อเรา</a></li>
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
            &copy; ลิขสิทธิ์ 2021 บริษัท บางกอก เว็บ โซลูชั่น จำกัด.
        </div>
    </footer>
</body>
</html>
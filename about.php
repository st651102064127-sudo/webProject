<?php
session_start();
$isLoggedIn = isset($_SESSION['email_account']);
$userEmail = $isLoggedIn ? htmlspecialchars($_SESSION['email_account']) : '';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เกี่ยวกับเรา - Bangkok Web Solution</title>
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

        /* --- Navigation Bar --- */
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
            transform: translateY(-3px);
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            margin-right: 0.75rem;
        }

        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
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
        
        .nav-link.active::after {
            width: 100%;
            /* background-color: var(--accent); */
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .login-btn-nav, .logout-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            /* background-color: var(--secondary); */
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            /* transition: var(--transition); */
        }

        .login-btn-nav:hover, .logout-btn:hover {
            background-color: #153E75;
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

        /* --- Header Section (Updated) --- */
        .courses-header {
            background-color: #212529;
            color: white;
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
            text-align: center;
            margin-bottom: 3rem;
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
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .header-subtitle {
            font-size: clamp(1rem, 2vw, 1.25rem);
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* --- About Section (Updated) --- */
        .about-section {
            padding: 4rem 0;
        }
        
        .about-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title {
            color: var(--primary);
            font-weight: 700;
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            height: 3px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            border-radius: 2px;
        }
        
        .about-subtitle {
            font-size: clamp(0.9rem, 1.5vw, 1.1rem);
            max-width: 700px;
            margin: 0 auto;
            color: var(--text-muted);
        }

        .about-content {
            display: grid;
            gap: 2rem;
        }
        
        .about-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 2.5rem;
            display: flex;
            gap: 2rem;
            align-items: center;
            transition: var(--transition);
        }

        .about-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .about-card.reverse {
            flex-direction: row-reverse;
        }
        
        .about-image {
            width: 100%;
            max-width: 400px;
            height: auto;
            border-radius: 8px;
            flex-shrink: 0;
        }

        .about-text {
            flex: 1;
        }
        
        .about-text h3 {
            color: var(--primary);
            font-weight: 700;
            font-size: clamp(1.2rem, 3vw, 1.8rem);
            margin-bottom: 1rem;
        }
        
        .about-text p {
            font-size: 1rem;
        }
        
        /* --- Footer (Updated) --- */
        .footer {
            background-color: var(--primary);
            color: white;
            padding: 4rem 5%;
            margin-top: 5rem;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-about h3, .footer-links h3, .footer-contact h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .footer-about h3::after, .footer-links h3::after, .footer-contact h3::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--accent);
            border-radius: 2px;
        }

        .footer-about p {
            font-size: 0.9rem;
            line-height: 1.8;
        }

        .footer-links ul {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 1rem;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .footer-links a:hover {
            color: var(--accent);
            transform: translateX(5px);
        }

        .footer-contact p {
            font-size: 0.9rem;
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .footer-bottom {
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }
        
        /* --- Responsive Design (Updated) --- */
        @media (max-width: 992px) {
            nav {
                flex-direction: column;
                align-items: flex-start;
                padding: 1rem;
            }
            .nav-actions {
                margin-top: 1rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .about-card, .about-card.reverse {
                flex-direction: column;
                text-align: center;
            }
            .about-image {
                max-width: 100%;
            }
            .footer-container {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .footer-about h3::after, .footer-links h3::after, .footer-contact h3::after {
                left: 50%;
                transform: translateX(-50%);
            }
            .footer-links a {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <nav>
        <a href="main_landing.php" class="logo">
            <div class="logo-icon">
                <img src="img/Logo_บริษัท-removebg-preview.png" alt="BWS Logo">
            </div>
            Bangkok Web Solution
        </a>
        <div class="nav-actions">
            <a href="main_landing.php" class="nav-link">หน้าแรก</a>
            <a href="courses.php" class="nav-link">คอร์สเรียน</a>
            <a href="about.php" class="nav-link active">เกี่ยวกับเรา</a>
            <a href="contace.php" class="nav-link">ติดต่อ</a>
            <?php if ($isLoggedIn): ?>
                <div class="greeting">
                    <i class="fas fa-user-circle"></i> สวัสดี, <?php echo $userEmail; ?>
                </div>
                <a href="logout.php" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                </a>
            <?php else: ?>
                <a href="Login.php" class="login-btn-nav">
                    <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ
                </a>
            <?php endif; ?>
        </div>
    </nav>
    
    <header class="courses-header">
        <div class="courses-container header-content">
            <h1 class="header-title">เรื่องราวของเรา</h1>
            <p class="header-subtitle">
                เราคือผู้เชี่ยวชาญด้านการพัฒนาเว็บไซต์ และโซลูชันดิจิทัลที่พร้อมจะขับเคลื่อนธุรกิจของคุณสู่ความสำเร็จ
            </p>
        </div>
    </header>
    
    <section class="about-section courses-container">
        <div class="about-header">
            <h2 class="section-title">จุดเริ่มต้นและพันธกิจ</h2>
            <p class="about-subtitle">
                เราเชื่อมั่นว่าเทคโนโลยีคือเครื่องมือสำคัญที่ช่วยให้ธุรกิจเติบโตและเข้าถึงกลุ่มลูกค้าได้ง่ายขึ้น
            </p>
        </div>
        
        <div class="about-content">
            <div class="about-card">
                <img src="img/Logo_บริษัท-removebg-preview.png" alt="Our Mission" class="about-image">
                <div class="about-text">
                    <h3>พันธกิจของเรา</h3>
                    <p>
                        Bangkok Web Solution ก่อตั้งขึ้นด้วยพันธกิจที่จะเป็นกำลังสำคัญในการยกระดับศักยภาพ
                        ของบุคลากรในองค์กรต่างๆ ผ่านแพลตฟอร์มการเรียนรู้ออนไลน์ที่ทันสมัยและมีคุณภาพสูง 
                        เรามุ่งมั่นที่จะมอบเครื่องมือและความรู้ที่จำเป็นเพื่อให้ทีมงานของคุณสามารถเติบโต
                        และขับเคลื่อนองค์กรไปสู่ความสำเร็จในยุคดิจิทัลได้อย่างยั่งยืน
                    </p>
                </div>
            </div>
            
            <div class="about-card reverse">
                <img src="img/Logo_บริษัท-removebg-preview.png" alt="Our Vision" class="about-image">
                <div class="about-text">
                    <h3>วิสัยทัศน์ของเรา</h3>
                    <p>
                        เรามุ่งหวังที่จะเป็นแพลตฟอร์มการเรียนรู้สำหรับองค์กรอันดับหนึ่งในประเทศไทย 
                        ที่เป็นมากกว่าแค่คอร์สเรียน แต่เป็นพาร์ทเนอร์ด้านการพัฒนาบุคลากรที่จะช่วย
                        สร้างวัฒนธรรมการเรียนรู้ที่ต่อเนื่อง (Lifelong Learning) 
                        และเตรียมความพร้อมให้กับทุกองค์กรสำหรับความเปลี่ยนแปลงในอนาคต
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="about-section courses-container">
        <div class="about-header">
            <h2 class="section-title">ทีมงานของเรา</h2>
            <p class="about-subtitle">
                เรามีทีมงานที่มีความเชี่ยวชาญและพร้อมจะสนับสนุนคุณในทุกขั้นตอน
            </p>
        </div>

        <div class="about-content">
            <div class="about-card">
                <img src="img/team1.jpg" alt="CEO" class="about-image">
                <div class="about-text">
                    <h3>นายสมชาย ใจดี</h3>
                    <p>ประธานเจ้าหน้าที่บริหาร (CEO)</p>
                </div>
            </div>
            <div class="about-card reverse">
                <img src="img/team2.jpg" alt="CTO" class="about-image">
                <div class="about-text">
                    <h3>นางสาวสุดา พัฒนกิจ</h3>
                    <p>ประธานเจ้าหน้าที่เทคโนโลยี (CTO)</p>
                </div>
            </div>
            <div class="about-card">
                <img src="img/team3.jpg" alt="COO" class="about-image">
                <div class="about-text">
                    <h3>นายธนเดช พูนทรัพย์</h3>
                    <p>ประธานเจ้าหน้าที่ฝ่ายปฏิบัติการ (COO)</p>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <footer class="footer">
        <div class="courses-container footer-container">
            <div class="footer-about">
                <h3>Bangkok Web Solution</h3>
                <p>เราคือผู้ให้บริการด้านการเรียนรู้ออนไลน์และโซลูชันดิจิทัลครบวงจร</p>
            </div>
            <div class="footer-links">
                <h3>ลิงก์ด่วน</h3>
                <ul>
                    <li><a href="main_landing.php"><i class="fas fa-chevron-right"></i> หน้าแรก</a></li>
                    <li><a href="courses.php"><i class="fas fa-chevron-right"></i> คอร์สเรียน</a></li>
                    <li><a href="about.php"><i class="fas fa-chevron-right"></i> เกี่ยวกับเรา</a></li>
                    <li><a href="contace.php"><i class="fas fa-chevron-right"></i> ติดต่อ</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h3>ติดต่อเรา</h3>
                <p><i class="fas fa-map-marker-alt"></i> กรุงเทพฯ ประเทศไทย</p>
                <p><i class="fas fa-envelope"></i> info@bangkokwebsolution.com</p>
                <p><i class="fas fa-phone"></i> 02-123-4567</p>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; <?php echo date("Y"); ?> Bangkok Web Solution. สงวนลิขสิทธิ์.
        </div>
    </footer> -->
</body>
</html>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เกี่ยวกับเรา | Bangkok Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1A4B8C; /* Navy Blue */
            --secondary: #E31C25; /* Red */
            --accent: #FFC72C; /* Gold */
            --bg-light: #F8F9FA; /* Off-white */
            --bg-card: #FFFFFF;
            --text-dark: #212529;
            --text-muted: #6C757D;
            --border: #DEE2E6;
            --transition: all 0.5s ease;
        }

        body {
            font-family: 'Sarabun', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.8;
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* --- Header Section --- */
        .about-header {
            background: linear-gradient(135deg, var(--primary) 0%, #0D2C57 100%);
            color: white;
            padding: 6rem 0;
            text-align: center;
            position: relative;
        }
        
        .header-content {
            z-index: 10;
            position: relative;
        }
        
        .header-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .header-subtitle {
            font-size: 1.25rem;
            font-weight: 300;
            max-width: 800px;
            margin: 0 auto;
        }
        
        /* --- General Section Styles --- */
        .section {
            padding: 4rem 0;
        }
        
        .section-title {
            font-size: 2.25rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        .section-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: var(--text-muted);
            margin-bottom: 3rem;
        }

        /* --- Mission Section --- */
        .mission-section {
            background-color: var(--bg-card);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 4rem;
            display: flex;
            align-items: center;
            gap: 3rem;
            margin-top: -3rem; /* Overlap with header for a better look */
            position: relative;
            z-index: 20;
        }
        
        .mission-content {
            flex: 1;
        }
        
        .mission-image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .mission-image {
            width: 100%;
            max-width: 500px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        /* --- Team Section --- */
        .team-section {
            background-color: var(--bg-light);
        }
        
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }
        
        .team-card {
            background-color: var(--bg-card);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: var(--transition);
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
        }
        
        .team-card.animate {
            opacity: 1;
            transform: translateY(0);
        }
        
        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.1);
        }
        
        .team-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-bottom: 4px solid var(--primary);
        }
        
        .team-info {
            padding: 1.5rem;
        }
        
        .team-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.25rem;
        }
        
        .team-position {
            font-weight: 600;
            color: var(--secondary);
            margin-bottom: 1rem;
            display: block;
        }
        
        /* --- Values Section --- */
        .values-section {
            background: linear-gradient(135deg, var(--primary), #153A6D);
            color: white;
        }

        .values-section .section-title {
            color: white;
        }
        
        .values-section .section-subtitle {
            color: rgba(255, 255, 255, 0.8);
        }
        
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .value-card {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
            opacity: 0;
            transform: translateY(20px);
        }

        .value-card.animate {
            opacity: 1;
            transform: translateY(0);
        }
        
        .value-card:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .value-icon {
            font-size: 2.5rem;
            color: var(--accent);
            margin-bottom: 1rem;
        }
        
        .value-card h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: white;
        }

        .value-card p {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.9);
        }

        /* --- Responsive Design --- */
        @media (max-width: 992px) {
            .mission-section {
                flex-direction: column;
                padding: 3rem 2rem;
            }
            .mission-image {
                margin-top: 2rem;
            }
        }
        
        @media (max-width: 768px) {
            .about-header {
                padding: 4rem 0;
            }
            .header-title {
                font-size: 2.5rem;
            }
            .header-subtitle {
                font-size: 1rem;
            }
            .mission-section {
                padding: 2rem;
            }
            .section-title {
                font-size: 1.75rem;
            }
            .team-img {
                height: 250px;
            }
        }
    </style>
</head>
<body>

<section class="about-header">
    <div class="container header-content">
        <h1 class="header-title">เรื่องราวของเรา</h1>
        <p class="header-subtitle">
            เราคือผู้นำด้านการสร้างสรรค์นวัตกรรมดิจิทัล ที่พร้อมจะเปลี่ยนไอเดียของคุณให้เป็นจริง
            ด้วยความเชี่ยวชาญและแพสชั่นในเทคโนโลยี
        </p>
    </div>
</section>

<section class="section mission-section container">
    <div class="mission-content">
        <h2 class="section-title text-left">พันธกิจของเรา</h2>
        <p>
            Bangkok Solutions มุ่งมั่นที่จะเป็นพันธมิตรทางเทคโนโลยีที่ดีที่สุดสำหรับธุรกิจทุกขนาด
            เราเชื่อว่าการนำเทคโนโลยีมาใช้จะช่วยเพิ่มประสิทธิภาพและโอกาสในการเติบโตอย่างยั่งยืน
            เราจึงทุ่มเทพัฒนาโซลูชั่นที่ใช้งานง่าย ปลอดภัย และสามารถปรับขนาดได้ตามความต้องการของลูกค้า
        </p>
        <p class="mt-3">
            เราไม่เพียงแค่สร้างซอฟต์แวร์ แต่เราสร้างอนาคตให้กับธุรกิจของคุณ
            ด้วยการผสานความรู้ด้านเทคนิคเชิงลึกเข้ากับความเข้าใจในตลาดและธุรกิจ
        </p>
    </div>
    <div class="mission-image-container">
        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Our Mission" class="mission-image">
    </div>
</section>

<section class="section team-section">
    <div class="container">
        <h2 class="section-title">ทีมผู้บริหาร</h2>
        <p class="section-subtitle">ทีมงานผู้เชี่ยวชาญที่ขับเคลื่อนองค์กรสู่ความสำเร็จ</p>
        <div class="team-grid">
            <div class="team-card">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="ดร.สมชาย" class="team-img">
                <div class="team-info">
                    <h3 class="team-name">คุณรวิศรา ตั้งธนวัฒน์</h3>
                    <span class="team-position">ผู้ก่อตั้ง / CEO</span>
                    <p>ผู้มีประสบการณ์มากกว่า 15 ปีในอุตสาหกรรมเทคโนโลยี มีวิสัยทัศน์ที่มุ่งมั่นจะสร้างสรรค์นวัตกรรมเพื่อการเติบโตของธุรกิจ</p>
                </div>
            </div>

            <div class="team-card">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="คุณสตรีรัตน์" class="team-img">
                <div class="team-info">
                    <h3 class="team-name">คุณธนากร อภิรัตนกุล</h3>
                    <span class="team-position">ผู้ร่วมก่อตั้ง / CTO</span>
                    <p>ผู้เชี่ยวชาญด้านสถาปัตยกรรมซอฟต์แวร์และระบบคลาวด์ มีความมุ่งมั่นในการสร้างสรรค์โซลูชั่นที่ทันสมัยและแข็งแกร่ง</p>
                </div>
            </div>

            <div class="team-card">
                <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="คุณธนวัฒน์" class="team-img">
                <div class="team-info">
                    <h3 class="team-name">คุณกานต์ธีรา สุวรรณนภา</h3>
                    <span class="team-position">ผู้ร่วมก่อตั้ง / Head of Design</span>
                    <p>นักออกแบบผู้เชี่ยวชาญด้าน User Experience (UX) และ User Interface (UI) เพื่อสร้างสรรค์ผลิตภัณฑ์ที่ใช้งานง่ายและสวยงาม</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section values-section">
    <div class="container">
        <h2 class="section-title">ค่านิยมหลักของเรา</h2>
        <p class="section-subtitle">เรายึดมั่นในสิ่งเหล่านี้เพื่อสร้างสรรค์สิ่งที่ดีที่สุดให้กับลูกค้า</p>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>นวัตกรรม</h3>
                <p>เราไม่หยุดนิ่งที่จะเรียนรู้และนำเทคโนโลยีใหม่ๆ มาปรับใช้ เพื่อสร้างสรรค์โซลูชั่นที่ทันสมัยและตอบโจทย์ธุรกิจในอนาคต</p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>ความร่วมมือ</h3>
                <p>เราเชื่อในพลังของการทำงานเป็นทีม ไม่ว่าจะเป็นทีมงานภายในหรือการทำงานร่วมกับลูกค้า เพื่อสร้างผลลัพธ์ที่เหนือความคาดหมาย</p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3>ความเป็นเลิศ</h3>
                <p>เรามุ่งมั่นที่จะส่งมอบงานที่มีคุณภาพสูงสุด ใส่ใจในทุกรายละเอียด และไม่หยุดพัฒนาเพื่อก้าวไปข้างหน้าอย่างไม่หยุดยั้ง</p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>ความน่าเชื่อถือ</h3>
                <p>เรายึดมั่นในจริยธรรมและความโปร่งใสในการดำเนินงานทุกขั้นตอน เพื่อให้ลูกค้าไว้วางใจและมั่นใจในบริการของเรา</p>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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

        document.querySelectorAll('.team-card, .value-card').forEach(card => {
            observer.observe(card);
        });
    });
</script>
</body>
</html>
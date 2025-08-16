<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ติดต่อเรา | Bangkok Solutions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1A4B8C;
            --secondary-color: #E31C25;
            --text-color: #343A40;
            --background-color: #F8F9FA;
            --card-background: #FFFFFF;
            --border-color: #DEE2E6;
            --box-shadow-light: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Sarabun', sans-serif;
            background-color: var(--background-color);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 3rem 1rem;
            margin: 0;
            box-sizing: border-box;
        }

        .contact-container {
            max-width: 850px;
            width: 100%;
            background: var(--card-background);
            border-radius: 16px;
            box-shadow: var(--box-shadow-light);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .contact-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: #FFFFFF;
            padding: 2.5rem 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .contact-header h2 {
            font-weight: 700;
            font-size: 2.25rem;
            margin: 0;
            position: relative;
            z-index: 2;
        }
        
        .contact-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="%23FFFFFF" stroke-width="0.5" stroke-dasharray="5,5" opacity="0.15"/></svg>');
            background-size: 100px 100px;
            opacity: 0.5;
            z-index: 1;
        }

        .content-wrapper {
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .form-section h3, .contact-details h3 {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 0.5rem;
        }

        .form-input, .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            transition: all var(--transition-speed) ease;
            font-size: 1rem;
            color: var(--text-color);
        }

        .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(26, 75, 140, 0.1);
        }
        
        .form-textarea {
            resize: vertical;
        }

        .submit-button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary-color) 0%, #153A6D 100%);
            color: white;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .contact-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 1rem;
            color: var(--text-color);
            font-weight: 500;
        }

        .contact-icon-wrapper {
            min-width: 45px;
            height: 45px;
            background: rgba(26, 75, 140, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .contact-list a {
            color: var(--text-color);
            text-decoration: none;
        }
        
        @media (min-width: 768px) {
            .content-wrapper {
                flex-direction: row;
                gap: 3rem;
            }
            .form-section, .contact-details {
                flex: 1;
            }
        }
        
        /* Mobile-first adjustments for form inputs */
        @media (max-width: 767px) {
            .contact-header {
                padding: 1.5rem 1rem;
            }
            .contact-header h2 {
                font-size: 1.75rem;
            }
            .content-wrapper {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <main class="contact-container">
        <header class="contact-header">
            <h2>ติดต่อเรา</h2>
        </header>
        
        <div class="content-wrapper">
            <section class="form-section">
                <h3 style="display: none;">ส่งข้อความหาเรา</h3>
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
            
            <section class="contact-details">
                <h3>ช่องทางการติดต่ออื่นๆ</h3>
                <ul class="contact-list">
                    <li class="contact-item">
                        <div class="contact-icon-wrapper">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <span>contact@bangkoksolutions.com</span>
                    </li>
                    
                    <li class="contact-item">
                        <div class="contact-icon-wrapper">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <span>02-345-6789</span>
                    </li>
                    
                    <li class="contact-item">
                        <div class="contact-icon-wrapper">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                        <span>Bangkok Solutions</span>
                    </li>
                    
                    <li class="contact-item">
                        <div class="contact-icon-wrapper">
                            <i class="fab fa-line"></i>
                        </div>
                        <span>@bangkoksolutions</span>
                    </li>
                </ul>
            </section>
        </div>
    </main>

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
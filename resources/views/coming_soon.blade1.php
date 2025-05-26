<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        :root {
            --luxury-gold: #f5d393;
            --luxury-dark-gold: #e8b667;
            --luxury-bg: #0a0a0a;
            --luxury-bg-light: #1a1a1a;
            --luxury-text: #ffffff;
            --luxury-subtext: rgba(255, 255, 255, 0.7);
            --luxury-border: rgba(245, 211, 147, 0.2);
            --luxury-transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        .luxury-coming-soon {
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-color: var(--luxury-bg);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', 'Times New Roman', serif;
            color: var(--luxury-text);
            margin: 0;
            padding: 0;
            top: 0;
            left: 0;
        }
        
        .luxury-home-link {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 10;
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--luxury-gold);
            font-family: 'Montserrat', sans-serif;
            font-size: 0.8rem;
            text-decoration: none;
            padding: 8px 12px;
            border: 1px solid var(--luxury-border);
            border-radius: 4px;
            transition: var(--luxury-transition);
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
            animation-delay: 0.5s;
        }
        
        .luxury-home-link:hover {
            background-color: rgba(245, 211, 147, 0.1);
            transform: translateY(-2px);
            border-color: var(--luxury-gold);
        }
        
        .luxury-home-link svg {
            width: 14px;
            height: 14px;
        }
        
        .luxury-bg-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        
        .luxury-circle, .luxury-triangle {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            animation: rotate 120s linear infinite;
        }
        
        .luxury-triangle {
            animation-direction: reverse;
            animation-duration: 80s;
        }
        
        .luxury-particle-container {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        
        .luxury-particle {
            position: absolute;
            background-color: var(--luxury-gold);
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.3;
            animation: floatParticle linear infinite;
        }
        
        .luxury-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 600px;
            text-align: center;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box;
        }
        
        .luxury-header {
            margin-bottom: 1rem;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .luxury-logo {
            width: 50px;
            height: 50px;
            margin-bottom: 0.8rem;
            opacity: 0;
            animation: fadeIn 1.5s ease-out forwards;
        }
        
        .luxury-title {
            font-size: clamp(1.5rem, 5vw, 2rem);
            font-weight: 700;
            letter-spacing: 0.15rem;
            margin: 0 0 0.6rem 0;
            line-height: 1.2;
            color: var(--luxury-gold);
            text-transform: uppercase;
        }
        
        .luxury-title-line {
            display: block;
            position: relative;
            overflow: hidden;
            height: clamp(2rem, 6vw, 3rem);
        }
        
        .luxury-title-line:first-child::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 1px;
            background: var(--luxury-gold);
            animation: expandLine 1.5s ease-out forwards;
            animation-delay: 0.8s;
        }
        
        .luxury-subtitle {
            font-size: clamp(0.65rem, 2.5vw, 0.75rem);
            letter-spacing: 0.1rem;
            max-width: 400px;
            margin: 0 auto 1rem;
            color: var(--luxury-subtext);
            font-weight: 300;
            line-height: 1.6;
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
            animation-delay: 0.5s;
        }
        
        .luxury-countdown {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1rem 0;
            gap: 0.4rem;
            flex-wrap: wrap;
        }
        
        .luxury-countdown-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 50px;
        }
        
        .luxury-countdown-number {
            font-size: clamp(1rem, 4vw, 1.8rem);
            font-weight: 300;
            font-family: 'Montserrat', sans-serif;
            color: var(--luxury-gold);
            padding: 0.2rem 0.6rem;
            position: relative;
            margin: 0.2rem 0;
        }
        
        .luxury-countdown-number::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 1px solid var(--luxury-border);
            border-radius: 4px;
            transform: scale(0.95);
            transition: var(--luxury-transition);
        }
        
        .luxury-countdown-number:hover::before {
            transform: scale(1);
            border-color: var(--luxury-gold);
            box-shadow: 0 0 10px rgba(245, 211, 147, 0.2);
        }
        
        .luxury-countdown-label {
            font-size: 0.4rem;
            letter-spacing: 0.1rem;
            text-transform: uppercase;
            margin-top: 0.2rem;
            color: var(--luxury-subtext);
            font-family: 'Montserrat', sans-serif;
        }
        
        .luxury-countdown-separator {
            font-size: clamp(0.8rem, 3vw, 1.2rem);
            color: var(--luxury-gold);
            margin-top: -0.6rem;
            align-self: flex-end;
            margin-bottom: 0.4rem;
        }
        
        .luxury-progress-container {
            width: 100%;
            max-width: 300px;
            margin: 0.8rem auto;
        }
        
        .luxury-progress {
            width: 100%;
            height: 2px;
            background-color: var(--luxury-bg-light);
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 0.3rem;
        }
        
        .luxury-progress-bar {
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, var(--luxury-bg-light), var(--luxury-gold));
            animation: progressLoad 3s ease-in-out infinite;
        }
        
        .luxury-progress-text {
            font-size: 0.6rem;
            letter-spacing: 0.08rem;
            color: var(--luxury-subtext);
            font-family: 'Montserrat', sans-serif;
        }
        
        .luxury-social {
            display: flex;
            justify-content: center;
            gap: 0.8rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }
        
        .luxury-social-icon {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--luxury-border);
            border-radius: 50%;
            color: var(--luxury-gold);
            transition: var(--luxury-transition);
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
            animation-delay: 0.7s;
        }
        
        .luxury-social-icon:hover {
            background-color: rgba(245, 211, 147, 0.1);
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 4px 12px rgba(232, 182, 103, 0.2);
            border-color: var(--luxury-gold);
        }
        
        .luxury-social-icon svg {
            width: 12px;
            height: 12px;
        }
        
        .luxury-floating {
            position: absolute;
            background-color: var(--luxury-gold);
            opacity: 0.05;
            border-radius: 50%;
            filter: blur(30px);
            z-index: 1;
        }
        
        .luxury-floating-1 {
            width: 150px;
            height: 150px;
            top: -60px;
            left: -60px;
            animation: float 15s ease-in-out infinite;
        }
        
        .luxury-floating-2 {
            width: 120px;
            height: 120px;
            bottom: -30px;
            right: -30px;
            animation: float 12s ease-in-out infinite reverse;
            animation-delay: 2s;
        }
        
        .luxury-floating-3 {
            width: 100px;
            height: 100px;
            top: 30%;
            right: 20%;
            animation: float 10s ease-in-out infinite;
            animation-delay: 1s;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes expandLine {
            from { width: 0; }
            to { width: 60px; }
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-15px) translateX(15px); }
        }
        
        @keyframes floatParticle {
            0% { transform: translateY(0) translateX(0); opacity: 0; }
            10% { opacity: 0.3; }
            90% { opacity: 0.3; }
            100% { transform: translateY(-100vh) translateX(20px); opacity: 0; }
        }
        
        @keyframes progressLoad {
            0% { width: 0%; }
            50% { width: 100%; }
            100% { width: 0%; }
        }
        
        @keyframes countdownPop {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        @media (max-width: 768px) {
            .luxury-content {
                padding: 0.8rem;
            }
            
            .luxury-logo {
                width: 40px;
                height: 40px;
            }
            
            .luxury-countdown {
                gap: 0.2rem;
                margin: 0.8rem 0;
            }
            
            .luxury-countdown-item {
                min-width: 40px;
            }
            
            .luxury-countdown-number {
                padding: 0.2rem;
                font-size: 0.9rem;
            }
            
            .luxury-countdown-label {
                font-size: 0.35rem;
            }
            
            .luxury-countdown-separator {
                margin-bottom: 0.3rem;
                font-size: 0.6rem;
            }
            
            .luxury-social {
                gap: 0.6rem;
            }
            
            .luxury-social-icon {
                width: 28px;
                height: 28px;
            }
            
            .luxury-social-icon svg {
                width: 10px;
                height: 10px;
            }
            
            .luxury-home-link {
                font-size: 0.7rem;
                padding: 6px 10px;
            }
        }
        
        @media (max-width: 480px) {
            .luxury-countdown {
                gap: 0.1rem;
            }
            
            .luxury-countdown-item {
                min-width: 35px;
            }
            
            .luxury-countdown-number {
                font-size: 0.8rem;
            }
            
            .luxury-countdown-label {
                font-size: 0.3rem;
            }
            
            .luxury-countdown-separator {
                font-size: 0.5rem;
                margin-bottom: 0.2rem;
            }
            
            .luxury-progress-container {
                max-width: 250px;
            }
            
            .luxury-progress-text {
                font-size: 0.5rem;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="luxury-coming-soon">
        <!-- Animated Background Elements -->
        <div class="luxury-bg-elements">
            <svg class="luxury-circle" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="45" stroke="#f5d393" stroke-width="0.5" fill="none"/>
            </svg>
            <svg class="luxury-triangle" viewBox="0 0 100 100">
                <polygon points="50,5 95,95 5,95" stroke="#e8b667" stroke-width="0.5" fill="none"/>
            </svg>
            <div class="luxury-particle-container"></div>
        </div>
        
        <!-- Back to Home Link -->
        <a href="{{ route('beranda') }}" class="luxury-home-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            Back to Home
        </a>
        
        <!-- Main Content -->
        <div class="luxury-content">
            <div class="luxury-header">
                <svg class="luxury-logo" width="60" height="60" viewBox="0 0 120 120">
                    <path d="M60,10 L110,110 L10,110 Z" fill="none" stroke="#f5d393" stroke-width="2"/>
                    <circle cx="60" cy="60" r="30" fill="none" stroke="#f5d393" stroke-width="2"/>
                </svg>
                <h1 class="luxury-title">
                    <span class="luxury-title-line">COMING</span>
                    <span class="luxury-title-line">SOON</span>
                </h1>
                <p class="luxury-subtitle">We're crafting something extraordinary for you</p>
            </div>
            
            <div class="luxury-countdown">
                <div class="luxury-countdown-item">
                    <div class="luxury-countdown-number" id="days">00</div>
                    <div class="luxury-countdown-label">Days</div>
                </div>
                <div class="luxury-countdown-separator">:</div>
                <div class="luxury-countdown-item">
                    <div class="luxury-countdown-number" id="hours">00</div>
                    <div class="luxury-countdown-label">Hours</div>
                </div>
                <div class="luxury-countdown-separator">:</div>
                <div class="luxury-countdown-item">
                    <div class="luxury-countdown-number" id="minutes">00</div>
                    <div class="luxury-countdown-label">Minutes</div>
                </div>
                <div class="luxury-countdown-separator">:</div>
                <div class="luxury-countdown-item">
                    <div class="luxury-countdown-number" id="seconds">00</div>
                    <div class="luxury-countdown-label">Seconds</div>
                </div>
            </div>
            
            <div class="luxury-progress-container">
                <div class="luxury-progress">
                    <div class="luxury-progress-bar"></div>
                </div>
                <div class="luxury-progress-text">Loading perfection...</div>
            </div>
            
            <div class="luxury-social">
                <a href="#" class="luxury-social-icon" aria-label="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                    </svg>
                </a>
                <a href="#" class="luxury-social-icon" aria-label="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                    </svg>
                </a>
                <a href="#" class="luxury-social-icon" aria-label="YouTube">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-2C18.88 4 12 4 12 4s-6.88 0-8.59.42a2.78 2.78 0 0 0-1.95 2A29.94 29.94 0 0 0 1 12a29.94 29.94 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.95 2C5.12 20 12 20 12 20s6.88 0 8.59-.42a2.78 2.78 0 0 0 1.95-2A29.94 29.94 0 0 0 23 12a29.94 29.94 0 0 0-.46-5.58z"/>
                        <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/>
                    </svg>
                </a>
                <a href="#" class="luxury-social-icon" aria-label="WhatsApp">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21.05 16.54a9 9 0 1 0-15.21 2.39L3 21l2.17-.7a9 9 0 0 0 15.88-3.76z"/>
                        <path d="M8.5 11.5a8.38 8.38 0 0 0 3.5 3.5l1.5-1.5a.7.7 0 0 1 .7-.2 6.72 6.72 0 0 0 2 .3.7.7 0 0 1 .7.7v1.8a.7.7 0 0 1-.7.7A11.94 11.94 0 0 1 6.7 6.7a.7.7 0 0 1 .7-.7h1.8a.7.7 0 0 1 .7.7 6.72 6.72 0 0 0 .3 2 .7.7 0 0 1-.2.7z"/>
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- Floating Elements -->
        <div class="luxury-floating luxury-floating-1"></div>
        <div class="luxury-floating luxury-floating-2"></div>
        <div class="luxury-floating luxury-floating-3"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script>
        // Initialize countdown
        const launchDate = new Date();
        launchDate.setDate(launchDate.getDate() + 365); 
        
        function updateCountdown() {
            const now = new Date();
            const diff = launchDate - now;
            
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            
            document.getElementById('days').textContent = days.toString().padStart(2, '0');
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
            
            // Add animation to changing numbers
            if (seconds === 59) {
                gsap.to("#seconds", {scale: 1.1, duration: 0.3, yoyo: true, repeat: 1});
            }
        }
        
        setInterval(updateCountdown, 1000);
        updateCountdown();
        
        // Create floating particles
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.luxury-particle-container');
            const particleCount = window.innerWidth < 768 ? 12 : 25;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'luxury-particle';
                
                // Random properties
                const size = Math.random() * 2 + 1;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100 + 100; // Start below viewport
                const delay = Math.random() * 5;
                const duration = Math.random() * 15 + 10;
                const opacity = Math.random() * 0.2 + 0.1;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.top = `${posY}%`;
                particle.style.opacity = opacity;
                particle.style.animationDelay = `${delay}s`;
                particle.style.animationDuration = `${duration}s`;
                
                container.appendChild(particle);
            }
            
            // Animate title lines
            gsap.from(".luxury-title-line", {
                y: "100%",
                duration: 1.2,
                ease: "power3.out",
                stagger: 0.2,
                delay: 0.3
            });
            
            // Animate progress bar
            gsap.to(".luxury-progress-bar", {
                width: "100%",
                duration: 3,
                ease: "none",
                repeat: -1
            });
        });
    </script>
</body>
</html>
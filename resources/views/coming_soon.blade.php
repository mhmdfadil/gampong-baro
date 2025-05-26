<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <style>
        :root {
            --primary-color: #6C63FF;
            --primary-light: #8E85FF;
            --dark-color: #1A1A2E;
            --light-color: #F5F5F7;
            --text-color: #333;
            --text-light: #777;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--light-color);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
            overflow-x: hidden;
        }
        
        .container {
            max-width: 600px;
            width: 100%;
            position: relative;
        }
        
        .logo {
            width: 60px;
            height: 60px;
            margin-bottom: 1.5rem;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, var(--primary-color), var(--primary-light));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards 0.2s;
        }
        
        p {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 2rem;
            line-height: 1.6;
            max-width: 80%;
            margin-left: auto;
            margin-right: auto;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards 0.4s;
        }
        
        .countdown {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards 0.6s;
        }
        
        .countdown-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .countdown-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.25rem;
        }
        
        .countdown-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-light);
        }
        
        .progress-container {
            width: 100%;
            max-width: 300px;
            margin: 0 auto 2rem;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards 0.8s;
        }
        
        .progress-bar {
            height: 4px;
            width: 100%;
            background-color: rgba(108, 99, 255, 0.1);
            border-radius: 2px;
            overflow: hidden;
        }
        
        .progress {
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
            border-radius: 2px;
            animation: progress 3s ease-in-out infinite;
        }
        
        .progress-text {
            font-size: 0.7rem;
            color: var(--text-light);
            margin-top: 0.5rem;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards 1s;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            color: var(--primary-light);
        }
        
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(108, 99, 255, 0.1), rgba(142, 133, 255, 0.05));
            z-index: -1;
        }
        
        .shape-1 {
            width: 200px;
            height: 200px;
            top: -50px;
            left: -50px;
            animation: float 8s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 150px;
            height: 150px;
            bottom: -30px;
            right: -30px;
            animation: float 10s ease-in-out infinite reverse;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes progress {
            0% { width: 0%; }
            50% { width: 100%; }
            100% { width: 0%; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-20px) translateX(10px); }
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            
            p {
                max-width: 100%;
            }
            
            .countdown {
                gap: 0.5rem;
            }
            
            .countdown-number {
                font-size: 1.5rem;
            }
            
            .shape-1, .shape-2 {
                display: none;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Floating background shapes -->
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        
        <!-- Logo -->
        <svg class="logo" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30 10L50 50H10L30 10Z" fill="#6C63FF"/>
            <circle cx="30" cy="35" r="15" fill="white"/>
        </svg>
        
        <!-- Main heading -->
        <h1>Coming Soon</h1>
        
        <!-- Subheading -->
        <p>We're working hard to bring you something amazing. Stay tuned for updates!</p>
        
        <!-- Countdown timer -->
        <div class="countdown">
            <div class="countdown-item">
                <div class="countdown-number" id="days">00</div>
                <div class="countdown-label">Days</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="hours">00</div>
                <div class="countdown-label">Hours</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="minutes">00</div>
                <div class="countdown-label">Minutes</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="seconds">00</div>
                <div class="countdown-label">Seconds</div>
            </div>
        </div>
        
        <!-- Progress indicator -->
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress"></div>
            </div>
            <div class="progress-text">We're getting things ready...</div>
        </div>
        
        @php
                        $socialMedia = App\Models\SocialMedia::first(); // Ambil data dari database
                    @endphp

                    <div class="social-links">
                        @if($socialMedia->active_fb && $socialMedia->link_fb)
                            <a href="{{ $socialMedia->link_fb }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        
                        @if($socialMedia->active_ig && $socialMedia->link_ig)
                            <a href="{{ $socialMedia->link_ig }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                        
                        @if($socialMedia->active_yt && $socialMedia->link_yt)
                            <a href="{{ $socialMedia->link_yt }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        @endif
                        
                        @if($socialMedia->active_wa && $socialMedia->link_wa)
                            <a href="{{ $socialMedia->link_wa }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        @endif
                    </div>
    </div>

    <script>
        // Set the launch date (30 days from now)
        const launchDate = new Date();
        launchDate.setDate(launchDate.getDate() + 30);
        
        // Update countdown every second
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
        }
        
        // Initial call and set interval
        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>
</body>
</html>
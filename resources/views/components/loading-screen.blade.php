<!-- resources/views/components/loading-screen.blade.php -->
<div id="loading-screen">
    <div class="loading-background">
        <div class="gradient-animation"></div>
    </div>
    
    <div class="loading-content">
        <div class="loading-logo">
            <div class="logo-circle"></div>
            <div class="logo-main">
                <svg class="logo-icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,3L2,12H5V20H19V12H22L12,3M12,7.7C14.1,7.7 15.8,9.4 15.8,11.5C15.8,13.6 14.1,15.3 12,15.3C9.9,15.3 8.2,13.6 8.2,11.5C8.2,9.4 9.9,7.7 12,7.7Z" />
                </svg>
            </div>
        </div>
        
        <h1 class="loading-text">Gampong Baro</h1>
        <p class="loading-subtext">Menyiapkan pengalaman terbaik untuk Anda...</p>
        
        <div class="progress-container">
            <div class="progress-bar" id="loading-progress"></div>
        </div>
        
        <div class="loading-meta">
            <div class="loading-tip">
                <i class="tip-icon fas fa-lightbulb"></i>
                <span>Tips: Gunakan menu navigasi untuk menjelajahi konten kami</span>
            </div>
        </div>
    </div>
</div>

<style>
    /* Modern Loading Screen */
    #loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        background-color: #f8f9fa;
        overflow: hidden;
    }
    
    .loading-background {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    
    .gradient-animation {
        position: absolute;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            135deg,
            rgba(23, 107, 239, 0.1) 0%,
            rgba(23, 107, 239, 0.05) 25%,
            rgba(255, 255, 255, 0) 50%,
            rgba(23, 107, 239, 0.05) 75%,
            rgba(23, 107, 239, 0.1) 100%
        );
        animation: gradientMove 8s linear infinite;
        transform: rotate(30deg);
    }
    
    .loading-content {
        text-align: center;
        max-width: 500px;
        padding: 0 30px;
        z-index: 2;
    }
    
    .loading-logo {
        width: 100px;
        height: 100px;
        margin: 0 auto 25px;
        position: relative;
    }
    
    .logo-circle {
        position: absolute;
        width: 100%;
        height: 100%;
        border: 2px solid rgba(23, 107, 239, 0.2);
        border-radius: 50%;
        animation: rotate 10s linear infinite;
    }
    
    .logo-main {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .logo-icon {
        width: 50px;
        height: 50px;
        color: #176bef;
        animation: pulse 2s ease-in-out infinite;
    }
    
    .loading-text {
        font-family: 'Segoe UI', Roboto, -apple-system, sans-serif;
        font-size: 2.2rem;
        font-weight: 600;
        margin-bottom: 0.8rem;
        color: #212529;
        letter-spacing: -0.5px;
        opacity: 0;
        animation: fadeIn 0.5s ease-out 0.3s forwards;
    }
    
    .loading-subtext {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 1.8rem;
        line-height: 1.5;
        opacity: 0;
        animation: fadeIn 0.5s ease-out 0.5s forwards;
    }
    
    .progress-container {
        width: 100%;
        height: 4px;
        background: rgba(0, 0, 0, 0.05);
        border-radius: 2px;
        overflow: hidden;
        margin-bottom: 2rem;
        opacity: 0;
        animation: fadeIn 0.5s ease-out 0.7s forwards;
    }
    
    .progress-bar {
        height: 100%;
        width: 0%;
        background: linear-gradient(90deg, #176bef 0%, #4dabf7 100%);
        transition: width 0.4s ease;
        position: relative;
    }
    
    .progress-bar::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 20%;
        height: 100%;
        background: linear-gradient(90deg, rgba(255,255,255,0.3), transparent);
        animation: shine 1.5s infinite;
    }
    
    .loading-meta {
        margin-top: 30px;
        opacity: 0;
        animation: fadeIn 0.5s ease-out 0.9s forwards;
    }
    
    .loading-tip {
        display: inline-flex;
        align-items: center;
        background: rgba(23, 107, 239, 0.08);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        color: #176bef;
    }
    
    .tip-icon {
        margin-right: 8px;
        font-size: 0.9rem;
    }
    
    /* Animations */
    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.9; }
        50% { transform: scale(1.05); opacity: 1; }
        100% { transform: scale(1); opacity: 0.9; }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes shine {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(500%); }
    }
    
    @keyframes gradientMove {
        0% { transform: rotate(30deg) translateX(-50%) translateY(-50%); }
        100% { transform: rotate(30deg) translateX(0%) translateY(0%); }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .loading-text {
            font-size: 1.8rem;
        }
        
        .loading-subtext {
            font-size: 0.9rem;
        }
        
        .loading-logo {
            width: 80px;
            height: 80px;
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
        }
    }
</style>

<script>
    // Simulate progress (replace with actual loading logic)
    document.addEventListener('DOMContentLoaded', function() {
        const progressBar = document.getElementById('loading-progress');
        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 10;
            if (progress >= 100) {
                progress = 100;
                clearInterval(interval);
                setTimeout(() => {
                    document.getElementById('loading-screen').style.opacity = 0;
                    setTimeout(() => {
                        document.getElementById('loading-screen').style.display = 'none';
                    }, 500);
                }, 500);
            }
            progressBar.style.width = progress + '%';
        }, 300);
    });
</script>
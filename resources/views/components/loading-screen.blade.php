<!-- resources/views/components/loading-screen.blade.php -->
<div id="loading-screen">
   <div class="floating-elements" id="floating-elements"></div>
   <div class="wave"></div>
   <div class="village-silhouette"></div>
   
   <!-- Add clouds -->
   <i class="fas fa-cloud cloud" style="top: 15%; left: -50px; font-size: 30px; animation-duration: 25s; animation-delay: 0s;"></i>
   <i class="fas fa-cloud cloud" style="top: 25%; left: -80px; font-size: 50px; animation-duration: 30s; animation-delay: 5s;"></i>
   <i class="fas fa-cloud cloud" style="top: 10%; left: -120px; font-size: 40px; animation-duration: 35s; animation-delay: 10s;"></i>
   
   <!-- Add boat -->
   <i class="fas fa-ship" style="position: absolute; bottom: 30%; left: 10%; font-size: 40px; color: white; animation: boatFloat 3s ease-in-out infinite; z-index: 3;"></i>
   
   <div class="loading-content">
       <div class="loading-logo">
           <div class="logo-circle"></div>
           <div class="logo-circle"></div>
           <div class="logo-main">
               <i class="fas fa-home logo-icon"></i>
           </div>
       </div>
       
       <h1 class="loading-text fade-in">Gampong Baro</h1>
       <p class="loading-subtext fade-in">Sedang memuat konten indah desa kami...</p>
       
       <div class="progress-container fade-in">
           <div class="progress-bar" id="loading-progress"></div>
       </div>
       
       <div class="village-elements fade-in">
           <div class="village-element" style="animation-delay: 0s"><i class="fas fa-tree"></i></div>
           <div class="village-element" style="animation-delay: 0.1s"><i class="fas fa-water"></i></div>
           <div class="village-element" style="animation-delay: 0.2s"><i class="fas fa-mountain"></i></div>
           <div class="village-element" style="animation-delay: 0.3s"><i class="fas fa-fish"></i></div>
           <div class="village-element" style="animation-delay: 0.4s"><i class="fas fa-sun"></i></div>
           <div class="village-element" style="animation-delay: 0.5s"><i class="fas fa-umbrella-beach"></i></div>
       </div>
   </div>
</div>

<style>
   /* Village Loading Screen with Blue Sky and Ocean Theme */
   #loading-screen {
       position: fixed;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       background: linear-gradient(to bottom, #87CEEB 0%, #1E90FF 50%, #00BFFF 100%);
       display: flex;
       flex-direction: column;
       justify-content: center;
       align-items: center;
       z-index: 9999;
       transition: all 0.5s ease-out;
       overflow: hidden;
   }
   
   .loading-content {
       text-align: center;
       color: white;
       max-width: 600px;
       padding: 0 20px;
       position: relative;
       z-index: 2;
   }
   
   .village-silhouette {
       position: absolute;
       bottom: 0;
       left: 0;
       width: 100%;
       height: 30%;
       background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%23ffffff"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%23ffffff"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%23ffffff"></path></svg>');
       background-repeat: no-repeat;
       background-size: cover;
       opacity: 0.2;
       z-index: 1;
   }
   
   .floating-elements {
       position: absolute;
       width: 100%;
       height: 100%;
       top: 0;
       left: 0;
       z-index: 1;
       overflow: hidden;
   }
   
   .floating-element {
       position: absolute;
       opacity: 0.2;
       color: white;
       animation: float 7s linear infinite;
   }
   
   .loading-logo {
       width: 100px;
       height: 100px;
       margin-bottom: 20px;
       position: relative;
       filter: drop-shadow(0 5px 10px rgba(0,0,0,0.2));
   }
   
   .logo-circle {
       position: absolute;
       width: 100%;
       height: 100%;
       border: 2px solid rgba(255,255,255,0.5);
       border-radius: 50%;
       animation: rotate 8s linear infinite;
   }
   
   .logo-circle:nth-child(2) {
       border-color: rgba(255,255,255,0.7);
       width: 80%;
       height: 80%;
       top: 10%;
       left: 10%;
       animation-direction: reverse;
       animation-duration: 10s;
   }
   
   .logo-main {
       position: absolute;
       width: 60%;
       height: 60%;
       top: 20%;
       left: 20%;
       display: flex;
       justify-content: center;
       align-items: center;
   }
   
   .logo-icon {
       font-size: 2.2rem;
       color: #FFFFFF;
       animation: pulse 1.5s ease-in-out infinite;
   }
   
   .loading-text {
       font-family: 'Playfair Display', serif;
       font-size: 2.2rem;
       margin-bottom: 0.8rem;
       font-weight: 700;
       color: #FFFFFF;
       letter-spacing: 1px;
       text-shadow: 0 2px 8px rgba(0,0,0,0.3);
       position: relative;
   }
   
   .loading-subtext {
       font-size: 1rem;
       opacity: 0.9;
       margin-bottom: 1.8rem;
       letter-spacing: 0.5px;
       color: rgba(255,255,255,0.9);
       max-width: 80%;
       margin-left: auto;
       margin-right: auto;
   }
   
   .progress-container {
       width: 100%;
       max-width: 350px;
       height: 5px;
       background: rgba(255,255,255,0.1);
       border-radius: 3px;
       overflow: hidden;
       margin-bottom: 2rem;
       position: relative;
   }
   
   .progress-bar {
       height: 100%;
       width: 0%;
       background: linear-gradient(90deg, #FFFFFF 0%, #ADD8E6 100%);
       transition: width 0.3s ease-out;
       position: relative;
   }
   
   .progress-bar::after {
       content: '';
       position: absolute;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
       animation: shine 1.5s infinite;
   }
   
   .village-elements {
       display: flex;
       justify-content: center;
       gap: 1.2rem;
       margin-top: 1.5rem;
       flex-wrap: wrap;
   }
   
   .village-element {
       font-size: 1.5rem;
       color: #FFFFFF;
       animation: floatElement 2s ease-in-out infinite;
       text-shadow: 0 2px 5px rgba(0,0,0,0.2);
       position: relative;
   }
   
   .village-element::before {
       content: '';
       position: absolute;
       width: 35px;
       height: 35px;
       border-radius: 50%;
       background: rgba(255,255,255,0.1);
       top: 50%;
       left: 50%;
       transform: translate(-50%, -50%);
       z-index: -1;
   }
   
   /* Cloud Animation */
   .cloud {
       position: absolute;
       color: white;
       opacity: 0.8;
       animation: cloudMove 20s linear infinite;
       z-index: 1;
   }
   
   /* Wave Animation */
   .wave {
       position: absolute;
       bottom: 0;
       width: 100%;
       height: 100px;
       background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.2)" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
       background-size: cover;
       background-repeat: repeat-x;
       animation: wave 15s linear infinite;
       z-index: 2;
   }
   
   /* Faster Animations */
   @keyframes rotate {
       0% { transform: rotate(0deg); }
       100% { transform: rotate(360deg); }
   }
   
   @keyframes pulse {
       0% { transform: scale(1); opacity: 0.8; }
       50% { transform: scale(1.1); opacity: 1; }
       100% { transform: scale(1); opacity: 0.8; }
   }
   
   @keyframes float {
       0% { transform: translateY(100vh) translateX(20px); }
       100% { transform: translateY(-100px) translateX(-20px); }
   }
   
   @keyframes floatElement {
       0%, 100% { transform: translateY(0); }
       50% { transform: translateY(-10px); }
   }
   
   @keyframes shine {
       0% { transform: translateX(-100%); }
       100% { transform: translateX(100%); }
   }
   
   @keyframes cloudMove {
       0% { transform: translateX(-100px); }
       100% { transform: translateX(calc(100vw + 100px)); }
   }
   
   @keyframes wave {
       0% { background-position-x: 0; }
       100% { background-position-x: 1440px; }
   }
   
   @keyframes boatFloat {
       0%, 100% { transform: translateY(0) rotate(-2deg); }
       50% { transform: translateY(-10px) rotate(2deg); }
   }
   
   .fade-in {
       animation: fadeIn 0.8s ease-out both;
   }
   
   @keyframes fadeIn {
       from { opacity: 0; transform: translateY(15px); }
       to { opacity: 1; transform: translateY(0); }
   }
   
   /* Responsive adjustments */
   @media (max-width: 768px) {
       .loading-text {
           font-size: 1.8rem;
       }
       .loading-subtext {
           font-size: 0.9rem;
       }
       .village-elements {
           gap: 1rem;
       }
       .village-element {
           font-size: 1.2rem;
       }
       .logo-icon {
           font-size: 1.8rem;
       }
   }
</style>


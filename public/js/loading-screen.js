// public/js/loading-screen.js

// Create floating elements with village nature theme
function createFloatingElements() {
   const container = $('#floating-elements');
   const icons = [
       'leaf', 'cloud', 'water', 'seedling', 'sun', 
       'mountain', 'fish', 'feather', 'kiwi-bird', 
       'umbrella-beach', 'ship', 'anchor'
   ];
   
   for (let i = 0; i < 15; i++) {
       const icon = icons[Math.floor(Math.random() * icons.length)];
       const size = Math.random() * 15 + 8;
       const delay = Math.random() * 2;
       const duration = Math.random() * 5 + 5;
       const left = Math.random() * 100;
       const opacity = Math.random() * 0.3 + 0.1;
       
       const element = $(`<i class="fas fa-${icon} floating-element"></i>`);
       element.css({
           'font-size': `${size}px`,
           'left': `${left}%`,
           'animation-delay': `${delay}s`,
           'animation-duration': `${duration}s`,
           'opacity': opacity,
           'color': icon === 'sun' ? '#FFD700' : 'white'
       });
       
       // Add special animation for birds
       if (icon === 'kiwi-bird') {
           element.css('animation', `birdFly ${duration}s linear infinite`);
       }
       
       container.append(element);
   }
}

// Loading screen functionality
function showLoadingScreen(targetTime = 2500) {
   createFloatingElements();
   
   // Start progress immediately
   let progress = 0;
   const startTime = Date.now();
   
   const updateProgress = function() {
       const elapsed = Date.now() - startTime;
       progress = Math.min((elapsed / targetTime) * 100, 100);
       
       $('#loading-progress').css('width', progress + '%');
       
       if (progress < 100) {
           requestAnimationFrame(updateProgress);
       } else {
           // Complete loading
           $('#loading-screen').fadeOut(500, function() {
               $(this).remove();
           });
       }
   };
   
   // Start the progress animation
   requestAnimationFrame(updateProgress);
   
   // Fallback in case something goes wrong
   setTimeout(function() {
       if ($('#loading-screen').is(':visible')) {
           $('#loading-progress').css('width', '100%');
           $('#loading-screen').fadeOut(500, function() {
               $(this).remove();
           });
       }
   }, targetTime + 500); // Slightly longer than target as safety
}

// Add bird flying animation to the head
if (!document.getElementById('loading-screen-styles')) {
   const style = document.createElement('style');
   style.id = 'loading-screen-styles';
   style.innerHTML = `
       @keyframes birdFly {
           0% { 
               transform: translateX(-50px) translateY(0) rotate(0deg); 
               opacity: 0;
           }
           10% { 
               opacity: 0.8;
           }
           90% { 
               opacity: 0.8;
           }
           100% { 
               transform: translateX(calc(100vw + 50px)) translateY(-50px) rotate(10deg); 
               opacity: 0;
           }
       }
   `;
   document.head.appendChild(style);
}

// Automatically show loading screen on page load if the element exists
$(document).ready(function() {
   if ($('#loading-screen').length) {
       showLoadingScreen();
   }
});

// Show loading screen for 3 seconds
showLoadingScreen(3000);
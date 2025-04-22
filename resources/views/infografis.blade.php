@section('infografis')
<div class="floating-menu-container">
   <!-- Left Floating Menu - Penduduk -->
   <div class="floating-menu-group left-menu">
       <a href="{{ route('infografis.penduduk') }}" class="menu-item @if(Route::currentRouteName() == 'infografis.penduduk') active @endif">
           <div class="menu-icon">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                   <path d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" />
               </svg>
           </div>
           <span class="menu-label">Data Penduduk</span>
           <div class="active-indicator"></div>
       </a>
   </div>
   
   <!-- Right Floating Menu - APBDes -->
   <div class="floating-menu-group right-menu">
       <a href="{{ route('infografis.apbdes') }}" class="menu-item @if(Route::currentRouteName() == 'infografis.apbdes') active @endif">
           <div class="menu-icon">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                   <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z" />
                   <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V6z" clip-rule="evenodd" />
               </svg>
           </div>
           <span class="menu-label">APBDes</span>
           <div class="active-indicator"></div>
       </a>
   </div>
</div>

<style>
.floating-menu-container {
   position: fixed;
   top: 18%;
   transform: translateY(-50%);
   width: 100%;
   display: flex;
   justify-content: space-between;
   pointer-events: none;
   z-index: 1000;
   padding: 0 20px;
   box-sizing: border-box;
}

.floating-menu-group {
   pointer-events: auto;
   display: flex;
   flex-direction: column;
   gap: 15px;
}

.left-menu {
   align-items: flex-start;
   margin-left: 10px;
}

.right-menu {
   align-items: flex-end;
   margin-right: 50px;
}

.menu-item {
   position: relative;
   display: flex;
   align-items: center;
   padding: 12px 20px;
   border-radius: 50px;
   text-decoration: none;
   color: #fff;
   background: rgba(40, 40, 40, 0.39); /* Warna lebih gelap dengan opacity tinggi */
   backdrop-filter: blur(10px);
   -webkit-backdrop-filter: blur(10px);
   border: 1px solid rgba(255,255,255,0.15);
   box-shadow: 0 8px 32px 0 rgba(0,0,0,0.36);
   transition: all 0.3s ease;
   overflow: hidden;
}

.left-menu .menu-item {
   flex-direction: row;
}

.right-menu .menu-item {
   flex-direction: row-reverse;
}

.menu-item:hover {
   transform: translateY(-3px);
   box-shadow: 0 12px 40px 0 rgba(0,0,0,0.4);
   background: rgba(50, 50, 50, 0.9); /* Sedikit lebih terang saat hover */
}

.menu-item.active {
   background: linear-gradient(135deg, rgba(46, 125, 50, 0.95) 0%, rgba(56, 142, 60, 0.85) 100%);
   border-color: rgba(255,255,255,0.25);
}

.menu-icon {
   width: 24px;
   height: 24px;
   display: flex;
   align-items: center;
   justify-content: center;
}

.menu-label {
   margin: 0 15px;
   font-weight: 500;
   font-size: 16px;
   white-space: nowrap;
   text-shadow: 0 1px 3px rgba(0,0,0,0.5); /* Menambah shadow untuk teks agar lebih terbaca */
}

.active-indicator {
   width: 8px;
   height: 8px;
   border-radius: 50%;
   background-color: rgba(255,255,255,0.5);
   transition: all 0.3s ease;
}

.menu-item.active .active-indicator {
   background-color: #fff;
   box-shadow: 0 0 10px 2px rgba(255,255,255,0.7);
   transform: scale(1.3);
}

/* Glow effect for active item */
.menu-item.active::after {
   content: '';
   position: absolute;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   border-radius: 50px;
   box-shadow: 0 0 15px 5px rgba(76, 175, 80, 0.6);
   opacity: 0;
   animation: pulse 2s infinite;
}

@keyframes pulse {
   0% { opacity: 0.5; }
   50% { opacity: 1; }
   100% { opacity: 0.5; }
}

/* Responsive adjustments */
@media (max-width: 768px) {
   .menu-label {
       display: none;
   }
   
   .menu-item {
       padding: 15px;
   }
   
   .left-menu {
       margin-left: 5px;
   }
   
   .right-menu {
       margin-right: 30px;
   }
}
</style>
@endsection
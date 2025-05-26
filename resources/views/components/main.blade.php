<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gampong Baro</title>
    <style>
        html, body {
            height: 100%;
        }
        
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            --accessibility-primary: #4a6bff;
            --accessibility-secondary: #2541b2;
            --accessibility-accent: #ff9f43;
            --accessibility-text: #333;
            --accessibility-bg: #fff;
        }
        main {
            flex: 1;
        }

        /* Floating Accessibility Menu - Luxurious Design */
        .accessibility-container {
            position: fixed;
            right: 20px;
            top: 97%;
            transform: translateY(-100%);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            font-size: 28px;
            gap: 2.7px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        /* Tambahkan ini untuk memastikan menu tidak terpengaruh */
        .accessibility-container,
        .accessibility-container * {
            font-size: initial !important;
            line-height: initial !important;
            letter-spacing: initial !important;
            filter: initial !important;
            cursor: initial !important;
        }

        .accessibility-main-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(145deg, var(--accessibility-primary), var(--accessibility-secondary));
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: none;
            color: #ffffff;
            font-size: 28px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .accessibility-main-btn:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .accessibility-main-btn i {
            width: 50px;
            text-align: center;
        }

        .accessibility-main-btn.active {
            background: linear-gradient(145deg, #4a6bff, #2541b2);
            color: white;
            font-weight: bold;
        }

        .accessibility-main-btn.active:hover {
            background: linear-gradient(145deg, #3a5bef, #1531a2);
        }
        /* Menu Animation Effects */
        .accessibility-menu {
            display: none;
            flex-direction: column;
            gap: 0px;
            background: var(--accessibility-bg);
            padding: 12px;
            border-radius: 20px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.18);
            transform-origin: top right;
            animation: fadeInScale 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            border: 1px solid rgba(0, 0, 0, 0.08);
            min-width: 300px;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
            opacity: 0;
            transform: scale(0.8) translateY(10px);
        }

        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: scale(0.8) translateY(10px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes fadeOutScale {
            0% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
            100% {
                opacity: 0;
                transform: scale(0.8) translateY(10px);
            }
        }

        .accessibility-menu.closing {
            animation: fadeOutScale 0.3s ease-out forwards !important;
        }

        .accessibility-menu.active {
            display: flex;
        }

        .menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        }

        .menu-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--accessibility-text);
            letter-spacing: 0.5px;
        }

        .close-menu {
            background: none;
            border: none;
            color: #fa0000;
            font-size: 25px;
            cursor: pointer;
            padding: 5px;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .close-menu:hover {
            background: rgba(0, 0, 0, 0.05);
            color: #333;
            transform: rotate(90deg);
        }

        .accessibility-btn {
            display: flex;
            align-items: center;
            gap: 3px;
            padding: 8px 11px;
            border-radius: 12px;
            background: transparent;
            border: none;
            color: var(--accessibility-text);
            font-size: 28px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-align: left;
            position: relative;
            overflow: hidden;
        }

        .accessibility-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(74, 107, 255, 0.1), rgba(74, 107, 255, 0.05));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .accessibility-btn:hover {
            background: rgba(0, 0, 0, 0.03);
            transform: translateX(5px);
        }

        .accessibility-btn:hover::after {
            opacity: 1;
        }

        .accessibility-btn.active {
            background: rgba(74, 107, 255, 0.1);
            color: var(--accessibility-primary);
            font-weight: 600;
            box-shadow: inset 2px 0 0 var(--accessibility-primary);
        }

        .accessibility-btn i {
            width: 24px;
            text-align: center;
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .accessibility-btn:hover i {
            transform: scale(1.1);
        }

        .reset-btn {
            margin-top: 10px;
            padding: 10px 16px;
            background: rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            color: #555;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .reset-btn:hover {
            background: rgba(0, 0, 0, 0.05);
            border-color: rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        /* Complaint Button - Enhanced Glossy Design */
        .complaint-btn {
            position: fixed;
            right: 20px;
            top: 95%;
            transform: translateY(-50%);
            z-index: 9998;
            width: 140px;
            opacity: 0.55;
            height: 50px;
            border-radius: 10px;
            background: linear-gradient(145deg, #ff4d4d, #cc0000);
            box-shadow: inset 0 2px 8px rgba(255, 255, 255, 0.3), 
                        0 6px 20px rgba(204, 0, 0, 0.4);
            border: none;
            color: white;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            letter-spacing: 0.5px;
        }

        .complaint-btn::before {
            content: "";
            position: absolute;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: all 0.6s ease;
        }

        .complaint-btn:hover {
            transform: translateY(-5px) translateY(-50%);
            box-shadow: inset 0 2px 8px rgba(255, 255, 255, 0.3), 
                         0 10px 30px rgba(204, 0, 0, 0.6);
            opacity: 0.75;
        }

        .complaint-btn:hover::before {
            right: 100%;
        }

        /* Tambahkan ini di CSS Anda */
        .no-complaint-btn .complaint-btn {
            display: none !important;
        }

        /* Hide on mobile */
        @media screen and (max-width: 768px) {
            .accessibility-container,
            .complaint-btn {
                display: none;
            }
        }

        /* Enhanced Accessibility features */
        /* Tambahkan :not(.accessibility-container) untuk mengecualikan menu aksesibilitas */
        .text-size-1 p:not(.accessibility-container p), 
        .text-size-1 h1:not(.accessibility-container h1), 
        .text-size-1 h2:not(.accessibility-container h2), 
        .text-size-1 h3:not(.accessibility-container h3), 
        .text-size-1 h4:not(.accessibility-container h4), 
        .text-size-1 h5:not(.accessibility-container h5), 
        .text-size-1 h6:not(.accessibility-container h6), 
        .text-size-1 .section-title:not(.accessibility-container .section-title), 
        .text-size-1 section:not(.accessibility-container section), 
        .text-size-1 .card:not(.accessibility-container .card), 
        .text-size-1 .button:not(.accessibility-container .button), 
        .text-size-1 span:not(.accessibility-container span) {
            font-size: 0.8em !important;
            transition: font-size 0.4s ease !important;
        }
        .text-size-2 p:not(.accessibility-container p), 
        .text-size-2 h1:not(.accessibility-container h1), 
        .text-size-2 h2:not(.accessibility-container h2), 
        .text-size-2 h3:not(.accessibility-container h3), 
        .text-size-2 h4:not(.accessibility-container h4), 
        .text-size-2 h5:not(.accessibility-container h5), 
        .text-size-2 h6:not(.accessibility-container h6), 
        .text-size-2 .section-title:not(.accessibility-container .section-title), 
        .text-size-2 section:not(.accessibility-container section), 
        .text-size-2 .card:not(.accessibility-container .card), 
        .text-size-2 .button:not(.accessibility-container .button), 
        .text-size-2 span:not(.accessibility-container span) {
            font-size: 0.9em !important;
            transition: font-size 0.4s ease !important;
        }
        .text-size-3 p:not(.accessibility-container p), 
        .text-size-3 h1:not(.accessibility-container h1), 
        .text-size-3 h2:not(.accessibility-container h2), 
        .text-size-3 h3:not(.accessibility-container h3), 
        .text-size-3 h4:not(.accessibility-container h4), 
        .text-size-3 h5:not(.accessibility-container h5), 
        .text-size-3 h6:not(.accessibility-container h6), 
        .text-size-3 .section-title:not(.accessibility-container .section-title), 
        .text-size-3 section:not(.accessibility-container section), 
        .text-size-3 .card:not(.accessibility-container .card), 
        .text-size-3 .button:not(.accessibility-container .button), 
        .text-size-3 span:not(.accessibility-container span) {
            font-size: 1em !important;
            transition: font-size 0.4s ease !important;
        }
        .text-size-4 p:not(.accessibility-container p), 
        .text-size-4 h1:not(.accessibility-container h1), 
        .text-size-4 h2:not(.accessibility-container h2), 
        .text-size-4 h3:not(.accessibility-container h3), 
        .text-size-4 h4:not(.accessibility-container h4), 
        .text-size-4 h5:not(.accessibility-container h5), 
        .text-size-4 h6:not(.accessibility-container h6), 
        .text-size-4 .section-title:not(.accessibility-container .section-title), 
        .text-size-4 section:not(.accessibility-container section), 
        .text-size-4 .card:not(.accessibility-container .card), 
        .text-size-4 .button:not(.accessibility-container .button), 
        .text-size-4 span:not(.accessibility-container span) {
            font-size: 1.1em !important;
            transition: font-size 0.4s ease !important;
        }
        .text-size-5 p:not(.accessibility-container p), 
        .text-size-5 h1:not(.accessibility-container h1), 
        .text-size-5 h2:not(.accessibility-container h2), 
        .text-size-5 h3:not(.accessibility-container h3), 
        .text-size-5 h4:not(.accessibility-container h4), 
        .text-size-5 h5:not(.accessibility-container h5), 
        .text-size-5 h6:not(.accessibility-container h6), 
        .text-size-5 .section-title:not(.accessibility-container .section-title), 
        .text-size-5 section:not(.accessibility-container section), 
        .text-size-5 .card:not(.accessibility-container .card), 
        .text-size-5 .button:not(.accessibility-container .button), 
        .text-size-5 span:not(.accessibility-container span) {
            font-size: 1.2em !important;
            transition: font-size 0.4s ease !important;
        }
        .text-size-6 p:not(.accessibility-container p), 
        .text-size-6 h1:not(.accessibility-container h1), 
        .text-size-6 h2:not(.accessibility-container h2), 
        .text-size-6 h3:not(.accessibility-container h3), 
        .text-size-6 h4:not(.accessibility-container h4), 
        .text-size-6 h5:not(.accessibility-container h5), 
        .text-size-6 h6:not(.accessibility-container h6), 
        .text-size-6 .section-title:not(.accessibility-container .section-title), 
        .text-size-6 section:not(.accessibility-container section), 
        .text-size-6 .card:not(.accessibility-container .card), 
        .text-size-6 .button:not(.accessibility-container .button), 
        .text-size-6 span:not(.accessibility-container span) {
            font-size: 1.3em !important;
            transition: font-size 0.4s ease !important;
        }

        .line-height-1 p:not(.accessibility-container p), 
        .line-height-1 h1:not(.accessibility-container h1), 
        .line-height-1 h2:not(.accessibility-container h2), 
        .line-height-1 h3:not(.accessibility-container h3), 
        .line-height-1 h4:not(.accessibility-container h4), 
        .line-height-1 h5:not(.accessibility-container h5), 
        .line-height-1 h6:not(.accessibility-container h6), 
        .line-height-1 .section-title:not(.accessibility-container .section-title), 
        .line-height-1 section:not(.accessibility-container section), 
        .line-height-1 .card:not(.accessibility-container .card), 
        .line-height-1 .button:not(.accessibility-container .button), 
        .line-height-1 span:not(.accessibility-container span) {
            line-height: 1.2 !important;
            transition: line-height 0.4s ease !important;
        }
        .line-height-2 p:not(.accessibility-container p), 
        .line-height-2 h1:not(.accessibility-container h1), 
        .line-height-2 h2:not(.accessibility-container h2), 
        .line-height-2 h3:not(.accessibility-container h3), 
        .line-height-2 h4:not(.accessibility-container h4), 
        .line-height-2 h5:not(.accessibility-container h5), 
        .line-height-2 h6:not(.accessibility-container h6), 
        .line-height-2 .section-title:not(.accessibility-container .section-title), 
        .line-height-2 section:not(.accessibility-container section), 
        .line-height-2 .card:not(.accessibility-container .card), 
        .line-height-2 .button:not(.accessibility-container .button), 
        .line-height-2 span:not(.accessibility-container span) {
            line-height: 1.5 !important;
            transition: line-height 0.4s ease !important;
        }
        .line-height-3 p:not(.accessibility-container p), 
        .line-height-3 h1:not(.accessibility-container h1), 
        .line-height-3 h2:not(.accessibility-container h2), 
        .line-height-3 h3:not(.accessibility-container h3), 
        .line-height-3 h4:not(.accessibility-container h4), 
        .line-height-3 h5:not(.accessibility-container h5), 
        .line-height-3 h6:not(.accessibility-container h6), 
        .line-height-3 .section-title:not(.accessibility-container .section-title), 
        .line-height-3 section:not(.accessibility-container section), 
        .line-height-3 .card:not(.accessibility-container .card), 
        .line-height-3 .button:not(.accessibility-container .button), 
        .line-height-3 span:not(.accessibility-container span) {
            line-height: 1.8 !important;
            transition: line-height 0.4s ease !important;
        }
        .line-height-4 p:not(.accessibility-container p), 
        .line-height-4 h1:not(.accessibility-container h1), 
        .line-height-4 h2:not(.accessibility-container h2), 
        .line-height-4 h3:not(.accessibility-container h3), 
        .line-height-4 h4:not(.accessibility-container h4), 
        .line-height-4 h5:not(.accessibility-container h5), 
        .line-height-4 h6:not(.accessibility-container h6), 
        .line-height-4 .section-title:not(.accessibility-container .section-title), 
        .line-height-4 section:not(.accessibility-container section), 
        .line-height-4 .card:not(.accessibility-container .card), 
        .line-height-4 .button:not(.accessibility-container .button), 
        .line-height-4 span:not(.accessibility-container span) {
            line-height: 2 !important;
            transition: line-height 0.4s ease !important;
        }

        .letter-spacing-0 p:not(.accessibility-container p), 
        .letter-spacing-0 h1:not(.accessibility-container h1), 
        .letter-spacing-0 h2:not(.accessibility-container h2), 
        .letter-spacing-0 h3:not(.accessibility-container h3), 
        .letter-spacing-0 h4:not(.accessibility-container h4), 
        .letter-spacing-0 h5:not(.accessibility-container h5), 
        .letter-spacing-0 h6:not(.accessibility-container h6), 
        .letter-spacing-0 .section-title:not(.accessibility-container .section-title), 
        .letter-spacing-0 section:not(.accessibility-container section), 
        .letter-spacing-0 .card:not(.accessibility-container .card), 
        .letter-spacing-0 .button:not(.accessibility-container .button), 
        .letter-spacing-0 span:not(.accessibility-container span) {
            letter-spacing: normal !important;
            transition: letter-spacing 0.4s ease !important;
        }
        .letter-spacing-1 p:not(.accessibility-container p), 
        .letter-spacing-1 h1:not(.accessibility-container h1), 
        .letter-spacing-1 h2:not(.accessibility-container h2), 
        .letter-spacing-1 h3:not(.accessibility-container h3), 
        .letter-spacing-1 h4:not(.accessibility-container h4), 
        .letter-spacing-1 h5:not(.accessibility-container h5), 
        .letter-spacing-1 h6:not(.accessibility-container h6), 
        .letter-spacing-1 .section-title:not(.accessibility-container .section-title), 
        .letter-spacing-1 section:not(.accessibility-container section), 
        .letter-spacing-1 .card:not(.accessibility-container .card), 
        .letter-spacing-1 .button:not(.accessibility-container .button), 
        .letter-spacing-1 span:not(.accessibility-container span) {
            letter-spacing: 1px !important;
            transition: letter-spacing 0.4s ease !important;
        }
        .letter-spacing-2 p:not(.accessibility-container p), 
        .letter-spacing-2 h1:not(.accessibility-container h1), 
        .letter-spacing-2 h2:not(.accessibility-container h2), 
        .letter-spacing-2 h3:not(.accessibility-container h3), 
        .letter-spacing-2 h4:not(.accessibility-container h4), 
        .letter-spacing-2 h5:not(.accessibility-container h5), 
        .letter-spacing-2 h6:not(.accessibility-container h6), 
        .letter-spacing-2 .section-title:not(.accessibility-container .section-title), 
        .letter-spacing-2 section:not(.accessibility-container section), 
        .letter-spacing-2 .card:not(.accessibility-container .card), 
        .letter-spacing-2 .button:not(.accessibility-container .button), 
        .letter-spacing-2 span:not(.accessibility-container span) {
            letter-spacing: 2px !important;
            transition: letter-spacing 0.4s ease !important;
        }

        /* Tambahkan :not(.accessibility-container) untuk filter */
        .inverted-colors:not(.accessibility-container) {
            filter: invert(1) hue-rotate(180deg);
            transition: filter 0.6s ease;
        }

        .grayscale:not(.accessibility-container) {
            filter: grayscale(1);
            transition: filter 0.6s ease;
        }

        .large-cursor *:not(.accessibility-container *) {
            cursor: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'><circle cx='20' cy='20' r='18' fill='black'/><circle cx='20' cy='20' r='16' fill='white'/></svg>"), auto !important;
            transition: cursor 0.3s ease;
        }

        /* Enhanced Reading Mode */
        .reading-mode {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            z-index: 99999;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            backdrop-filter: blur(5px);
        }

        .reading-mode-content {
            max-width: 800px;
            padding: 30px;
            background: rgba(40, 40, 40, 0.95);
            border-radius: 16px;
            position: relative;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: slideUp 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .close-reading-mode {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #ff4d4d;
            border: none;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close-reading-mode:hover {
            transform: rotate(90deg) scale(1.1);
            background: #ff3333;
        }

        .reading-text-display {
            font-size: 18px;
            line-height: 1.6;
            margin: 20px 0;
            padding: 20px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            border-left: 4px solid var(--accessibility-primary);
        }

        .reading-controls {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .reading-control-btn {
            padding: 8px 16px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .reading-control-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Highlight effect for selected text */
        ::selection {
            background: var(--accessibility-primary);
            color: white;
        }

        .inverted-colors ::selection {
            background: var(--accessibility-accent);
            color: black;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}" media="screen and (max-width: 768px)">
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">
    <!-- Include loading screen when needed -->
    @if(!isset($noLoading) || !$noLoading)
        @include('components.loading-screen')
    @endif
    
    @include('components.navbar', ['navbarScroll' => $navbarScroll ?? true])
    
    {{-- <!-- Floating Accessibility Container -->
    <div class="accessibility-container">
        <!-- Perubahan hanya pada bagian tombol utama accessibility -->
        <button class="accessibility-main-btn" id="accessibilityToggle" aria-label="Toggle Accessibility">
            <i class="fas fa-universal-access" ></i>
        </button>
        
        
        <div class="accessibility-menu" id="accessibilityMenu">
            <div class="menu-header">
                <span class="menu-title">Aksesibilitas</span>
                <button class="close-menu" id="closeAccessibilityMenu">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <button class="accessibility-btn" id="increaseFont">
                <i class="fas fa-search-plus"></i>
                <span>Perbesar Teks</span>
            </button>
            
            <button class="accessibility-btn" id="decreaseFont">
                <i class="fas fa-search-minus"></i>
                <span>Perkecil Teks</span>
            </button>
            
            <button class="accessibility-btn" id="increaseLetterSpacing">
                <i class="fas fa-text-width"></i>
                <span>Tambahkan Jarak Teks</span>
            </button>
            
            <button class="accessibility-btn" id="decreaseLetterSpacing">
                <i class="fas fa-text-width fa-rotate-180"></i>
                <span>Kurangi Jarak Teks</span>
            </button>
            
            <button class="accessibility-btn" id="increaseLineHeight">
                <i class="fas fa-arrows-alt-v"></i>
                <span>Tambah Tinggi Baris</span>
            </button>
            
            <button class="accessibility-btn" id="decreaseLineHeight">
                <i class="fas fa-arrows-alt-v fa-rotate-180"></i>
                <span>Kurangi Tinggi Baris</span>
            </button>
            
            <button class="accessibility-btn" id="invertColors">
                <i class="fas fa-adjust"></i>
                <span>Balik Warna</span>
            </button>
            
            <button class="accessibility-btn" id="grayscale">
                <i class="fas fa-circle-notch"></i>
                <span>Warna Abu-abu</span>
            </button>
            
            <button class="accessibility-btn" id="largeCursor">
                <i class="fas fa-mouse-pointer"></i>
                <span>Perbesar Kursor</span>
            </button>
            
            <button class="accessibility-btn" id="readingAssistant">
                <i class="fas fa-book-reader"></i>
                <span>Alat Bantu Baca</span>
            </button>
            
            <button class="reset-btn" id="resetAccessibility">
                <i class="fas fa-undo"></i> Reset Semua
            </button>
        </div>
    </div> --}}
    
    <!-- Floating Complaint Button -->
    <button class="complaint-btn" title="Menu Pengaduan">
        <i class="fas fa-bullhorn mx-2"></i> Pengaduan
    </button>
    
    <main class="container-fluid p-0">
        @yield('hero-carousel')
        @yield('content')
    </main>
    
    @include('components.footer')
    @include('components.bottom-navbar')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Loading Screen JS -->
    <script src="{{ asset('js/loading-screen.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script>
        $(document).ready(function() {
            @if($navbarScroll ?? true)
                // Efek scroll hanya aktif jika navbarScroll true
                const $navbar = $('.navbar');
                $(window).on('scroll', function() {
                    $navbar.toggleClass('scrolled', $(this).scrollTop() > 50);
                }).trigger('scroll'); // Trigger untuk inisialisasi
            @else
                // Untuk halaman tanpa scroll effect, langsung aktifkan
                $('.navbar').addClass('scrolled');
            @endif

            // Accessibility state variables
            let textSizeLevel = 3;
            let lineHeightLevel = 2;
            let letterSpacingLevel = 0;
            let isInverted = false;
            let isGrayscale = false;
            let isLargeCursor = false;
            let isReadingMode = false;
            let speechSynthesis = window.speechSynthesis;
            let currentUtterance = null;
            let selectedText = '';

            // Toggle accessibility menu with animation
            $('#accessibilityToggle').click(function(e) {
                e.stopPropagation();
                const menu = $('#accessibilityMenu');
                const btn = $(this);
                
                if (menu.hasClass('active')) {
                    menu.removeClass('active').addClass('closing');
                    btn.removeClass('active');
                    setTimeout(() => {
                        menu.removeClass('closing');
                    }, 300);
                } else {
                    menu.addClass('active');
                    btn.addClass('active');
                }
            });

            // Close menu with animation
            $('#closeAccessibilityMenu').click(function() {
                $('#accessibilityMenu').removeClass('active').addClass('closing');
                $('#accessibilityToggle').removeClass('active');
                setTimeout(() => {
                    $('#accessibilityMenu').removeClass('closing');
                }, 300);
            });

            // Close menu when clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('.accessibility-container').length) {
                    if ($('#accessibilityMenu').hasClass('active')) {
                        $('#accessibilityMenu').removeClass('active').addClass('closing');
                        $('#accessibilityToggle').removeClass('active');
                        setTimeout(() => {
                            $('#accessibilityMenu').removeClass('closing');
                        }, 300);
                    }
                }
            });

            // Prevent closing when clicking inside menu
            $('#accessibilityMenu').click(function(e) {
                e.stopPropagation();
            });

            // Text size control with animation
            $('#increaseFont').click(function() {
                if (textSizeLevel < 6) {
                    textSizeLevel++;
                    updateTextSize();
                    $(this).addClass('active');
                    $('#decreaseFont').removeClass('active');
                    animateButton($(this));
                }
            });

            $('#decreaseFont').click(function() {
                if (textSizeLevel > 1) {
                    textSizeLevel--;
                    updateTextSize();
                    $(this).addClass('active');
                    $('#increaseFont').removeClass('active');
                    animateButton($(this));
                }
            });

            function updateTextSize() {
                $('body').removeClass('text-size-1 text-size-2 text-size-3 text-size-4 text-size-5 text-size-6');
                $('body').addClass('text-size-' + textSizeLevel);
            }

            // Line height control with animation
            $('#increaseLineHeight').click(function() {
                if (lineHeightLevel < 4) {
                    lineHeightLevel++;
                    updateLineHeight();
                    $(this).addClass('active');
                    $('#decreaseLineHeight').removeClass('active');
                    animateButton($(this));
                }
            });

            $('#decreaseLineHeight').click(function() {
                if (lineHeightLevel > 1) {
                    lineHeightLevel--;
                    updateLineHeight();
                    $(this).addClass('active');
                    $('#increaseLineHeight').removeClass('active');
                    animateButton($(this));
                }
            });

            function updateLineHeight() {
                $('body').removeClass('line-height-1 line-height-2 line-height-3 line-height-4');
                $('body').addClass('line-height-' + lineHeightLevel);
            }

            // Letter spacing control with animation
            $('#increaseLetterSpacing').click(function() {
                if (letterSpacingLevel < 2) {
                    letterSpacingLevel++;
                    updateLetterSpacing();
                    $(this).addClass('active');
                    $('#decreaseLetterSpacing').removeClass('active');
                    animateButton($(this));
                }
            });

            $('#decreaseLetterSpacing').click(function() {
                if (letterSpacingLevel > 0) {
                    letterSpacingLevel--;
                    updateLetterSpacing();
                    $(this).addClass('active');
                    $('#increaseLetterSpacing').removeClass('active');
                    animateButton($(this));
                }
            });

            function updateLetterSpacing() {
                $('body').removeClass('letter-spacing-0 letter-spacing-1 letter-spacing-2');
                $('body').addClass('letter-spacing-' + letterSpacingLevel);
            }

            // Color adjustments with animation
            $('#invertColors').click(function() {
                isInverted = !isInverted;
                $('body').toggleClass('inverted-colors', isInverted);
                $(this).toggleClass('active', isInverted);
                animateButton($(this));
            });

            $('#grayscale').click(function() {
                isGrayscale = !isGrayscale;
                $('body').toggleClass('grayscale', isGrayscale);
                $(this).toggleClass('active', isGrayscale);
                animateButton($(this));
            });

            // Cursor size with animation
            $('#largeCursor').click(function() {
                isLargeCursor = !isLargeCursor;
                $('body').toggleClass('large-cursor', isLargeCursor);
                $(this).toggleClass('active', isLargeCursor);
                animateButton($(this));
            });

            // Reading assistant with SweetAlert
            $('#readingAssistant').click(function() {
                isReadingMode = !isReadingMode;
                if (isReadingMode) {
                    $(this).addClass('active');
                    
                    Swal.fire({
                        title: 'Catatan Fitur',
                        html: `
                            <div class="text-xs" style="text-align:left; font-size: 1.175rem;">
                                <p>Pilih teks yang ingin dibaca, lalu alat akan membacakannya untuk Anda.</p>
                                <p>Fitur ini akan tetap aktif sampai Anda menonaktifkannya.</p>
                            </div>
                        `,
                        icon: 'info',
                        timer: 4000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        background: 'rgba(255,255,255,0.95)',
                        backdrop: 'rgba(0,0,0,0.5)',
                        width: '35rem', // Lebarkan SweetAlert
                        customClass: {
                            popup: 'rounded-2xl shadow-xl',
                            title: 'text-base font-semibold',
                        }
                    });

                    // Start reading mode
                    startReadingMode();
                } else {
                    $('#readingMode').fadeOut();
                    $(this).removeClass('active');
                    stopReadingMode();
                }
            });

            $('#closeReadingMode').click(function() {
                isReadingMode = false;
                $('#readingMode').fadeOut();
                $('#readingAssistant').removeClass('active');
                stopReadingMode();
            });

            // Reading controls
            $('#playReading').click(function() {
                if (selectedText && speechSynthesis) {
                    if (speechSynthesis.paused) {
                        speechSynthesis.resume();
                    } else if (!currentUtterance) {
                        currentUtterance = new SpeechSynthesisUtterance(selectedText);
                        currentUtterance.lang = 'id-ID';
                        speechSynthesis.speak(currentUtterance);
                    }
                }
            });

            $('#pauseReading').click(function() {
                if (speechSynthesis.speaking) {
                    speechSynthesis.pause();
                }
            });

            $('#stopReading').click(function() {
                if (speechSynthesis.speaking || speechSynthesis.paused) {
                    speechSynthesis.cancel();
                    currentUtterance = null;
                }
            });

            function startReadingMode() {
                // Auto-read selected text
                document.addEventListener('mouseup', handleTextSelection);
                document.addEventListener('keyup', handleTextSelection);
            }

            function stopReadingMode() {
                document.removeEventListener('mouseup', handleTextSelection);
                document.removeEventListener('keyup', handleTextSelection);
                if (speechSynthesis) {
                    speechSynthesis.cancel();
                    currentUtterance = null;
                }
            }

            function handleTextSelection() {
                const newSelectedText = window.getSelection().toString().trim();
                if (newSelectedText && isReadingMode) {
                    selectedText = newSelectedText;
                    $('#readingTextDisplay').html(`<p><strong>Teks yang dibaca:</strong><br>${selectedText}</p>`);
                    $('#readingMode').fadeIn();
                    
                    if (speechSynthesis) {
                        speechSynthesis.cancel();
                        currentUtterance = new SpeechSynthesisUtterance(selectedText);
                        currentUtterance.lang = 'id-ID';
                        speechSynthesis.speak(currentUtterance);
                        
                        currentUtterance.onend = function() {
                            currentUtterance = null;
                        };
                    }
                }
            }

            // Button animation function
            function animateButton(button) {
                button.css('transform', 'scale(0.95)');
                setTimeout(() => {
                    button.css('transform', '');
                }, 200);
            }

            // Reset all accessibility settings with animation
            $('#resetAccessibility').click(function() {
                // Animate reset button
                $(this).css('transform', 'rotate(360deg)');
                setTimeout(() => {
                    $(this).css('transform', '');
                }, 500);
                
                // Reset variables
                textSizeLevel = 3;
                lineHeightLevel = 2;
                letterSpacingLevel = 0;
                isInverted = false;
                isGrayscale = false;
                isLargeCursor = false;
                
                // Remove all classes with transition
                $('body').removeClass(
                    'text-size-1 text-size-2 text-size-3 text-size-4 text-size-5 text-size-6 ' +
                    'line-height-1 line-height-2 line-height-3 line-height-4 ' +
                    'letter-spacing-0 letter-spacing-1 letter-spacing-2 ' +
                    'inverted-colors grayscale large-cursor'
                );
                
                // Reset active states
                $('.accessibility-btn').removeClass('active');
                
                // Close reading mode if active
                if (isReadingMode) {
                    isReadingMode = false;
                    $('#readingMode').fadeOut();
                    $('#readingAssistant').removeClass('active');
                    stopReadingMode();
                }
            });

            // Complaint button redirect
            document.querySelector('.complaint-btn').addEventListener('click', function () {
                window.location.href = "{{ route('pengaduan') }}";
            });

            // Cek URL halaman
            if (window.location.pathname.includes('/pengaduan')) {
                document.querySelector('.complaint-btn').style.display = 'none';
            }
                    });
    </script>

    @stack('scripts')
</body>
</html>
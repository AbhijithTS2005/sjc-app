<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>St. Joseph's College Moolamattom</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;900&family=Poppins:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100%;
            overflow-x: hidden;
            font-family: var(--base-font);
            color: #333;
        }

        :root {
            --heading-font: 'Merriweather', Georgia, serif;
            --base-font: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            --college-blue: #003366;
            --accent-gold: #f0ad4e;
            --dark-menu-bg: #f8f9fa;
            --teal-accent: #003366;
            --header-height: 120px;
            /* Default fallback if JS fails */
        }

        /* Keyframes for animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .fixed-top-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 99999 !important;
            /* Force it to the front */
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        body {
            padding-top: var(--header-height) !important;
            padding-bottom: 50px !important;
        }

        .sticky-sidebar-offset {
            top: calc(var(--header-height) + 20px) !important;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .top-bar {
            background: #f8f9fa;
            padding: 8px 40px;
            display: flex;
            justify-content: flex-end;
            border-bottom: 1px solid #ddd;
            font-size: 0.85rem;
        }

        .top-bar a {
            margin-left: 20px;
            color: #555;
            font-weight: 600;
        }

        header {
            position: relative;
            /* All absolute children now look at header width */
            width: 100%;
            box-sizing: border-box;
            background: #fff;
            padding: 12px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid var(--college-blue);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-container .site-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border-radius: 50%;
            display: block;
        }

        .logo-text h1 {
            font-size: 1.6rem;
            color: var(--college-blue);
            font-weight: 800;
        }

        .main-nav {
            display: flex;
            gap: 25px;
        }

        .main-nav a {
            color: #333;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.95rem;
        }

        .main-nav a.campus-main-link {
            transition: all 0.3s ease;
        }

        h1,
        h2,
        h3,
        .section-header,
        .sidebar-title {
            font-family: var(--heading-font);
        }

        /* DROPDOWN MENU STYLES */
        .dropdown {
            display: inline-block;
        }

        /* 2. Positioning Logic */
        /* Centered items (About, Campus, Student) */
        .main-nav .dropdown {
            position: static;
        }

        /* 3. Dropdown Content Base (Hidden) */
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            background-color: #ffffff;
            padding: 35px;
            border-radius: 0 0 8px 8px;
            border-top: 5px solid var(--college-blue);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            z-index: 100000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;

            /* Center to Header */
            left: 50%;
            transform: translateX(-50%);
            width: 95vw;
            max-width: 1100px;
        }

        /* 4. Active State (Triggered by Click) */
        /* This handles both the "Mega Dark" and the "Academic" white menu */
        .dropdown.is-active>.dropdown-content {
            display: block;
            opacity: 1;
            pointer-events: auto;
        }

        /* If the menu uses the 'mega-dark' class, use Grid layout */
        .dropdown.is-active>.dropdown-content.mega-dark {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            background-color: var(--dark-menu-bg);
        }

        /* 5. Specific layout for Academic content */
        /* Ensures the search box and columns look right inside the centered menu */
        .mega-menu-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .menu-search-box {
            grid-column: 1 / -1;
            margin-bottom: 20px;
        }

        .service-item h3 {
            font-family: var(--base-font);
            color: #003366;
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .read-more {
            font-family: var(--base-font);
            color: #fff;
            font-size: 0.8rem;
            font-style: italic;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.15s ease;
        }

        .dropdown-content.mega-dark .service-item .read-more {
            font-size: 0.8rem !important;
            color: #010d1cff;
        }

        .dropdown-content.mega-dark .read-more:hover {
            color: var(--accent-gold);
        }

        .menu-search-box {
            display: flex;
            align-items: center;
            background: #f1f3f5;
            padding: 8px 15px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .menu-search-box input {
            border: none;
            background: transparent;
            outline: none;
            width: 100%;
        }

        .mega-menu-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .menu-column h3 {
            color: #003366;
            font-size: 0.95rem;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .menu-column a {
            display: block;
            padding: 5px 0;
            color: #555 !important;
            font-size: 0.85rem;
            text-transform: none;
        }

        .menu-column a:hover {
            color: #f0ad4e !important;
            transform: translateX(5px);
            transition: 0.2s;
        }

        /* Sidebar helper: ensure non-link items (spans) match anchor layout */
        .sidebar-links {
            list-style: none;
            padding: 0;
        }

        .sidebar-links li {
            margin-bottom: 8px;
        }

        .sidebar-links a,
        .sidebar-links span {
            display: block;
            padding: 8px 12px;
            border-radius: 4px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .sidebar-links a i,
        .sidebar-links span i {
            margin-right: 8px;
            width: 16px;
            display: inline-block;
            vertical-align: middle;
        }

        .sidebar-links span {
            color: inherit;
        }

        .sidebar-links span:hover {
            background: var(--college-blue);
            color: #fff;
            transform: translateX(5px);
        }

        footer {
            background-color: #2c2c2c;
            color: #ddd;
            padding: 60px 10%;
            margin-top: 40px;
            border-top: 5px solid var(--college-blue);
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
        }

        .footer-info h4 {
            color: white;
            margin-bottom: 15px;
        }

        .footer-links h4 {
            color: white;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .footer-links p {
            font-size: 0.95rem;
            margin-bottom: 12px;
            line-height: 1.6;
        }

        .footer-links a {
            color: #f0ad4e;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #fff;
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--college-blue);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.3rem;
            display: none;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 51, 102, 0.4);
            transition: all 0.3s ease;
            z-index: 999;
        }

        .back-to-top:hover {
            background: #002244;
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 51, 102, 0.6);
        }

        .back-to-top.show {
            display: flex;
        }

        @media (max-width: 768px) {
            .back-to-top {
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .back-to-top {
                bottom: 15px;
                right: 15px;
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
        }

        /* HEADER RESPONSIVE */
        /* HAMBURGER MENU STYLES */
        .hamburger-menu {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
            z-index: 100001;
        }

        .hamburger-menu span {
            width: 28px;
            height: 3px;
            background: var(--college-blue);
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .hamburger-menu.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .hamburger-menu.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger-menu.active span:nth-child(3) {
            transform: rotate(-45deg) translate(8px, -8px);
        }

        .mobile-nav-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            flex-direction: column;
            gap: 0;
            padding: 15px 0;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            max-height: calc(100vh - 120px);
            overflow-y: auto;
            z-index: 99998;
        }

        .mobile-nav-menu.active {
            display: flex;
        }

        .mobile-nav-menu>a,
        .mobile-nav-menu>li {
            border-bottom: 1px solid #eee;
            padding: 0;
        }

        .mobile-nav-menu>a,
        .mobile-nav-menu>li>a {
            display: block;
            padding: 12px 20px;
            color: #333;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .mobile-nav-menu>a:hover,
        .mobile-nav-menu>li>a:hover {
            background: #f8f9fa;
            color: var(--college-blue);
        }

        .mobile-dropdown-toggle {
            display: block;
            width: 100%;
            padding: 12px 20px;
            color: #333;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            border: none;
            background: white;
            text-align: left;
            cursor: pointer;
            border-bottom: 1px solid #eee;
        }

        .mobile-dropdown-toggle:hover {
            background: #f8f9fa;
            color: var(--college-blue);
        }

        .mobile-dropdown-content {
            display: none;
            background: #f8f9fa;
            padding: 0;
            flex-direction: column;
        }

        .mobile-dropdown-content.active {
            display: flex;
        }

        .mobile-dropdown-content a {
            padding: 10px 40px;
            color: #555;
            font-weight: 500;
            font-size: 0.85rem;
            text-transform: none;
            border-bottom: 1px solid #eee;
        }

        .mobile-dropdown-content a:hover {
            background: white;
            color: var(--college-blue);
        }

        @media (max-width: 1200px) {
            header {
                padding: 10px 30px;
                gap: 20px;
            }

            .logo-text h1 {
                font-size: 1.5rem;
            }

            .main-nav {
                gap: 20px;
            }

            .main-nav a {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 992px) {
            header {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                padding: 12px 20px;
                border-bottom: 2px solid var(--college-blue);
                flex-wrap: nowrap;
                min-height: auto;
            }

            .logo-container {
                margin-bottom: 0;
                flex: 1;
                min-width: 0;
            }

            .main-nav {
                display: none;
            }

            .hamburger-menu {
                display: flex;
                flex-shrink: 0;
            }

            .logo-text h1 {
                font-size: 1.35rem;
            }

            .dropdown-content {
                width: 90vw;
            }

            footer {
                grid-template-columns: 1fr 1fr;
                padding: 40px 20px;
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .top-bar {
                padding: 6px 20px;
                font-size: 0.75rem;
                flex-wrap: wrap;
                gap: 10px;
            }

            .top-bar a {
                margin-left: 10px;
            }

            header {
                padding: 10px 15px;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .logo-container {
                display: flex;
                align-items: center;
                gap: 10px;
                flex: 1;
                min-width: 0;
                visibility: visible !important;
            }

            .logo-container .site-logo {
                width: 64px;
                height: 64px;
                display: block !important;
            }

            .logo-text h1 {
                font-size: 1.3rem;
            }

            .logo-text span {
                font-size: 0.85rem;
            }

            .main-nav {
                display: none;
            }

            .hamburger-menu {
                display: flex;
                flex-shrink: 0;
            }

            .mobile-nav-menu {
                display: none;
            }

            .mobile-nav-menu.active {
                display: flex;
            }

            .dropdown-content {
                width: 100vw;
                left: 0 !important;
                transform: none !important;
                max-width: 100vw;
                padding: 20px;
            }

            .mega-menu-container {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .menu-column a {
                font-size: 0.8rem;
            }

            footer {
                grid-template-columns: 1fr;
                padding: 30px 15px;
                gap: 20px;
                font-size: 0.9rem;
            }

            .footer-links h4,
            .footer-info h4 {
                font-size: 1rem;
                margin-bottom: 10px;
            }

            .footer-links p {
                font-size: 0.9rem;
                margin-bottom: 8px;
            }
        }

        @media (max-width: 576px) {
            .top-bar {
                padding: 4px 10px;
                font-size: 0.7rem;
                gap: 5px;
            }

            .top-bar a {
                margin-left: 5px;
            }

            header {
                padding: 8px 10px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                min-height: auto;
            }

            .logo-container {
                gap: 8px;
                display: flex;
                align-items: center;
                flex: 1;
                min-width: 0;
                visibility: visible !important;
            }

            .logo-container .site-logo {
                width: 52px;
                height: 52px;
                flex-shrink: 0;
                display: block !important;
            }

            .logo-text h1 {
                font-size: 1.1rem;
            }

            .logo-text span {
                font-size: 0.75rem;
                display: none;
            }

            .main-nav {
                gap: 5px;
            }

            .main-nav a,
            .main-nav li a {
                font-size: 0.7rem;
                padding: 6px 0;
                text-transform: none;
            }

            .main-nav i {
                font-size: 0.7rem;
                margin-left: 2px;
            }

            .dropdown-content {
                padding: 15px;
            }

            .menu-search-box {
                padding: 6px 10px;
                margin-bottom: 10px;
            }

            .menu-column h3 {
                font-size: 0.85rem;
                margin-bottom: 8px;
            }

            .menu-column a {
                font-size: 0.75rem;
                padding: 3px 0;
            }

            footer {
                grid-template-columns: 1fr;
                padding: 20px 10px;
                gap: 15px;
                font-size: 0.85rem;
                margin-top: 20px;
            }

            .footer-links h4,
            .footer-info h4 {
                font-size: 0.95rem;
                margin-bottom: 8px;
            }

            .footer-links p {
                font-size: 0.8rem;
                margin-bottom: 6px;
            }

            .footer-links p i {
                margin-right: 6px;
            }
        }

        @media (max-width: 480px) {
            .top-bar {
                padding: 3px 8px;
                font-size: 0.65rem;
                gap: 3px;
            }

            .top-bar a {
                margin-left: 3px;
            }

            header {
                padding: 6px 8px;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .logo-container {
                display: flex;
                align-items: center;
                flex: 1;
                min-width: 0;
                visibility: visible !important;
            }

            .logo-container .site-logo {
                width: 45px;
                height: 45px;
                flex-shrink: 0;
                display: block !important;
            }

            .logo-text h1 {
                font-size: 1rem;
            }

            .main-nav a,
            .main-nav li a {
                font-size: 0.65rem;
            }

            footer {
                padding: 15px 8px;
                gap: 12px;
                font-size: 0.8rem;
            }

            .footer-links h4,
            .footer-info h4 {
                font-size: 0.9rem;
                margin-bottom: 6px;
            }

            .footer-links p {
                font-size: 0.75rem;
                margin-bottom: 5px;
            }
        }

        /* Responsive logo sizes */
        @media (max-width: 768px) {
            .logo-container .site-logo {
                width: 64px;
                height: 64px;
            }

            .logo-text h1 {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 576px) {
            .logo-container {
                gap: 10px;
            }

            .logo-container .site-logo {
                width: 48px;
                height: 48px;
            }

            .logo-text h1 {
                font-size: 1.05rem;
            }
        }

        /* NEWS TICKER STYLES */
        .news-ticker-container {
            background: #f8f9fa;
            color: #333;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 15px;
            border-top: 2px solid #003366;
            overflow: hidden;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
            box-sizing: border-box;
            box-shadow: 0 -2px 8px rgba(0, 51, 102, 0.1);
            transition: all 0.3s ease;
        }

        .news-ticker-container.hidden {
            transform: translateY(100%);
            pointer-events: none;
        }

        .news-ticker-toggle {
            background: #003366;
            color: white;
            border: none;
            padding: 6px 8px;
            border-radius: 4px 4px 0 0;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
        }

        .news-ticker-toggle:hover {
            background: #002244;
            box-shadow: 0 -2px 6px rgba(0, 51, 102, 0.3);
        }

        .news-ticker-container.hidden .news-ticker-toggle i {
            transform: rotate(180deg);
        }

        /* FLOATING UNHIDE BUTTON */
        .news-ticker-unhide-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: #003366;
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            z-index: 999;
            display: none;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
            flex-shrink: 0;
        }

        .news-ticker-unhide-btn.visible {
            display: flex;
        }

        .news-ticker-unhide-btn:hover {
            background: #002244;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 51, 102, 0.4);
        }

        .news-ticker-unhide-btn i {
            font-size: 1rem;
        }

        body {
            padding-top: var(--header-height) !important;
            padding-bottom: 50px !important;
        }

        .news-ticker-label {
            background: #003366;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.85rem;
            white-space: nowrap;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .news-ticker-content {
            flex: 1;
            overflow: hidden;
            position: relative;
        }

        .news-ticker-scroll {
            display: flex;
            gap: 20px;
            animation: scroll-left 40s linear infinite;
            padding: 0;
            margin: 0;
        }

        .news-ticker-scroll:hover {
            animation-play-state: paused;
        }

        @keyframes scroll-left {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .news-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            background: white;
            border-left: 3px solid #003366;
            border-radius: 2px;
            transition: all 0.3s ease;
            white-space: nowrap;
            cursor: pointer;
            font-size: 0.9rem;
            color: #333;
        }

        .news-item:hover {
            background: #e8f1f8;
            border-left-color: #ffcc00;
            box-shadow: 0 2px 6px rgba(0, 51, 102, 0.1);
        }

        .news-title {
            font-size: 0.9rem;
            font-weight: 500;
            color: #333;
        }

        /* NEWS TICKER RESPONSIVE */
        @media (max-width: 1200px) {
            .news-ticker-container {
                padding: 8px 12px;
                gap: 10px;
            }

            .news-ticker-label {
                font-size: 0.8rem;
                padding: 5px 10px;
            }

            .news-item {
                padding: 5px 8px;
                font-size: 0.85rem;
            }

            .news-title {
                font-size: 0.85rem;
            }

            .news-ticker-unhide-btn {
                bottom: 15px;
                left: 15px;
                padding: 8px 12px;
                font-size: 0.85rem;
            }

            body {
                padding-bottom: 45px !important;
            }
        }

        @media (max-width: 768px) {
            .news-ticker-container {
                padding: 6px 10px;
                gap: 8px;
            }

            .news-ticker-toggle {
                width: 28px;
                height: 28px;
                font-size: 0.8rem;
            }

            .news-ticker-label {
                font-size: 0.75rem;
                padding: 4px 8px;
            }

            .news-ticker-content {
                width: 100%;
            }

            .news-item {
                padding: 4px 6px;
                font-size: 0.75rem;
            }

            .news-title {
                font-size: 0.75rem;
            }

            .news-ticker-scroll {
                gap: 15px;
            }

            .news-ticker-unhide-btn {
                bottom: 12px;
                left: 12px;
                padding: 7px 10px;
                font-size: 0.8rem;
            }

            body {
                padding-bottom: 38px !important;
            }
        }

        @media (max-width: 576px) {
            .news-ticker-container {
                padding: 5px 8px;
                gap: 6px;
            }

            .news-ticker-toggle {
                width: 26px;
                height: 26px;
                font-size: 0.7rem;
                padding: 4px 6px;
            }

            .news-ticker-label {
                font-size: 0.7rem;
                padding: 3px 6px;
                gap: 4px;
            }

            .news-item {
                padding: 3px 5px;
                font-size: 0.7rem;
            }

            .news-title {
                font-size: 0.7rem;
            }

            .news-ticker-scroll {
                gap: 12px;
            }

            .news-ticker-unhide-btn {
                bottom: 10px;
                left: 10px;
                padding: 6px 8px;
                font-size: 0.75rem;
            }

            .news-ticker-unhide-btn span {
                display: none;
            }

            .news-ticker-unhide-btn i {
                font-size: 0.9rem;
            }

            body {
                padding-bottom: 33px !important;
            }
        }

        @media (max-width: 480px) {
            .news-ticker-container {
                padding: 4px 6px;
                gap: 5px;
            }

            .news-ticker-toggle {
                width: 24px;
                height: 24px;
                font-size: 0.65rem;
                padding: 2px 4px;
            }

            .news-ticker-label {
                font-size: 0.65rem;
                padding: 2px 5px;
            }

            .news-item {
                padding: 2px 4px;
                font-size: 0.65rem;
            }

            .news-title {
                font-size: 0.65rem;
            }

            .news-ticker-unhide-btn {
                bottom: 8px;
                left: 8px;
                padding: 5px 6px;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .news-ticker-unhide-btn.visible {
                display: flex;
            }

            .news-ticker-unhide-btn span {
                display: none;
            }

            body {
                padding-bottom: 28px !important;
            }
        }

        .news-title {
            font-size: 0.65rem;
        }

        body {
            padding-bottom: 30px !important;
        }
        }
    </style>
    @stack('styles')
</head>

<body>

    <div class="fixed-top-container">
        <div class="top-bar">
            <div style="position:relative;display:inline-block;">
                <a href="{{ route('iqac.index') }}" style="position:relative;z-index:10;">IQAC <i class="fas fa-chevron-down" style="font-size:0.7rem;margin-left:4px;"></i></a>
                <div style="position:absolute;top:20px;left:-50px;background:#fff;border:1px solid #ddd;border-radius:4px;display:none;min-width:220px;z-index:100;box-shadow:0 4px 12px rgba(0,0,0,0.15);" class="iqac-dropdown">
                    <a href="{{ route('iqac.index') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;border-bottom:1px solid #eee;"><i class="fas fa-home" style="width:16px;margin-right:5px;"></i>Home</a>
                    <a href="{{ route('iqac.about') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;border-bottom:1px solid #eee;"><i class="fas fa-info-circle" style="width:16px;margin-right:5px;"></i>About</a>
                    <a href="{{ route('iqac.committee') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;border-bottom:1px solid #eee;"><i class="fas fa-users" style="width:16px;margin-right:5px;"></i>Members</a>
                    <a href="{{ route('iqac.documents') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;border-bottom:1px solid #eee;"><i class="fas fa-file-pdf" style="width:16px;margin-right:5px;"></i>AQAR</a>
                    <a href="{{ route('iqac.ssr') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;border-bottom:1px solid #eee;"><i class="fas fa-file-alt" style="width:16px;margin-right:5px;"></i>SSR</a>
                    <a href="{{ route('iqac.iiqa') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;border-bottom:1px solid #eee;"><i class="fas fa-check-circle" style="width:16px;margin-right:5px;"></i>IIQA</a>
                    <a href="{{ route('iqac.minutes') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;border-bottom:1px solid #eee;"><i class="fas fa-clipboard-list" style="width:16px;margin-right:5px;"></i>Minutes</a>
                    <a href="{{ route('iqac.reports') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;border-bottom:1px solid #eee;"><i class="fas fa-chart-bar" style="width:16px;margin-right:5px;"></i>Reports</a>
                    <a href="{{ route('iqac.feedback') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;border-bottom:1px solid #eee;"><i class="fas fa-comment-dots" style="width:16px;margin-right:5px;"></i>Feedback</a>
                    <a href="{{ route('iqac.best-practices') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;border-bottom:1px solid #eee;"><i class="fas fa-star" style="width:16px;margin-right:5px;"></i>Best Practices</a>
                    <a href="{{ route('iqac.aaa') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;border-bottom:1px solid #eee;"><i class="fas fa-graduation-cap" style="width:16px;margin-right:5px;"></i>AAA</a>
                    <a href="{{ route('iqac.po-pso-co') }}" style="display:block;padding:8px 15px;color:#333;text-decoration:none;font-size:0.85rem;"><i class="fas fa-tasks" style="width:16px;margin-right:5px;"></i>PO/PSO/CO</a>
                </div>
            </div>
            <a href="{{ route('pages.nirf') }}">NIRF</a>
            <a href="{{ route('pages.aishe') }}">AISHE</a>
            <a href="{{ route('pages.iedc') }}">IEDC</a>
            <a href="{{ route('pages.ksum') }}">KSUM</a>
            <a href="{{ route('pages.gallery') }}">GALLERY</a>
            @guest
                <a href="{{ route('login.in') }}">LOGIN</a>
            @else
                <div class="top-user" style="position:relative;display:inline-block;">
                    @if(Auth::user()->is_admin)
                        <a href="{{ session('login_from') === 'events' ? url('/admin/events') : url('/admin/faculty-dashboard') }}"
                            class="user-link" style="font-weight:700;color:#003366;text-decoration:none;">
                            <i class="fas fa-shield-alt"></i> ADMIN <i class="fas fa-chevron-down"
                                style="font-size:0.8rem;margin-left:4px;"></i>
                        </a>
                    @else
                        @if(Auth::user()->department)
                            <a href="{{ session('login_from') === 'events' ? route('dept.events.index', Auth::user()->department) : route('dept.faculty.manage', Auth::user()->department) }}"
                                class="user-link" style="font-weight:700;color:#003366;text-decoration:none;">
                                @if(session('login_from') === 'events')
                                    <i class="fas fa-calendar-alt"></i> EVENTS
                                @else
                                    <i class="fas fa-chalkboard-user"></i> FACULTY
                                @endif
                                <i class="fas fa-chevron-down" style="font-size:0.8rem;margin-left:4px;"></i>
                            </a>
                        @else
                            <a href="#" class="user-link" style="font-weight:700;color:#003366;text-decoration:none;">
                                <i class="fas fa-user"></i> USER
                                <i class="fas fa-chevron-down" style="font-size:0.8rem;margin-left:4px;"></i>
                            </a>
                        @endif
                    @endif
                    <div class="user-dropdown"
                        style="position:absolute;right:0;top:28px;background:#fff;border:1px solid #eee;padding:12px;border-radius:6px;display:none;min-width:200px;z-index:60;box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                        <div
                            style="padding:8px 6px;font-weight:600;color:#003366;font-size:0.9rem;border-bottom:1px solid #eee;margin-bottom:10px;">
                            {{ Auth::user()->name }}
                        </div>
                        @if(Auth::user()->department && !Auth::user()->is_admin)
                            @if(session('login_from') === 'events')
                                <a href="{{ route('dept.events.index', Auth::user()->department) }}"
                                    style="display:block;padding:8px 8px;color:#333;text-decoration:none;border-radius:4px;font-size:0.85rem;transition:all 0.2s;">
                                    <i class="fas fa-calendar-alt" style="width:16px;"></i> Manage
                                    @deptDisplay(Auth::user()->department) Events
                                </a>
                            @else
                                <a href="{{ route('dept.faculty.manage', Auth::user()->department) }}"
                                    style="display:block;padding:8px 8px;color:#333;text-decoration:none;border-radius:4px;font-size:0.85rem;transition:all 0.2s;">
                                    <i class="fas fa-briefcase" style="width:16px;"></i> Manage
                                    @deptDisplay(Auth::user()->department) Faculty
                                </a>
                            @endif
                        @endif
                        @if(Auth::user()->is_admin)
                            <a href="{{ url('/admin/faculty-dashboard') }}"
                                style="display:block;padding:8px 8px;color:#333;text-decoration:none;border-radius:4px;font-size:0.85rem;transition:all 0.2s;">
                                <i class="fas fa-users" style="width:16px;"></i> Faculty Management
                            </a>
                            <a href="{{ url('/admin/events') }}"
                                style="display:block;padding:8px 8px;color:#333;text-decoration:none;border-radius:4px;font-size:0.85rem;transition:all 0.2s;">
                                <i class="fas fa-calendar-alt" style="width:16px;"></i> Events Management
                            </a>
                            <a href="{{ url('/admin/news') }}"
                                style="display:block;padding:8px 8px;color:#333;text-decoration:none;border-radius:4px;font-size:0.85rem;transition:all 0.2s;">
                                <i class="fas fa-newspaper" style="width:16px;"></i> News Management
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}"
                            style="margin:10px 0 0;padding-top:10px;border-top:1px solid #eee;">
                            @csrf
                            <button type="submit"
                                style="background:none;border:none;padding:8px 8px;color:#d00;cursor:pointer;font-weight:600;width:100%;text-align:left;font-size:0.85rem;">
                                <i class="fas fa-sign-out-alt" style="width:16px;"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
                <script>
                    (function () {
                        var link = document.querySelector('.top-user .user-link');
                        var menu = document.querySelector('.top-user .user-dropdown');
                        if (link) {
                            link.addEventListener('click', function (e) { e.preventDefault(); menu.style.display = menu.style.display === 'block' ? 'none' : 'block'; });
                            document.addEventListener('click', function (e) { if (!e.target.closest('.top-user')) menu.style.display = 'none'; });
                        }
                    })();
                </script>
            @endguest

        </div>

        <header>
            <div class="logo-container">
                <img src="{{ asset('images/sjc-seal.png') }}" alt="St. Joseph's College logo" class="site-logo" />
                <div class="logo-text">
                    <h1>St. Joseph's College</h1>
                    <span>Moolamattom Autonomous</span>
                </div>
            </div>
            <div class="hamburger-menu" id="hamburgerMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="main-nav" id="mainNav">


                <a href="{{ route('home') }}">Home</a>
                <li class="dropdown">
                    <a href="#">About Us <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown-content mega-dark">
                        <div class="service-item">
                            <a href="{{ route('anthem') }}">
                                <h3>Anthem</h3>
                            </a>
                            <a href="{{ route('anthem') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('founder') }}">
                                <h3>Founder</h3>
                            </a>
                            <a href="{{ route('founder') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('history') }}">
                                <h3>History</h3>
                            </a>
                            <a href="{{ route('history') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('principal') }}">
                                <h3>Principal</h3>
                            </a>
                            <a href="{{ route('principal') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('profile') }}">
                                <h3>Profile</h3>
                            </a>
                            <a href="{{ route('profile') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('vision') }}">
                                <h3>Vision</h3>
                            </a>
                            <a href="{{ route('vision') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('administration') }}">
                                <h3>Administration</h3>
                            </a>
                            <a href="{{ route('administration') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('rules') }}">
                                <h3>Rules</h3>
                            </a>
                            <a href="{{ route('rules') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#">Academics <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown-content">
                        <div class="menu-search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" id="courseSearch" placeholder="Search courses...">
                        </div>

                        <div class="mega-menu-container">
                            <div class="menu-column">
                                <h3 style="color: #2d5016; border-bottom: 2px solid #2d5016; padding-bottom: 8px;"><i class="fas fa-book-open" style="margin-right: 8px;"></i>UNDERGRADUATE PROGRAMS</h3>
                                
                                <h4 style="margin-top: 15px; color: var(--college-blue);">Commerce</h4>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'bcom_fin_tax']) : url('/academics/bcom_fin_tax') }}">
                                    B.Com Finance & Taxation
                                </a>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'bcom_ca']) : url('/academics/bcom_ca') }}">
                                    B.Com Computer Applications
                                </a>

                                <h4 style="margin-top: 12px; color: var(--college-blue);">Business Management</h4>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'bba_aided']) : url('/academics/bba_aided') }}">
                                    BBA (Aided)
                                </a>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'bba_sf']) : url('/academics/bba_sf') }}">
                                    BBA (Self Finance)
                                </a>
                            </div>

                            <div class="menu-column">
                                <h3 style="color: #2d5016; border-bottom: 2px solid #2d5016; padding-bottom: 8px;"><i class="fas fa-book-open" style="margin-right: 8px;"></i>UNDERGRADUATE PROGRAMS</h3>
                                
                                <h4 style="margin-top: 15px; color: var(--college-blue);">Science</h4>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'physics']) : url('/academics/physics') }}">
                                    B.Sc Physics
                                </a>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'chemistry']) : url('/academics/chemistry') }}">
                                    B.Sc Chemistry
                                </a>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'mathematics']) : url('/academics/mathematics') }}">
                                    B.Sc Mathematics
                                </a>

                                <h4 style="margin-top: 12px; color: var(--college-blue);">Arts</h4>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'english']) : url('/academics/english') }}">
                                    B.A English
                                </a>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'economics']) : url('/academics/economics') }}">
                                    B.A Economics
                                </a>
                            </div>

                            <div class="menu-column">
                                <h3 style="color: #2d5016; border-bottom: 2px solid #2d5016; padding-bottom: 8px;"><i class="fas fa-graduation-cap" style="margin-right: 8px;"></i>POSTGRADUATE PROGRAMS</h3>
                                
                                <h4 style="margin-top: 15px; color: var(--college-blue);">Commerce</h4>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'mcom']) : url('/academics/mcom') }}">
                                    M.Com
                                </a>

                                <h4 style="margin-top: 12px; color: var(--college-blue);">Science</h4>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'msc_chemistry']) : url('/academics/msc_chemistry') }}">
                                    M.Sc Chemistry
                                </a>

                                <h4 style="margin-top: 12px; color: var(--college-blue);">Arts & Social Sciences</h4>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'ma_english']) : url('/academics/ma_english') }}">
                                    M.A English
                                </a>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'msw']) : url('/academics/msw') }}">
                                    M.S.W
                                </a>
                            </div>

                            <div class="menu-column">
                                <h3 style="color: #2d5016; border-bottom: 2px solid #2d5016; padding-bottom: 8px;"><i class="fas fa-microscope" style="margin-right: 8px;"></i>INTEGRATED PROGRAMS</h3>
                                <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'datascience']) : url('/academics/datascience') }}" style="margin-top: 15px; display: block;">
                                    Integrated M.Sc Data Science
                                </a>

                                <h3 style="color: #2d5016; border-bottom: 2px solid #2d5016; padding-bottom: 8px; margin-top: 25px;"><i class="fas fa-search-plus" style="margin-right: 8px;"></i>RESEARCH</h3>
                                <a href="{{ route('research.index') }}" style="margin-top: 15px; display: block;">
                                    Research Centre
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#">Department <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown-content mega-dark">
                        <div class="service-item">
                            <a href="{{ route('dept.home', ['dept' => 'commerce']) }}">
                                <h3>Commerce</h3>
                            </a>
                            <a href="{{ route('dept.home', ['dept' => 'commerce']) }}" class="read-more">View Department <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('dept.home', ['dept' => 'managementstudies']) }}">
                                <h3>Management Studies</h3>
                            </a>
                            <a href="{{ route('dept.home', ['dept' => 'managementstudies']) }}" class="read-more">View Department <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('dept.home', ['dept' => 'physics']) }}">
                                <h3>Physics</h3>
                            </a>
                            <a href="{{ route('dept.home', ['dept' => 'physics']) }}" class="read-more">View Department
                                <i class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('dept.home', ['dept' => 'chemistry']) }}">
                                <h3>Chemistry</h3>
                            </a>
                            <a href="{{ route('dept.home', ['dept' => 'chemistry']) }}" class="read-more">View
                                Department <i class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('dept.home', ['dept' => 'mathematics']) }}">
                                <h3>Mathematics</h3>
                            </a>
                            <a href="{{ route('dept.home', ['dept' => 'mathematics']) }}" class="read-more">View
                                Department <i class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('dept.home', ['dept' => 'english']) }}">
                                <h3>English</h3>
                            </a>
                            <a href="{{ route('dept.home', ['dept' => 'english']) }}" class="read-more">View Department
                                <i class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('dept.home', ['dept' => 'economics']) }}">
                                <h3>Economics</h3>
                            </a>
                            <a href="{{ route('dept.home', ['dept' => 'economics']) }}" class="read-more">View
                                Department <i class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('dept.home', ['dept' => 'socialwork']) }}">
                                <h3>Social Work</h3>
                            </a>
                            <a href="{{ route('dept.home', ['dept' => 'socialwork']) }}" class="read-more">View Department <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('dept.home', ['dept' => 'datascience']) }}">
                                <h3>Data Science</h3>
                            </a>
                            <a href="{{ route('dept.home', ['dept' => 'datascience']) }}" class="read-more">View
                                Department <i class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('dept.home', ['dept' => 'orientallanguages']) }}">
                                <h3>Oriental Languages</h3>
                            </a>
                            <a href="{{ route('dept.home', ['dept' => 'orientallanguages']) }}" class="read-more">View
                                Department <i class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('dept.home', ['dept' => 'physicaleducation']) }}">
                                <h3>Physical Education</h3>
                            </a>
                            <a href="{{ route('dept.home', ['dept' => 'physicaleducation']) }}" class="read-more">View
                                Department <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </li>


                <li class="dropdown">
                    <a href="{{ route('campus.facilities.index') }}" class="campus-main-link">Campus</a>
                </li>

                <li class="dropdown student-services">
                    <a href="#">Student Services <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown-content mega-dark">
                        <div class="service-item">
                            <a href="{{ route('student-services.nss') }}">
                                <h3>NSS</h3>
                            </a>
                            <a href="{{ route('student-services.nss') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.ncc') }}">
                                <h3>NCC</h3>
                            </a>
                            <a href="{{ route('student-services.ncc') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.placement') }}">
                                <h3>Placement Cell</h3>
                            </a>
                            <a href="{{ route('student-services.placement') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.mentoring') }}">
                                <h3>Mentoring</h3>
                            </a>
                            <a href="{{ route('student-services.mentoring') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.grc') }}">
                                <h3>GRC</h3>
                            </a>
                            <a href="{{ route('student-services.grc') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.endowments') }}">
                                <h3>Endowments</h3>
                            </a>
                            <a href="{{ route('student-services.endowments') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.clubs') }}">
                                <h3>Clubs</h3>
                            </a>
                            <a href="{{ route('student-services.clubs') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.asap') }}">
                                <h3>ASAP</h3>
                            </a>
                            <a href="{{ route('student-services.asap') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.anti-ragging') }}">
                                <h3>Anti-Ragging</h3>
                            </a>
                            <a href="{{ route('student-services.anti-ragging') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.pta') }}">
                                <h3>PTA</h3>
                            </a>
                            <a href="{{ route('student-services.pta') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.scholarship') }}">
                                <h3>Scholarship</h3>
                            </a>
                            <a href="{{ route('student-services.scholarship') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.sc-st-obc') }}">
                                <h3>SC/ST/OBC Cell</h3>
                            </a>
                            <a href="{{ route('student-services.sc-st-obc') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.students-aid') }}">
                                <h3>Students Aid Fund</h3>
                            </a>
                            <a href="{{ route('student-services.students-aid') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.union') }}">
                                <h3>Union</h3>
                            </a>
                            <a href="{{ route('student-services.union') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.women') }}">
                                <h3>Women Cell</h3>
                            </a>
                            <a href="{{ route('student-services.women') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                        <div class="service-item">
                            <a href="{{ route('student-services.wws') }}">
                                <h3>WWS</h3>
                            </a>
                            <a href="{{ route('student-services.wws') }}" class="read-more">Read More <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </li>

                <a href="{{ route('examination.overview') }}">Examination</a>
                <a href="https://stjosephites.com/apply_online/college_list.php">Admission</a>
            </nav>

            <!-- MOBILE NAVIGATION MENU -->
            <div class="mobile-nav-menu" id="mobileNavMenu">
                <a href="{{ route('home') }}">Home</a>

                <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown(this)">
                    About Us <i class="fas fa-chevron-down"></i>
                </button>
                <div class="mobile-dropdown-content">
                    <a href="{{ route('anthem') }}">Anthem</a>
                    <a href="{{ route('founder') }}">Founder</a>
                    <a href="{{ route('history') }}">History</a>
                    <a href="{{ route('principal') }}">Principal</a>
                    <a href="{{ route('profile') }}">Profile</a>
                    <a href="{{ route('vision') }}">Vision</a>
                    <a href="{{ route('administration') }}">Administration</a>
                    <a href="{{ route('rules') }}">Rules</a>
                </div>

                <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown(this)">
                    Academics <i class="fas fa-chevron-down"></i>
                </button>
                <div class="mobile-dropdown-content">
                    <div style="padding: 10px 40px; font-weight: 700; color: #2d5016; font-size: 0.9rem; border-bottom: 1px solid #ddd; margin-bottom: 5px;">UNDERGRADUATE PROGRAMS</div>
                    
                    <div style="padding: 10px 40px; font-weight: 600; color: #003366; font-size: 0.85rem;">Commerce</div>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'bcom_fin_tax']) : url('/academics/bcom_fin_tax') }}">B.Com Finance & Taxation</a>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'bcom_ca']) : url('/academics/bcom_ca') }}">B.Com Computer Applications</a>

                    <div style="padding: 10px 40px; font-weight: 600; color: #003366; font-size: 0.85rem; margin-top: 5px;">Business Management</div>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'bba_aided']) : url('/academics/bba_aided') }}">BBA (Aided)</a>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'bba_sf']) : url('/academics/bba_sf') }}">BBA (Self Finance)</a>

                    <div style="padding: 10px 40px; font-weight: 600; color: #003366; font-size: 0.85rem; margin-top: 5px;">Science</div>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'physics']) : url('/academics/physics') }}">B.Sc Physics</a>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'chemistry']) : url('/academics/chemistry') }}">B.Sc Chemistry</a>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'mathematics']) : url('/academics/mathematics') }}">B.Sc Mathematics</a>

                    <div style="padding: 10px 40px; font-weight: 600; color: #003366; font-size: 0.85rem; margin-top: 5px;">Arts</div>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'english']) : url('/academics/english') }}">B.A English</a>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'economics']) : url('/academics/economics') }}">B.A Economics</a>

                    <div style="padding: 10px 40px; font-weight: 700; color: #2d5016; font-size: 0.9rem; border-bottom: 1px solid #ddd; margin-top: 10px; margin-bottom: 5px;">POSTGRADUATE PROGRAMS</div>
                    
                    <div style="padding: 10px 40px; font-weight: 600; color: #003366; font-size: 0.85rem;">Commerce</div>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'mcom']) : url('/academics/mcom') }}">M.Com</a>

                    <div style="padding: 10px 40px; font-weight: 600; color: #003366; font-size: 0.85rem; margin-top: 5px;">Science</div>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'msc_chemistry']) : url('/academics/msc_chemistry') }}">M.Sc Chemistry</a>

                    <div style="padding: 10px 40px; font-weight: 600; color: #003366; font-size: 0.85rem; margin-top: 5px;">Arts & Social Sciences</div>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'ma_english']) : url('/academics/ma_english') }}">M.A English</a>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'msw']) : url('/academics/msw') }}">M.S.W</a>

                    <div style="padding: 10px 40px; font-weight: 700; color: #2d5016; font-size: 0.9rem; border-bottom: 1px solid #ddd; margin-top: 10px; margin-bottom: 5px;">INTEGRATED PROGRAMS</div>
                    <a href="{{ Route::has('academics.home') ? route('academics.home', ['course' => 'datascience']) : url('/academics/datascience') }}">Integrated M.Sc Data Science</a>

                    <div style="padding: 10px 40px; font-weight: 700; color: #2d5016; font-size: 0.9rem; border-bottom: 1px solid #ddd; margin-top: 10px; margin-bottom: 5px;">RESEARCH</div>
                    <a href="{{ route('research.index') }}">Research Centre</a>
                </div>

                <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown(this)">
                    Departments <i class="fas fa-chevron-down"></i>
                </button>
                <div class="mobile-dropdown-content">
                    <a href="{{ route('dept.home', ['dept' => 'commerce']) }}">Commerce</a>
                    <a href="{{ route('dept.home', ['dept' => 'managementstudies']) }}">Management Studies</a>
                    <a href="{{ route('dept.home', ['dept' => 'physics']) }}">Physics</a>
                    <a href="{{ route('dept.home', ['dept' => 'chemistry']) }}">Chemistry</a>
                    <a href="{{ route('dept.home', ['dept' => 'mathematics']) }}">Mathematics</a>
                    <a href="{{ route('dept.home', ['dept' => 'datascience']) }}">Data Science</a>
                    <a href="{{ route('dept.home', ['dept' => 'english']) }}">English</a>
                    <a href="{{ route('dept.home', ['dept' => 'economics']) }}">Economics</a>
                    <a href="{{ route('dept.home', ['dept' => 'orientallanguages']) }}">Oriental Languages</a>
                    <a href="{{ route('dept.home', ['dept' => 'physicaleducation']) }}">Physical Education</a>
                    <a href="{{ route('dept.home', ['dept' => 'socialwork']) }}">Social Work</a>
                </div>

                <a href="{{ route('campus.facilities.index') }}">Campus</a>

                <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown(this)">
                    Student Services <i class="fas fa-chevron-down"></i>
                </button>
                <div class="mobile-dropdown-content">
                    <a href="{{ route('student-services.nss') }}">NSS</a>
                    <a href="{{ route('student-services.ncc') }}">NCC</a>
                    <a href="{{ route('student-services.placement') }}">Placement Cell</a>
                    <a href="{{ route('student-services.mentoring') }}">Mentoring</a>
                    <a href="{{ route('student-services.grc') }}">GRC</a>
                    <a href="{{ route('student-services.endowments') }}">Endowments</a>
                    <a href="{{ route('student-services.clubs') }}">Clubs</a>
                    <a href="{{ route('student-services.asap') }}">ASAP</a>
                    <a href="{{ route('student-services.anti-ragging') }}">Anti-Ragging</a>
                    <a href="{{ route('student-services.pta') }}">PTA</a>
                    <a href="{{ route('student-services.scholarship') }}">Scholarship</a>
                    <a href="{{ route('student-services.sc-st-obc') }}">SC/ST/OBC Cell</a>
                    <a href="{{ route('student-services.students-aid') }}">Students Aid Fund</a>
                    <a href="{{ route('student-services.union') }}">Union</a>
                    <a href="{{ route('student-services.women') }}">Women Cell</a>
                    <a href="{{ route('student-services.wws') }}">WWS</a>
                </div>

                <a href="{{ route('examination.overview') }}">Examination</a>
                <a href="https://stjosephites.com/apply_online/college_list.php">Admission</a>
            </div>
        </header>
    </div>

    <!-- HORIZONTAL SCROLLING NEWS TICKER BAR -->
    <div class="news-ticker-container" id="newsTicker">
        <button class="news-ticker-toggle" id="tickerToggle" title="Hide news ticker">
            <i class="fas fa-chevron-up"></i>
        </button>
        <div class="news-ticker-label">
            <i class="fas fa-newspaper"></i> Latest Updates
        </div>
        <div class="news-ticker-content">
            @php
                $latestNews = \App\Models\News::orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get();
            @endphp

            @if($latestNews->count() > 0)
                <div class="news-ticker-scroll">
                    @foreach($latestNews as $news)
                        <a href="{{ route('news.show', $news->id) }}" class="news-item">
                            <span class="news-title">{{ $news->title }}</span>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="news-ticker-scroll">
                    <div class="news-item">No news available</div>
                </div>
            @endif
        </div>
    </div>

    <!-- FLOATING UNHIDE BUTTON -->
    <button class="news-ticker-unhide-btn" id="tickerUnhideBtn" title="Show news ticker">
        <i class="fas fa-newspaper"></i>
        <span>Updates</span>
    </button>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTopBtn" title="Go to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer-info">
            <h4>St. Joseph's College</h4>
            <p>A noble venture of the CMI congregation.</p>
            <p><i class="fas fa-map-marker-alt" style="color:var(--accent-gold)"></i> Arakkulam P.O, Idukki Dt, Kerala –
                685 591</p>
        </div>
        <div class="footer-links">
            <h4>Contact Us</h4>
            <p><i class="fas fa-phone" style="color:var(--accent-gold)"></i> +91 8086800083</p>
            <p><i class="fas fa-envelope" style="color:var(--accent-gold)"></i> sjcmoolamattom@gmail.com</p>
        </div>
        <div class="footer-links">
            <h4>Academics</h4>
            <p><a href="#">Programmes</a></p>
            <p><a href="#">Departments</a></p>
        </div>
        <div class="footer-links">
            <h4>Important</h4>
            <p><a href="#">IQAC</a></p>
            <p><a href="#">NIRF / AISHE</a></p>
        </div>
        <div style="grid-column: 1 / -1; text-align: center; border-top: 1px solid #444; padding-top: 20px;">
            <p>&copy; 2026 St. Joseph's College Moolamattom.</p>
        </div>
        <div style="grid-column: 1 / -1; text-align: center; border-top: 1px solid #444; padding-top: 20px;">
            <p>&trade; Powered by D3.</p>
        </div>
    </footer>



    <script>
        // Hamburger Menu Toggle
        function toggleMobileDropdown(btn) {
            const content = btn.nextElementSibling;
            if (content && content.classList.contains('mobile-dropdown-content')) {
                const isActive = content.classList.contains('active');
                // Close all dropdowns
                document.querySelectorAll('.mobile-dropdown-content.active').forEach(el => {
                    el.classList.remove('active');
                    el.previousElementSibling.style.borderBottomColor = '#eee';
                });
                // Toggle current
                if (!isActive) {
                    content.classList.add('active');
                    btn.style.borderBottomColor = 'var(--college-blue)';
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const hamburger = document.getElementById('hamburgerMenu');
            const mobileMenu = document.getElementById('mobileNavMenu');
            const mainNav = document.getElementById('mainNav');

            if (hamburger && mobileMenu) {
                // Toggle mobile menu
                hamburger.addEventListener('click', function (e) {
                    e.stopPropagation();
                    hamburger.classList.toggle('active');
                    mobileMenu.classList.toggle('active');
                });

                // Close menu when a link is clicked
                mobileMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', function () {
                        hamburger.classList.remove('active');
                        mobileMenu.classList.remove('active');
                    });
                });

                // Close menu when clicking outside
                document.addEventListener('click', function (e) {
                    if (!e.target.closest('header')) {
                        hamburger.classList.remove('active');
                        mobileMenu.classList.remove('active');
                        document.querySelectorAll('.mobile-dropdown-content.active').forEach(el => {
                            el.classList.remove('active');
                        });
                    }
                });
            }
        });

        (function () {
            // 1. Measure Header Height for Page Layout
            function updateHeaderHeight() {
                var h = document.querySelector('.fixed-top-container');
                if (h) document.documentElement.style.setProperty('--header-height', h.offsetHeight + 'px');
            }
            window.addEventListener('load', updateHeaderHeight);
            window.addEventListener('resize', updateHeaderHeight);
            if ('ResizeObserver' in window) {
                var headerEl = document.querySelector('.fixed-top-container');
                if (headerEl) {
                    var ro = new ResizeObserver(updateHeaderHeight);
                    ro.observe(headerEl);
                }
            }

            // 2. Click Logic for ALL Menus
            document.addEventListener('click', function (e) {
                const allDropdowns = document.querySelectorAll('.dropdown');
                const clickedDropdown = e.target.closest('.dropdown');

                // If a dropdown link is clicked (check if we're clicking on the dropdown trigger or its children)
                if (clickedDropdown) {
                    // Check if we are clicking a link inside the dropdown-content (let those work)
                    if (!e.target.closest('.dropdown-content')) {
                        // Check if this is a direct link (like Campus) that has a real href and no dropdown content
                        const dropdownLink = e.target.closest('.dropdown > a');
                        if (dropdownLink && dropdownLink.href && !clickedDropdown.querySelector('.dropdown-content')) {
                            // This is a direct link with no dropdown content, let it navigate
                            return;
                        }

                        // This is the dropdown trigger (the <a> or <i> inside it)
                        e.preventDefault(); // Stop main nav link from navigating

                        // Close others
                        allDropdowns.forEach(dd => {
                            if (dd !== clickedDropdown) dd.classList.remove('is-active');
                        });

                        // Toggle the one we clicked
                        clickedDropdown.classList.toggle('is-active');
                    }
                }
                // If clicking outside the menu, close everything
                else if (!clickedDropdown) {
                    allDropdowns.forEach(dd => dd.classList.remove('is-active'));
                }
            });

            // 3. News Ticker Toggle
            var tickerToggle = document.getElementById('tickerToggle');
            var newsTicker = document.getElementById('newsTicker');
            var tickerUnhideBtn = document.getElementById('tickerUnhideBtn');

            if (tickerToggle && newsTicker && tickerUnhideBtn) {
                // Load saved state from localStorage
                var isHidden = localStorage.getItem('newsTicker_hidden') === 'true';
                if (isHidden) {
                    newsTicker.classList.add('hidden');
                    tickerUnhideBtn.classList.add('visible');
                }

                // Toggle hide/show on ticker button click
                tickerToggle.addEventListener('click', function (e) {
                    e.preventDefault();
                    newsTicker.classList.add('hidden');
                    tickerUnhideBtn.classList.add('visible');
                    localStorage.setItem('newsTicker_hidden', 'true');
                });

                // Show ticker on unhide button click
                tickerUnhideBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    newsTicker.classList.remove('hidden');
                    tickerUnhideBtn.classList.remove('visible');
                    localStorage.setItem('newsTicker_hidden', 'false');
                });
            }

            // Back to Top Button Functionality
            const backToTopBtn = document.getElementById('backToTopBtn');

            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    backToTopBtn.classList.add('show');
                } else {
                    backToTopBtn.classList.remove('show');
                }
            });

            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // IQAC Dropdown Functionality
            const iqacLink = document.querySelector('.top-bar > div > a');
            const iqacDropdown = document.querySelector('.iqac-dropdown');
            
            if (iqacLink && iqacDropdown) {
                iqacLink.addEventListener('click', function(e) {
                    if (window.innerWidth < 768) {
                        e.preventDefault();
                        iqacDropdown.style.display = iqacDropdown.style.display === 'block' ? 'none' : 'block';
                    }
                });

                iqacLink.addEventListener('mouseenter', function() {
                    if (window.innerWidth >= 768) {
                        iqacDropdown.style.display = 'block';
                    }
                });

                document.querySelector('.top-bar > div').addEventListener('mouseleave', function() {
                    if (window.innerWidth >= 768) {
                        iqacDropdown.style.display = 'none';
                    }
                });

                document.addEventListener('click', function(e) {
                    if (!e.target.closest('.top-bar > div')) {
                        iqacDropdown.style.display = 'none';
                    }
                });
            }
        })();
    </script>
</body>

</html>

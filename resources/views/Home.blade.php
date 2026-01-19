@extends('layouts.app')

@push('styles')
    <style>
        /* --- General Reset & Variables --- */
        :root {
            --college-blue: #003366;
            --accent-gold: #ffcc00;
            --light-gray: #f8f9fa;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f4f4; color: #333; line-height: 1.6; }

        /* --- HERO SECTION --- */
        .hero-section {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            background: #000;
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 300px;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                height: 250px;
            }
        }

        .hero-video {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            z-index: 1;
            opacity: 0.7;
        }

        .hero-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 2;
        }

        .hero-content {
            position: relative;
            z-index: 3;
            text-align: center;
            max-width: 900px;
            padding: 20px;
        }

        .hero-content h2 { font-size: 2.8rem; margin-bottom: 10px; text-shadow: 2px 2px 8px rgba(0,0,0,0.7); }

        @media (max-width: 768px) {
            .hero-content h2 {
                font-size: 1.8rem;
                margin-bottom: 8px;
            }

            .hero-content p {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 576px) {
            .hero-content h2 {
                font-size: 1.3rem;
                margin-bottom: 6px;
            }

            .hero-content p {
                font-size: 0.8rem;
            }
        }

        /* Admission Popup */
        .admission-popup {
            display: block;
            position: fixed;
            bottom: 70px !important;
            right: 30px;
            width: 280px;
            background-color: rgba(255, 255, 255, 1);
            border: 2px solid var(--college-blue);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            z-index: 1000;
            text-align: center;
            animation: popIn 0.9s ease-out;
        }

        @keyframes popIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .popup-btn { display: inline-block; margin-top: 15px; background: var(--college-blue); color: white; padding: 8px 20px; border-radius: 20px; font-weight: 600; transition: background 0.3s; }
        .popup-btn:hover { background: #002244; }

        .close-btn {
            position: absolute;
            top: 0px;
            right: 10px;
            font-size: 1.8rem;
            cursor: pointer;
            color: #264170ff;
        }

        /* --- MAIN LAYOUT --- */
        .container {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 30px;
            padding: 40px;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }

        @media (max-width: 1200px) {
            .container {
                grid-template-columns: 1fr 340px;
                gap: 25px;
                padding: 35px;
            }
        }

        @media (max-width: 1024px) {
            .container {
                grid-template-columns: 1fr 300px;
                gap: 20px;
                padding: 30px;
            }
        }

        @media (max-width: 992px) {
            .container {
                grid-template-columns: 1fr;
                padding: 20px;
                gap: 20px;
                box-sizing: border-box;
            }

            .sidebar {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding: 10px;
                gap: 12px;
                box-sizing: border-box;
            }
        }

        .content-area {
            min-width: 0;
        }

        .section-box {
            background: white;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            overflow: hidden;
            box-sizing: border-box;
        }

        @media (max-width: 1200px) {
            .section-box {
                padding: 18px;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 768px) {
            .section-box {
                padding: 15px;
                margin-bottom: 18px;
            }
        }

        @media (max-width: 576px) {
            .section-box {
                padding: 12px;
                margin-bottom: 15px;
                border-radius: 6px;
            }
        }

        .section-title {
            font-size: 1.8rem;
            color: var(--college-blue);
            margin: 40px auto 20px auto;
            font-weight: bold;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            width: 100%;
        }

        .section-title::after {
            content: "";
            width: 60px;
            height: 4px;
            background: var(--accent-gold);
            margin-top: 10px;
            border-radius: 50px;
        }

        @media (max-width: 1200px) {
            .section-title {
                font-size: 1.6rem;
                margin: 35px auto 18px auto;
            }

            .section-title::after {
                width: 55px;
                height: 3px;
                margin-top: 8px;
            }
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 1.5rem;
                margin: 30px auto 15px auto;
            }

            .section-title::after {
                width: 50px;
                height: 3px;
            }
        }

        @media (max-width: 576px) {
            .section-title {
                font-size: 1.3rem;
                margin: 20px auto 12px auto;
            }

            .section-title::after {
                width: 45px;
                height: 2px;
                margin-top: 6px;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 1.15rem;
                margin: 15px auto 10px auto;
            }

            .section-title::after {
                width: 40px;
                height: 2px;
                margin-top: 5px;
            }
        }

        .college-description {
            background: white;
            padding: 35px;
            border-radius: 6px;
            border-left: 5px solid var(--college-blue);
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            max-width: 100%;
            width: 100%;
            box-sizing: border-box;
            overflow: hidden;
        }

        .college-description h2 { color: var(--college-blue); margin-bottom: 15px; font-size: 1.8rem; }
        .college-description p { font-size: 1.05rem; color: #444; line-height: 1.8; text-align: justify; word-wrap: break-word; overflow-wrap: break-word; }

        @media (max-width: 768px) {
            .college-description {
                padding: 25px;
                max-width: 100%;
            }

            .college-description h2 {
                font-size: 1.5rem;
                margin-bottom: 12px;
            }

            .college-description p {
                font-size: 1rem;
                line-height: 1.6;
                text-align: justify;
            }
        }

        @media (max-width: 576px) {
            .college-description {
                padding: 20px;
                border-left-width: 4px;
                margin-bottom: 20px;
                max-width: 100%;
            }

            .college-description h2 {
                font-size: 1.3rem;
                margin-bottom: 10px;
            }

            .college-description p {
                font-size: 0.95rem;
                line-height: 1.5;
            }
        }

        .college-features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            color: var(--college-blue);
        }

        @media (max-width: 1024px) {
            .college-features {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .college-features {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .feature-item {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 576px) {
            .college-features {
                gap: 18px;
            }

            .feature-item {
                font-size: 0.9rem;
                padding: 10px 0;
            }
        }

        .narrow-width-container {
            max-width: 900px;
            margin: 0 auto;
            width: 100%;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden;
        }

        @media (max-width: 576px) {
            .narrow-width-container {
                padding: 0;
            }
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        @media (max-width: 768px) {
            .news-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 15px;
            }
        }

        /* Override for photo scroller news section on mobile */
        @media (max-width: 576px) {
            #news-photo-section {
                padding: 8px;
                overflow-x: auto;
                overflow-y: hidden;
                scroll-behavior: smooth;
                max-width: 100%;
                display: flex;
                align-items: stretch;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                scrollbar-color: #ccc #f0f0f0;
            }

            #news-photo-section::-webkit-scrollbar {
                height: 6px;
            }

            #news-photo-section::-webkit-scrollbar-track {
                background: #f0f0f0;
                border-radius: 3px;
            }

            #news-photo-section::-webkit-scrollbar-thumb {
                background: #ccc;
                border-radius: 3px;
            }

            #news-photo-section::-webkit-scrollbar-thumb:hover {
                background: #aaa;
            }

            #news-photo-track {
                animation: none !important;
                width: max-content;
                display: flex;
                gap: 12px;
                overflow: visible;
                will-change: auto;
            }

            #news-photo-track:hover {
                animation-play-state: auto;
            }

            #news-photo-section .small-photo-thumb {
                width: calc(100vw - 40px);
                flex-shrink: 0;
                max-width: calc(100vw - 40px);
                margin: 0;
            }

            #news-photo-section .small-photo-thumb img {
                height: 220px;
            }
        }

        @media (max-width: 480px) {
            #news-photo-section {
                padding: 6px;
                overflow-x: auto;
                overflow-y: hidden;
                -webkit-overflow-scrolling: touch;
            }

            #news-photo-track {
                animation: none !important;
                width: max-content;
                display: flex;
                gap: 10px;
                overflow: visible;
            }

            #news-photo-section .small-photo-thumb {
                width: calc(100vw - 32px);
                flex-shrink: 0;
                max-width: calc(100vw - 32px);
                margin: 0;
            }

            #news-photo-section .small-photo-thumb img {
                height: 180px;
            }
        }

        /* Override for photo scroller upcoming events section on mobile */
        @media (max-width: 576px) {
            #home-upcoming-photo-section {
                padding: 8px;
                overflow-x: auto !important;
                overflow-y: hidden !important;
                overflow: auto !important;
                scroll-behavior: smooth;
                max-width: 100%;
                display: flex;
                align-items: stretch;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                scrollbar-color: #ccc #f0f0f0;
            }

            #home-upcoming-photo-section::-webkit-scrollbar {
                height: 6px;
            }

            #home-upcoming-photo-section::-webkit-scrollbar-track {
                background: #f0f0f0;
                border-radius: 3px;
            }

            #home-upcoming-photo-section::-webkit-scrollbar-thumb {
                background: #ccc;
                border-radius: 3px;
            }

            #home-upcoming-photo-section::-webkit-scrollbar-thumb:hover {
                background: #aaa;
            }

            #home-upcoming-photo-track {
                animation: none !important;
                width: max-content;
                display: flex;
                gap: 12px;
                overflow: visible;
                will-change: auto;
            }

            #home-upcoming-photo-track:hover {
                animation-play-state: auto;
            }

            #home-upcoming-photo-section .small-photo-thumb {
                width: 160px;
                flex-shrink: 0;
                max-width: 160px;
                margin: 0;
            }

            #home-upcoming-photo-section .small-photo-thumb img {
                height: 160px;
            }
        }

        @media (max-width: 480px) {
            #home-upcoming-photo-section {
                padding: 6px;
                overflow-x: auto !important;
                overflow-y: hidden !important;
                overflow: auto !important;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                scrollbar-color: #ccc #f0f0f0;
            }

            #home-upcoming-photo-section::-webkit-scrollbar {
                height: 6px;
            }

            #home-upcoming-photo-section::-webkit-scrollbar-track {
                background: #f0f0f0;
                border-radius: 3px;
            }

            #home-upcoming-photo-section::-webkit-scrollbar-thumb {
                background: #ccc;
                border-radius: 3px;
            }

            #home-upcoming-photo-section::-webkit-scrollbar-thumb:hover {
                background: #aaa;
            }

            #home-upcoming-photo-track {
                animation: none !important;
                width: max-content;
                display: flex;
                gap: 10px;
                overflow: visible;
            }

            #home-upcoming-photo-section .small-photo-thumb {
                width: 140px;
                flex-shrink: 0;
                max-width: 140px;
                margin: 0;
            }

            #home-upcoming-photo-section .small-photo-thumb img {
                height: 140px;
            }
        }

        @media (max-width: 576px) {
            .news-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
        }
        .news-card {
            border: 1px solid #eee;
            border-radius: 8px; overflow: hidden;
            transition: 0.3s;
            height: 470px;
         }
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
             }
        .news-card img {
            width: 100%;
            height: 320px;
            object-fit: cover;
        }
        .news-card-body {
            padding: 15px;
        }

        @media (max-width: 768px) {
            .news-card {
                height: auto;
            }

            .news-card img {
                height: 250px;
            }

            .news-card-body {
                padding: 12px;
            }
        }

        @media (max-width: 576px) {
            .news-card img {
                height: 200px;
            }

            .news-card-body {
                padding: 10px;
            }
        }
        .news-date-badge {
            background: var(--light-gray);
            color: #666; font-size: 0.75rem;
            padding: 3px 8px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 10px;
            font-weight: 600;
        }
        .news-card h4 {
            font-size: 1rem;
            color: var(--college-blue);
            line-height: 2;
            margin-bottom: 8px;
        }
        .news-card p {
            font-size: 0.85rem;
            color: #555;
        }

        .cal-box {
            background: #fff;
            border: 1px solid #ddd;
            min-width: 55px;
            height: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .cal-day { font-size: 1.3rem; font-weight: 800; color: #333; line-height: 1; }
        .cal-month { font-size: 0.7rem; font-weight: 700; color: var(--college-blue); text-transform: uppercase; }

        .event-info h5 { font-size: 0.9rem; color: #333; margin-bottom: 4px; font-weight: 700; }
        .event-info small { color: var(--college-blue); font-weight: 600; font-size: 0.75rem; display: block; }

        .narrow-section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            width: 100%;
        }

        @media (max-width: 1200px) {
            .narrow-section {
                padding: 0 35px;
            }
        }

        @media (max-width: 1024px) {
            .narrow-section {
                padding: 0 25px;
            }
        }

        @media (max-width: 768px) {
            .narrow-section {
                padding: 0 20px;
            }
        }

        @media (max-width: 576px) {
            .narrow-section {
                padding: 0 10px;
            }
        }

        @media (max-width: 480px) {
            .narrow-section {
                padding: 0 8px;
            }
        }

        .bottom-track-container {
            overflow: hidden;
            white-space: nowrap;
            padding: 20px 0;
            position: relative;
            -webkit-mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
            mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
        }

        .bottom-track { display: inline-block; animation: scrollContinuous 50s linear infinite; will-change: transform; }
        @keyframes scrollContinuous {
            0% { transform: translateX(0); }
            50% { transform: translateX(-50%); }
            50.01% { transform: translateX(0); }
            100% { transform: translateX(0); }
        }

        .bottom-logo { height: 40px; margin: 0 40px; vertical-align: middle; filter: grayscale(100%); opacity: 0.7; transition: all 0.3s; }
        .bottom-logo:hover { filter: grayscale(0%); opacity: 1; transform: scale(1.1); }

        .testimonial-split-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 25px; }

        @media (max-width: 1024px) {
            .testimonial-split-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .testimonial-split-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .testimonial-split-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
        }

        @media (max-width: 480px) {
            .testimonial-split-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }
        }

        .testi-column { background: #fff; padding: 20px; border: 1px solid #eee; border-radius: 8px; min-height: 250px; display: flex; flex-direction: column; }

        @media (max-width: 768px) {
            .testi-column {
                padding: 15px;
                min-height: auto;
            }
        }

        @media (max-width: 576px) {
            .testi-column {
                padding: 12px;
                border-radius: 6px;
            }
        }

        @media (max-width: 480px) {
            .testi-column {
                padding: 10px;
                border-radius: 5px;
            }
        }

        .testi-header { margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center; }
        .testi-header h3 { font-size: 1.1rem; color: var(--college-blue); border-left: 4px solid var(--accent-gold); padding-left: 10px; }

        @media (max-width: 768px) {
            .testi-header h3 {
                font-size: 1rem;
                padding-left: 8px;
            }
        }

        @media (max-width: 576px) {
            .testi-header h3 {
                font-size: 0.95rem;
                border-left-width: 3px;
            }
        }

        @media (max-width: 480px) {
            .testi-header h3 {
                font-size: 0.9rem;
                border-left-width: 2px;
            }
        }

        .carousel-wrapper { position: relative; overflow: hidden; flex-grow: 1; }
        .testi-slide { display: none; animation: fadeEffect 0.6s; }
        .testi-slide.active { display: block; }
        @keyframes fadeEffect { from {opacity: 0.4;} to {opacity: 1;} }

        .testi-content { background: #fcfcfc; padding: 20px; border-radius: 6px; border: 1px solid #f0f0f0; position: relative; }

        @media (max-width: 768px) {
            .testi-content {
                padding: 15px;
            }
        }

        @media (max-width: 576px) {
            .testi-content {
                padding: 12px;
                border-radius: 5px;
            }
        }

        @media (max-width: 480px) {
            .testi-content {
                padding: 10px;
                border-radius: 4px;
            }
        }

        .testi-quote-icon { font-size: 1.5rem; color: #eee; position: absolute; top: 15px; right: 15px; }

        @media (max-width: 576px) {
            .testi-quote-icon {
                font-size: 1.2rem;
                top: 10px;
                right: 10px;
            }
        }

        .testi-text { font-style: italic; font-size: 0.95rem; color: #555; margin-bottom: 20px; line-height: 1.6; min-height: 80px; }

        @media (max-width: 768px) {
            .testi-text {
                font-size: 0.9rem;
                margin-bottom: 15px;
                min-height: auto;
            }
        }

        @media (max-width: 576px) {
            .testi-text {
                font-size: 0.85rem;
                margin-bottom: 12px;
            }
        }

        @media (max-width: 480px) {
            .testi-text {
                font-size: 0.8rem;
                margin-bottom: 10px;
                line-height: 1.4;
            }
        }

        .testi-profile { display: flex; align-items: center; gap: 12px; border-top: 1px solid #eee; padding-top: 15px; }

        @media (max-width: 576px) {
            .testi-profile {
                gap: 10px;
                padding-top: 12px;
            }
        }

        @media (max-width: 480px) {
            .testi-profile {
                gap: 8px;
                padding-top: 10px;
            }
        }

        /* --- SIDEBAR SCROLLING --- */
        .events-scroll-container { height: 400px; overflow: hidden; padding: 10px 0; position: relative; background: #fff; border: 1px solid #ddd; border-radius: 8px; width: 100%; box-sizing: border-box; }
        .events-scroll-track { animation: scrollTextEvents 50s linear infinite; display: block; width: 100%; will-change: transform; }
        .events-scroll-track:hover { animation-play-state: paused; }
        .event-scroll-item { padding: 15px 10px; border-bottom: 1px solid #eee; display: flex; flex-direction: column; gap: 5px; width: 100%; flex-shrink: 0; }
        .event-scroll-date { font-weight: 700; color: var(--college-blue); font-size: 0.85rem; word-wrap: break-word; }
        .event-scroll-title { color: #333; font-weight: 600; font-size: 0.9rem; line-height: 1.4; word-wrap: break-word; }
        @keyframes scrollTextEvents {
            0% { transform: translateY(0); }
            100% { transform: translateY(-100%); }
        }

        @media (max-width: 1200px) {
            .events-scroll-container {
                height: 380px;
            }
        }

        @media (max-width: 992px) {
            .events-scroll-container {
                height: 350px;
                padding: 10px 0;
            }

            .event-scroll-item {
                padding: 14px 10px;
            }

            .event-scroll-date {
                font-size: 0.82rem;
            }

            .event-scroll-title {
                font-size: 0.88rem;
            }
        }

        @media (max-width: 768px) {
            .events-scroll-container {
                height: 300px;
                overflow: hidden;
                padding: 8px 0;
            }

            .event-scroll-item {
                padding: 12px 8px;
            }

            .event-scroll-date {
                font-size: 0.8rem;
            }

            .event-scroll-title {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .events-scroll-container {
                height: 250px;
                overflow-y: auto !important;
                overflow-x: hidden !important;
                padding: 10px 8px;
                border: 1px solid #ddd;
                background: #fff;
                border-radius: 8px;
                scroll-behavior: smooth;
                max-width: 100%;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                scrollbar-color: #ccc #f0f0f0;
            }

            .events-scroll-container::-webkit-scrollbar {
                width: 6px;
            }

            .events-scroll-container::-webkit-scrollbar-track {
                background: #f0f0f0;
                border-radius: 3px;
            }

            .events-scroll-container::-webkit-scrollbar-thumb {
                background: #ccc;
                border-radius: 3px;
            }

            .events-scroll-container::-webkit-scrollbar-thumb:hover {
                background: #aaa;
            }

            .events-scroll-track {
                animation: scrollTextEvents 50s linear infinite;
                display: block;
                width: 100%;
                will-change: transform;
            }

            .events-scroll-track:hover {
                animation-play-state: paused;
            }

            .event-scroll-item {
                padding: 15px 10px;
                border-bottom: 1px solid #eee;
                display: flex;
                flex-direction: column;
                gap: 5px;
                width: 100%;
                flex-shrink: 0;
                min-height: auto;
                box-sizing: border-box;
                margin: 0;
            }

            .event-scroll-date {
                font-size: 0.8rem;
                font-weight: 700;
                color: var(--college-blue);
            }

            .event-scroll-title {
                font-size: 0.85rem;
                font-weight: 600;
                color: #333;
                word-wrap: break-word;
            }
        }

        @media (max-width: 480px) {
            .events-scroll-container {
                height: 200px;
                overflow-y: auto !important;
                overflow-x: hidden !important;
                padding: 8px 6px;
                border: 1px solid #ddd;
                background: #fff;
                border-radius: 8px;
                scroll-behavior: smooth;
                max-width: 100%;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                scrollbar-color: #ccc #f0f0f0;
            }

            .events-scroll-container::-webkit-scrollbar {
                width: 6px;
            }

            .events-scroll-container::-webkit-scrollbar-track {
                background: #f0f0f0;
                border-radius: 3px;
            }

            .events-scroll-container::-webkit-scrollbar-thumb {
                background: #ccc;
                border-radius: 3px;
            }

            .events-scroll-container::-webkit-scrollbar-thumb:hover {
                background: #aaa;
            }

            .events-scroll-track {
                animation: scrollTextEvents 50s linear infinite;
                display: block;
                width: 100%;
                will-change: transform;
            }

            .event-scroll-item {
                padding: 12px 8px;
                border-bottom: 1px solid #eee;
                display: flex;
                flex-direction: column;
                gap: 5px;
                width: 100%;
                flex-shrink: 0;
                min-height: auto;
                box-sizing: border-box;
                margin: 0;
            }

            .event-scroll-date {
                font-size: 0.75rem;
            }

            .event-scroll-title {
                font-size: 0.8rem;
                line-height: 1.3;
            }
        }

        /* --- HORIZONTAL PHOTO SCROLLER --- */
        .small-photo-scroller { overflow: hidden; padding: 12px; min-height: auto; display: flex; align-items: center; width: 100%; max-width: 100%; box-sizing: border-box; }
        .small-photo-track { display: flex; gap: 15px; width: max-content; animation: scrollHorizontal 60s linear infinite; overflow: visible; will-change: transform; padding-right: 15px; }
        .small-photo-track:hover { animation-play-state: paused; }
        .small-photo-thumb {
            width: 280px;
            flex-shrink: 0;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            border: 1px solid #ddd;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background: white;
            max-width: 280px;
            box-sizing: border-box;
        }
        .small-photo-thumb img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            display: block;
        }
        .small-photo-caption {
            background: white;
            color: #333;
            padding: 12px;
            text-align: left;
            line-height: 1.4;
            border-top: 1px solid #eee;
            display: flex;
            flex-direction: column;
            gap: 6px;
            min-height: 70px;
        }
        .photo-title {
            font-weight: 600;
            color: var(--college-blue);
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            font-size: 0.95rem;
        }
        .photo-description {
            font-size: 0.8rem;
            color: #666;
            line-height: 1.3;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        @keyframes scrollHorizontal {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        @media (max-width: 1200px) {
            .small-photo-thumb {
                width: 240px;
                max-width: 240px;
            }
            .small-photo-thumb img {
                height: 240px;
            }
            .small-photo-scroller {
                padding: 10px;
            }
        }

        @media (max-width: 992px) {
            .small-photo-thumb {
                width: 220px;
                max-width: 220px;
            }
            .small-photo-thumb img {
                height: 220px;
            }
            .small-photo-caption {
                padding: 10px;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 768px) {
            .small-photo-thumb {
                width: 200px;
                max-width: 200px;
            }
            .small-photo-thumb img {
                height: 200px;
            }
            .small-photo-scroller {
                padding: 10px;
            }
            .small-photo-caption {
                padding: 8px;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .small-photo-scroller {
                padding: 8px;
                overflow-x: auto;
                overflow-y: hidden;
                scroll-behavior: smooth;
                max-width: 100%;
                display: flex;
                align-items: stretch;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                scrollbar-color: #ccc #f0f0f0;
            }

            .small-photo-scroller::-webkit-scrollbar {
                height: 6px;
            }

            .small-photo-scroller::-webkit-scrollbar-track {
                background: #f0f0f0;
                border-radius: 3px;
            }

            .small-photo-scroller::-webkit-scrollbar-thumb {
                background: #ccc;
                border-radius: 3px;
            }

            .small-photo-scroller::-webkit-scrollbar-thumb:hover {
                background: #aaa;
            }

            .small-photo-track {
                animation: none !important;
                width: max-content;
                display: flex;
                gap: 12px;
                overflow: visible;
                will-change: auto;
            }

            .small-photo-track:hover {
                animation-play-state: auto;
            }

            .small-photo-thumb {
                width: calc(100vw - 40px);
                flex-shrink: 0;
                max-width: calc(100vw - 40px);
                margin: 0;
            }

            .small-photo-thumb img {
                height: 220px;
            }

            .small-photo-caption {
                font-size: 0.85rem;
                padding: 10px;
                min-height: auto;
            }

            .photo-title {
                font-size: 0.9rem;
                -webkit-line-clamp: 2;
            }

            .photo-description {
                font-size: 0.75rem;
                -webkit-line-clamp: 1;
            }
        }

        @media (max-width: 480px) {
            .small-photo-scroller {
                padding: 6px;
                overflow-x: auto;
                overflow-y: hidden;
                -webkit-overflow-scrolling: touch;
            }

            .small-photo-track {
                animation: none !important;
                width: max-content;
                display: flex;
                gap: 10px;
                overflow: visible;
            }

            .small-photo-thumb {
                width: calc(100vw - 32px);
                flex-shrink: 0;
                max-width: calc(100vw - 32px);
                margin: 0;
            }

            .small-photo-thumb img {
                height: 180px;
            }

            .small-photo-caption {
                font-size: 0.75rem;
                padding: 8px;
                min-height: 50px;
            }

            .photo-title {
                font-size: 0.85rem;
                -webkit-line-clamp: 2;
            }

            .photo-description {
                font-size: 0.7rem;
                -webkit-line-clamp: 1;
            }
        }

        .testi-img { width: 50px; height: 50px; border-radius: 50%; object-fit: cover; border: 2px solid var(--college-blue); }

        @media (max-width: 768px) {
            .testi-img {
                width: 45px;
                height: 45px;
                border-width: 2px;
            }
        }

        @media (max-width: 576px) {
            .testi-img {
                width: 40px;
                height: 40px;
                border-width: 1.5px;
            }
        }

        @media (max-width: 480px) {
            .testi-img {
                width: 35px;
                height: 35px;
                border-width: 1px;
            }
        }

        .testi-info h5 { font-size: 0.95rem; color: var(--college-blue); margin-bottom: 2px; }
        .testi-info span { font-size: 0.8rem; color: #888; display: block; }

        @media (max-width: 768px) {
            .testi-info h5 {
                font-size: 0.9rem;
            }

            .testi-info span {
                font-size: 0.75rem;
            }
        }

        @media (max-width: 576px) {
            .testi-info h5 {
                font-size: 0.85rem;
            }

            .testi-info span {
                font-size: 0.7rem;
            }
        }

        @media (max-width: 480px) {
            .testi-info h5 {
                font-size: 0.8rem;
            }

            .testi-info span {
                font-size: 0.65rem;
            }
        }

        .slider-controls { display: flex; gap: 10px; }
        .control-btn { background: var(--college-blue); color: white; border: none; width: 30px; height: 30px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background 0.3s; }
        .control-btn:hover { background: var(--accent-gold); }

        @media (max-width: 768px) {
            .control-btn {
                width: 28px;
                height: 28px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .control-btn {
                width: 26px;
                height: 26px;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .control-btn {
                width: 24px;
                height: 24px;
                font-size: 0.8rem;
            }
        }

        .read-more-btn {
            color: var(--college-blue);
            font-size: 0.9rem;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            padding: 8px 15px;
            transition: all 0.3s ease;
        }
        .read-more-btn:hover {
            text-decoration: underline;
            color: #002244;
        }

        @media (max-width: 768px) {
            .read-more-btn {
                font-size: 0.85rem;
                padding: 6px 12px;
            }
        }

        @media (max-width: 576px) {
            .read-more-btn {
                font-size: 0.8rem;
                padding: 5px 10px;
            }
        }

        @media (max-width: 480px) {
            .read-more-btn {
                font-size: 0.75rem;
                padding: 4px 8px;
            }
        }
        /* Container for the one-row highlights */
        .highlights-scroll-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
        }

        /* The actual scrolling row */
        .highlights-row {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            gap: 15px;
            padding: 5px;
            flex: 1;
            /* Hide scrollbar for Chrome, Safari and Opera */
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        .highlights-row::-webkit-scrollbar {
            display: none;
        }

        /* Individual Highlight Card */
        .highlight-card {
            min-width: 180px;
            max-width: 180px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .highlight-card:hover {
            transform: translateY(-5px);
            border-color: var(--college-blue);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .highlight-card img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .highlight-card p {
            font-size: 0.8rem;
            font-weight: 600;
            color: #333;
            line-height: 1.3;
        }

        @media (max-width: 768px) {
            .highlights-scroll-wrapper {
                gap: 10px;
                padding: 8px 0;
            }

            .highlight-card {
                min-width: 150px;
                max-width: 150px;
                padding: 12px;
            }

            .highlight-card img {
                width: 60px;
                height: 60px;
                margin-bottom: 8px;
            }

            .highlight-card p {
                font-size: 0.75rem;
            }
        }

        @media (max-width: 576px) {
            .highlights-scroll-wrapper {
                gap: 8px;
            }

            .highlight-card {
                min-width: 130px;
                max-width: 130px;
                padding: 10px;
            }

            .highlight-card img {
                width: 50px;
                height: 50px;
                margin-bottom: 6px;
            }

            .highlight-card p {
                font-size: 0.7rem;
            }
        }

        /* Scroll Buttons */
        .scroll-btn {
            background: var(--college-blue);
            color: white;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .scroll-btn:hover {
            background: #002244;
            transform: scale(1.1);
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .btn-left { }
        .btn-right { }

        .scroll-btn:hover {
            background: #002244;
        }
    </style>
@endpush

@section('content')

    <section class="hero-section">
        <video autoplay muted loop playsinline class="hero-video">
            <source src="https://stjosephscollegemoolamattom.ac.in/wp-content/uploads/2024/05/college_banner.mp4" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h2>Welcome to St. Joseph's College Moolamattom</h2>
            <p>An Institution Managed by CMI Fathers</p>
        </div>
    </section>

    <div class="container">
        <main class="content-area">
            <section class="college-description">
                <h2>St. Joseph's College Moolamattom</h2>
                <p>
                    Established in 1981, St. Joseph's College, Moolamattom, is a premier autonomous institution of higher education managed by the CMI Congregation.
                    Nestled in the serene greenery of Arakkulam, our college is dedicated to providing holistic education...
                </p>
                <div class="college-features">
                    <div class="feature-item"><i class="fas fa-university"></i> Autonomous Status</div>
                    <div class="feature-item"><i class="fas fa-award"></i> NAAC Accredited</div>
                    <div class="feature-item"><i class="fas fa-leaf"></i> Eco-Friendly Campus</div>
                </div>
            </section>

           <div class="narrow-width-container">
            <section class="section-box">
                <div class="section-title">Upcoming Events</div>
                <div class="small-photo-scroller" id="home-upcoming-photo-section">
                    <div class="small-photo-track" id="home-upcoming-photo-track"></div>
                </div>
                 <div style="text-align:center; padding: 15px;">
                    <a  class="read-more-btn">________</a>
                </div>
            </section>
        </div>
        </main>

        <aside class="sidebar">
            <div class="section-box" style="padding: 0;">
                <div class="section-title" style="margin: 20px 0; font-size: 1.2rem;">Upcoming Events</div>
                <div class="events-scroll-container">
                    <div class="events-scroll-track" id="sidebar-events-text-track">
                        </div>
                </div>
                <div style="text-align:center; padding: 15px;">
                    <a class="read-more-btn">________</a>
                </div>
            </div>
        </aside>
    </div>

    <div class="narrow-section">
        <div class="section-title">SJC News</div>
        <section class="section-box">
            <div class="small-photo-scroller" id="news-photo-section">
                <div class="small-photo-track" id="news-photo-track"></div>
            </div>
            <div style="text-align:center; padding: 15px;">
                <a href="{{ route('news.public.index') }}" class="read-more-btn">View All News</a>
            </div>
        </section>
    </div>

    <div class="narrow-section">
        <div class="section-title">Our Top Recruiters</div>
        <section class="section-box">
            <div class="bottom-track-container">
                <div class="bottom-track">
                    <img src="{{ asset('images/companies/tcs-logo.svg') }}" class="bottom-logo" alt="TCS">
                    <img src="{{ asset('images/companies/infosys-logo.svg') }}" class="bottom-logo" alt="Infosys">
                    <img src="{{ asset('images/companies/wipro-logo.svg') }}" class="bottom-logo" alt="Wipro">
                    <img src="{{ asset('images/companies/cognizant-logo.svg') }}" class="bottom-logo" alt="Cognizant">
                    <img src="{{ asset('images/companies/ust-logo.svg') }}" class="bottom-logo" alt="UST Global">
                    <img src="{{ asset('images/companies/tcs-logo.svg') }}" class="bottom-logo" alt="TCS">
                    <img src="{{ asset('images/companies/infosys-logo.svg') }}" class="bottom-logo" alt="Infosys">
                    <img src="{{ asset('images/companies/wipro-logo.svg') }}" class="bottom-logo" alt="Wipro">
                    <img src="{{ asset('images/companies/cognizant-logo.svg') }}" class="bottom-logo" alt="Cognizant">
                    <img src="{{ asset('images/companies/ust-logo.svg') }}" class="bottom-logo" alt="UST Global">
                </div>
            </div>
        </section>
    </div>

    <div class="narrow-section">
        <div class="section-title">Our Collaborations</div>
        <section class="section-box">
            <div class="bottom-track-container">
                <div class="bottom-track">
                    <img src="{{ asset('images/companies/tcs-logo.svg') }}" class="bottom-logo" alt="TCS">
                    <img src="{{ asset('images/companies/infosys-logo.svg') }}" class="bottom-logo" alt="Infosys">
                    <img src="{{ asset('images/companies/wipro-logo.svg') }}" class="bottom-logo" alt="Wipro">
                    <img src="{{ asset('images/companies/cognizant-logo.svg') }}" class="bottom-logo" alt="Cognizant">
                    <img src="{{ asset('images/companies/ust-logo.svg') }}" class="bottom-logo" alt="UST Global">
                    <img src="{{ asset('images/companies/tcs-logo.svg') }}" class="bottom-logo" alt="TCS">
                    <img src="{{ asset('images/companies/infosys-logo.svg') }}" class="bottom-logo" alt="Infosys">
                    <img src="{{ asset('images/companies/wipro-logo.svg') }}" class="bottom-logo" alt="Wipro">
                    <img src="{{ asset('images/companies/cognizant-logo.svg') }}" class="bottom-logo" alt="Cognizant">
                    <img src="{{ asset('images/companies/ust-logo.svg') }}" class="bottom-logo" alt="UST Global">
                </div>
            </div>
        </section>
    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="narrow-section">
        <div class="section-title">Institutional Highlights</div>
        <section class="section-box">
                <div class="highlights-scroll-wrapper">
                    <button class="scroll-btn btn-left" onclick="scrollHighlights(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <div class="highlights-row" id="highlightsRow">
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/naac-logo.svg') }}" alt="NAAC">
                            <p>A++ Grade by NAAC</p>
                        </div>
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/nirf-logo.svg') }}" alt="NIRF">
                            <p>NIRF 2025: 34th Rank</p>
                        </div>
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/unsdg-logo.svg') }}" alt="UNSDG">
                            <p>UNSDG Hub</p>
                        </div>
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/acbsp-logo.svg') }}" alt="ACBSP">
                            <p>Internationally Accredited ACBSP</p>
                        </div>
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/green-campus-logo.svg') }}" alt="Green Campus">
                            <p>Green Campus Gold Rating</p>
                        </div>
                        <div class="highlight-card">
                            <img src="{{ asset('images/badges/dbt-logo.svg') }}" alt="DBT Star">
                            <p>DBT STAR College</p>
                        </div>
                         <div class="highlight-card">
                            <img src="{{ asset('images/badges/dbt-logo.svg') }}" alt="DBT Star">
                            <p>DBT STAR College</p>
                        </div>
                            <div class="highlight-card">
                                <img src="{{ asset('images/badges/dbt-logo.svg') }}" alt="DBT Star">
                                <p>DBT STAR College</p>
                            </div>
                    </div>

                    <button class="scroll-btn btn-right" onclick="scrollHighlights(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </section>
        </div>

    <div class="narrow-section">
        <div class="testimonial-split-grid">
            <div class="testi-column">
                <div class="testi-header">
                    <h3>Alumni Voices</h3>
                    <div class="slider-controls">
                        <button class="control-btn" onclick="changeSlide('alumni', -1)"><i class="fas fa-chevron-left"></i></button>
                        <button class="control-btn" onclick="changeSlide('alumni', 1)"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
                <div class="carousel-wrapper" id="alumni-carousel">
                    <div class="testi-slide active">
                        <div class="testi-content">
                            <i class="fas fa-quote-right testi-quote-icon"></i>
                            <p class="testi-text">"The faculty at St. Joseph's molded my career. The Placement Cell provided excellent training."</p>
                            <div class="testi-profile">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="testi-img" alt="Alumni">
                                <div class="testi-info"><h5>Anjali Menon</h5><span>B.Com</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="testi-slide">
                        <div class="testi-content">
                            <i class="fas fa-quote-right testi-quote-icon"></i>
                            <p class="testi-text">"Outstanding education and mentorship. The college prepared me perfectly for my career in tech."</p>
                            <div class="testi-profile">
                                <img src="https://randomuser.me/api/portraits/women/32.jpg" class="testi-img" alt="Alumni">
                                <div class="testi-info"><h5>Priya Sharma</h5><span>B.Tech CS</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="testi-slide">
                        <div class="testi-content">
                            <i class="fas fa-quote-right testi-quote-icon"></i>
                            <p class="testi-text">"Best decision to study here. The college values holistic development of students."</p>
                            <div class="testi-profile">
                                <img src="https://randomuser.me/api/portraits/men/45.jpg" class="testi-img" alt="Alumni">
                                <div class="testi-info"><h5>Arjun Kumar</h5><span>M.Tech</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testi-column">
                <div class="testi-header">
                    <h3>Student Stories</h3>
                    <div class="slider-controls">
                        <button class="control-btn" onclick="changeSlide('student', -1)"><i class="fas fa-chevron-left"></i></button>
                        <button class="control-btn" onclick="changeSlide('student', 1)"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
                <div class="carousel-wrapper" id="student-carousel">
                    <div class="testi-slide active">
                        <div class="testi-content">
                            <i class="fas fa-quote-right testi-quote-icon"></i>
                            <p class="testi-text">"The campus atmosphere is vibrant. Every day brings a new learning opportunity."</p>
                            <div class="testi-profile">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="testi-img" alt="Student">
                                <div class="testi-info"><h5>Rahul Krishnan</h5><span>Data Science</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="testi-slide">
                        <div class="testi-content">
                            <i class="fas fa-quote-right testi-quote-icon"></i>
                            <p class="testi-text">"The professors are incredibly supportive. I've learned so much beyond textbooks."</p>
                            <div class="testi-profile">
                                <img src="https://randomuser.me/api/portraits/women/28.jpg" class="testi-img" alt="Student">
                                <div class="testi-info"><h5>Neha Patel</h5><span>Commerce</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="testi-slide">
                        <div class="testi-content">
                            <i class="fas fa-quote-right testi-quote-icon"></i>
                            <p class="testi-text">"Amazing college life with great facilities and supportive community. Highly recommended!"</p>
                            <div class="testi-profile">
                                <img src="https://randomuser.me/api/portraits/men/22.jpg" class="testi-img" alt="Student">
                                <div class="testi-info"><h5>Vikram Singh</h5><span>Science</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="admission-popup" id="admissionPopup">
        <span class="close-btn">&times;</span>
        <h3 style="color: var(--college-blue); margin-bottom: 10px;">Admissions 2026-27</h3>
        <p style="font-size: 0.9rem; color: #555;">Applications are invited for UG, PG, IP & Research programmes.</p>
        <a href="https://stjosephites.com/apply_online/college_list.php" class="popup-btn">Apply Now</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Popup
            const popup = document.getElementById('admissionPopup');
            const closeBtn = document.querySelector('.close-btn');
            if(closeBtn) closeBtn.onclick = () => popup.style.display = 'none';

            // Fetch events from API
            Promise.all([
                fetch('/api/events/upcoming').then(r => r.json()).catch(e => { console.error('Events API error:', e); return []; }),
                fetch('/api/news/latest').then(r => r.json()).catch(e => { console.error('News API error:', e); return []; })
            ]).then(([upcomingEvents, newsArticles]) => {
                // Ensure arrays (fallback if API fails)
                upcomingEvents = Array.isArray(upcomingEvents) ? upcomingEvents : [];
                newsArticles = Array.isArray(newsArticles) ? newsArticles : [];
                
                // Sidebar text scroll - show upcoming events
                const textTrack = document.getElementById('sidebar-events-text-track');
                if(textTrack && upcomingEvents.length > 0) {
                    const eventsHtml = upcomingEvents.map(e => `
                        <div class="event-scroll-item">
                            <div class="event-scroll-date">${e.date}</div>
                            <div class="event-scroll-title">${e.title}</div>
                        </div>
                    `).join('');
                    textTrack.innerHTML = eventsHtml + eventsHtml;
                }

                // Photo scroller for Upcoming Events
                const photoTrack = document.getElementById('home-upcoming-photo-track');
                if(photoTrack && upcomingEvents.length > 0) {
                    const photosHtml = upcomingEvents.map(e => {
                        let imageSrc = e.image;
                        // Ensure image has proper path prefix and is not null
                        if (imageSrc && imageSrc !== 'null' && !imageSrc.startsWith('http') && !imageSrc.startsWith('/storage/')) {
                            imageSrc = '/storage/' + imageSrc;
                        }
                        // If image is null, use placeholder
                        if (!imageSrc || imageSrc === 'null') {
                            imageSrc = null;
                        }
                        return `
                        <div class="small-photo-thumb">
                            ${imageSrc ? `<img src="${imageSrc}" alt="${e.title}" onerror="this.style.display='none';">` : `<div style="background: linear-gradient(135deg, #f0ad4e 0%, #ffc107 100%); display: flex; align-items: center; justify-content: center; height: 100%; color: white;"><i class="fas fa-calendar-alt" style="font-size: 2rem;"></i></div>`}
                            <div class="small-photo-caption">
                                <div class="photo-title">${e.title}</div>
                                <div class="photo-description">${e.description || e.date}</div>
                            </div>
                        </div>
                    `;
                    }).join('');
                    photoTrack.innerHTML = photosHtml + photosHtml;
                }

                // Photo scroller for SJC News (now shows news articles)
                const newsPhotoTrack = document.getElementById('news-photo-track');
                if(newsPhotoTrack && newsArticles.length > 0) {
                    const newsHtml = newsArticles.slice(0, 20).map(article => {
                        let imageSrc = article.image;
                        // Ensure image has proper path prefix and is not null
                        if (imageSrc && imageSrc !== 'null' && !imageSrc.startsWith('http') && !imageSrc.startsWith('/storage/')) {
                            imageSrc = '/storage/' + imageSrc;
                        }
                        // If image is null, use placeholder
                        if (!imageSrc || imageSrc === 'null') {
                            imageSrc = null;
                        }
                        return `
                        <div class="small-photo-thumb">
                            ${imageSrc ? `<img src="${imageSrc}" alt="${article.title}" onerror="this.style.display='none';">` : `<div style="background: linear-gradient(135deg, #003366 0%, #1a4d7a 100%); display: flex; align-items: center; justify-content: center; height: 100%; color: white;"><i class="fas fa-newspaper" style="font-size: 2rem;"></i></div>`}
                            <div class="small-photo-caption">
                                <div class="photo-title">${article.title}</div>
                                <div class="photo-description">${article.excerpt || article.description || 'News article'}</div>
                            </div>
                        </div>
                    `;
                    }).join('');
                    newsPhotoTrack.innerHTML = newsHtml + newsHtml;
                }
            }).catch(error => {
                console.error('Error loading events and news:', error);
            });
        });

        let currentSlides = { alumni: 0, student: 0 };
        function changeSlide(type, direction) {
            const slides = document.querySelectorAll(`#${type}-carousel .testi-slide`);
            slides[currentSlides[type]].classList.remove('active');
            currentSlides[type] = (currentSlides[type] + direction + slides.length) % slides.length;
            slides[currentSlides[type]].classList.add('active');
        }

        function scrollHighlights(direction) {
            const row = document.getElementById('highlightsRow');
            if (row) {
                const scrollAmount = 220; // card width (200px) + gap (20px)
                row.scrollBy({
                    left: direction * scrollAmount,
                    behavior: 'smooth'
                });
            }
        }
    </script>
@endsection

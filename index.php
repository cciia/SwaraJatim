<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Swara Jatim - Dari Jawa Timur, Untuk Nusantara</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background-color: #f5f1e8;
            color: #333;
            line-height: 1.6;
            background-color: #F8E1B7;
        }

        /* Header */
        .header {
            background-color: var(--secondary);
            padding: 1.2rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(10px);
            background-color: rgba(44, 24, 16, 0.98);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            gap: 2rem;
        }

        .logo {
            font-size: 1.6rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--accent), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: #FFE1AF;
            background-clip: text;
            text-decoration: none;
            white-space: nowrap;
            letter-spacing: -0.5px;
        }

        .logo a {
            color: inherit;
            text-decoration: none;
        }

        .search-container {
            flex: 1;
            max-width: 400px;
        }

        .search-box {
            width: 100%;
            padding: 0.8rem 1.5rem;
            border: 1.5px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.08);
            color: white;
            font-size: 0.95rem;
            font-family: inherit;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        .search-box::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .search-box:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--accent);
            box-shadow: 0 0 20px rgba(232, 168, 99, 0.3);
        }

        .nav-menu-wrapper {
            display: flex;
            flex-direction: row;
            width: auto;
            transition: max-height 0.3s ease;
            overflow: hidden;
            max-height: none;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2.5rem;
            margin: 0;
        }

        .nav-menu a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .nav-menu a:hover {
            color: white;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .burger-menu {
            display: none;
            flex-direction: column;
            background: none;
            border: none;
            cursor: pointer;
            gap: 5px;
            padding: 0.5rem;
            z-index: 1001;
        }

        .burger-menu span {
            width: 25px;
            height: 3px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 2px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .burger-menu.active span:nth-child(1) {
            transform: rotate(45deg) translate(10px, 10px);
        }

        .burger-menu.active span:nth-child(2) {
            opacity: 0;
        }

        .burger-menu.active span:nth-child(3) {
            transform: rotate(-45deg) translate(8px, -8px);
        }

        /* Responsive burger menu for tablets and mobile -->
        @media (max-width: 1024px) {
            .nav-container {
                padding: 0 1.5rem;
                gap: 1.5rem;
            }

        }

        @media (max-width: 768px) {
            .burger-menu {
                display: flex;
            }

            .search-container {
                max-width: 250px;
            }

            .nav-container {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .nav-menu-wrapper {
                position: absolute;
                top: 70px;
                left: 0;
                right: 0;
                background: rgba(44, 24, 16, 0.98);
                flex-direction: column;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                padding: 0;
                width: 100%;
                backdrop-filter: blur(10px);
            }

            .nav-menu-wrapper.active {
                max-height: 500px;
                padding: 1.5rem 0;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            }

            .nav-menu {
                flex-direction: column;
                gap: 0;
                padding: 0 2rem;
            }

            .nav-menu li {
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                padding: 1rem 0;
            }

            .nav-menu li:last-child {
                border-bottom: none;
            }

            .nav-menu a {
                display: block;
                font-size: 0.95rem;
            }

        }

        @media (max-width: 640px) {
            .burger-menu {
                display: flex;
            }

            .burger-menu span {
                width: 22px;
                height: 2.5px;
            }

            .nav-menu-wrapper {
                top: 65px;
            }

            .nav-menu {
                padding: 0 1.5rem;
            }

        }

        @media (max-width: 480px) {
            .burger-menu {
                display: flex;
            }

            .burger-menu span {
                width: 20px;
                height: 2px;
            }

            .nav-menu-wrapper.active {
                max-height: 400px;
            }

            .nav-menu {
                padding: 0 1rem;
            }

            .nav-menu li {
                padding: 0.8rem 0;
            }

        }

        @media (max-width: 360px) {
            .burger-menu {
                display: flex;
            }

        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: 
                linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.35)),
                url('Jembatan-Nasional-Suramadu.jpg');
            background-size: cover;
            background-position: bottom;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            overflow: hidden;
        }

        /* Judul */
        .hero-content h1 {
            font-size: 4.2rem;
            margin-bottom: 1rem;
            text-shadow: 0 4px 16px rgba(0, 0, 0, 0.6);
            animation: fadeInUp 1s ease-out;
            font-weight: 700;
        }

        /* Subjudul */
        .hero-content p {
            font-size: 2.2rem;
            font-weight: 400;
            text-shadow: 0 3px 10px rgba(0, 0, 0, 0.55);
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        /* Animation */
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
        /* Section Styles */
        .section {
            padding: 4rem 0;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 2rem;
            padding-right: 2rem;
            margin-bottom: 4rem;
        }

        .section-title {
            position: relative;
            text-align: center;
            font-size: 2.5rem;
            color: #994D1C;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 3rem 1rem;
            border-bottom: 3px solid #d2691e;
            padding-bottom: 1rem;
            background: linear-gradient(45deg, #994D1C, #d2691e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Gallery Section */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        /* ===== CATEGORY SECTION ===== */
        .category-section {
            margin-bottom: 5rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .section-subtitle {
            color: var(--neutral-500);
            font-size: 1.1rem;
            margin-bottom: 3rem;
            font-weight: 300;
        }

        .category-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .category-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
        }

        .category-icon {
            font-size: 4rem;
            text-align: center;
            padding: 2rem;
            background: linear-gradient(135deg, rgba(200, 90, 23, 0.1), rgba(232, 168, 99, 0.1));
            min-height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-card-content {
            padding: 2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .category-card-content h3 {
            color: var(--primary-dark);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.8rem;
            font-family: 'Playfair Display', serif;
        }

        .category-card-content p {
            color: var(--neutral-500);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            flex: 1;
        }

        .category-badge {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 0.4rem 1.2rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            width: fit-content;
        }

        /* Modern gallery with optimized spacing */
        .gallery-section {
            background: linear-gradient(135deg, #F8E1B7 0%, #fef5e7 100%);
            padding: 3.5rem 3rem;
            margin: auto;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
            max-width: 1400px;
        }

        .gallery-header {
            margin-top: 40px;
            margin-bottom: 3rem;
            text-align: center;
        }

        .gallery-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            color: #994D1C;
            margin-bottom: 0.8rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .gallery-subtitle {
            color: #8b5a2b;
            font-size: 1.1rem;
            font-weight: 400;
        }

        /* Modern grid with better spacing balance */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.8rem;
            padding: 0;
        }

        .gallery-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            border: 1px solid rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
            height: 100%;
            transform-origin: center;
        }

        .gallery-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
        }

        .gallery-image-wrapper {
            width: 100%;
            height: 220px;
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, #e8d7c3, #f0e6d2);
        }

        .gallery-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-card:hover .gallery-image-wrapper img {
            transform: scale(1.08);
        }

        .gallery-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: linear-gradient(135deg, #c87a2b, #e8a863);
            color: white;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            box-shadow: 0 4px 12px rgba(200, 90, 23, 0.3);
            backdrop-filter: blur(10px);
        }

        .gallery-content {
            padding: 1.4rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .gallery-content h3 {
            color: #2c1810;
            margin-bottom: 0.5rem;
            font-size: 1.15rem;
            line-height: 1.3;
            font-weight: 600;
            font-family: 'Playfair Display', serif;
        }

        .gallery-content p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* AI Assistant Section - Modern gradient design with premium styling */
        .ai-assistant {
            background: linear-gradient(135deg, #2c1810 0%, #5c3d2e 50%, #8b5a3c 100%);
            color: white;
            padding: 4rem 3rem;
            border-radius: 24px;
            margin: 4rem 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            box-shadow: 0 20px 60px rgba(44, 24, 16, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .ai-assistant::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(232, 168, 99, 0.1), transparent, rgba(200, 90, 23, 0.05));
            pointer-events: none;
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0%, 100% {
                opacity: 0.5;
            }
            50% {
                opacity: 1;
            }
        }

        .ai-content {
            position: relative;
            z-index: 2;
        }

        .ai-content h3 {
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #FFE1AF, #fff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .ai-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            font-size: 1.05rem;
            color: rgba(255, 255, 255, 0.9);
            letter-spacing: 0.3px;
        }

        .ai-buttons {
            display: flex;
            gap: 1.2rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .ai-btn {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
            color: white;
            border: 1.5px solid rgba(255, 255, 255, 0.3);
            padding: 1rem 2rem;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .ai-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .ai-btn:hover::before {
            left: 100%;
        }

        .ai-btn:hover {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(232, 168, 99, 0.15));
            border-color: #FFE1AF;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(232, 168, 99, 0.3);
        }

        .chat-interface {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 225, 183, 0.5));
            border-radius: 20px;
            padding: 2rem;
            height: 380px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2), inset 0 1px 1px rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .chat-interface:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25), inset 0 1px 1px rgba(255, 255, 255, 0.6);
        }

        .chat-header {
            background: linear-gradient(135deg, #e8a863, #c87a2b);
            color: white;
            padding: 1.2rem;
            border-radius: 14px;
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 1.2rem;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(200, 90, 23, 0.2);
        }

        .chat-content-area {
            flex: 1;
            background: linear-gradient(135deg, rgba(248, 225, 183, 0.3), rgba(255, 255, 255, 0.2));
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(44, 24, 16, 0.5);
            font-style: italic;
            font-size: 0.95rem;
            padding: 1rem;
            text-align: center;
            border: 1.5px dashed rgba(200, 90, 23, 0.2);
            transition: all 0.3s ease;
        }

        .chat-interface:hover .chat-content-area {
            border-color: rgba(200, 90, 23, 0.4);
            background: linear-gradient(135deg, rgba(248, 225, 183, 0.5), rgba(255, 255, 255, 0.3));
        }

        .chat-input {
            display: flex;
            gap: 0.8rem;
        }

        .chat-input input {
            flex: 1;
            padding: 0.9rem 1rem;
            border: 1.5px solid rgba(200, 90, 23, 0.2);
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
            color: #333;
            font-family: inherit;
        }

        .chat-input input:focus {
            outline: none;
            border-color: #e8a863;
            box-shadow: 0 0 12px rgba(232, 168, 99, 0.2);
        }

        .chat-input button {
            background: linear-gradient(135deg, #e8a863, #c87a2b);
            color: white;
            border: none;
            padding: 0.9rem 1.2rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(200, 90, 23, 0.2);
        }

        .chat-input button:hover {
            background: linear-gradient(135deg, #f0b968, #d4883a);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(200, 90, 23, 0.3);
        }

        .chat-input button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Content Grid */
        .content-grid {
            display: flex;
            gap: 2rem;
            overflow-x: auto;
            padding: 15px;
            scroll-behavior: smooth;
        }

        .content-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            min-width: 280px;
            flex: 0 0 auto;
        }

        .content-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .content-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .content-card:hover img {
            transform: scale(1.05);
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-content h4 {
            color: #8b4513;
            margin-bottom: 0.8rem;
            font-size: 1.2rem;
            line-height: 1.4;
        }

        .card-content p {
            font-size: 1rem;
            color: #666;
            font-weight: 500;
        }

        .connection-section {
            background: linear-gradient(135deg, #2c1810, #3d2317);
            color: white;
            padding: 4rem 0;
            margin: 4rem 0;
        }

        .connection-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
        }

        .connection-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .connection-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
        }

        .connection-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }

        .connection-card h4 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #f5f1e8;
        }

        .connection-card p {
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .connection-btn {
            background: #8b4513;
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
        }

        .connection-btn:hover {
            background: #a0522d;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .footer {
            background: linear-gradient(135deg, #2c1810, #1a0f0a);
            color: white;
            padding: 4rem 0 1rem;
            margin-top: 0;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-section h4 {
            color: #f5f1e8;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
            border-bottom: 2px solid #8b4513;
            padding-bottom: 0.5rem;
        }

        .footer-section p,
        .footer-section a {
            color: #ccc;
            text-decoration: none;
            margin-bottom: 0.8rem;
            display: block;
            transition: color 0.3s ease;
            line-height: 1.6;
        }

        .footer-section a:hover {
            color: #f5f1e8;
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            background: linear-gradient(135deg, #8b4513, #a0522d);
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .social-links a:hover {
            background: linear-gradient(135deg, #a0522d, #d2691e);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #444;
            margin-top: 3rem;
            color: #999;
            font-size: 1rem;
        }

        /* Comprehensive responsive design for all breakpoints */
        @media (max-width: 1024px) {
            .nav-container {
                padding: 0 1.5rem;
                gap: 1.5rem;
            }

            .ai-assistant {
                padding: 3rem 2.5rem;
                gap: 2.5rem;
            }

            .ai-content h3 {
                font-size: 2.2rem;
            }

            .chat-interface {
                height: 340px;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                gap: 1.5rem;
            }

            .gallery-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1.5rem;
            }

            .ai-assistant {
                grid-template-columns: 1fr;
                padding: 2.5rem 2rem;
                gap: 2rem;
            }

            .ai-content h3 {
                font-size: 1.8rem;
                text-align: center;
            }

            .ai-content p {
                font-size: 0.95rem;
                text-align: center;
            }

            .ai-buttons {
                justify-content: center;
                gap: 1rem;
            }

            .chat-interface {
                height: auto;
                min-height: 300px;
            }

            .nav-menu {
                gap: 1.2rem;
                font-size: 0.9rem;
            }

            .section {
                padding: 3rem 1.5rem;
                margin-bottom: 3rem;
            }

            .search-container {
                max-width: 250px;
            }

            .nav-container {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .connection-container {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 1.2rem;
            }

            .gallery-section {
                padding: 2.5rem 2rem;
                margin: 2rem auto;
            }

            .gallery-title {
                font-size: 2rem;
            }

            .gallery-subtitle {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.6rem;
                margin: 2rem 0.5rem;
            }

            .content-grid {
                gap: 1.5rem;
                padding: 10px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 640px) {
            .ai-assistant {
                padding: 2rem 1.5rem;
                gap: 1.5rem;
                border-radius: 16px;
            }

            .ai-content h3 {
                font-size: 1.4rem;
                margin-bottom: 1rem;
            }

            .ai-content p {
                font-size: 0.9rem;
                line-height: 1.6;
            }

            .ai-buttons {
                flex-direction: column;
                gap: 0.8rem;
                margin-top: 1.5rem;
            }

            .ai-btn {
                width: 100%;
                padding: 0.85rem 1.5rem;
                font-size: 0.85rem;
                letter-spacing: 0.5px;
            }

            .chat-interface {
                height: 280px;
                padding: 1.5rem;
            }

            .chat-header {
                font-size: 1rem;
                padding: 0.9rem;
                margin-bottom: 0.9rem;
            }

            .chat-content-area {
                font-size: 0.9rem;
                padding: 0.9rem;
                margin-bottom: 0.9rem;
            }

            .chat-input input {
                padding: 0.7rem 0.8rem;
                font-size: 0.9rem;
            }

            .chat-input button {
                padding: 0.7rem 0.9rem;
                font-size: 1rem;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1.2rem;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
                gap: 1rem;
            }

            .gallery-image-wrapper {
                height: 180px;
            }

            .gallery-content {
                padding: 1.2rem;
            }

            .gallery-content h3 {
                font-size: 1rem;
            }

            .gallery-title {
                font-size: 1.6rem;
            }

            .gallery-section {
                padding: 2rem 1.5rem;
            }

            .nav-menu {
                gap: 0.8rem;
                font-size: 0.8rem;
            }

            .logo {
                font-size: 1.2rem;
            }

            .search-container {
                max-width: 100%;
                margin: 0.5rem 0;
                width: 100%;
            }

            .search-box {
                width: 100%;
                padding: 0.6rem 1rem;
                font-size: 0.8rem;
            }

            .nav-container {
                padding: 0 1rem;
                gap: 0.8rem;
            }

            .section-title {
                font-size: 1.3rem;
                letter-spacing: 1px;
                margin: 1.5rem 0.5rem;
            }

            .content-grid {
                gap: 0.8rem;
                padding: 8px;
            }

            .connection-container {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                padding: 0 1rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                padding: 0 1rem;
            }
        }

        @media (max-width: 480px) {
            .ai-assistant {
                padding: 1.5rem 1rem;
                gap: 1.5rem;
                margin: 2rem 0;
                border-radius: 12px;
            }

            .ai-content h3 {
                font-size: 1.3rem;
                margin-bottom: 0.8rem;
            }

            .ai-content p {
                font-size: 0.85rem;
                line-height: 1.5;
            }

            .ai-buttons {
                flex-direction: column;
                gap: 0.6rem;
                margin-top: 1rem;
            }

            .ai-btn {
                width: 100%;
                padding: 0.8rem 1rem;
                font-size: 0.8rem;
                letter-spacing: 0px;
                border-radius: 20px;
            }

            .chat-interface {
                height: 260px;
                padding: 1rem;
            }

            .chat-header {
                font-size: 0.95rem;
                padding: 0.8rem;
                margin-bottom: 0.8rem;
            }

            .chat-content-area {
                font-size: 0.85rem;
                padding: 0.8rem;
                margin-bottom: 0.8rem;
            }

            .chat-input {
                gap: 0.4rem;
            }

            .chat-input input {
                padding: 0.6rem;
                font-size: 0.8rem;
            }

            .chat-input button {
                padding: 0.6rem 0.7rem;
                font-size: 0.95rem;
            }

            .hero-content h1 {
                font-size: 1.8rem;
                margin-bottom: 0.8rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }

            .nav-menu {
                gap: 0.6rem;
                font-size: 0.75rem;
            }

            .logo {
                font-size: 1rem;
            }

            .section {
                padding: 2rem 1rem;
                margin-bottom: 2rem;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .gallery-image-wrapper {
                height: 160px;
            }

            .gallery-title {
                font-size: 1.4rem;
            }

            .gallery-subtitle {
                font-size: 0.9rem;
            }

            .gallery-section {
                padding: 1.5rem 1rem;
                margin: 1.5rem 0;
            }

            .gallery-header {
                margin-bottom: 1.5rem;
            }

            .section-title {
                font-size: 1.2rem;
                letter-spacing: 0px;
                margin: 1rem 0.5rem;
            }

            .content-grid {
                gap: 0.8rem;
                padding: 8px;
            }

            .content-card {
                min-width: 100%;
            }

            .connection-container {
                gap: 1rem;
                padding: 0 0.8rem;
            }

            .footer-content {
                gap: 1rem;
                padding: 0 0.8rem;
            }
        }

        @media (max-width: 360px) {
            .ai-assistant {
                padding: 1rem 0.8rem;
                gap: 1rem;
                margin: 1.5rem 0;
            }

            .ai-content h3 {
                font-size: 1.1rem;
                margin-bottom: 0.6rem;
            }

            .ai-content p {
                font-size: 0.8rem;
                line-height: 1.4;
            }

            .ai-btn {
                font-size: 0.75rem;
                padding: 0.7rem 0.9rem;
            }

            .chat-interface {
                height: 240px;
                padding: 0.8rem;
            }

            .chat-header {
                font-size: 0.9rem;
                padding: 0.6rem;
            }

            .chat-content-area {
                font-size: 0.8rem;
                padding: 0.6rem;
            }

            .chat-input input {
                padding: 0.5rem;
                font-size: 0.75rem;
            }

            .chat-input button {
                padding: 0.5rem;
                font-size: 0.9rem;
            }

            .hero-content h1 {
                font-size: 1.5rem;
            }

            .hero-content p {
                font-size: 0.95rem;
            }

            .logo {
                font-size: 0.9rem;
            }

            .section-title {
                font-size: 1rem;
            }

            .gallery-grid {
                gap: 0.8rem;
            }

            .gallery-title {
                font-size: 1.2rem;
            }

            .gallery-subtitle {
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="nav-container">
            <div class="logo"><a href="index.php">Swara Jatim</a></div>

            <div class="search-container">
                <input type="text" id="searchInput" class="search-box" placeholder="Cari artikel...">
            </div>

            <!-- Added burger menu icon for mobile -->
            <button class="burger-menu" id="burgerMenu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <!-- Nav menu now has mobile toggle functionality -->
            <nav class="nav-menu-wrapper">
                <ul class="nav-menu" id="navMenu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#galeri">Galeri</a></li>
                    <li><a href="index.php#ai-assistant">Swara Jatim AI</a></li>
                    <li><a href="mini-game.php">Mini Game</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Swara Jatim</h1>
            <p>Dari Jawa Timur, Untuk Nusantara</p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="galeri" class="gallery-section">
        <div class="gallery-header">
            <h2 class="gallery-title">Galeri Terbaru</h2>
            <p class="gallery-subtitle">Jelajahi koleksi gambar terbaru dari setiap kategori</p>
        </div>

        <div class="gallery-grid">
            <?php
            include "koneksi.php";
            $kategori = [
                1 => "Wisata",
                2 => "Kuliner",
                3 => "Pakaian",
                4 => "Tradisi"
            ];

            foreach ($kategori as $cat_id => $judul_custom) {
                $sql = "SELECT * FROM konten
                        WHERE category_id = $cat_id
                        ORDER BY id DESC
                        LIMIT 1";
                $result = mysqli_query($koneksi, $sql);

                if ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <a href="galeri.php?id=<?php echo $cat_id; ?>" class="gallery-link" style="text-decoration: none;">
                        <div class="gallery-card">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $judul_custom; ?>">
                                <span class="gallery-badge"><?php echo $judul_custom; ?></span>
                            </div>
                            <div class="gallery-content">
                                <h3><?php echo 'Galeri ' . $judul_custom; ?></h3>
                                <p><?php echo isset($row['description']) ? substr($row['description'], 0, 100) . '...' : 'Jelajahi koleksi ' . $judul_custom . ' terbaru kami'; ?></p>
                            </div>
                        </div>
                    </a>
                    <?php
                }
            }
            ?>
        </div>
    </section>

    <!-- Modern AI Assistant section with updated markup -->
    <section id="ai-assistant" class="section fade-in">
        <div class="ai-assistant">
            <div class="ai-content">
                <h3>🤖 AI Cultural Assistant</h3>
                <p>Jelajahi budaya Jawa Timur dengan bantuan AI Cultural Assistant. Cukup tanyakan atau kirimkan gambar, dan AI cerdas ini akan memberikan informasi, cerita, dan rekomendasi seputar seni, tradisi, dan budaya lokal dengan cara yang interaktif dan menarik.</p>
                <div class="ai-buttons">
                    <button class="ai-btn" onclick="window.location.href='budaya-chatbot/index.php'">
                        Tanya AI
                    </button>
                </div>
            </div>
            <div class="chat-interface" onclick="window.location.href='budaya-chatbot/index.php'">
                <div class="chat-header">✨ Mulai Percakapan</div>
                <div class="chat-content-area">
                    Klik untuk memulai percakapan dengan AI Budaya
                </div>
                <div class="chat-input">
                    <input type="text" placeholder="Ketik pertanyaan..." readonly>
                    <button disabled>🚀</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section fade-in">
        <h2 class="section-title">Wisata</h2>
        <div class="content-grid">
            <?php
            include 'koneksi.php';
            $res = mysqli_query($koneksi, "
                SELECT k.*, c.name AS city_name
                FROM konten k
                LEFT JOIN cities c ON k.city_id = c.id
                WHERE k.category_id = 1
                ORDER BY k.id DESC
            ");

            while ($row = mysqli_fetch_assoc($res)) {
                echo "
                <div class='content-card'>
                    <img src='{$row['image_url']}' alt='{$row['name']}' height='200' width='280'>
                    <div class='card-content'>
                        <h4>{$row['name']}</h4>
                        <p>{$row['city_name']}</p>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </section>

    <section class="section fade-in">
        <h2 class="section-title">Pakaian dan Batik</h2>
        <div class="content-grid">
            <?php
            include 'koneksi.php';
            $res = mysqli_query($koneksi, "
                SELECT k.*, c.name AS city_name
                FROM konten k
                LEFT JOIN cities c ON k.city_id = c.id
                WHERE k.category_id = 3
                ORDER BY k.id DESC
            ");

            while ($row = mysqli_fetch_assoc($res)) {
                echo "
                <div class='content-card'>
                    <img src='{$row['image_url']}' alt='{$row['name']}' height='200' width='280'>
                    <div class='card-content'>
                        <h4>{$row['name']}</h4>
                        <p>{$row['city_name']}</p>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </section>

    <section class="section fade-in">
        <h2 class="section-title">Tradisi</h2>
        <div class="content-grid">
            <?php
            include 'koneksi.php';
            $res = mysqli_query($koneksi, "
                SELECT k.*, c.name AS city_name
                FROM konten k
                LEFT JOIN cities c ON k.city_id = c.id
                WHERE k.category_id = 4
                ORDER BY k.id DESC
            ");

            while ($row = mysqli_fetch_assoc($res)) {
                echo "
                <div class='content-card'>
                    <img src='{$row['image_url']}' alt='{$row['name']}' height='200' width='280'>
                    <div class='card-content'>
                        <h4>{$row['name']}</h4>
                        <p>{$row['city_name']}</p>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Swara Jatim</h4>
                <p>Portal Budaya & Berita Jawa Timur</p>
                <p>Melestarikan dan mempromosikan kekayaan budaya Jawa Timur melalui platform digital yang informatif dan edukatif untuk generasi mendatang.</p>
            </div>
            <div class="footer-section">
                <h4>Navigasi</h4>
                <a href="index.php">Beranda</a>
                <a href="index.php#galeri">Galeri</a>
                <a href="mini-game.php">Mini Game</a>
                <a href="index.php#ai-assistant">AI Assistant</a>
            </div>
            <div class="footer-section">
                <h4>Kategori</h4>
                <a href="galeri.php?id=1">Wisata</a>
                <a href="galeri.php?id=2">Kuliner</a>
                <a href="galeri.php?id=3">Pakaian & Batik</a>
                <a href="galeri.php?id=4">Tradisi</a>
            </div>
            <div class="footer-section">
                <h4>Kontak</h4>
                <p>Email: info@swarajatim.com</p>
                <p>Telepon: (031) 123-4567</p>
                <div class="social-links">
                    <a href="#" title="Facebook">f</a>
                    <a href="#" title="Instagram">i</a>
                    <a href="#" title="Twitter">t</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Swara Jatim. Semua hak cipta dilindungi.</p>
        </div>
    </footer>

    <script>
        const burgerMenu = document.getElementById('burgerMenu');
        const navMenu = document.getElementById('navMenu');

        burgerMenu.addEventListener('click', () => {
            navMenu.parentElement.classList.toggle('active');
            burgerMenu.classList.toggle('active');
        });

        // Close menu when a link is clicked
        const navLinks = navMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navMenu.parentElement.classList.remove('active');
                burgerMenu.classList.remove('active');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.nav-container')) {
                navMenu.parentElement.classList.remove('active');
                burgerMenu.classList.remove('active');
            }
        });
    </script>
</body>

</html>

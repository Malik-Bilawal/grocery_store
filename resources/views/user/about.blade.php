@extends("user.layouts.master-layouts.plain")
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Grocery Station One | About </title>

@push("script")
@endpush


@push("style")
   
    <style>
        :root {
            --primary-orange: #f97316;
            --primary-hover: #ea580c;
            --secondary-yellow: #eab308;
            --secondary-hover: #ca8a04;
            --accent-green: #16a34a;
            --accent-hover: #15803d;
            --text-on-primary: #000000;
            --text-on-secondary: #000000;
            --light-orange: #ffedd5;
            --dark-orange: #9a3412;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            color: #1f2937;
            line-height: 1.6;
            overflow-x: hidden;
            transition: all 0.3s ease;
        }
        
        body.urdu {
            font-family: 'Noto Nastaliq Urdu', 'Inter', sans-serif;
            direction: rtl;
        }
        
        .hero-bg {
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.9) 0%, rgba(234, 179, 8, 0.8) 100%), 
                        url('https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
        }
        
        .section-bg {
            background-color: #fcfcfc;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160' viewBox='0 0 160 160'%3E%3Cg fill='%23f97316' fill-opacity='0.03'%3E%3Cpath d='M20 40h20v20H20zM100 40h20v20h-20zM60 80h20v20H60zM20 120h20v20H20zM100 120h20v20h-20z'/%3E%3C/g%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 160px 160px;
            position: relative;
        }

        .section-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(255, 255, 255, 0.85);
            pointer-events: none;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Language Toggle */
        .language-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            background: white;
            border-radius: 50px;
            padding: 5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid var(--primary-orange);
        }
        
        .lang-btn {
            padding: 8px 16px;
            border: none;
            background: transparent;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .lang-btn.active {
            background: var(--primary-orange);
            color: white;
        }
        
        /* Floating Elements */
        .floating-element {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            z-index: 0;
        }
        
        .floating-element-1 {
            width: 120px;
            height: 120px;
            background: var(--primary-orange);
            top: 10%;
            left: 5%;
            animation: float 8s ease-in-out infinite;
        }
        
        .floating-element-2 {
            width: 80px;
            height: 80px;
            background: var(--secondary-yellow);
            top: 70%;
            right: 10%;
            animation: float 6s ease-in-out infinite 1s;
        }
        
        .floating-element-3 {
            width: 60px;
            height: 60px;
            background: var(--accent-green);
            bottom: 20%;
            left: 15%;
            animation: float 7s ease-in-out infinite 2s;
        }
        
        /* Hero Section */
        .hero-section {
            min-height: 80vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 10;
        }
        
        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            color: white;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .hero-breadcrumb {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
        }
        
        .hero-breadcrumb a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .hero-breadcrumb a:hover {
            color: white;
        }
        
        .hero-breadcrumb span {
            color: var(--light-orange);
        }
        
        /* Modern Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2rem;
            background: var(--primary-orange);
            color: var(--text-on-primary);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn:hover {
            background: var(--primary-hover);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(249, 115, 22, 0.4);
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary-orange);
            color: var(--primary-orange);
            box-shadow: none;
        }
        
        .btn-outline:hover {
            background: var(--primary-orange);
            color: var(--text-on-primary);
        }
        
        .btn-light {
            background: white;
            color: var(--primary-orange);
        }
        
        .btn-light:hover {
            background: var(--light-orange);
            color: var(--primary-hover);
        }
        
        /* Section Styles */
        .section {
            padding: 6rem 0;
            position: relative;
        }
        
        .section-title {
            font-size: 3rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 1rem;
            color: #1f2937;
            position: relative;
        }
        
        .section-title::after {
            content: "";
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 5px;
            background: var(--primary-orange);
            border-radius: 3px;
        }
        
        .section-subtitle {
            font-size: 1.25rem;
            text-align: center;
            max-width: 700px;
            margin: 2rem auto 4rem;
            color: #4b5563;
            line-height: 1.7;
        }
        
        /* Story Section */
        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }
        
        .story-content {
            padding-right: 1rem;
        }
        
        .story-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1f2937;
            position: relative;
        }
        
        .story-title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 60px;
            height: 4px;
            background: var(--primary-orange);
            border-radius: 2px;
        }
        
        body.urdu .story-title::before {
            left: auto;
            right: 0;
        }
        
        .story-text {
            color: #4b5563;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }
        
        .story-list {
            list-style: none;
            margin-bottom: 2.5rem;
        }
        
        .story-list li {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }
        
        body.urdu .story-list li {
            flex-direction: row-reverse;
        }
        
        .story-list i {
            color: var(--primary-orange);
            margin-top: 0.25rem;
            flex-shrink: 0;
            font-size: 1.2rem;
        }
        
        .story-image {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            position: relative;
            transform: perspective(1000px) rotateY(-5deg);
            transition: transform 0.5s ease;
        }
        
        body.urdu .story-image {
            transform: perspective(1000px) rotateY(5deg);
        }
        
        .story-image:hover {
            transform: perspective(1000px) rotateY(0);
        }
        
        .story-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.8s ease;
        }
        
        .story-image:hover img {
            transform: scale(1.05);
        }
        
        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--primary-hover) 100%);
            color: var(--text-on-primary);
            position: relative;
            overflow: hidden;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            position: relative;
            z-index: 10;
        }
        
        .stat-item {
            text-align: center;
            padding: 2rem 1rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease, background 0.3s ease;
        }
        
        .stat-item:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
        }
        
        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--light-orange);
        }
        
        .stat-number {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            display: block;
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .stat-label {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
        }
        
        /* Values Section */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2.5rem;
        }
        
        .value-card {
            background: white;
            border-radius: 20px;
            padding: 3rem 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(249, 115, 22, 0.1);
        }
        
        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-orange), var(--secondary-yellow));
        }
        
        .value-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .value-icon {
            width: 90px;
            height: 90px;
            background: var(--light-orange);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary-orange);
            font-size: 2.5rem;
            transition: all 0.3s ease;
        }
        
        .value-card:hover .value-icon {
            background: var(--primary-orange);
            color: white;
            transform: scale(1.1);
        }
        
        .value-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        
        .value-desc {
            color: #4b5563;
            line-height: 1.7;
            font-size: 1.05rem;
        }
        
        /* Mission Section */
        .mission-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }
        
        .mission-image {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            position: relative;
            transform: perspective(1000px) rotateY(5deg);
            transition: transform 0.5s ease;
        }
        
        body.urdu .mission-image {
            transform: perspective(1000px) rotateY(-5deg);
        }
        
        .mission-image:hover {
            transform: perspective(1000px) rotateY(0);
        }
        
        .mission-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.8s ease;
        }
        
        .mission-image:hover img {
            transform: scale(1.05);
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--primary-hover) 100%);
            color: var(--text-on-primary);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .cta-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 10;
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .cta-text {
            font-size: 1.5rem;
            max-width: 700px;
            margin: 0 auto 3rem;
            color: rgba(255, 255, 255, 0.9);
            position: relative;
            z-index: 10;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            position: relative;
            z-index: 10;
        }
        
        /* Animations */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        
        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }
        
        .stagger-animation > * {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .stagger-animation.animated > * {
            opacity: 1;
            transform: translateY(0);
        }
        
        .stagger-animation.animated > *:nth-child(1) { transition-delay: 0.1s; }
        .stagger-animation.animated > *:nth-child(2) { transition-delay: 0.2s; }
        .stagger-animation.animated > *:nth-child(3) { transition-delay: 0.3s; }
        .stagger-animation.animated > *:nth-child(4) { transition-delay: 0.4s; }
        .stagger-animation.animated > *:nth-child(5) { transition-delay: 0.5s; }
        .stagger-animation.animated > *:nth-child(6) { transition-delay: 0.6s; }
        
        /* Keyframes */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideInLeft {
            0% { opacity: 0; transform: translateX(-50px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes slideInRight {
            0% { opacity: 0; transform: translateX(50px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        
        /* Responsive Styles */
        @media (max-width: 1024px) {
            .story-grid, .mission-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            
            .story-content, .mission-content {
                padding-right: 0;
            }
            
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .values-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .hero-title {
                font-size: 3rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2.5rem;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .values-grid {
                grid-template-columns: 1fr;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .cta-title {
                font-size: 2.5rem;
            }
            
            .language-toggle {
                top: 10px;
                right: 10px;
            }
        }
    </style>

@endpush


@section("content")
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

 
</head>
<body>
    <!-- Language Toggle -->
    <div class="language-toggle p-4 flex gap-2 justify-end">
        <button id="englishBtn" class="lang-btn active px-4 py-2 bg-blue-600 text-white rounded">
            <i class="fas fa-language mr-2"></i> English
        </button>
        <button id="urduBtn" class="lang-btn px-4 py-2 bg-gray-200 text-black rounded">
            <i class="fas fa-language mr-2"></i> اردو
        </button>
    </div>

    <!-- Floating Elements -->
    <div class="floating-element floating-element-1"></div>
    <div class="floating-element floating-element-2"></div>
    <div class="floating-element floating-element-3"></div>

    <!-- Hero Section -->
    <section class="hero-bg bg-green-50 py-16">
        <div class="hero-section">
            <div class="container mx-auto px-4">
                <div class="hero-content animate-on-scroll text-center">
                    <h1 class="hero-title text-4xl font-bold mb-4" data-english="Welcome to GroceryStationOne" data-urdu="گروسری اسٹیشن ون میں خوش آمدید">Welcome to GroceryStationOne</h1>
                    <p class="hero-subtitle text-lg mb-4" data-english="The perfect platform for grocery items" data-urdu="گروسری آئٹمز کے لیے بہترین پلیٹ فارم">The perfect platform for grocery items</p>
                    <div class="hero-breadcrumb text-sm text-gray-600">
                        <a href="{{ route('home') }}" data-english="Home" data-urdu="ہوم">Home</a>
                        <span>/</span>
                        <a href="{{ route('about') }}" data-english="About Us" data-urdu="ہمارے بارے میں">About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Vision, Motive, Mission, Journey, Quality Section -->
    <section class="section section-bg py-16 bg-white">
        <div class="container mx-auto px-4 space-y-12">

            <!-- OUR VISION -->
            <div class="story-content animate-on-scroll">
                <h2 class="story-title text-3xl font-bold mb-4" data-english="OUR VISION" data-urdu="ہمارا وژن">OUR VISION</h2>
                <p class="story-text text-lg" data-english="Our main and supreme vision is to provide quality over quantity at a very decent price." data-urdu="ہمارا بنیادی اور اعلیٰ وژن یہ ہے کہ مقدار کے بجائے معیار فراہم کریں اور قیمت بہت مناسب ہو۔">Our main and supreme vision is to provide quality over quantity at a very decent price.</p>
            </div>

            <!-- OUR MOTIVE -->
            <div class="story-content animate-on-scroll">
                <h2 class="story-title text-3xl font-bold mb-4" data-english="OUR MOTIVE" data-urdu="ہمارا مقصد">OUR MOTIVE</h2>
                <p class="story-text text-lg" data-english="Our company's motive is to make the public aware about quality and price. You can compare our quality and price with any wholesale market, retail store, or supermarket, and you will see the difference we offer." data-urdu="ہماری کمپنی کا مقصد عوام کو معیار اور قیمت کے بارے میں آگاہ کرنا ہے۔ آپ ہماری معیار اور قیمت کا موازنہ کسی بھی ہول سیل مارکیٹ، ریٹیل اسٹور، یا سپر مارکیٹ سے کر سکتے ہیں اور فرق دیکھ سکتے ہیں جو ہم فراہم کرتے ہیں۔">Our company's motive is to make the public aware about quality and price. You can compare our quality and price with any wholesale market, retail store, or supermarket, and you will see the difference we offer.</p>
            </div>

            <!-- OUR MISSION -->
            <div class="story-content animate-on-scroll">
                <h2 class="story-title text-3xl font-bold mb-4" data-english="OUR MISSION" data-urdu="ہمارا مشن">OUR MISSION</h2>
                <p class="story-text text-lg" data-english="Our mission is to sell products at importing costs and spread our work worldwide. Providing the best quality products at minimum prices, so people who can't afford high supermarket prices can enjoy quality items." data-urdu="ہمارا مشن مصنوعات کو درآمدی لاگت پر بیچنا اور اپنا کام دنیا بھر میں پھیلانا ہے۔ بہترین معیار کی مصنوعات کم سے کم قیمت پر فراہم کرنا تاکہ وہ لوگ جو مہنگی سپر مارکیٹ کی قیمتیں برداشت نہیں کر سکتے معیار سے لطف اندوز ہو سکیں۔">Our mission is to sell products at importing costs and spread our work worldwide. Providing the best quality products at minimum prices, so people who can't afford high supermarket prices can enjoy quality items.</p>
            </div>

            <!-- OUR JOURNEY -->
<div class="story-content animate-on-scroll">
    <h2 class="story-title text-3xl font-bold mb-4" 
        data-english="OUR JOURNEY" 
        data-urdu="ہمارا سفر">
        OUR JOURNEY
    </h2>

    <p class="story-text text-lg" 
       data-english="The journey has just begun, but our company has been importing these items for the last 20 years. We used to sell them to supermarkets at very minimal rates, and they would then sell them to you at double the price. To end this cycle and offer you fair prices directly, we are here now with our own online platform." 
       data-urdu="سفر ابھی شروع ہوا ہے، لیکن ہماری کمپنی پچھلے 20 سالوں سے یہ اشیاء درآمد کر رہی ہے۔ ہم یہ چیزیں سپر مارکیٹوں کو بہت کم قیمت پر دیتے تھے، اور وہ آپ کو دوگنی قیمت پر بیچتی تھیں۔ اسی کھیل کو ختم کرنے اور آپ تک مناسب قیمتیں پہنچانے کے لیے ہم اب اپنا آن لائن پلیٹ فارم لے کر آئے ہیں۔">
        The journey has just begun, but our company has been importing these items for the last 20 years. We used to sell them to supermarkets at very minimal rates, and they would then sell them to you at double the price. To end this cycle and offer you fair prices directly, we are here now with our own online platform.
    </p>
</div>


            <!-- QUALITY & TASTE -->
<!-- QUALITY & TASTE -->
<div class="story-content animate-on-scroll">
    <h2 class="story-title text-3xl font-bold mb-4" data-english="QUALITY & TASTE" data-urdu="معیار اور ذائقہ">QUALITY & TASTE</h2>
    <p class="story-text text-lg" data-english="At GroceryStationOne, we provide the best quality possible. Quality and taste are the foundation of our work. Prices adjust according to international market changes, both increasing and decreasing to provide relief to our customers." data-urdu="گروسری اسٹیشن ون میں، ہم بہترین معیار فراہم کرتے ہیں۔ معیار اور ذائقہ ہمارے کام کی بنیاد ہیں۔ قیمتیں بین الاقوامی مارکیٹ کی تبدیلیوں کے مطابق بڑھتی یا گھٹتی ہیں تاکہ ہمارے صارفین کو راحت ملے۔">At GroceryStationOne, we provide the best quality possible. Quality and taste are the foundation of our work. Prices adjust according to international market changes, both increasing and decreasing to provide relief to our customers.</p>
    <b><p class="story-text text-lg" data-english="Our rates depend on the international import/export market." data-urdu="ہماری قیمتیں بین الاقوامی درآمد/برآمد مارکیٹ پر منحصر ہیں۔">Our rates depend on the international import/export market.</p></b>
</div>


        </div>
    </section>

    <!-- Previous Stats Section -->
    <section class="section stats-section py-16 bg-green-50">
        <div class="container mx-auto px-4">
            <div class="stats-container stagger-animation grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                <div class="stat-item">
                    <i class="fas fa-store stat-icon text-4xl mb-2"></i>
                    <span class="stat-number" data-count="15">0</span>
                    <span class="stat-label" data-english="Store Locations" data-urdu="اسٹور مقامات">Store Locations</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-users stat-icon text-4xl mb-2"></i>
                    <span class="stat-number" data-count="500">0</span>
                    <span class="stat-label" data-english="Team Members" data-urdu="ٹیم کے اراکین">Team Members</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-smile stat-icon text-4xl mb-2"></i>
                    <span class="stat-number" data-count="50000">0</span>
                    <span class="stat-label" data-english="Happy Customers" data-urdu="خوش گاہک">Happy Customers</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-calendar-alt stat-icon text-4xl mb-2"></i>
                    <span class="stat-number" data-count="12">0</span>
                    <span class="stat-label" data-english="Years of Service" data-urdu="سالوں کی خدمت">Years of Service</span>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('script')
    <!-- Language & Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const englishBtn = document.getElementById('englishBtn');
            const urduBtn = document.getElementById('urduBtn');
            const body = document.body;
            let currentLanguage = 'english';

            function switchLanguage(lang) {
                currentLanguage = lang;
                if (lang === 'english') {
                    englishBtn.classList.add('active');
                    urduBtn.classList.remove('active');
                    body.classList.remove('urdu');
                } else {
                    urduBtn.classList.add('active');
                    englishBtn.classList.remove('active');
                    body.classList.add('urdu');
                }

                const translatableElements = document.querySelectorAll('[data-english]');
                translatableElements.forEach(element => {
                    if (lang === 'english') {
                        element.textContent = element.getAttribute('data-english');
                    } else {
                        element.textContent = element.getAttribute('data-urdu');
                    }
                });
            }

            englishBtn.addEventListener('click', () => switchLanguage('english'));
            urduBtn.addEventListener('click', () => switchLanguage('urdu'));

            // Scroll animations
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.animate-on-scroll, .stagger-animation');
                elements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.classList.add('animated');
                    }
                });
            };
            animateOnScroll();
            window.addEventListener('scroll', animateOnScroll);

            // Animate stats counter
            const animateValue = (obj, start, end, duration) => {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    obj.innerHTML = Math.floor(progress * (end - start) + start);
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            };

            const startCounterAnimation = () => {
                const statNumbers = document.querySelectorAll('.stat-number');
                statNumbers.forEach(stat => {
                    const target = parseInt(stat.getAttribute('data-count'));
                    animateValue(stat, 0, target, 2000);
                });
            };

            const statsSection = document.querySelector('.stats-section');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        startCounterAnimation();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            if (statsSection) observer.observe(statsSection);
        });
    </script>
@endpush   
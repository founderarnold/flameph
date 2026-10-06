<!DOCTYPE html><html lang="en"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="web_standard" name="shell-type">
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&amp;family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<style>
    @layer base {
      html, body { margin: 0; padding: 0; }
      body { overscroll-behavior: none; }
      main > :first-child { margin-top: 0 !important; }
      main > :last-child { margin-bottom: 0 !important; }
    }
    ::-webkit-scrollbar { display: none; }
  </style>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            brand: {
              blue: "#003893",
              darkblue: "#002868",
              lightblue: "#EBF1FB",
              red: "#C8102E",
              darkred: "#A00C24",
              yellow: "#FDB813",
              gold: "#E6A100"
            },
            surface: "#F4F7FC",
            "surface-card": "#FFFFFF",
            "surface-muted": "#E9EFF8",
            "on-surface": "#111827",
            "on-surface-variant": "#4B5563"
          },
          fontFamily: {
            sans: ["Inter", "sans-serif"],
            display: ["Epilogue", "sans-serif"]
          }
        }
      }
    };
  </script>
</head>
<body class="bg-surface font-sans text-on-surface antialiased">
<!-- 1. GLOBAL HEADER (Matches Reference Image Exactly) -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm">
<!-- Top Announcement Banner -->
<div class="w-full bg-[#003893] text-white py-2 px-4 text-center text-xs md:text-sm font-medium tracking-wide">
<span style="font-family:'Arial Narrow', Arial, sans-serif; font-weight:400; text-decoration:none">Disclaimer: FLAME PH is a work in progress; its content, features, and ecosystem is evolving over time, with updates reflected on this website. Founders & Leaders: Join us in building the FLAMEPH ecosystem and FLAMEPH chapters nationwide.</span>
</div>
<!-- Main Navigation Bar -->
<div class="w-full max-w-[1360px] mx-auto px-4 sm:px-6 lg:px-8">
<div class="h-20 flex items-center justify-between gap-4">
<!-- Left Logo -->
<a class="flex items-center shrink-0" href="/">
<img alt="FLAME PH Logo" class="h-12 md:h-14 w-auto object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvHgw_7WRNmayY6-upAMneqGUlJ3QGt2A_RYX7O7Jy6XWdb1IPpgZeNs9c-SUHKDzwnezs7cw6egHtWBWdgUfhr7fw231xJqmnJM8yDzs0ukHsg6kpi9zju_6_1SeSPKABS_fXllS4px9UXEE1e87ZseCZ5ywGgmeUulAXA38WNNvAKy8ZelqlSFp5U4XetTM1H0NWCuE-4PZJK-XfBH5Q5bd4h3aQ_AyaxeIWq1bxSPl0Cguq07aMgiuQ05GRYXk0OtI">
</a>
<!-- Main Nav Links -->
<nav class="hidden lg:flex items-center gap-1 xl:gap-2 text-[15px] font-medium text-gray-700">
<a class="px-4 py-2 rounded-full bg-blue-50/80 text-brand-blue font-semibold hover:bg-blue-100 transition-colors" href="/">Home</a>
<a class="px-4 py-2 rounded-full hover:text-brand-blue hover:bg-gray-50 transition-colors" href="/membership/free-benefits">Membership</a>
<a class="px-4 py-2 rounded-full hover:text-brand-blue hover:bg-gray-50 transition-colors" href="/events">Events</a>
<a class="px-4 py-2 rounded-full hover:text-brand-blue hover:bg-gray-50 transition-colors" href="/learn">Resources</a>
<a class="px-4 py-2 rounded-full hover:text-brand-blue hover:bg-gray-50 transition-colors" href="/directory">Directory</a>
<a class="px-4 py-2 rounded-full hover:text-brand-blue hover:bg-gray-50 transition-colors" href="/about">About</a>
</nav>
<!-- Search Bar & Header Actions -->
<div class="flex items-center gap-3 sm:gap-4">
<!-- Search Capsule -->
<div class="relative hidden sm:flex items-center">
<span class="material-symbols-outlined absolute left-3.5 text-gray-400 text-[20px]">search</span>
<input class="w-48 md:w-56 lg:w-64 pl-10 pr-4 py-2 text-sm bg-gray-50 hover:bg-gray-100/80 focus:bg-white rounded-full border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand-blue/30 focus:border-brand-blue transition-all placeholder-gray-400" placeholder="Search FLAME PH..." type="search">
</div>
<!-- Log In Link -->
<a class="flex items-center gap-1 text-sm font-semibold text-gray-700 hover:text-brand-blue transition-colors px-2 py-1.5" href="{{ route('membership.profile') }}">
<span class="material-symbols-outlined text-[20px]">person</span>
<span class="">{{ $memberName }}</span>
</a>
<!-- Join CTA Button -->
<a class="inline-flex items-center gap-1.5 bg-[#C8102E] hover:bg-[#A00C24] text-white text-sm font-bold px-5 py-2.5 rounded-full shadow hover:shadow-md transition-all" href="{{ route('membership.profile') }}"><span class="material-symbols-outlined text-[18px]">person</span><span>My Member Profile</span></a>
</div>
</div>
</div>
<!-- 2. LOCAL MERCH SHOP SUB-NAVIGATION -->
<div class="w-full bg-slate-50/90 border-t border-b border-gray-200">
<div class="w-full max-w-[1360px] mx-auto px-4 sm:px-6 lg:px-8">
<nav class="flex items-center gap-2 sm:gap-4 overflow-x-auto py-2 text-xs md:text-sm font-semibold scrollbar-none whitespace-nowrap">
<a class="px-3.5 py-1.5 rounded-full bg-brand-blue text-white shadow-sm" href="#product-catalog">Shop All</a>
<span class="text-gray-300">|</span>
<a class="text-gray-600 hover:text-brand-blue transition-colors" href="#section-souvenirs">FLAME PH Souvenirs</a>
<span class="text-gray-300">|</span>
<a class="text-gray-600 hover:text-brand-blue transition-colors" href="#section-signature">FLAME Signature Products</a>
<span class="text-gray-300">|</span>
<a class="text-gray-600 hover:text-brand-blue transition-colors" href="#section-msme">Featured MSME Brands</a>
<span class="text-gray-300">|</span>
<a class="text-gray-600 hover:text-brand-blue transition-colors" href="#section-yobo">YOBO Custom Products</a>
<span class="text-gray-300">|</span>
<a class="text-gray-600 hover:text-brand-blue transition-colors" href="#affiliate-section">Affiliate Partners</a>
<span class="text-gray-300">|</span>
<a class="text-gray-600 hover:text-brand-blue transition-colors" href="#affiliate-section">Dropshipping Partners</a>
<span class="text-gray-300">|</span>
<a class="text-brand-blue font-bold hover:underline inline-flex items-center gap-1" href="#advocacy-section">
<span class="material-symbols-outlined text-[15px] text-brand-gold">handshake</span>
            How It Helps
          </a>
</nav>
</div>
</div>
</header>
<!-- Interactive Toast Notification -->
<div class="fixed bottom-8 right-8 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none flex items-center gap-2 bg-gray-900 text-white px-4 py-3 rounded-xl shadow-2xl" id="copy-toast">
<span class="material-symbols-outlined text-green-400 text-[20px]">check_circle</span>
<span class="text-sm font-medium">Affiliate link copied to clipboard!</span>
</div>
<main class="w-full pt-[132px] md:pt-[138px]">
<!-- HERO SECTION -->
<section class="relative w-full overflow-hidden bg-gradient-to-b from-[#003893]/10 via-[#F4F7FC] to-[#F4F7FC] pt-10 pb-16">
<div class="absolute -top-32 right-10 w-96 h-96 rounded-full bg-brand-blue/10 blur-3xl pointer-events-none"></div>
<div class="absolute -bottom-24 left-1/4 w-80 h-80 rounded-full bg-brand-yellow/15 blur-3xl pointer-events-none"></div>
<div class="w-full max-w-[1360px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
<div class="flex flex-col lg:flex-row items-center justify-between gap-12">
<!-- Hero Text -->
<div class="w-full lg:w-7/12 flex flex-col items-start gap-4">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-brand-blue/20 text-brand-blue shadow-sm">
<span class="text-base">🔥</span>
<span class="text-xs uppercase tracking-wider font-bold text-gray-800">100% Social Impact | Contribution to ₱750k+ Fund Goal</span>
</div>
<h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-black text-gray-900 tracking-tight leading-tight">
              Shop with Purpose.<br>
<span class="text-brand-blue">Support the Movement.</span>
</h1>
<p class="text-base sm:text-lg text-gray-600 max-w-2xl leading-relaxed">
              Every purchase from the FLAME PH Merch Shop helps support our advocacy programs, educational events, livelihood initiatives, and inclusive digital participation programs.
            </p>
<div class="flex flex-wrap items-center gap-4 pt-2">
<a class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full bg-[#C8102E] hover:bg-[#A00C24] text-white font-bold text-sm shadow-md hover:shadow-lg transition-all" href="#product-catalog">
<span class="">Explore Products</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
<a class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full bg-white border-2 border-brand-blue text-brand-blue hover:bg-brand-lightblue font-bold text-sm shadow-sm transition-all" href="#affiliate-section">
<span class="material-symbols-outlined text-[18px]">group_add</span>
<span class="">Become an Affiliate Partner</span>
</a>
</div>
</div>
<!-- Hero Impact Fund Progress Visual -->
<div class="w-full lg:w-5/12 flex justify-center lg:justify-end">
<div class="w-full max-w-md bg-white p-6 rounded-2xl shadow-xl border border-gray-100 flex flex-col gap-4 relative overflow-hidden">
<div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-brand-blue via-brand-yellow to-brand-red"></div>
<div class="flex items-center justify-between">
<div>
<span class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Current Campaign Drive</span>
<h3 class="font-display text-xl font-bold text-gray-900">Empowerment Fund 2025</h3>
</div>
<span class="px-2.5 py-1 rounded-full bg-green-50 border border-green-200 text-green-700 font-bold text-xs">Active</span>
</div>
<div class="flex items-baseline justify-between pt-1">
<span class="font-display text-4xl font-extrabold text-brand-blue leading-none">₱524,800</span>
<span class="text-xs font-medium text-gray-500">Target: ₱750,000</span>
</div>
<!-- Segmented Civic Meter -->
<div class="space-y-1.5">
<div class="h-3.5 w-full bg-gray-100 rounded-full overflow-hidden flex p-0.5 border border-gray-200">
<div class="h-full bg-brand-blue rounded-l-full" style="width: 70%;"></div>
<div class="h-full bg-brand-yellow" style="width: 15%;"></div>
<div class="h-full bg-brand-red rounded-r-full" style="width: 15%;"></div>
</div>
<div class="flex justify-between text-xs font-semibold text-gray-500">
<span class="">70% Funded via Merch</span>
<span class="">4,200+ Beneficiaries Direct Impact</span>
</div>
</div>
<div class="bg-blue-50/70 border border-brand-blue/20 p-3 rounded-xl flex items-center gap-3">
<span class="material-symbols-outlined text-brand-blue text-[24px]">verified</span>
<p class="text-xs text-gray-700 leading-snug">
                  Audited monthly by our Civic Advisory Board. Verified community payout slips.
                </p>
</div>
</div>
</div>
</div>
<!-- Trust Metrics Bar -->
<div class="mt-12 grid grid-cols-2 lg:grid-cols-4 gap-4 bg-white p-5 rounded-2xl shadow-sm border border-gray-200">
<div class="flex items-center gap-3 p-2">
<div class="w-11 h-11 rounded-xl bg-blue-50 text-brand-blue flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">storefront</span>
</div>
<div>
<span class="block text-sm font-bold text-gray-900">Verified Makers</span>
<span class="block text-xs text-gray-500">100% Grassroots Hubs</span>
</div>
</div>
<div class="flex items-center gap-3 p-2">
<div class="w-11 h-11 rounded-xl bg-amber-50 text-brand-gold flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">pie_chart</span>
</div>
<div>
<span class="block text-sm font-bold text-gray-900">5-15% Allocation</span>
<span class="block text-xs text-gray-500">Transparent Fund Share</span>
</div>
</div>
<div class="flex items-center gap-3 p-2">
<div class="w-11 h-11 rounded-xl bg-red-50 text-brand-red flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">payments</span>
</div>
<div>
<span class="block text-sm font-bold text-gray-900">Direct Payouts</span>
<span class="block text-xs text-gray-500">Direct Community Remittance</span>
</div>
</div>
<div class="flex items-center gap-3 p-2">
<div class="w-11 h-11 rounded-xl bg-blue-50 text-brand-blue flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">diversity_3</span>
</div>
<div>
<span class="block text-sm font-bold text-gray-900">4,200+ Lives Reached</span>
<span class="block text-xs text-gray-500">Across 18 City Chapters</span>
</div>
</div>
</div>
</div>
</section>
<!-- ADVOCACY IMPACT SECTION -->
<section class="w-full max-w-[1360px] mx-auto px-4 sm:px-6 lg:px-8 py-14" id="advocacy-section">
<div class="flex flex-col gap-8">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<span class="text-xs font-bold text-brand-blue uppercase tracking-widest">Advocacy In Action</span>
<h2 class="font-display text-2xl md:text-3xl font-extrabold text-gray-900 mt-1">Your Purchase Creates Opportunities</h2>
</div>
<p class="text-sm md:text-base text-gray-600 max-w-md">
            We transform civic support into durable vocational stability and decentralized community commerce.
          </p>
</div>
<!-- Verbatim Charter Quote Card -->
<div class="w-full bg-white p-6 sm:p-8 rounded-2xl shadow-sm border-l-4 border-brand-red border-y border-r border-gray-200">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-brand-red text-3xl md:text-4xl shrink-0">format_quote</span>
<div class="flex flex-col gap-2">
<blockquote class="text-base sm:text-lg text-gray-800 italic leading-relaxed">
                “Every purchase from the FLAME PH Merch Store supports educational events and livelihood opportunities for out-of-school youth, unemployed women, smartphone-capable persons with disabilities, ALS graduates, and able-bodied, smartphone-capable senior citizens.”
              </blockquote>
<cite class="text-sm font-bold text-brand-blue not-italic">— FLAME PH Social Charter</cite>
</div>
</div>
</div>
<!-- 4 Impact Pillars -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
<div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-3 hover:shadow-md transition-shadow">
<div class="w-12 h-12 rounded-xl bg-blue-50 text-brand-blue flex items-center justify-center">
<span class="material-symbols-outlined text-[26px]">school</span>
</div>
<h4 class="font-display text-lg font-bold text-gray-900">Education &amp; Skills Development</h4>
<p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
              ALS scholarship support, mobile printing, vocational certifications, and intensive digital workshops for youth.
            </p>
<div class="mt-auto pt-2 text-xs font-bold text-brand-red uppercase tracking-wider">
              850+ Learners Graduated
            </div>
</div>
<div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-3 hover:shadow-md transition-shadow">
<div class="w-12 h-12 rounded-xl bg-blue-50 text-brand-blue flex items-center justify-center">
<span class="material-symbols-outlined text-[26px]">front_hand</span>
</div>
<h4 class="font-display text-lg font-bold text-gray-900">Inclusive Livelihood</h4>
<p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
              Direct handcrafted production orders, dignified income, and fair compensation for unemployed mothers and PWD weavers.
            </p>
<div class="mt-auto pt-2 text-xs font-bold text-brand-red uppercase tracking-wider">
              320+ Sewing Families
            </div>
</div>
<div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-3 hover:shadow-md transition-shadow">
<div class="w-12 h-12 rounded-xl bg-blue-50 text-brand-blue flex items-center justify-center">
<span class="material-symbols-outlined text-[26px]">smartphone</span>
</div>
<h4 class="font-display text-lg font-bold text-gray-900">Digital Participation</h4>
<p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
              Smartphone maker bootcamps, e-commerce onboarding, and remote micro-earning tools for seniors and students.
            </p>
<div class="mt-auto pt-2 text-xs font-bold text-brand-red uppercase tracking-wider">
              1,400+ Smart Advocates
            </div>
</div>
<div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-3 hover:shadow-md transition-shadow">
<div class="w-12 h-12 rounded-xl bg-blue-50 text-brand-blue flex items-center justify-center">
<span class="material-symbols-outlined text-[26px]">hub</span>
</div>
<h4 class="font-display text-lg font-bold text-gray-900">MSME &amp; Community Power</h4>
<p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
              Zero-extortion marketplace listing, zero listing fees, and ethical logistics for local provincial cooperatives.
            </p>
<div class="mt-auto pt-2 text-xs font-bold text-brand-red uppercase tracking-wider">
              42 Cooperatives Backed
            </div>
</div>
</div>
</div>
</section>
<!-- SEARCH & FILTER BAR -->
<section class="w-full bg-white border-y border-gray-200 py-5 md:sticky md:top-[138px] z-30 shadow-sm" id="product-catalog">
<div class="w-full max-w-[1360px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-4">
<div class="flex flex-col lg:flex-row items-center justify-between gap-4">
<!-- Search -->
<div class="relative w-full lg:w-7/12">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-[20px]">search</span>
<input class="w-full bg-gray-50 hover:bg-gray-100/70 focus:bg-white h-12 pl-12 pr-4 rounded-xl text-gray-900 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-blue border border-gray-200 transition-all" placeholder="Search souvenirs, bundles, MSME goods, or customized apparel..." type="search">
</div>
<!-- Sort and In Stock -->
<div class="flex items-center justify-between w-full lg:w-auto gap-3">
<div class="flex items-center gap-2 bg-gray-50 px-3 h-12 rounded-xl border border-gray-200">
<span class="material-symbols-outlined text-brand-blue text-[20px]">sort</span>
<label class="sr-only" for="sort-select">Sort products</label>
<select class="bg-transparent text-xs sm:text-sm font-semibold text-gray-700 focus:outline-none cursor-pointer" id="sort-select">
<option value="featured">Sort: Featured / Impact</option>
<option value="price-asc">Price: Low to High</option>
<option value="price-desc">Price: High to Low</option>
<option value="commission">Highest Affiliate Commission</option>
</select>
</div>
<div class="flex items-center gap-2 bg-gray-50 px-4 h-12 rounded-xl border border-gray-200">
<span class="w-2.5 h-2.5 rounded-full bg-green-500 animate-pulse"></span>
<span class="text-xs sm:text-sm font-semibold text-gray-700 whitespace-nowrap">In Stock (120+)</span>
</div>
</div>
</div>
<!-- Filter Pills -->
<div class="flex items-center gap-2 overflow-x-auto scrollbar-none py-1">
<button class="px-4 py-2 rounded-full bg-brand-blue text-white text-xs font-bold whitespace-nowrap shadow-sm">All Products</button>
<a class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 text-xs font-semibold whitespace-nowrap transition-colors" href="#section-souvenirs">FLAME PH Souvenirs</a>
<a class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 text-xs font-semibold whitespace-nowrap transition-colors" href="#section-signature">FLAME Signature Products</a>
<a class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 text-xs font-semibold whitespace-nowrap transition-colors" href="#section-msme">Featured MSME Brands</a>
<a class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 text-xs font-semibold whitespace-nowrap transition-colors" href="#section-yobo">YOBO Custom Products</a>
<button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 text-xs font-semibold whitespace-nowrap transition-colors">Gifts and Bundles</button>
<button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 text-xs font-semibold whitespace-nowrap transition-colors">Limited Edition</button>
<button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 text-xs font-semibold whitespace-nowrap transition-colors">Dropship-Ready Products</button>
</div>
</div>
</section>
<!-- PRODUCT LISTINGS -->
<div class="w-full max-w-[1360px] mx-auto px-4 sm:px-6 lg:px-8 py-12 flex flex-col gap-16">
<!-- Section A: FLAME PH Souvenirs and Tokens -->
<section class="flex flex-col gap-6" id="section-souvenirs">
<div class="flex items-center justify-between">
<div>
<span class="text-xs font-bold text-brand-blue uppercase tracking-wider">Official Merchandise</span>
<h3 class="font-display text-2xl font-bold text-gray-900">FLAME PH Souvenirs and Tokens</h3>
</div>
<a class="text-xs sm:text-sm font-bold text-brand-blue hover:underline flex items-center gap-1" href="#">
<span class="">View All Souvenirs</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</a>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
<!-- Item A1 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden group">
<div class="relative w-full aspect-square bg-gray-100 overflow-hidden">
<img alt="FLAME Advocacy Classic Statement Shirt" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA3IA6S0TwfOoi89zAtdJl_YDi5Mdif91wP3i2-VCOSkGUpN1q7_ffLLNn4HQLPox7l6du6LSwn8mOM2g80LjLKsaxbOaycTPf8j93e4A2uRLWk9xOFPRfURBFs4j_I75olRIwBBWPKsZwR5No2NKesT6_dgGjrnwOfxKQq57kQe5_AYkPBjW7Mw5HhBsSAkS093x56zcrGJOVI8Vl1pEYJY13tsZ_Tn1CZbd2qSHsbFMKNTUeNbN7qjA">
<div class="absolute top-3 left-3 flex flex-col gap-1 items-start">
<span class="bg-brand-red text-white text-[10px] uppercase font-bold px-2 py-0.5 rounded-full shadow-sm">Best Seller</span>
<span class="bg-white text-gray-900 text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">100% Cotton</span>
</div>
<button aria-label="Add to wishlist" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm text-gray-500 hover:text-brand-red flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</button>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-brand-blue font-bold text-[10px] px-2 py-0.5 rounded shadow-sm inline-block">Direct Impact: ₱120 to Youth</span>
</div>
</div>
<div class="p-4 flex flex-col flex-1 justify-between gap-3">
<div>
<span class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Wearable Advocacy</span>
<h4 class="font-display text-base font-bold text-gray-900 mt-0.5">FLAME Advocacy Classic Statement Shirt</h4>
<p class="text-xs text-gray-600 mt-1">100% combed cotton, screenprinted by Tondo Youth Workshop.</p>
</div>
<div class="flex items-center justify-between pt-1 border-t border-gray-100">
<span class="font-display text-xl font-extrabold text-brand-blue">₱499</span>
<div class="bg-blue-50 px-2 py-1 rounded text-[11px] font-bold text-brand-blue flex items-center gap-1 border border-blue-100">
<span class="material-symbols-outlined text-[13px] text-brand-gold">savings</span>
<span class="">Earn 5% (₱25)</span>
</div>
</div>
<div class="flex flex-col gap-1.5 pt-1">
<div class="grid grid-cols-2 gap-1.5">
<button class="w-full py-2 rounded-lg bg-gray-100 text-gray-800 text-xs font-bold hover:bg-gray-200 transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
<span class="">Cart</span>
</button>
<button class="w-full py-2 rounded-lg bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors">
                    Buy Now
                  </button>
</div>
<button class="w-full py-1.5 rounded-lg bg-blue-50/50 hover:bg-blue-100 text-brand-blue text-xs font-semibold flex items-center justify-center gap-1 transition-colors" onclick="copyAffiliateLink('https://flameph.org/aff/item-a1')">
<span class="material-symbols-outlined text-[14px]">share</span>
<span class="">Share Affiliate Link</span>
</button>
</div>
</div>
</div>
<!-- Item A2 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden group">
<div class="relative w-full aspect-square bg-gray-100 overflow-hidden">
<img alt="FLAME Commemorative Embroidered Cap" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBmF2ffc6LQnI-K3IyJKzEqhMvVTAEhCubpw-mR_oLydMJPoLGZPCz5X44b8HTmcC2ZiITikSV3wqfAf1KWv6HGAEOfnvzL06qdzwFAY0rcFGOHIzUhknDQkzOMTEFNZM_dfadQCHZM6fXCYs7mnF8K_j-h24dLf1EixoPl0f5frlWdGafhp0n8ZLaapB-L13EKeO6klui5HApeEoGY775aelH3yu93Ba-wo4fP46ZycBPAmTU-ijik3Q">
<div class="absolute top-3 left-3 flex flex-col gap-1 items-start">
<span class="bg-white text-brand-blue text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">Structured Twill</span>
</div>
<button aria-label="Add to wishlist" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm text-gray-500 hover:text-brand-red flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</button>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-brand-blue font-bold text-[10px] px-2 py-0.5 rounded shadow-sm inline-block">Direct Impact: ₱80 to Tech Hubs</span>
</div>
</div>
<div class="p-4 flex flex-col flex-1 justify-between gap-3">
<div>
<span class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Headwear</span>
<h4 class="font-display text-base font-bold text-gray-900 mt-0.5">FLAME Commemorative Embroidered Cap</h4>
<p class="text-xs text-gray-600 mt-1">Structured breathable twill with brass buckle strap, supporting digital literacy hubs.</p>
</div>
<div class="flex items-center justify-between pt-1 border-t border-gray-100">
<span class="font-display text-xl font-extrabold text-brand-blue">₱380</span>
<div class="bg-blue-50 px-2 py-1 rounded text-[11px] font-bold text-brand-blue flex items-center gap-1 border border-blue-100">
<span class="material-symbols-outlined text-[13px] text-brand-gold">savings</span>
<span class="">Earn 4% (₱15.20)</span>
</div>
</div>
<div class="flex flex-col gap-1.5 pt-1">
<div class="grid grid-cols-2 gap-1.5">
<button class="w-full py-2 rounded-lg bg-gray-100 text-gray-800 text-xs font-bold hover:bg-gray-200 transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
<span class="">Cart</span>
</button>
<button class="w-full py-2 rounded-lg bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors">
                    Buy Now
                  </button>
</div>
<button class="w-full py-1.5 rounded-lg bg-blue-50/50 hover:bg-blue-100 text-brand-blue text-xs font-semibold flex items-center justify-center gap-1 transition-colors" onclick="copyAffiliateLink('https://flameph.org/aff/item-a2')">
<span class="material-symbols-outlined text-[14px]">share</span>
<span class="">Share Affiliate Link</span>
</button>
</div>
</div>
</div>
<!-- Item A3 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden group">
<div class="relative w-full aspect-square bg-gray-100 overflow-hidden">
<img alt="Empowerment Canvas Heavy-Duty Tote" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYBNs1WYNBON4dawoC3VZGmFwh9SMMhjNGIP_MEwXOS41V-zLwrZ4jkQ9dW0abTbJCBYVLShJGbzjcOPMKu-2j49hPQ4xGyPagK1BAtgNEYk2sCl5Dnlhti5u1KdxsZlQHsvOqwFz4bCTAnQmveJeeXP1dBb8FDp0SdW5a7Bipsj1-UHkdxVB3n6-sN8wlYR72PJIpJhb7OAN0nrszOofnNCFsq-pqpQODOUGjOFRQB7VD96DyESMw9A">
<div class="absolute top-3 left-3 flex flex-col gap-1 items-start">
<span class="bg-white text-brand-blue text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">Heavy Canvas</span>
</div>
<button aria-label="Add to wishlist" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm text-gray-500 hover:text-brand-red flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</button>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-brand-blue font-bold text-[10px] px-2 py-0.5 rounded shadow-sm inline-block">Direct Impact: ₱90 to Mothers</span>
</div>
</div>
<div class="p-4 flex flex-col flex-1 justify-between gap-3">
<div>
<span class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Bags &amp; Carry</span>
<h4 class="font-display text-base font-bold text-gray-900 mt-0.5">Empowerment Canvas Heavy-Duty Tote</h4>
<p class="text-xs text-gray-600 mt-1">Thick woven cotton canvas with inner pocket, sewn by urban mothers livelihood group.</p>
</div>
<div class="flex items-center justify-between pt-1 border-t border-gray-100">
<span class="font-display text-xl font-extrabold text-brand-blue">₱290</span>
<div class="bg-blue-50 px-2 py-1 rounded text-[11px] font-bold text-brand-blue flex items-center gap-1 border border-blue-100">
<span class="material-symbols-outlined text-[13px] text-brand-gold">savings</span>
<span class="">Earn 5% (₱14.50)</span>
</div>
</div>
<div class="flex flex-col gap-1.5 pt-1">
<div class="grid grid-cols-2 gap-1.5">
<button class="w-full py-2 rounded-lg bg-gray-100 text-gray-800 text-xs font-bold hover:bg-gray-200 transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
<span class="">Cart</span>
</button>
<button class="w-full py-2 rounded-lg bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors">
                    Buy Now
                  </button>
</div>
<button class="w-full py-1.5 rounded-lg bg-blue-50/50 hover:bg-blue-100 text-brand-blue text-xs font-semibold flex items-center justify-center gap-1 transition-colors" onclick="copyAffiliateLink('https://flameph.org/aff/item-a3')">
<span class="material-symbols-outlined text-[14px]">share</span>
<span class="">Share Affiliate Link</span>
</button>
</div>
</div>
</div>
<!-- Item A4 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden group">
<div class="relative w-full aspect-square bg-gray-100 overflow-hidden">
<img alt="FLAME Enamel Pin &amp; Supporter Card Set" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAT-Cg2iqQfmi3-k037p1L-P-H4cAJi5JfkwTFAAB2xvghZnN7Q4Zy3hxSvEC0jsz3n86W4JZTIdOUbCF1ZjIYV89chyPVnue3ZLPBrdpjEniJtyUNn7zUV7ycI11yx9smYyYB551u5asxq3WzAtkKPdYQ-7rfk7BVjcNRqoiG7_qW-j_wUI1ozDNkaI6l271gGqjmtOsSlB7PKVqQ1_1CqcQm8ncAI0aOLcVXDXIXMhY2VgwaNVBQhLw">
<div class="absolute top-3 left-3 flex flex-col gap-1 items-start">
<span class="bg-white text-brand-blue text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">Collector Pin</span>
</div>
<button aria-label="Add to wishlist" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm text-gray-500 hover:text-brand-red flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</button>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-brand-blue font-bold text-[10px] px-2 py-0.5 rounded shadow-sm inline-block">Direct Impact: ₱50 to Scholars</span>
</div>
</div>
<div class="p-4 flex flex-col flex-1 justify-between gap-3">
<div>
<span class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Collectibles</span>
<h4 class="font-display text-base font-bold text-gray-900 mt-0.5">FLAME Enamel Pin &amp; Supporter Card Set</h4>
<p class="text-xs text-gray-600 mt-1">Gold enamel pin with butterfly clutch and serial numbered advocacy passport card.</p>
</div>
<div class="flex items-center justify-between pt-1 border-t border-gray-100">
<span class="font-display text-xl font-extrabold text-brand-blue">₱180</span>
<div class="bg-blue-50 px-2 py-1 rounded text-[11px] font-bold text-brand-blue flex items-center gap-1 border border-blue-100">
<span class="material-symbols-outlined text-[13px] text-brand-gold">savings</span>
<span class="">Earn 3% (₱5.40)</span>
</div>
</div>
<div class="flex flex-col gap-1.5 pt-1">
<div class="grid grid-cols-2 gap-1.5">
<button class="w-full py-2 rounded-lg bg-gray-100 text-gray-800 text-xs font-bold hover:bg-gray-200 transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
<span class="">Cart</span>
</button>
<button class="w-full py-2 rounded-lg bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors">
                    Buy Now
                  </button>
</div>
<button class="w-full py-1.5 rounded-lg bg-blue-50/50 hover:bg-blue-100 text-brand-blue text-xs font-semibold flex items-center justify-center gap-1 transition-colors" onclick="copyAffiliateLink('https://flameph.org/aff/item-a4')">
<span class="material-symbols-outlined text-[14px]">share</span>
<span class="">Share Affiliate Link</span>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- Section B: FLAME Signature Products (Curated Bundles) -->
<section class="flex flex-col gap-6" id="section-signature">
<div class="flex items-center justify-between">
<div>
<span class="text-xs font-bold text-brand-blue uppercase tracking-wider">Curated Impact Kits</span>
<h3 class="font-display text-2xl font-bold text-gray-900">FLAME Signature Products</h3>
</div>
<a class="text-xs sm:text-sm font-bold text-brand-blue hover:underline flex items-center gap-1" href="#">
<span class="">Explore All Bundles</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Item B1 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden group">
<div class="relative w-full aspect-[4/3] bg-gray-100 overflow-hidden">
<img alt="Advocacy Starter Kit" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDVfj0HPA99yERr2sZI9M5LZjCKy7cxTWAPi9LQo0QTvZbjw_-PKm6BZVZPi3prQ2OB5roYEFmEMMoBKBva6pz7VvN2yLUcxNpkD5GjX5rP1pdM1suWG3mec-ZEANV3y29L3nBG5Gd2P_6DWCYt9md6fGztvFCo3VKhYnVxOTntt_7O2SUvBpi9JZv6fDlbfsi8LeP_0miUu19kUHiGz-XTrpqgv_indRZAiP1n0L02yTMh_0gPGmrbyA">
<div class="absolute top-3 left-3">
<span class="bg-brand-red text-white text-[10px] uppercase font-bold px-2.5 py-0.5 rounded-full shadow-sm">Advocacy Bundle</span>
</div>
<button aria-label="Add to wishlist" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm text-gray-500 hover:text-brand-red flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</button>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-brand-blue font-bold text-[10px] px-2 py-0.5 rounded shadow-sm inline-block">Direct Community Share: ₱350</span>
</div>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-3">
<div>
<span class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Full Supporter Experience</span>
<h4 class="font-display text-lg font-bold text-gray-900 mt-0.5">Advocacy Starter Kit</h4>
<p class="text-xs sm:text-sm text-gray-600 mt-1">Includes Signature Shirt, Canvas Heavy Tote, Enamel Pin Set, and FSC-certified Impact Journal.</p>
</div>
<div class="flex items-center justify-between pt-2 border-t border-gray-100">
<span class="font-display text-2xl font-extrabold text-brand-blue">₱1,250</span>
<div class="bg-blue-50 px-2 py-1 rounded text-[11px] font-bold text-brand-blue flex items-center gap-1 border border-blue-100">
<span class="material-symbols-outlined text-[13px] text-brand-gold">savings</span>
<span class="">Earn 5% (₱62.50)</span>
</div>
</div>
<div class="flex flex-col gap-1.5 pt-1">
<div class="grid grid-cols-2 gap-1.5">
<button class="w-full py-2.5 rounded-lg bg-gray-100 text-gray-800 text-xs font-bold hover:bg-gray-200 transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
<span class="">Cart</span>
</button>
<button class="w-full py-2.5 rounded-lg bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors">
                    Buy Now
                  </button>
</div>
<button class="w-full py-1.5 rounded-lg bg-blue-50/50 hover:bg-blue-100 text-brand-blue text-xs font-semibold flex items-center justify-center gap-1 transition-colors" onclick="copyAffiliateLink('https://flameph.org/aff/item-b1')">
<span class="material-symbols-outlined text-[14px]">share</span>
<span class="">Share Affiliate Link</span>
</button>
</div>
</div>
</div>
<!-- Item B2 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden group">
<div class="relative w-full aspect-[4/3] bg-gray-100 overflow-hidden">
<img alt="Learning &amp; Livelihood Bundle" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDdPGCt4kiPeuTKzFv_D-IRaKVhag20oxfSlBXv7rgF5PQ1WouJ_xClSSXCTvHVqRASqpwi8DcAxD7X9GLfz62huPDdOYXuCGOlGmag07UNW7nlGRlVXW5CLS85g0-7d7gleV1kk_xvKKXXuAujApySfWqPcPFjrDAlQeevLl5Tpiq4tTmXENjugRP7jAYL8W01IvkO1_E6OnZl5Ex29vD5iNfWsM6kLiQvnf3gDk8cV8KIfILx8f8WQ">
<div class="absolute top-3 left-3">
<span class="bg-brand-blue text-white text-[10px] uppercase font-bold px-2.5 py-0.5 rounded-full shadow-sm">ALS Sponsorship</span>
</div>
<button aria-label="Add to wishlist" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm text-gray-500 hover:text-brand-red flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</button>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-brand-blue font-bold text-[10px] px-2 py-0.5 rounded shadow-sm inline-block">Direct Impact: 1 Student Learning Kit</span>
</div>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-3">
<div>
<span class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Schooling &amp; Materials</span>
<h4 class="font-display text-lg font-bold text-gray-900 mt-0.5">Learning &amp; Livelihood Bundle</h4>
<p class="text-xs sm:text-sm text-gray-600 mt-1">Directly funds module print and school supplies kit for ALS learners. Includes canvas sleeve + bamboo pen set.</p>
</div>
<div class="flex items-center justify-between pt-2 border-t border-gray-100">
<span class="font-display text-2xl font-extrabold text-brand-blue">₱890</span>
<div class="bg-blue-50 px-2 py-1 rounded text-[11px] font-bold text-brand-blue flex items-center gap-1 border border-blue-100">
<span class="material-symbols-outlined text-[13px] text-brand-gold">savings</span>
<span class="">Earn 4% (₱35.60)</span>
</div>
</div>
<div class="flex flex-col gap-1.5 pt-1">
<div class="grid grid-cols-2 gap-1.5">
<button class="w-full py-2.5 rounded-lg bg-gray-100 text-gray-800 text-xs font-bold hover:bg-gray-200 transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
<span class="">Cart</span>
</button>
<button class="w-full py-2.5 rounded-lg bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors">
                    Buy Now
                  </button>
</div>
<button class="w-full py-1.5 rounded-lg bg-blue-50/50 hover:bg-blue-100 text-brand-blue text-xs font-semibold flex items-center justify-center gap-1 transition-colors" onclick="copyAffiliateLink('https://flameph.org/aff/item-b2')">
<span class="material-symbols-outlined text-[14px]">share</span>
<span class="">Share Affiliate Link</span>
</button>
</div>
</div>
</div>
<!-- Item B3 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden group">
<div class="relative w-full aspect-[4/3] bg-gray-100 overflow-hidden">
<img alt="Digital Inclusion Supporter Kit" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIFMiFzlHKXfs-2kozUR-c-L6xPWV921Mnf06B9bk9a4WquYy6RJKtx-548-AB7osAzrJEYHlTQqYFhTlPEYXIX_ceytr1t0PcBwNL-FHBMg7tNNJnYchHAREZ3-T3q2YLF4lM1WAvlnsCGRMNumbZ0wBxLSCFySD02iWYbUwaMYHtBAlbkWYTjh7RB6pw580Rilk7S33-D8b9_ZqOtwk6NfAoBZVoWUQCfx5kN6rQCWXCL-Yuyt44og">
<div class="absolute top-3 left-3">
<span class="bg-amber-600 text-white text-[10px] uppercase font-bold px-2.5 py-0.5 rounded-full shadow-sm">Senior Inclusion</span>
</div>
<button aria-label="Add to wishlist" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm text-gray-500 hover:text-brand-red flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</button>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-brand-blue font-bold text-[10px] px-2 py-0.5 rounded shadow-sm inline-block">Direct Impact: 2 Senior Digital Hours</span>
</div>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-3">
<div>
<span class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Civic Tech Support</span>
<h4 class="font-display text-lg font-bold text-gray-900 mt-0.5">Digital Inclusion Supporter Kit</h4>
<p class="text-xs sm:text-sm text-gray-600 mt-1">Phone grip stand, recycled pouch, digital advocate badge, and smartphone guide for senior citizens.</p>
</div>
<div class="flex items-center justify-between pt-2 border-t border-gray-100">
<span class="font-display text-2xl font-extrabold text-brand-blue">₱650</span>
<div class="bg-blue-50 px-2 py-1 rounded text-[11px] font-bold text-brand-blue flex items-center gap-1 border border-blue-100">
<span class="material-symbols-outlined text-[13px] text-brand-gold">savings</span>
<span class="">Earn 3% (₱19.50)</span>
</div>
</div>
<div class="flex flex-col gap-1.5 pt-1">
<div class="grid grid-cols-2 gap-1.5">
<button class="w-full py-2.5 rounded-lg bg-gray-100 text-gray-800 text-xs font-bold hover:bg-gray-200 transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
<span class="">Cart</span>
</button>
<button class="w-full py-2.5 rounded-lg bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors">
                    Buy Now
                  </button>
</div>
<button class="w-full py-1.5 rounded-lg bg-blue-50/50 hover:bg-blue-100 text-brand-blue text-xs font-semibold flex items-center justify-center gap-1 transition-colors" onclick="copyAffiliateLink('https://flameph.org/aff/item-b3')">
<span class="material-symbols-outlined text-[14px]">share</span>
<span class="">Share Affiliate Link</span>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- Section C: Featured FLAME PH MSME Brands -->
<section class="flex flex-col gap-6" id="section-msme">
<div class="flex items-center justify-between">
<div>
<span class="text-xs font-bold text-brand-blue uppercase tracking-wider">Local Community Cooperatives</span>
<h3 class="font-display text-2xl font-bold text-gray-900">Featured FLAME PH MSME Brands</h3>
</div>
<a class="text-xs sm:text-sm font-bold text-brand-blue hover:underline flex items-center gap-1" href="#">
<span class="">Meet All Producers</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Item C1 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden group">
<div class="relative w-full aspect-square bg-gray-100 overflow-hidden">
<img alt="Artisanal Herbal Wellness Soap Trio" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrFZp2lID-ptVWZgY-ZqYzLEA7xlopg6HVzFsONS4_ULGO_HK9KeuyORNsTIrhyzBQwbC0Sb9Zz3GT9RkEwClgcB2sXtklA92QNVEkoMMU8viPjRgRgDxHbIwNQF8NHSjI1VGiSWDikED1cbTp9WfYnYWMAkxQhYLg2eZZayVQLbQuQZTyRlQ-sBQ8mXUnOKgZjALHvhuLlXhP7n_LC1MgLmhRS34GSpYICFk2cSCMc5UhpK4O7rq4sw">
<div class="absolute top-3 left-3">
<span class="bg-white text-brand-blue text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">Co-op Direct</span>
</div>
<button aria-label="Add to wishlist" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm text-gray-500 hover:text-brand-red flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</button>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-gray-700 font-medium text-[10px] px-2 py-0.5 rounded shadow-sm inline-block">Maker: Lumina Handcrafted (Rizal)</span>
</div>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-3">
<div>
<span class="text-[10px] font-bold text-brand-gold uppercase">Organic Wellness</span>
<h4 class="font-display text-base font-bold text-gray-900 mt-0.5">Artisanal Herbal Wellness Soap Trio</h4>
<p class="text-xs text-gray-600 mt-1">Cold-pressed with virgin coconut oil, moringa extract, and lemongrass.</p>
</div>
<div class="flex items-center justify-between pt-1 border-t border-gray-100">
<span class="font-display text-xl font-extrabold text-brand-blue">₱320</span>
<div class="bg-blue-50 px-2 py-1 rounded text-[11px] font-bold text-brand-blue flex items-center gap-1 border border-blue-100">
<span class="material-symbols-outlined text-[13px] text-brand-gold">savings</span>
<span class="">Earn 5% (₱16)</span>
</div>
</div>
<div class="flex flex-col gap-1.5 pt-1">
<div class="grid grid-cols-2 gap-1.5">
<button class="w-full py-2 rounded-lg bg-gray-100 text-gray-800 text-xs font-bold hover:bg-gray-200 transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
<span class="">Cart</span>
</button>
<button class="w-full py-2 rounded-lg bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors">
                    Buy Now
                  </button>
</div>
<button class="w-full py-1.5 rounded-lg bg-blue-50/50 hover:bg-blue-100 text-brand-blue text-xs font-semibold flex items-center justify-center gap-1 transition-colors" onclick="copyAffiliateLink('https://flameph.org/aff/item-c1')">
<span class="material-symbols-outlined text-[14px]">share</span>
<span class="">Share Affiliate Link</span>
</button>
</div>
</div>
</div>
<!-- Item C2 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden group">
<div class="relative w-full aspect-square bg-gray-100 overflow-hidden">
<img alt="Handwoven Inabel Multi-Use Pouch" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCwptvtGKZRWSyugD_6WYS6aQq1Byhms6R41yGQrWxTVzsEvUb5ML99PPY1_hMZv1tFPiGq_Yb87lTOdj6NYWZqmPEKcuGiXNPYgVyAElypylpMTEFEn4nbLHYkZ9N5XGIQSGc-0SgOwOjhc9N7SvKA9lVlcKXVTz7-EfE6xfxU6v2YjOKRIKwbVAMYBwkZpF8XD6xgM49nVbUGMNHxhn3BVofLIuJQlFunnpdHB4wttRF1VgosljC4pQ">
<div class="absolute top-3 left-3">
<span class="bg-white text-brand-blue text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">Heritage Weave</span>
</div>
<button aria-label="Add to wishlist" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm text-gray-500 hover:text-brand-red flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</button>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-gray-700 font-medium text-[10px] px-2 py-0.5 rounded shadow-sm inline-block">Maker: Habing Pag-asa (Ilocos Sur)</span>
</div>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-3">
<div>
<span class="text-[10px] font-bold text-brand-gold uppercase">Indigenous Craft</span>
<h4 class="font-display text-base font-bold text-gray-900 mt-0.5">Handwoven Inabel Multi-Use Pouch</h4>
<p class="text-xs text-gray-600 mt-1">Authentic traditional loom-woven fabric with YKK brass zipper, protecting indigenous weaving knowledge.</p>
</div>
<div class="flex items-center justify-between pt-1 border-t border-gray-100">
<span class="font-display text-xl font-extrabold text-brand-blue">₱450</span>
<div class="bg-blue-50 px-2 py-1 rounded text-[11px] font-bold text-brand-blue flex items-center gap-1 border border-blue-100">
<span class="material-symbols-outlined text-[13px] text-brand-gold">savings</span>
<span class="">Earn 4% (₱18)</span>
</div>
</div>
<div class="flex flex-col gap-1.5 pt-1">
<div class="grid grid-cols-2 gap-1.5">
<button class="w-full py-2 rounded-lg bg-gray-100 text-gray-800 text-xs font-bold hover:bg-gray-200 transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
<span class="">Cart</span>
</button>
<button class="w-full py-2 rounded-lg bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors">
                    Buy Now
                  </button>
</div>
<button class="w-full py-1.5 rounded-lg bg-blue-50/50 hover:bg-blue-100 text-brand-blue text-xs font-semibold flex items-center justify-center gap-1 transition-colors" onclick="copyAffiliateLink('https://flameph.org/aff/item-c2')">
<span class="material-symbols-outlined text-[14px]">share</span>
<span class="">Share Affiliate Link</span>
</button>
</div>
</div>
</div>
<!-- Item C3 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden group">
<div class="relative w-full aspect-square bg-gray-100 overflow-hidden">
<img alt="Organic Coffee &amp; Wild Honey Gift Set" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3Fx6VV3hfv9DpHHB10UI_fe92rlRP4FsFHgncamDXDCQU3FPJFSddTjdyrZAgQi4MiqMaPl9hje7RhpStCE4QR4bmnBt8qgqW2doLfb7hzCLaROs6LhsfwQ3K1mKdhx5e3a_ASwXKIkZ5-M5Rjp79e1lbHaaz3U-bvhOl4al6bOgSn0_Yv-C50J_jjTAysxXT_Id8XS4eJvmqPN6oTmdL9XJkN65a9YILLjdi0hxKK9RcDLrIKD6Qsw">
<div class="absolute top-3 left-3">
<span class="bg-white text-brand-blue text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">Mountain Harvest</span>
</div>
<button aria-label="Add to wishlist" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm text-gray-500 hover:text-brand-red flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</button>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-gray-700 font-medium text-[10px] px-2 py-0.5 rounded shadow-sm inline-block">Maker: Tahanan Delights (Laguna)</span>
</div>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-3">
<div>
<span class="text-[10px] font-bold text-brand-gold uppercase">Fair-Trade Agro</span>
<h4 class="font-display text-base font-bold text-gray-900 mt-0.5">Organic Coffee &amp; Wild Honey Gift Set</h4>
<p class="text-xs text-gray-600 mt-1">250g Benguet Arabica blend + 200ml raw mountain honey from upland farming cooperatives.</p>
</div>
<div class="flex items-center justify-between pt-1 border-t border-gray-100">
<span class="font-display text-xl font-extrabold text-brand-blue">₱580</span>
<div class="bg-blue-50 px-2 py-1 rounded text-[11px] font-bold text-brand-blue flex items-center gap-1 border border-blue-100">
<span class="material-symbols-outlined text-[13px] text-brand-gold">savings</span>
<span class="">Earn 4% (₱23.20)</span>
</div>
</div>
<div class="flex flex-col gap-1.5 pt-1">
<div class="grid grid-cols-2 gap-1.5">
<button class="w-full py-2 rounded-lg bg-gray-100 text-gray-800 text-xs font-bold hover:bg-gray-200 transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
<span class="">Cart</span>
</button>
<button class="w-full py-2 rounded-lg bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors">
                    Buy Now
                  </button>
</div>
<button class="w-full py-1.5 rounded-lg bg-blue-50/50 hover:bg-blue-100 text-brand-blue text-xs font-semibold flex items-center justify-center gap-1 transition-colors" onclick="copyAffiliateLink('https://flameph.org/aff/item-c3')">
<span class="material-symbols-outlined text-[14px]">share</span>
<span class="">Share Affiliate Link</span>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- Section D: YOBO Products for Rebranding or Customization -->
<section class="flex flex-col gap-6" id="section-yobo">
<div class="flex items-center justify-between">
<div>
<span class="text-xs font-bold text-brand-blue uppercase tracking-wider">Corporate &amp; Organizations</span>
<h3 class="font-display text-2xl font-bold text-gray-900">YOBO Products for Rebranding or Customization</h3>
</div>
<span class="text-xs sm:text-sm font-semibold text-gray-500">Bulk &amp; Institutional Orders</span>
</div>
<!-- Mandatory YOBO Policy Box -->
<div class="w-full bg-red-50/70 border border-red-200 p-6 rounded-2xl shadow-sm relative overflow-hidden">
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-full bg-brand-red text-white flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[22px]">info</span>
</div>
<div class="flex flex-col gap-1">
<h4 class="font-display text-base font-bold text-brand-red">
                Made-to-Order and Full Payment Policy
              </h4>
<p class="text-xs sm:text-sm text-gray-700 leading-relaxed">
                YOBO products for rebranding or customization are made to order. Advanced full payment is required before design approval, order processing, customization, and mass production begin. Production will only commence after payment and final artwork or specifications have been confirmed.
              </p>
</div>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- YOBO 1 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden">
<div class="relative w-full aspect-[4/3] bg-gray-100 overflow-hidden">
<img alt="Customized Corporate &amp; Event Apparel" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCOelfw8kqEI2gUn8aKEAXOC8grYTN5QmN6RK3KaB-vNPa7uF2dftx1OFCVK7KiGOryK44t43CEvrwcQdluYGz1fDwDfTPrAfI9ZRQv4tWSY0shzhE-mkgu9S_JZYzI0r266s4Tze7eCxmXlOrBTJZXtlvuv34z_AwyVMeVAPpLAejkAkFyu8O4iZyZtUQ-ZQWhK9fz71IfRGeVsHWRJi0hQpVs8H2Mrf4edKS3lN_SUGeYBsIN6y7jUg">
<div class="absolute top-3 left-3 flex flex-wrap gap-1">
<span class="bg-white text-brand-blue text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">Made-To-Order</span>
<span class="bg-gray-900 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">MOQ: 30 pcs</span>
</div>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-gray-800 text-[10px] font-medium px-2 py-0.5 rounded shadow-sm inline-block">Lead Time: 10-14 days</span>
</div>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div>
<span class="text-[10px] font-bold text-gray-500 uppercase">Apparel Production</span>
<h4 class="font-display text-base font-bold text-gray-900 mt-1">Customized Corporate &amp; Event Apparel</h4>
<p class="text-xs sm:text-sm text-gray-600 mt-1 leading-relaxed">
                  High-grade CVC cotton or pique polo tees. Custom embroidery or silkscreen. Precision color matching available.
                </p>
</div>
<div class="flex flex-col gap-2 pt-2 border-t border-gray-100">
<button class="w-full py-2.5 rounded-xl bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors shadow-sm">
                  Start Custom Order
                </button>
<button class="w-full py-2 rounded-xl bg-gray-100 text-gray-800 hover:bg-gray-200 text-xs font-semibold transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">request_quote</span>
<span class="">Request a Quote</span>
</button>
</div>
</div>
</div>
<!-- YOBO 2 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden">
<div class="relative w-full aspect-[4/3] bg-gray-100 overflow-hidden">
<img alt="Branded Eco-Totes &amp; Canvas Bags" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBby21JjZCNZm-sYQUB3Q00v_SfFogxyZ9Z5bk8lqaaSHziGsidVPSundpe7Q-hmp6w_eKVL7pMVJxRQJQuv3YSR6J7ZSGAzyeONAUrKDfwkQ2TydxDiYvZv42d2-CW5oBzU7rQHt94-8LexLmPf2FWnSR2yW_RxVTfTnEh01uWJz-H4NlHfJcRZM3D9nXLpubtPNiWHOPFx_RaaJTmCSSouBGurinrxNFZw2EupbcAlci4juw-W6Ktcg">
<div class="absolute top-3 left-3 flex flex-wrap gap-1">
<span class="bg-white text-brand-blue text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">Made-To-Order</span>
<span class="bg-gray-900 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">MOQ: 50 pcs</span>
</div>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-gray-800 text-[10px] font-medium px-2 py-0.5 rounded shadow-sm inline-block">Lead Time: 10-14 days</span>
</div>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div>
<span class="text-[10px] font-bold text-gray-500 uppercase">Eco Packaging</span>
<h4 class="font-display text-base font-bold text-gray-900 mt-1">Branded Eco-Totes &amp; Canvas Bags</h4>
<p class="text-xs sm:text-sm text-gray-600 mt-1 leading-relaxed">
                  Heavy canvas with silk screen printing. Custom dimensions, zipper closures, and reinforced cross-stitched handles.
                </p>
</div>
<div class="flex flex-col gap-2 pt-2 border-t border-gray-100">
<button class="w-full py-2.5 rounded-xl bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors shadow-sm">
                  Start Custom Order
                </button>
<button class="w-full py-2 rounded-xl bg-gray-100 text-gray-800 hover:bg-gray-200 text-xs font-semibold transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">request_quote</span>
<span class="">Request a Quote</span>
</button>
</div>
</div>
</div>
<!-- YOBO 3 -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow flex flex-col overflow-hidden">
<div class="relative w-full aspect-[4/3] bg-gray-100 overflow-hidden">
<img alt="Promotional Swag &amp; Keepsake Box" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAIHbQrIxr8bBG6tkfVPEUIzP42VV6GCy2h24Q1S9HIhwE_XgJ7R3hpWmDtFnXSI8wJ_fsItvYlDZOWwiEDsjj3yhBXJtDRYrmptiBdgy5KB4sn-q7tqV3HKnMniLd2SbxjknTE620RDr_bmyJB5DvBl7Mmp7ORWZkPzjnLNdbaV0GiSz0R0FGwPH7cXfmrhfiqDF1vi_KRqW-Hl7HchUxffy0gXHwpgdPNS9BXOzrbj6Br8druvUN1yQ">
<div class="absolute top-3 left-3 flex flex-wrap gap-1">
<span class="bg-white text-brand-blue text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">Made-To-Order</span>
<span class="bg-gray-900 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">MOQ: 25 sets</span>
</div>
<div class="absolute bottom-2 left-3 right-3">
<span class="bg-white/90 backdrop-blur-sm text-gray-800 text-[10px] font-medium px-2 py-0.5 rounded shadow-sm inline-block">Lead Time: 7-10 days</span>
</div>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div>
<span class="text-[10px] font-bold text-gray-500 uppercase">Executive Gifting</span>
<h4 class="font-display text-base font-bold text-gray-900 mt-1">Promotional Swag &amp; Keepsake Box</h4>
<p class="text-xs sm:text-sm text-gray-600 mt-1 leading-relaxed">
                  Bamboo tumblers, custom notebooks, pins, and wooden boxes. Laser engraving and custom sleeve packaging included.
                </p>
</div>
<div class="flex flex-col gap-2 pt-2 border-t border-gray-100">
<button class="w-full py-2.5 rounded-xl bg-brand-red hover:bg-brand-darkred text-white text-xs font-bold transition-colors shadow-sm">
                  Start Custom Order
                </button>
<button class="w-full py-2 rounded-xl bg-gray-100 text-gray-800 hover:bg-gray-200 text-xs font-semibold transition-colors flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">request_quote</span>
<span class="">Request a Quote</span>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- AFFILIATE & DROPSHIPPER SECTION -->
<section class="w-full py-4" id="affiliate-section">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
<!-- Affiliate Card -->
<div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 flex flex-col justify-between gap-6 relative overflow-hidden group">
<div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-full pointer-events-none transition-transform group-hover:scale-110"></div>
<div class="flex flex-col gap-3 relative z-10">
<div class="w-12 h-12 rounded-xl bg-blue-50 text-brand-blue flex items-center justify-center">
<span class="material-symbols-outlined text-[28px]">link</span>
</div>
<span class="text-xs font-bold text-brand-blue uppercase tracking-wider">Advocacy Affiliate Network</span>
<h3 class="font-display text-2xl font-bold text-gray-900">Earn 1% to 5% with Every Referral</h3>
<p class="text-sm text-gray-600 leading-relaxed">
                Members earn between 1% and 5% for every completed sale generated through their affiliate link, depending on the featured product.
              </p>
<div class="flex items-center gap-4 py-1 text-xs font-semibold text-gray-700">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-brand-blue text-[18px]">done</span> Instant Payouts</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-brand-blue text-[18px]">done</span> Live Impact Tracker</span>
</div>
</div>
<div class="relative z-10">
<button class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-full bg-brand-blue hover:bg-brand-darkblue text-white text-xs sm:text-sm font-bold shadow transition-colors">
<span class="">Apply as Affiliate Partner</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
</div>
<!-- Dropshipper Card -->
<div class="bg-[#002868] text-white p-8 rounded-2xl shadow-sm flex flex-col justify-between gap-6 relative overflow-hidden group">
<div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-bl-full pointer-events-none transition-transform group-hover:scale-110"></div>
<div class="flex flex-col gap-3 relative z-10">
<div class="w-12 h-12 rounded-xl bg-white/10 text-brand-yellow flex items-center justify-center">
<span class="material-symbols-outlined text-[28px]">local_shipping</span>
</div>
<span class="text-xs font-bold text-brand-yellow uppercase tracking-wider">Social Commerce Fulfillment</span>
<h3 class="font-display text-2xl font-bold text-white">Partner with FLAME as a Dropshipper</h3>
<p class="text-sm text-blue-100/80 leading-relaxed">
                Run your own ethical social enterprise store without carrying inventory. We pack, fulfill, and ship certified MSME goods directly to your customers with zero risk.
              </p>
<div class="flex items-center gap-4 py-1 text-xs font-semibold text-blue-200">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-brand-yellow text-[18px]">done</span> Zero Inventory Cost</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-brand-yellow text-[18px]">done</span> Direct Maker Packaging</span>
</div>
</div>
<div class="relative z-10">
<button class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-full bg-brand-red hover:bg-brand-darkred text-white text-xs sm:text-sm font-bold shadow transition-colors">
<span class="">Apply as Dropshipping Partner</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
</div>
</div>
</section>
</div>
</main>
<!-- 5. GLOBAL FOOTER (Matches Reference Images 2 & 3 Exactly) -->
<footer class="w-full bg-white border-t border-gray-200 pt-16 pb-12">
<div class="w-full max-w-[1360px] mx-auto px-4 sm:px-6 lg:px-8">
<!-- Top Columns (Reference Image 3) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-6 pb-12 border-b border-gray-200">
<!-- Col 1: Brand & Charter Statement -->
<div class="lg:col-span-4 flex flex-col gap-4">
<a class="inline-block" href="#">
<img alt="FLAME PH Logo" class="h-14 w-auto object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyvfsM6uj6c_6Ocf9jVWkR9XaFinYqaCPP23uNcgv6Lxf1wr2IW3pK7BYB4-uKw34mNmM4MSXxrcHSjvF1VSDufdAUg0YHaaCcwrdMOF6kUcnXKJ17bF7TNKieKl8sWCarT1QsVP4ySctZcLc22GlC7xGe9zQNRG7XHbtsbCMtaXaXEldfxTy7e4iflx3ulL8o2WiOH6NeHObR7plCDkMsHJew_ULdQbk9EEJDZ6O6wekM0Syim5KmrSPSC5VJoQWC11w">
</a>
<h4 class="font-display text-sm font-bold text-gray-900 leading-snug">
            Build Ecosystem. Fuel Leaders. Empower Entrepreneurs.
          </h4>
<p class="text-xs text-gray-600 leading-relaxed max-w-sm">
            Federation of Leaders Advancing MSME Ecosystem in the Philippines. Championing grassroots enterprise modernization, digital adoption, and market linkage. Members recorded in 1 province across 1 city or municipality.
          </p>
<div class="flex items-center gap-4 text-gray-700 pt-2">
<a aria-label="Share" class="hover:text-brand-blue transition-colors" href="#">
<span class="material-symbols-outlined text-[20px]">share</span>
</a>
<a aria-label="Email" class="hover:text-brand-blue transition-colors" href="#">
<span class="material-symbols-outlined text-[20px]">mail</span>
</a>
<a aria-label="Website" class="hover:text-brand-blue transition-colors" href="#">
<span class="material-symbols-outlined text-[20px]">public</span>
</a>
</div>
</div>
<!-- Col 2: Explore FLAME PH -->
<div class="lg:col-span-2 flex flex-col gap-3">
<h4 class="font-display text-sm font-bold text-gray-900">Explore FLAME PH</h4>
<ul class="flex flex-col gap-2 text-xs text-gray-600">
<li class=""><a class="hover:text-brand-blue transition-colors" href="/">Home</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="/about">About FLAME PH</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="/membership/free-benefits">Membership Plans</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="/directory">MSME Directory</a></li>
<li class="">Support Us/Shop</li>
</ul>
</div>
<!-- Col 3: Resources / Learn -->
<div class="lg:col-span-2 flex flex-col gap-3">
<h4 class="font-display text-sm font-bold text-gray-900">Resources / Learn</h4>
<ul class="flex flex-col gap-2 text-xs text-gray-600">
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">Negosyo Starter Kits</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">DTI &amp; BIR Guides</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">Free Templates</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">SME Loan &amp; Grant Kit</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">Webinars &amp; Workshops</a></li>
</ul>
</div>
<!-- Col 4: Community / Merch Shop -->
<div class="lg:col-span-2 flex flex-col gap-3">
<h4 class="font-display text-sm font-bold text-gray-900"><a href="/flameph-merchs" class="text-inherit no-underline hover:text-primary">Shop/Support Us</a></h4>
<ul class="flex flex-col gap-2 text-xs text-gray-600">
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">Regional Chapters</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">MSME Directory</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">Bayanihan Circles</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">FLAME Summit 2025</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">Mentorship Network</a></li>
<li class=""><a class="text-brand-red font-bold hover:underline transition-colors flex items-center gap-1" href="#product-catalog"></a></li>
</ul>
</div>
<!-- Col 5: Membership & Legal -->
<div class="lg:col-span-2 flex flex-col gap-3">
<h4 class="font-display text-sm font-bold text-gray-900">Membership &amp; Legal</h4>
<ul class="flex flex-col gap-2 text-xs text-gray-600">
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">Free Tier Registration</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">Neo Member Benefits</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">Partner Ecosystem</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">Terms of Service</a></li>
<li class=""><a class="hover:text-brand-blue transition-colors" href="#">Privacy Policy</a></li>
</ul>
</div>
</div>
<!-- Bottom Legal & Disclaimers (Reference Image 2 Verbatim) -->
<div class="pt-10 flex flex-col gap-6 text-gray-600 text-xs">
<!-- Former Name & Copyright Notice (Centered) -->
<div class="text-center space-y-1.5 max-w-4xl mx-auto">
<p class="font-medium text-gray-700">
            FLAME PH is formerly FAME PH, or Founders' Association of MSMEs and Entrepreneurs. Registration record and source: Update Soon.
          </p>
<p class="font-medium text-gray-700">
            © 2025 FLAME PH (Federation of Leaders Advancing MSME Ecosystem in the Philippines). All rights reserved. Ipinagmamalaking gawa ng at para sa negosyanteng Pilipino.
          </p>
</div>
<!-- Detailed Legal Clauses (Left Aligned) -->
<div class="space-y-4 pt-4 text-[11px] leading-relaxed text-gray-500 border-t border-gray-100">
<p class="font-bold text-xs text-gray-800">Legal Disclaimer &amp; Terms of Use</p>
<div>
<span class="font-bold text-gray-700 block mb-0.5">Development &amp; Prototype Notice</span>
<p class="">
              Please be advised that the FLAME PH national organization, along with its associated chapter buildups, is currently in an operational development stage. This website functions solely as a prototype and is under active construction. The information, resources, and statements contained within this website are presented exclusively for illustrative and presentation purposes. FLAME PH reserves the right to modify, amend, or update any content without prior notice as the organization advances its structural and partnership development.
            </p>
</div>
<div>
<span class="font-bold text-gray-700 block mb-0.5">Limitation of Liability</span>
<p class="">
              All content provided on this prototype website is offered on an "as-is" and "as-available" basis, without warranties of any kind, whether express or implied. FLAME PH makes no representations regarding the completeness, accuracy, reliability, or timeliness of any information published herein. In no event shall FLAME PH, its founders, officers, partners, or affiliates be liable for any direct, indirect, incidental, or consequential damages arising out of or in connection with the use of, or inability to use, this website or reliance on any information provided.
            </p>
</div>
<div>
<span class="font-bold text-gray-700 block mb-0.5">Privacy Notice</span>
<p class="">
              As this platform is currently a prototype, any information collected through form submissions, analytics, or website interactions is handled strictly for testing and organizational development purposes. FLAME PH does not sell, rent, or trade personal data to third parties. By interacting with this website, you acknowledge and consent to the temporary collection and processing of operational data necessary to refine and build out the FLAME PH platform.
            </p>
</div>
</div>
</div>
</div>
</footer>
<script>
    function copyAffiliateLink(linkUrl) {
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(linkUrl).then(showToast).catch(function() {
          showToast();
        });
      } else {
        showToast();
      }
    }

    function showToast() {
      const toast = document.getElementById('copy-toast');
      if (!toast) return;
      toast.classList.remove('translate-y-20', 'opacity-0');
      toast.classList.add('translate-y-0', 'opacity-100');
      setTimeout(function() {
        toast.classList.remove('translate-y-0', 'opacity-100');
        toast.classList.add('translate-y-20', 'opacity-0');
      }, 2500);
    }
  </script>


<div id="snapdom-sandbox" data-snapdom-sandbox="true" aria-hidden="true" style="position: absolute; left: -9999px; top: -9999px; width: 0px; height: 0px; overflow: hidden;"></div>@include('partials.home-footer')@include('partials.mobile-navigation')</body></html>

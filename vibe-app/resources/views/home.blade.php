<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" name="viewport"/>
<meta content="mobile_tab" name="shell-type"/>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries">
</script>
<script id="tailwind-config">tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        "colors": {
          "on-background": "#131b2e",
          "secondary": "#bc000c",
          "tertiary-fixed": "#ffddb8",
          "primary-container": "#0047ba",
          "surface-container": "#eaedff",
          "inverse-on-surface": "#eef0ff",
          "surface-container-highest": "#dae2fd",
          "tertiary": "#533200",
          "secondary-fixed": "#ffdad5",
          "primary-fixed": "#dbe1ff",
          "primary-fixed-dim": "#b3c5ff",
          "error": "#ba1a1a",
          "surface-bright": "#faf8ff",
          "on-secondary-fixed": "#410001",
          "tertiary-container": "#724700",
          "background": "#faf8ff",
          "surface-container-lowest": "#ffffff",
          "on-tertiary-container": "#ffb451",
          "surface-tint": "#2156c9",
          "surface-variant": "#dae2fd",
          "on-primary-fixed-variant": "#003ea6",
          "outline-variant": "#c3c6d6",
          "on-error": "#ffffff",
          "on-primary": "#ffffff",
          "primary": "#003289",
          "on-primary-fixed": "#00174a",
          "error-container": "#ffdad6",
          "on-surface": "#131b2e",
          "secondary-fixed-dim": "#ffb4aa",
          "on-secondary": "#ffffff",
          "on-primary-container": "#aec1ff",
          "inverse-primary": "#b3c5ff",
          "on-secondary-fixed-variant": "#930007",
          "on-tertiary-fixed-variant": "#653e00",
          "surface-container-low": "#f2f3ff",
          "surface-container-high": "#e2e7ff",
          "on-tertiary-fixed": "#2a1700",
          "surface": "#faf8ff",
          "inverse-surface": "#283044",
          "surface-dim": "#d2d9f4",
          "on-error-container": "#93000a",
          "outline": "#737685",
          "on-tertiary": "#ffffff",
          "on-secondary-container": "#fffbff",
          "on-surface-variant": "#434653",
          "secondary-container": "#e81218",
          "tertiary-fixed-dim": "#ffb95f"
        },
        "borderRadius": {
          "DEFAULT": "0.25rem",
          "lg": "0.5rem",
          "xl": "0.75rem",
          "full": "9999px"
        },
        "spacing": {
          "gutter-sm": "1rem",
          "margin": "2rem",
          "space-xl": "2.5rem",
          "space-xs": "0.25rem",
          "space-md": "1rem",
          "margin-mobile": "1rem",
          "gutter": "1.5rem",
          "space-lg": "1.5rem",
          "space-sm": "0.5rem"
        },
        "fontFamily": {
          "body-lg": ["DM Sans"],
          "label-sm": ["Plus Jakarta Sans"],
          "body-md": ["DM Sans"],
          "headline-sm": ["Plus Jakarta Sans"],
          "headline-lg-mobile": ["Plus Jakarta Sans"],
          "label-md": ["Plus Jakarta Sans"],
          "headline-lg": ["Plus Jakarta Sans"],
          "title-md": ["Plus Jakarta Sans"],
          "display-lg": ["Plus Jakarta Sans"],
          "body-sm": ["DM Sans"],
          "headline-md": ["Plus Jakarta Sans"]
        },
        "fontSize": {
          "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
          "label-sm": ["12px", { "lineHeight": "16px", "letterSpacing": "0.04em", "fontWeight": "700" }],
          "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
          "headline-sm": ["22px", { "lineHeight": "30px", "fontWeight": "600" }],
          "headline-lg-mobile": ["30px", { "lineHeight": "38px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
          "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }],
          "headline-lg": ["40px", { "lineHeight": "48px", "letterSpacing": "-0.015em", "fontWeight": "700" }],
          "title-md": ["18px", { "lineHeight": "26px", "fontWeight": "600" }],
          "display-lg": ["56px", { "lineHeight": "64px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
          "body-sm": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
          "headline-md": ["28px", { "lineHeight": "36px", "fontWeight": "700" }]
        }
      }
    }
  };</script>
<style>@layer base{html,body{width:100%;margin:0;padding:0;}body{overscroll-behavior:none;}.pb-safe{padding-bottom:env(safe-area-inset-bottom,0px);}.pt-safe{padding-top:env(safe-area-inset-top,0px);}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style>
</head>
<body class="bg-surface font-body-md text-on-surface flex flex-col min-h-screen overflow-x-hidden">
<header class="fixed top-0 w-full z-50 isolate pt-safe bg-surface-container-lowest/95 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,71,186,0.06)] border-b border-surface-container/60">
<div class="bg-primary text-on-primary py-1.5 px-4 sm:px-6 md:px-8 lg:px-12 flex items-center justify-center gap-space-xs text-center">
<span class="font-label-sm text-label-sm tracking-wide flex items-center justify-center gap-1.5 flex-wrap">
<span><strong>Unite Filipino MSMEs • Grow Together • Build a Stronger Philippines</strong> → <a class="text-tertiary-fixed underline font-bold" href="/membership">Join FLAME PH Free →</a></span>
</span>
</div>
<div class="max-w-7xl mx-auto w-full h-16 sm:h-20 px-4 sm:px-6 md:px-8 lg:px-12 flex items-center justify-between gap-space-md">
<div class="flex items-center gap-3 sm:gap-4">
<a class="flex items-center gap-2" href="/">
<img alt="FLAME PH logo" class="h-12 w-44 object-cover object-[center_36%]" src="/assets/images/flameph-logo.png"/>
</a>
</div>
<nav class="hidden md:flex items-center gap-1 lg:gap-2 text-on-surface-variant font-label-md text-label-md">
<a aria-current="page" class="px-3 py-2 rounded-xl bg-surface-container-low border-b-2 border-primary text-primary font-bold transition-colors" data-path="public-home" href="/">Home</a>
<a class="px-3 py-2 rounded-xl hover:text-primary hover:bg-surface-container-low transition-colors" data-path="membership-registration" href="/membership">Membership</a>
<a class="px-3 py-2 rounded-xl hover:text-primary hover:bg-surface-container-low transition-colors" data-path="events" href="/events">Events</a>
<a class="px-3 py-2 rounded-xl hover:text-primary hover:bg-surface-container-low transition-colors" data-path="learning-hub" href="/learn">Resources</a>
<a class="px-3 py-2 rounded-xl hover:text-primary hover:bg-surface-container-low transition-colors" data-path="msme-directory" href="/directory">Directory</a>
<a class="px-3 py-2 rounded-xl hover:text-primary hover:bg-surface-container-low transition-colors" data-path="about-flame" href="/about">About</a>
</nav>
<div class="hidden xl:flex items-center w-56 h-11 rounded-xl bg-surface-container-low px-3 gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[22px]">search</span>
<input class="w-full bg-transparent border-0 p-0 text-sm text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:ring-0" placeholder="Search FLAME PH" type="search"/>
</div>
<div class="flex items-center gap-2 sm:gap-3">
<a class="hidden sm:flex items-center px-3 h-10 rounded-lg text-primary font-label-md text-label-md hover:bg-surface-container-low transition-colors" data-path="membership-registration" href="/membership">Log In</a>
<a class="h-10 sm:h-11 px-4 sm:px-5 rounded-full bg-secondary text-on-secondary font-label-md text-label-md flex items-center justify-center gap-1.5 shadow-[0_4px_12px_rgba(188,0,12,0.25)] hover:bg-secondary-container active:scale-95 transition-all" data-path="membership-registration" href="/membership">
<span class="whitespace-nowrap">Join Free</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
<div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-primary text-on-primary hidden xs:flex items-center justify-center font-bold font-label-md text-sm">
<span class="material-symbols-outlined text-[20px]">person</span>
</div>
<button aria-controls="mobile-menu" aria-expanded="false" aria-label="Open navigation menu" class="md:hidden relative w-10 h-10 rounded-lg flex items-center justify-center text-on-surface hover:bg-surface-container-low transition-colors" id="mobile-menu-toggle" type="button">
<span class="material-symbols-outlined text-[24px]" data-menu-icon>menu</span>
<span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-secondary-container ring-2 ring-surface-container-lowest">
</span>
</button>
</div>
</div>
<div aria-hidden="true" class="hidden md:hidden fixed inset-0 z-40 bg-slate-950/30" id="mobile-menu-backdrop"></div>
<nav aria-label="Mobile navigation" class="hidden md:hidden absolute top-full left-0 right-0 z-[60] max-h-[calc(100dvh-7rem)] overflow-y-auto border-t border-surface-container/60 bg-white shadow-2xl" id="mobile-menu" style="background-color:#ffffff;">
<div class="flex flex-col gap-1 p-3 sm:p-4">
<a class="px-4 py-3 rounded-xl bg-surface-container-low border-b-2 border-primary text-primary font-bold" href="/">Home</a>
<a class="px-4 py-3 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-colors" href="/membership">Membership</a>
<a class="px-4 py-3 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-colors" href="/events">Events</a>
<a class="px-4 py-3 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-colors" href="/learn">Resources</a>
<a class="px-4 py-3 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-colors" href="/directory">Directory</a>
<a class="px-4 py-3 rounded-xl text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-colors" href="/about">About</a>
</div>
</nav>
</header>
<div class="border-b border-outline-variant/20 bg-surface-container-lowest px-4 py-2 text-center text-xs italic text-on-surface-variant">
  Prototype evidence notice: audience, coverage, module, partner, and compliance claims are published only when supporting documentation is available. Otherwise the page shows “Update Soon.” Verify legal, tax, financing, and regulatory information with the relevant official source.
</div>
<main class="flex-1 flex flex-col relative w-full pt-24 sm:pt-28 pb-24 md:pb-12 bg-surface">
<div class="flex flex-col w-full">
<!-- 1. Hero Section -->
<section class="relative w-full overflow-hidden bg-gradient-to-b from-surface-container-low via-surface to-surface border-b border-surface-container/40">
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12 pt-6 sm:pt-8 md:pt-12 pb-10 sm:pb-14 md:pb-16">
<div class="flex flex-col md:grid md:grid-cols-12 md:gap-8 lg:gap-12 md:items-center">
<!-- Left Column: Hero Copy & CTA -->
<div class="flex flex-col gap-4 sm:gap-5 md:col-span-7 lg:col-span-7">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container-lowest shadow-sm self-start border border-outline-variant/30">
<span class="text-sm">🔥</span>
<span class="font-label-sm text-label-sm text-primary uppercase tracking-wider font-bold">FLAME PH • National MSME Community</span>
</div>
<h1 class="font-headline-lg-mobile text-[40px] leading-[1.12] sm:text-[40px] lg:text-[46px] sm:leading-[1.15] lg:leading-[1.18] text-on-surface font-extrabold tracking-tight">
Hindi kailangang mag-start at mag-grow ng business nang <span class="text-primary underline decoration-secondary decoration-4 underline-offset-4">mag-isa.</span>
</h1>
<p class="font-body-md sm:text-body-lg text-on-surface-variant font-medium max-w-2xl leading-relaxed">
FLAME PH encourages aspiring Filipino entrepreneurs to explore business ownership as an alternative path to employment. Explore business-learning resources and a growing MSME ecosystem built to help today’s and next-generation entrepreneurs find their next step in a changing, AI-shaped economy.
</p>
<div class="flex flex-col sm:flex-row sm:items-center gap-3 pt-2">
<a class="w-full sm:w-auto px-8 h-14 rounded-xl bg-secondary text-on-secondary font-headline-sm text-[18px] font-bold flex items-center justify-center gap-2 shadow-[0_4px_16px_rgba(188,0,12,0.28)] hover:bg-secondary-container active:scale-[0.98] transition-all" data-path="membership-registration" href="/membership">
<span class="material-symbols-outlined text-[22px]">how_to_reg</span>
<span>Join FLAME PH Free</span>
<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</a>
<a class="w-full sm:w-auto px-6 h-14 rounded-xl bg-surface-container-lowest border border-outline-variant text-primary font-label-md text-label-md flex items-center justify-center gap-2 hover:bg-surface-container-low transition-colors" href="/learn">
<span class="material-symbols-outlined text-[20px]">play_circle</span>
<span>Explore the Learning Hub</span>
</a>
</div>
<div class="flex items-center gap-4 sm:gap-6 pt-1 text-on-surface-variant font-label-sm text-label-sm flex-wrap">
<span class="flex items-center gap-1.5 font-semibold text-on-surface">
<span class="material-symbols-outlined text-[17px] text-primary">verified</span>
<span>Free to Join</span>
</span>
<span class="text-outline-variant">•</span>
<span class="flex items-center gap-1.5 font-semibold text-on-surface">
<span class="material-symbols-outlined text-[17px] text-tertiary-container">military_tech</span>
<span>Compliance alignment: Update Soon</span>
</span>
<span class="text-outline-variant hidden xs:inline">•</span>
<span class="hidden xs:flex items-center gap-1.5 text-on-surface-variant">
<span class="material-symbols-outlined text-[17px] text-secondary">people</span>
<span>{{ number_format($membershipStats['registered_members']) }} registered {{ $membershipStats['registered_members'] === 1 ? 'member' : 'members' }}</span>
</span>
</div>
</div>
<!-- Right Column: FLAME ID Sample -->
<div class="w-full mt-6 md:mt-0 md:col-span-5 lg:col-span-5 flex justify-center">
<a aria-label="View FLAME PH membership options" class="block w-full max-w-xl rounded-2xl focus:outline-none focus:ring-4 focus:ring-primary/30" href="/membership">
<img alt="FLAMEPH sample premium community member ID — view membership options" class="w-full rounded-2xl shadow-2xl object-cover transition-transform hover:scale-[1.01]" src="/assets/images/flameph-sample-id.png"/>
</a>
</div>
</div>
</div>
</section>
<!-- 2. Quick Actions Grid -->
<section class="w-full py-10 sm:py-14 bg-surface" id="quick-actions">
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12 flex flex-col gap-6">
<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2">
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-secondary font-bold uppercase tracking-wider">What do you want to accomplish today?</span>
<h2 class="font-headline-sm sm:text-headline-md text-on-surface">Choose your next step</h2>
</div>
<span class="text-body-sm text-on-surface-variant hidden sm:inline-block">Practical support for micro, small, and medium enterprises.</span>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 md:gap-5">
<!-- Action 1 -->
<a class="flex flex-col justify-between p-4 sm:p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm hover:shadow-md hover:border-primary/40 transition-all group min-h-[130px]" data-path="learning-hub" href="/learn">
<div class="w-11 h-11 rounded-xl bg-surface-container-high flex items-center justify-center text-primary mb-2 group-hover:scale-110 group-hover:bg-primary group-hover:text-on-primary transition-all">
<span class="material-symbols-outlined text-[24px]">rocket_launch</span>
</div>
<div>
<span class="font-title-md text-title-md text-on-surface block leading-tight group-hover:text-primary transition-colors">Start a Business</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Step-by-step guides</span>
</div>
</a>
<!-- Action 2 -->
<a class="flex flex-col justify-between p-4 sm:p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm hover:shadow-md hover:border-primary/40 transition-all group min-h-[130px]" data-path="learning-hub" href="/learn">
<div class="w-11 h-11 rounded-xl bg-surface-container-high flex items-center justify-center text-tertiary mb-2 group-hover:scale-110 group-hover:bg-tertiary-container group-hover:text-tertiary-fixed transition-all">
<span class="material-symbols-outlined text-[24px]">menu_book</span>
</div>
<div>
<span class="font-title-md text-title-md text-on-surface block leading-tight group-hover:text-primary transition-colors">Learn Skills</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Free video modules</span>
</div>
</a>
<!-- Action 3 -->
<a class="flex flex-col justify-between p-4 sm:p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm hover:shadow-md hover:border-primary/40 transition-all group min-h-[130px]" data-path="msme-directory" href="/directory">
<div class="w-11 h-11 rounded-xl bg-surface-container-high flex items-center justify-center text-primary mb-2 group-hover:scale-110 group-hover:bg-primary group-hover:text-on-primary transition-all">
<span class="material-symbols-outlined text-[24px]">store</span>
</div>
<div>
<span class="font-title-md text-title-md text-on-surface block leading-tight group-hover:text-primary transition-colors">Find Business</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Suppliers &amp; stores</span>
</div>
</a>
<!-- Action 4 -->
<a class="flex flex-col justify-between p-4 sm:p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm hover:shadow-md hover:border-primary/40 transition-all group min-h-[130px]" data-path="community-network" href="/community">
<div class="w-11 h-11 rounded-xl bg-surface-container-high flex items-center justify-center text-secondary mb-2 group-hover:scale-110 group-hover:bg-secondary group-hover:text-on-secondary transition-all">
<span class="material-symbols-outlined text-[24px]">handshake</span>
</div>
<div>
<span class="font-title-md text-title-md text-on-surface block leading-tight group-hover:text-secondary transition-colors">Buy &amp; Sell</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">B2B marketplace</span>
</div>
</a>
<!-- Action 5: Featured Banner spanning full width -->
<a class="col-span-2 md:col-span-4 flex items-center justify-between p-4 sm:p-6 rounded-2xl bg-gradient-to-r from-primary to-primary-container text-on-primary shadow-md hover:shadow-lg transition-all group" data-path="membership-registration" href="/membership">
<div class="flex items-center gap-3 sm:gap-4">
<div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center text-tertiary-fixed shrink-0 group-hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-[26px]">trending_up</span>
</div>
<div class="flex flex-col">
<span class="font-title-md sm:text-[20px] text-on-primary font-bold">Grow My Business: Funding &amp; Mentorship</span>
<span class="font-body-sm text-on-primary-container">Get priority access to micro-loans, DTI clinics, and supermarket distribution.</span>
</div>
</div>
<div class="flex items-center gap-1 shrink-0 font-label-md text-label-md text-tertiary-fixed font-bold pl-2">
<span class="hidden sm:inline">Explore</span>
<span class="material-symbols-outlined text-[22px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</div>
</a>
</div>
</div>
</section>
<!-- 3. The 5-Stage Entrepreneur Journey -->
<section class="w-full py-12 sm:py-16 bg-surface-container-low border-y border-surface-container/60">
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12 flex flex-col gap-8">
<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2">
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-primary uppercase font-bold tracking-wider">Support at Every Stage</span>
<h2 class="font-headline-sm sm:text-headline-md text-on-surface">The 5-Stage Business Journey</h2>
<p class="font-body-sm sm:text-body-md text-on-surface-variant max-w-2xl">Wherever you are, find practical solutions, toolkits, and a community ready to support you.</p>
</div>
<a class="text-primary font-label-md text-label-md inline-flex items-center gap-1 hover:underline self-start sm:self-auto" data-path="learning-hub" href="/learn">
<span>View the full roadmap</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<!-- Responsive Timeline Layout: Stacked on Mobile, 5-col Grid on Tablet/PC -->
<div class="grid grid-cols-1 md:grid-cols-5 gap-3 sm:gap-4">
<!-- Step 1 -->
<div class="flex md:flex-col gap-3 sm:gap-4 items-start p-4 sm:p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm relative group hover:shadow-md transition-shadow">
<div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold font-label-md text-label-md shrink-0 shadow-sm">1</div>
<div class="flex flex-col">
<span class="font-label-sm text-[11px] uppercase tracking-wider text-primary font-bold">Stage 1</span>
<h3 class="font-title-md text-title-md text-on-surface font-bold">Discover</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant pt-1 leading-snug">Find the right idea, estimate your capital, and validate the market before you invest.</p>
</div>
</div>
<!-- Step 2 -->
<div class="flex md:flex-col gap-3 sm:gap-4 items-start p-4 sm:p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm relative group hover:shadow-md transition-shadow">
<div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold font-label-md text-label-md shrink-0 shadow-sm">2</div>
<div class="flex flex-col">
<span class="font-label-sm text-[11px] uppercase tracking-wider text-primary font-bold">Stage 2</span>
<h3 class="font-title-md text-title-md text-on-surface font-bold">Start</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant pt-1 leading-snug">Handle DTI, Barangay, Mayor's Permit, and BIR 2303 registration with less hassle.</p>
</div>
</div>
<!-- Step 3 -->
<div class="flex md:flex-col gap-3 sm:gap-4 items-start p-4 sm:p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm relative group hover:shadow-md transition-shadow">
<div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold font-label-md text-label-md shrink-0 shadow-sm">3</div>
<div class="flex flex-col">
<span class="font-label-sm text-[11px] uppercase tracking-wider text-primary font-bold">Stage 3</span>
<h3 class="font-title-md text-title-md text-on-surface font-bold">Build</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant pt-1 leading-snug">Improve product packaging, bookkeeping, digital POS, and team systems.</p>
</div>
</div>
<!-- Step 4 -->
<div class="flex md:flex-col gap-3 sm:gap-4 items-start p-4 sm:p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm relative group hover:shadow-md transition-shadow">
<div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold font-label-md text-label-md shrink-0 shadow-sm">4</div>
<div class="flex flex-col">
<span class="font-label-sm text-[11px] uppercase tracking-wider text-primary font-bold">Stage 4</span>
<h3 class="font-title-md text-title-md text-on-surface font-bold">Grow</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant pt-1 leading-snug">Build digital marketing skills for TikTok Shop, Shopee Live, and corporate supply chains.</p>
</div>
</div>
<!-- Step 5 -->
<div class="flex md:flex-col gap-3 sm:gap-4 items-start p-4 sm:p-5 rounded-2xl bg-surface-container-lowest border-2 border-secondary/30 shadow-sm relative group hover:shadow-md transition-shadow">
<div class="w-9 h-9 rounded-full bg-secondary text-on-secondary flex items-center justify-center font-bold font-label-md text-label-md shrink-0 shadow-sm">5</div>
<div class="flex flex-col">
<span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Stage 5</span>
<h3 class="font-title-md text-title-md text-on-surface font-bold">Scale Nationwide</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant pt-1 leading-snug">Prepare for franchising, venture debt, FDA compliance, and ASEAN exports.</p>
</div>
</div>
</div>
</div>
</section>
<!-- 4. FLAME Ecosystem Snapshot (Visual Metric Cards) -->
<section class="w-full py-10 sm:py-14 bg-surface">
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12 flex flex-col gap-6">
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-secondary font-bold uppercase tracking-wider">Our Community in Action</span>
<h2 class="font-headline-sm sm:text-headline-md text-on-surface">FLAME Ecosystem Snapshot</h2>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
<!-- Metric 1 -->
<div class="p-5 sm:p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm flex flex-col gap-2">
<div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">groups</span>
</div>
<span class="font-headline-md sm:text-[34px] text-primary font-bold tracking-tight">{{ number_format($membershipStats['registered_members']) }}</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">Registered FLAME PH members</span>
<span class="font-body-sm text-on-surface-variant">Current membership database count</span>
</div>
<!-- Metric 2 -->
<div class="p-5 sm:p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm flex flex-col gap-2">
<div class="w-10 h-10 rounded-xl bg-secondary/10 text-secondary flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">map</span>
</div>
<span class="font-headline-md sm:text-[34px] text-secondary font-bold tracking-tight">{{ number_format($membershipStats['chapter_locations']) }}</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">Recorded provincial chapter locations</span>
<span class="font-body-sm text-on-surface-variant">{{ number_format($membershipStats['represented_provinces']) }} {{ $membershipStats['represented_provinces'] === 1 ? 'province' : 'provinces' }} from member city/municipality records</span>
</div>
<!-- Metric 3 -->
<div class="p-5 sm:p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm flex flex-col gap-2">
<div class="w-10 h-10 rounded-xl bg-tertiary-container/10 text-tertiary-container flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">video_library</span>
</div>
<span class="font-headline-md sm:text-[34px] text-tertiary-container font-bold tracking-tight">Update Soon</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">Published learning modules</span>
</div>
<!-- Metric 4 -->
<div class="p-5 sm:p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm flex flex-col gap-2">
<div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">smart_toy</span>
</div>
<span class="font-headline-md sm:text-[34px] text-primary font-bold tracking-tight">24/7</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">AI mentor availability: Update Soon</span>
</div>
</div>
</div>
</section>
<!-- 5. Learning Hub Cards -->
<section class="w-full py-12 sm:py-16 bg-surface-container-low border-y border-surface-container/60" id="learning-modules">
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12 flex flex-col gap-6">
<div class="flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-primary font-bold uppercase tracking-wider">Learning for Every Entrepreneur</span>
<h2 class="font-headline-sm sm:text-headline-md text-on-surface">Trending Learning Modules</h2>
</div>
<a class="text-primary font-label-md text-label-md flex items-center gap-1 hover:underline font-bold" data-path="learning-hub" href="/learn">
<span>View All</span>
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</a>
</div>
<!-- Responsive 1-col on mobile, 3-col Grid on Tablet & PC -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
<!-- Card 1 -->
<div class="flex md:flex-col gap-3 sm:gap-4 p-3.5 sm:p-4 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm hover:shadow-md transition-shadow">
<div class="relative w-28 h-28 md:w-full md:h-44 rounded-xl overflow-hidden shrink-0">
<img alt="BIR Tax Filing Guide" class="w-full h-full object-cover" data-alt="A clean top-down view of Philippine tax documents, official receipts, a modern calculator, and pen on a wooden office desk, natural bright office lighting." src="/assets/images/learning/bmbe-guide.png"/>
<span class="absolute bottom-2 right-2 px-2 py-0.5 rounded-md bg-inverse-surface/85 text-inverse-on-surface font-label-sm text-label-sm text-[11px] backdrop-blur-sm">12 min</span>
</div>
<div class="flex flex-col justify-between py-1 min-w-0 flex-1">
<div>
<span class="font-label-sm text-label-sm text-primary uppercase font-bold tracking-wider">Tax &amp; Legal</span>
<h3 class="font-title-md text-title-md text-on-surface font-bold line-clamp-2 md:line-clamp-1 pt-0.5">BIR Form 1701Q Filing Guide</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 pt-1">Handle quarterly income tax deadlines with a simple eFPS step-by-step guide.</p>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-label-sm text-label-sm pt-3 border-t border-surface-container/60 mt-3">
<span class="flex items-center text-tertiary-fixed-variant font-bold">★ 4.9</span>
<span>• 3,240 completed</span>
</div>
</div>
</div>
<!-- Card 2 -->
<div class="flex md:flex-col gap-3 sm:gap-4 p-3.5 sm:p-4 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm hover:shadow-md transition-shadow">
<div class="relative w-28 h-28 md:w-full md:h-44 rounded-xl overflow-hidden shrink-0">
<img alt="TikTok Shop Live Selling Masterclass" class="w-full h-full object-cover" data-alt="A smartphone set up on a ring light stand streaming a live selling event of local Philippine handicraft products, colorful and engaging setup." src="/assets/images/learning/live-selling.png"/>
<span class="absolute bottom-2 right-2 px-2 py-0.5 rounded-md bg-inverse-surface/85 text-inverse-on-surface font-label-sm text-label-sm text-[11px] backdrop-blur-sm">18 min</span>
</div>
<div class="flex flex-col justify-between py-1 min-w-0 flex-1">
<div>
<span class="font-label-sm text-label-sm text-secondary uppercase font-bold tracking-wider">E-Commerce</span>
<h3 class="font-title-md text-title-md text-on-surface font-bold line-clamp-2 md:line-clamp-1 pt-0.5">TikTok Shop Live Selling Masterclass</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 pt-1">Learn how to get verified orders using your phone and the right selling script.</p>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-label-sm text-label-sm pt-3 border-t border-surface-container/60 mt-3">
<span class="flex items-center text-tertiary-fixed-variant font-bold">★ 5.0</span>
<span>• 5,110 completed</span>
</div>
</div>
</div>
<!-- Card 3 -->
<div class="flex md:flex-col gap-3 sm:gap-4 p-3.5 sm:p-4 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm hover:shadow-md transition-shadow">
<div class="relative w-28 h-28 md:w-full md:h-44 rounded-xl overflow-hidden shrink-0">
<img alt="Food Costing Calculator" class="w-full h-full object-cover" data-alt="An artisanal food kitchen prep table with freshly baked pastries, digital weighing scale, and recipe ingredient cost sheet, crisp lighting." src="/assets/images/learning/recipe-costing.png"/>
<span class="absolute bottom-2 right-2 px-2 py-0.5 rounded-md bg-inverse-surface/85 text-inverse-on-surface font-label-sm text-label-sm text-[11px] backdrop-blur-sm">Interactive</span>
</div>
<div class="flex flex-col justify-between py-1 min-w-0 flex-1">
<div>
<span class="font-label-sm text-label-sm text-tertiary uppercase font-bold tracking-wider">Operations</span>
<h3 class="font-title-md text-title-md text-on-surface font-bold line-clamp-2 md:line-clamp-1 pt-0.5">Food Costing &amp; Markup Calculator</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 pt-1">Protect your margins with recipe pricing, wastage buffers, and overhead formulas.</p>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-label-sm text-label-sm pt-3 border-t border-surface-container/60 mt-3">
<span class="flex items-center text-tertiary-fixed-variant font-bold">★ 4.8</span>
<span>• Spreadsheet included</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 6. Membership Tiers -->
<section class="w-full py-12 sm:py-16 bg-surface" id="membership-tiers">
<div class="max-w-5xl mx-auto px-4 sm:px-6 md:px-8 flex flex-col gap-8">
<div class="flex flex-col text-center gap-2 max-w-2xl mx-auto">
<span class="font-label-sm text-label-sm text-secondary font-bold uppercase tracking-wider">Choose Your Membership</span>
<h2 class="font-headline-sm sm:text-headline-md lg:text-[34px] text-on-surface">Simple, transparent membership</h2>
<p class="font-body-sm sm:text-body-md text-on-surface-variant">Free to join for every MSME in the Philippines. Upgrade when you need deeper support and institutional credit.</p>
</div>
<!-- 2-Column Responsive Grid on Tablet/PC -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">
<!-- Tier 1: Libreng Kasapi -->
<div class="p-6 sm:p-8 rounded-3xl bg-surface-container-lowest border border-outline-variant/40 shadow-sm flex flex-col justify-between gap-6">
<div class="flex flex-col gap-4">
<div class="flex justify-between items-start">
<div>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">Free Member</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">For entrepreneurs getting started</p>
</div>
<div class="text-right">
<span class="font-headline-md text-headline-md text-primary font-extrabold">₱0</span>
<span class="font-label-sm text-label-sm text-on-surface-variant block font-semibold">Free Forever</span>
</div>
</div>
<div class="h-px w-full bg-surface-container">
</div>
<div class="flex flex-col gap-3 font-body-sm text-body-sm text-on-surface">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-primary shrink-0">check_circle</span>
<span>Digital FLAME Community ID card</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-primary shrink-0">check_circle</span>
<span>Access to public learning articles &amp; starter guides</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-primary shrink-0">check_circle</span>
<span>Access to public online forums</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-primary shrink-0">check_circle</span>
<span>Standard listing in open public directory</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-primary shrink-0">check_circle</span>
<span>24/7 Ka-FLAME AI standard assistance</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-primary shrink-0">check_circle</span>
<span>Eligible to request/purchase the FLAME PH ID, car decal, ID lace, cap, mug, polo shirt, and jacket at a minimal member fee</span>
</div>
</div>
</div>
<a class="w-full h-12 rounded-xl bg-surface-container-high text-primary font-label-md text-label-md font-bold flex items-center justify-center hover:bg-surface-container active:scale-[0.98] transition-all" data-path="membership-registration" href="/membership">
Get a Free ID
</a>
</div>
<!-- Tier 2: FLAME Neo (Featured) -->
<div class="relative p-6 sm:p-8 rounded-3xl bg-gradient-to-br from-primary via-primary to-primary-container text-on-primary shadow-xl flex flex-col justify-between gap-6 overflow-hidden border border-primary-container">
<div class="absolute top-4 right-4 px-3 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-bold uppercase tracking-wider shadow-sm">
Most Recommended
</div>
<div class="flex flex-col gap-4">
<div class="flex justify-between items-start pt-2">
<div>
<span class="font-headline-sm text-headline-sm text-on-primary font-bold">FLAME Neo</span>
<p class="font-body-sm text-body-sm text-on-primary-container">For businesses ready to grow and scale</p>
</div>
<div class="text-right">
<span class="font-headline-md text-headline-md text-on-primary font-extrabold">₱500</span>
<span class="font-label-sm text-label-sm text-on-primary-container block font-medium">/ month</span>
</div>
</div>
<div class="h-px w-full bg-white/20">
</div>
<div class="flex flex-col gap-3 font-body-sm text-body-sm text-on-primary">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-tertiary-fixed shrink-0">check_circle</span>
<span>Priority access to B2B Bayanihan matching</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-tertiary-fixed shrink-0">check_circle</span>
<span>Digital marketing &amp; multi-channel commerce courses</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-tertiary-fixed shrink-0">check_circle</span>
<span>Exclusive discounts on partner enterprise tools</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-tertiary-fixed shrink-0">check_circle</span>
<span>Direct access to verified MSME supplier network</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-tertiary-fixed shrink-0">check_circle</span>
<span>Featured spotlight in quarterly FLAME newsletter</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-[20px] text-tertiary-fixed shrink-0">check_circle</span>
<span>Physical FLAME PH ID, ID lace, and car decal included; eligible to purchase other merchandise</span>
</div>
</div>
</div>
<a class="w-full h-12 rounded-xl bg-secondary text-on-secondary font-label-md text-label-md font-bold flex items-center justify-center gap-2 shadow-lg hover:bg-secondary-container active:scale-[0.98] transition-all" data-path="membership-registration" href="/membership?plan=neo#registration">
<span>Become a Neo Member</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</div>
</section>
<!-- 7. MSME Story Spotlight -->
<section class="w-full py-12 sm:py-16 bg-surface-container-low border-y border-surface-container/60">
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12 flex flex-col gap-6">
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-primary font-bold uppercase tracking-wider">Member Success Story</span>
<h2 class="font-headline-sm sm:text-headline-md text-on-surface">From home kitchen to 14 branches</h2>
</div>
<!-- Spotlight Card: 12-col Grid on Tablet/PC -->
<div class="rounded-3xl bg-surface-container-lowest border border-outline-variant/30 overflow-hidden shadow-sm md:grid md:grid-cols-12 items-center">
<div class="relative w-full h-60 sm:h-72 md:h-full md:min-h-[360px] md:col-span-5 bg-surface-container">
<img alt="Aling Nena inside food manufacturing facility" class="w-full h-full object-cover" data-alt="An energetic mature Filipina business owner happily packing bottled specialty gourmet sauces inside her food manufacturing facility in Pampanga Philippines, smiling proudly." src="/assets/images/learning/fda-compliance.png"/>
<div class="absolute bottom-3 left-3 px-3 py-1 rounded-lg bg-inverse-surface/85 text-inverse-on-surface font-label-sm text-label-sm backdrop-blur-sm">
Aling Nena's Heritage Food • Pampanga Chapter
</div>
</div>
<div class="p-6 sm:p-8 md:p-10 md:col-span-7 flex flex-col gap-5">
<p class="font-body-lg sm:text-[20px] sm:leading-relaxed text-on-surface italic font-normal">
"Noong pandemic, halos magsara ang tindahan ko. Sa tulong ng FLAME mentorship at ng kapwa ko negosyante sa Pampanga, natuto ako mag-digital packaging at pumasok sa institutional supermarkets. Hindi ako nag-iisa."
</p>
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold font-label-md">EN</div>
<div class="flex flex-col">
<span class="font-title-md text-title-md font-bold text-on-surface">Elena "Aling Nena" Cruz</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Founder &amp; Master Blender, Pampanga Chapter</span>
</div>
</div>
<!-- Metrics Strip -->
<div class="grid grid-cols-2 gap-3 pt-2">
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col">
<span class="font-headline-sm sm:text-headline-md text-primary font-bold">+280%</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Annual Revenue</span>
</div>
<div class="p-4 rounded-xl bg-surface-container-low flex flex-col">
<span class="font-headline-sm sm:text-headline-md text-secondary font-bold">22</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Lokal na Empleyado</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 8. Business Directory Search & Featured MSMEs -->
<section class="w-full py-12 sm:py-16 bg-surface" id="msme-directory">
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12 flex flex-col gap-6">
<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2">
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-secondary font-bold uppercase tracking-wider">Support Local Businesses</span>
<h2 class="font-headline-sm sm:text-headline-md text-on-surface">Filipino MSME Directory</h2>
<p class="font-body-sm sm:text-body-md text-on-surface-variant">Find verified suppliers, raw materials, services, and proudly local products.</p>
</div>
<a class="text-primary font-label-md text-label-md font-bold flex items-center gap-1 hover:underline" data-path="msme-directory" href="/directory">
<span>Open the Full Directory</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<!-- Search & Filter Bar -->
<div class="flex flex-col sm:flex-row gap-3">
<div class="relative flex-1">
<span class="material-symbols-outlined absolute left-4 top-3 text-on-surface-variant text-[22px]">search</span>
<input class="w-full h-12 pl-12 pr-4 rounded-2xl bg-surface-container-low border border-outline-variant/30 text-on-surface font-body-sm text-body-sm placeholder:text-on-surface-variant focus:outline-none focus:border-primary focus:bg-surface-container-lowest focus:shadow-sm" placeholder="Search suppliers, coffee, services, provinces..." type="text"/>
</div>
<div class="flex items-center gap-2 overflow-x-auto pb-1 sm:pb-0">
<button class="px-4 h-12 rounded-2xl bg-primary text-on-primary font-label-md text-label-md shrink-0" type="button">Lahat</button>
<button class="px-4 h-12 rounded-2xl bg-surface-container-low border border-outline-variant/30 text-on-surface-variant font-label-md text-label-md shrink-0 hover:bg-surface-container transition-colors" type="button">Agri &amp; Food</button>
<button class="px-4 h-12 rounded-2xl bg-surface-container-low border border-outline-variant/30 text-on-surface-variant font-label-md text-label-md shrink-0 hover:bg-surface-container transition-colors" type="button">Handicrafts</button>
<button class="px-4 h-12 rounded-2xl bg-surface-container-low border border-outline-variant/30 text-on-surface-variant font-label-md text-label-md shrink-0 hover:bg-surface-container transition-colors" type="button">Services</button>
</div>
</div>
<!-- Mini Featured MSME Cards: 2-col on Tablet/PC -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm hover:shadow-md transition-all">
<div class="flex items-center gap-4 min-w-0">
<div class="w-14 h-14 rounded-xl bg-surface-container overflow-hidden shrink-0">
<img alt="Highland Harvest Coffee" class="w-full h-full object-cover" data-alt="High quality roasted Arabica coffee beans from Benguet Philippines in rustic packaging, warm cafe setting." src="/assets/images/learning/loan-grants.png"/>
</div>
<div class="flex flex-col min-w-0">
<span class="font-title-md text-title-md text-on-surface font-bold truncate">Highland Harvest Coffee</span>
<span class="font-body-sm text-body-sm text-on-surface-variant truncate">Benguet • Coffee &amp; Agriculture Supplier</span>
<span class="font-label-sm text-label-sm text-primary font-semibold">120kg weekly supply capacity</span>
</div>
</div>
<div class="px-3 py-1 rounded-full bg-surface-container-high text-primary font-label-sm text-label-sm font-bold shrink-0 flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">verified</span>
<span>Verified</span>
</div>
</div>
<div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm hover:shadow-md transition-all">
<div class="flex items-center gap-4 min-w-0">
<div class="w-14 h-14 rounded-xl bg-surface-container overflow-hidden shrink-0">
<img alt="Habi Modern Crafts" class="w-full h-full object-cover" data-alt="Eco-friendly handwoven pandan baskets and bayong modern bags displayed in a boutique store, bright warm colors." src="/assets/images/learning/wholesale-pitching.png"/>
</div>
<div class="flex flex-col min-w-0">
<span class="font-title-md text-title-md text-on-surface font-bold truncate">Habi Modern Crafts</span>
<span class="font-body-sm text-body-sm text-on-surface-variant truncate">Bicol • Native Handwoven Handicrafts</span>
<span class="font-label-sm text-label-sm text-secondary font-semibold">Custom Corporate Souvenirs</span>
</div>
</div>
<div class="px-3 py-1 rounded-full bg-surface-container-high text-primary font-label-sm text-label-sm font-bold shrink-0 flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">verified</span>
<span>Verified</span>
</div>
</div>
</div>
</div>
</section>
<!-- 9. Chapters & Community Hubs Preview -->
<section class="w-full py-12 sm:py-16 bg-surface-container-low border-y border-surface-container/60" id="regional-chapters">
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12 flex flex-col gap-6">
<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2">
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-primary font-bold uppercase tracking-wider">Luzon • Visayas • Mindanao</span>
<h2 class="font-headline-sm sm:text-headline-md text-on-surface">FLAME Regional Chapters</h2>
<p class="font-body-sm sm:text-body-md text-on-surface-variant">Find an active community and monthly networking meetup in every province.</p>
</div>
<a class="text-primary font-label-md text-label-md font-bold flex items-center gap-1 hover:underline" data-path="community-network" href="/community">
<span>Find Your Chapter</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-3 gap-3 sm:gap-6 text-center">
<div class="p-5 sm:p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm flex flex-col items-center gap-1 hover:border-primary/40 transition-colors">
<span class="font-headline-md sm:text-[36px] text-primary font-extrabold">42</span>
<span class="font-title-md text-title-md text-on-surface font-bold">Luzon Chapters</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">8,900+ Members</span>
</div>
<div class="p-5 sm:p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm flex flex-col items-center gap-1 hover:border-secondary/40 transition-colors">
<span class="font-headline-md sm:text-[36px] text-secondary font-extrabold">21</span>
<span class="font-title-md text-title-md text-on-surface font-bold">Visayas Chapters</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">5,100+ Members</span>
</div>
<div class="p-5 sm:p-6 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 shadow-sm flex flex-col items-center gap-1 hover:border-tertiary-container/40 transition-colors">
<span class="font-headline-md sm:text-[36px] text-tertiary font-extrabold">18</span>
<span class="font-title-md text-title-md text-on-surface font-bold">Mindanao Chapters</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">4,400+ Members</span>
</div>
</div>
</div>
</section>
<!-- 10. Ka-FLAME AI Chat Preview -->
<section class="w-full py-12 sm:py-16 bg-surface">
<div class="max-w-4xl mx-auto px-4 sm:px-6 md:px-8 flex flex-col gap-6">
<div class="flex flex-col gap-1 text-center sm:text-left">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-high text-primary font-label-sm text-label-sm self-center sm:self-start">
<span class="material-symbols-outlined text-[16px]">smart_toy</span>
<span class="font-bold">Ka-FLAME AI Mentor • Update Soon</span>
</div>
<h2 class="font-headline-sm sm:text-headline-md text-on-surface">Try the Ka-FLAME AI Mentor</h2>
<p class="font-body-sm sm:text-body-md text-on-surface-variant">A planned educational assistant for business questions. Availability, sources, and response coverage: Update Soon.</p>
</div>
<!-- Conversational Box -->
<div class="p-5 sm:p-6 rounded-3xl bg-surface-container-lowest border border-outline-variant/30 shadow-lg flex flex-col gap-4">
<!-- User Query -->
<div class="flex items-start gap-2.5 justify-end">
<div class="bg-primary text-on-primary px-4 py-2.5 rounded-2xl rounded-tr-none max-w-[85%] sm:max-w-[70%] font-body-sm text-body-sm shadow-sm">
"Puwede po ba ako mag-apply ng BMBE kahit sari-sari store lang ako?"
</div>
<div class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center text-primary text-xs shrink-0 font-bold">
M
</div>
</div>
<!-- AI Response -->
<div class="flex items-start gap-2.5 justify-start">
<div class="w-8 h-8 rounded-full bg-secondary text-on-secondary flex items-center justify-center shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[17px]">local_fire_department</span>
</div>
<div class="bg-surface-container-low text-on-surface px-4 py-3 rounded-2xl rounded-tl-none max-w-[90%] sm:max-w-[80%] font-body-sm text-body-sm flex flex-col gap-2 shadow-sm">
<p>
<strong>Illustrative answer only.</strong> BMBE eligibility and any tax treatment depend on current Philippine rules and the applicant’s facts. Official source links and review date: <span class="font-semibold">Update Soon</span>. Verify with the relevant government office or a qualified adviser before acting.</p>
<div class="p-2.5 rounded-xl bg-surface-container-lowest border border-outline-variant/20 font-label-sm text-label-sm text-primary flex items-center justify-between gap-2 hover:bg-surface-container-low transition-colors cursor-pointer">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">description</span>
<span>Download the 1-Page BMBE Checklist PDF</span>
</div>
<span class="material-symbols-outlined text-[18px]">download</span>
</div>
</div>
</div>
<!-- Quick Action Prompt Input -->
<div class="pt-2 flex items-center gap-2">
<input class="flex-1 h-12 px-4 rounded-xl bg-surface-container-low border border-outline-variant/20 text-on-surface font-body-sm text-body-sm placeholder:text-on-surface-variant focus:outline-none focus:border-primary focus:bg-surface-container-lowest" placeholder="Ask Ka-FLAME AI (e.g. How do I register with DTI online?)..." type="text"/>
<button class="w-12 h-12 rounded-xl bg-primary text-on-primary flex items-center justify-center hover:bg-primary-container active:scale-95 transition-all shrink-0" type="button">
<span class="material-symbols-outlined text-[20px]">send</span>
</button>
</div>
</div>
</div>
</section>
<!-- 11. High-Impact Final CTA -->
<section class="relative w-full py-16 sm:py-20 bg-gradient-to-b from-primary via-primary-container to-primary text-on-primary overflow-hidden">
<div class="absolute -top-16 -left-16 w-56 h-56 rounded-full bg-secondary-container/20 blur-3xl pointer-events-none">
</div>
<div class="absolute -bottom-16 -right-16 w-56 h-56 rounded-full bg-tertiary-fixed/20 blur-3xl pointer-events-none">
</div>
<div class="max-w-4xl mx-auto px-4 sm:px-6 md:px-8 text-center flex flex-col items-center gap-5 relative z-10">
<div class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-white/15 backdrop-blur-md text-tertiary-fixed font-label-sm text-label-sm uppercase tracking-wider border border-white/20">
<span class="material-symbols-outlined text-[16px]">flag</span>
<span>Growing Filipino MSMEs Together</span>
</div>
<h2 class="font-headline-lg-mobile sm:text-4xl lg:text-5xl text-on-primary font-extrabold tracking-tight">
Join free. Learn free.<br class="hidden sm:inline"/> Grow together.
</h2>
<p class="font-body-md sm:text-body-lg text-on-primary-container max-w-xl leading-relaxed">
Maging bahagi ng pambansang kilusan ng mga negosyanteng Pilipino ngayon. Libre ang pagsapi, may kasamang digital ID, toolkits, at nationwide network.
</p>
<div class="flex flex-col sm:flex-row items-center gap-3 pt-3 w-full sm:w-auto">
<a class="w-full sm:w-auto px-8 h-14 rounded-xl bg-secondary text-on-secondary font-label-md text-label-md font-bold flex items-center justify-center gap-2 shadow-xl hover:bg-secondary-container active:scale-[0.98] transition-all" data-path="membership-registration" href="/membership">
<span class="material-symbols-outlined text-[22px]">badge</span>
<span>Claim Your Free Membership</span>
</a>
<a class="w-full sm:w-auto px-6 h-14 rounded-xl bg-white/10 hover:bg-white/20 text-on-primary font-label-md text-label-md font-semibold flex items-center justify-center gap-2 backdrop-blur-sm transition-colors border border-white/15" data-path="community-network" href="/community">
<span>Contact Us</span>
</a>
</div>
<span class="font-label-sm text-label-sm text-on-primary-container pt-1">
Walang credit card na kailangan • 2 minuto lang ang pag-sign up
</span>
</div>
</section>
</div>
<footer id="footer" class="w-full bg-surface-container-lowest text-on-surface pt-14 sm:pt-16 pb-8 border-t border-surface-container">
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-10 lg:gap-14 pb-12">
<div class="flex flex-col gap-5">
<a class="inline-flex w-fit" href="/">
<img alt="Official FLAME PH logo" class="h-16 w-56 object-cover object-[center_36%]" src="/assets/images/flameph-logo.png"/>
</a>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed max-w-xs">Build Ecosystem. Fuel Leaders. Empower Entrepreneurs.</p>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed max-w-xs">Federation of Leaders Advancing MSME Ecosystem in the Philippines. Championing grassroots enterprise modernization, digital adoption, and market linkage. Members recorded in {{ number_format($membershipStats['represented_provinces']) }} {{ $membershipStats['represented_provinces'] === 1 ? 'province' : 'provinces' }} across {{ number_format($membershipStats['chapter_locations']) }} {{ $membershipStats['chapter_locations'] === 1 ? 'city or municipality' : 'cities and municipalities' }}.</p>
<div class="flex items-center gap-5 text-on-surface">
<a aria-label="Share FLAME PH" class="hover:text-primary transition-colors" href="/about#contact"><span class="material-symbols-outlined">share</span></a>
<a aria-label="Email FLAME PH" class="hover:text-primary transition-colors" href="mailto:hello@flameph.org"><span class="material-symbols-outlined">mail</span></a>
<a aria-label="FLAME PH website" class="hover:text-primary transition-colors" href="/"><span class="material-symbols-outlined">public</span></a>
</div>
</div>
<div class="flex flex-col gap-3"><h3 class="font-label-md text-label-md text-on-surface font-bold">Explore FLAME PH</h3><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/">Home</a><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/about">About FLAME PH</a><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/membership">Membership Plans</a><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/directory">MSME Directory</a><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/community">Community Hubs</a></div>
<div class="flex flex-col gap-3">
<h3 class="font-label-md text-label-md text-on-surface font-bold">Resources / Learn</h3>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/learn">Negosyo Starter Kits</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/learn">DTI &amp; BIR Guides</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/learn">Free Templates</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/learn">SME Loan &amp; Grant Kit</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/learn">Webinars &amp; Workshops</a>
</div>
<div class="flex flex-col gap-3">
<h3 class="font-label-md text-label-md text-on-surface font-bold">Community</h3>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#regional-chapters">Regional Chapters</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#msme-directory">MSME Directory</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#regional-chapters">Bayanihan Circles</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/community#summit">FLAME Summit 2025</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/community#mentorship">Mentorship Network</a>
</div>
<div class="flex flex-col gap-3">
<h3 class="font-label-md text-label-md text-on-surface font-bold">Membership &amp; Legal</h3>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#membership-tiers">Free Tier Registration</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#membership-tiers">Neo Member Benefits</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/about#partners">Partner Ecosystem</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/legal#terms">Terms of Service</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="/legal#privacy">Privacy Policy</a>
</div>
</div>
<div class="border-t border-outline-variant/30 pt-8 text-center">
<p class="font-body-sm text-body-sm text-on-surface-variant mb-2">FLAME PH is formerly FAME PH, or Founders' Association of MSMEs and Entrepreneurs. Registration record and source: Update Soon.</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">© 2025 FLAME PH (Federation of Leaders Advancing MSME Ecosystem in the Philippines). All rights reserved. Ipinagmamalaking gawa ng at para sa negosyanteng Pilipino.</p>
</div>
<div class="mt-6 border-t border-outline-variant/20 pt-4 text-left text-[11px] leading-relaxed text-on-surface-variant">
<p class="font-semibold">Legal Disclaimer &amp; Terms of Use</p>
<p class="mt-2 font-semibold">Development &amp; Prototype Notice</p>
<p>Please be advised that the FLAME PH national organization, along with its associated chapter buildups, is currently in an operational development stage. This website functions solely as a prototype and is under active construction. The information, resources, and statements contained within this website are presented exclusively for illustrative and presentation purposes. FLAME PH reserves the right to modify, amend, or update any content without prior notice as the organization advances its structural and partnership development.</p>
<p class="mt-2 font-semibold">Limitation of Liability</p>
<p>All content provided on this prototype website is offered on an &quot;as-is&quot; and &quot;as-available&quot; basis, without warranties of any kind, whether express or implied. FLAME PH makes no representations regarding the completeness, accuracy, reliability, or timeliness of any information published herein. In no event shall FLAME PH, its founders, officers, partners, or affiliates be liable for any direct, indirect, incidental, or consequential damages arising out of or in connection with the use of, or inability to use, this website or reliance on any information provided.</p>
<p class="mt-2 font-semibold">Privacy Notice</p>
<p>As this platform is currently a prototype, any information collected through form submissions, analytics, or website interactions is handled strictly for testing and organizational development purposes. FLAME PH does not sell, rent, or trade personal data to third parties. By interacting with this website, you acknowledge and consent to the temporary collection and processing of operational data necessary to refine and build out the FLAME PH platform.</p>
</div>
</div>
</footer>
</main>
@include('partials.mobile-navigation')
</body>
</html>

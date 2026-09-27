<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLAME PH Membership Terms and Conditions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#faf8ff] font-['DM_Sans'] text-[#131b2e]">
<header class="border-b border-[#e2e7ff] bg-white"><div class="mx-auto flex h-20 max-w-7xl items-center px-5 sm:px-8"><a href="/"><img src="/assets/images/flameph-logo.png" alt="FLAME PH logo" class="h-12 w-44 object-cover object-[center_36%]"></a></div></header>
<main class="mx-auto max-w-5xl px-5 pb-16 pt-36 sm:px-8 sm:pt-40">
    <div class="mb-7"><p class="text-sm font-bold uppercase tracking-wider text-[#bc000c]">Free Community</p><h1 class="mt-2 font-['Plus_Jakarta_Sans'] text-3xl font-extrabold sm:text-4xl">Membership Terms and Conditions</h1><p class="mt-3 text-lg leading-7 text-[#434653]">Please read these terms before joining the FLAME PH Free Community.</p></div>
    <article class="rounded-3xl border border-[#c3c6d6]/60 bg-white p-6 shadow-sm sm:p-9">@include('partials.membership-terms-content')</article>
    <div class="mt-7 flex flex-col gap-3 sm:flex-row"><a href="{{ route('membership.terms.download') }}" class="inline-flex items-center justify-center rounded-xl bg-[#bc000c] px-6 py-3.5 font-bold text-white hover:bg-[#930007]">Download Terms and Conditions of FLAME PH Membership</a><a href="{{ route('membership') }}#registration" class="inline-flex items-center justify-center rounded-xl bg-[#e2e7ff] px-6 py-3.5 font-bold text-[#003289]">Back to membership registration</a></div>
</main>
@include('partials.home-footer')
@include('partials.mobile-navigation')
</body>
</html>

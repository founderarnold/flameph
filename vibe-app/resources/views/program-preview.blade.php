@php($page = config('program-previews.'.$program))
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $page['summary'] }} Under construction. Join FLAME PH for free to receive launch updates.">
    <title>{{ $page['name'] }} | Coming Soon</title>
    <link rel="canonical" href="https://www.flameph.org/{{ $program }}">
    @include('partials.home-styles')
    <style>.program-main{padding-top:var(--program-header-height,180px)}.program-title{overflow-wrap:anywhere}</style>
</head>
<body class="bg-surface text-on-surface font-body">
@include('partials.home-header')
<main class="program-main">
    <section class="bg-gradient-to-br from-primary via-primary-container to-[#16365d] px-4 py-12 text-white sm:px-6 sm:py-16 lg:px-8" aria-labelledby="program-title">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-3 lg:items-center">
            <div class="lg:col-span-2">
                <nav aria-label="Breadcrumb" class="mb-8 flex flex-wrap gap-2 text-sm text-white/80"><a href="{{ route('home') }}" class="hover:underline">Home</a><span aria-hidden="true">/</span><span aria-current="page">{{ $page['name'] }}</span></nav>
                <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-wider text-tertiary-fixed"><span aria-hidden="true" class="material-symbols-outlined text-base">construction</span>Under construction</span>
                <h1 id="program-title" class="program-title mt-5 font-headline text-3xl font-extrabold tracking-tight sm:text-4xl lg:text-5xl">{{ $page['name'] }}</h1>
                <p class="mt-4 text-sm font-semibold text-tertiary-fixed sm:text-base">{{ $page['eyebrow'] }}</p>
                <p class="mt-6 max-w-3xl text-base leading-8 text-white/90 sm:text-lg">{{ $page['intro'] }}</p>
            </div>
            <aside class="rounded-3xl border border-white/20 bg-white/10 p-6 sm:p-8" aria-labelledby="launch-notice">
                <span aria-hidden="true" class="material-symbols-outlined text-4xl text-tertiary-fixed">{{ $page['icon'] }}</span>
                <h2 id="launch-notice" class="mt-4 font-headline text-xl font-bold">Something useful is on the way.</h2>
                <p class="mt-3 text-sm leading-7 text-white/90">This page and its features are still under construction. Join FLAME PH for free to receive updates once these features are running.</p>
                <a href="{{ route('membership') }}#registration" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-full bg-secondary px-5 py-3 text-center font-bold text-white shadow-md hover:bg-secondary-container">Join FLAME PH Free <span aria-hidden="true">→</span></a>
                <p class="mt-3 text-center text-xs leading-5 text-white/75">Free membership. Stay connected as we build.</p>
            </aside>
        </div>
    </section>
    <section class="px-4 py-14 sm:px-6 sm:py-16 lg:px-8" aria-labelledby="journey-heading">
        <div class="mx-auto max-w-7xl">
            <p class="text-xs font-bold uppercase tracking-widest text-secondary">For aspiring entrepreneurs &amp; MSMEs</p>
            <h2 id="journey-heading" class="mt-3 max-w-3xl font-headline text-3xl font-extrabold tracking-tight sm:text-4xl">{{ $page['headline'] }}</h2>
            <p class="mt-4 max-w-3xl leading-7 text-on-surface-variant">Start your business, grow locally, and prepare to scale globally. Here is how {{ $page['name'] }} aims to help.</p>
            <div class="mt-8 grid gap-5 md:grid-cols-3">
                @foreach($page['journey'] as $step)
                    <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-primary/10 sm:p-8">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-surface-container-low font-bold text-primary">0{{ $loop->iteration }}</span>
                        <h3 class="mt-5 font-headline text-xl font-bold">{{ $step['title'] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-on-surface-variant">{{ $step['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-white px-4 py-14 sm:px-6 sm:py-16 lg:px-8" aria-labelledby="features-heading">
        <div class="mx-auto max-w-7xl">
            <p class="text-xs font-bold uppercase tracking-widest text-secondary">A preview of what is planned</p>
            <h2 id="features-heading" class="mt-3 font-headline text-3xl font-extrabold">What to look forward to</h2>
            <div class="mt-8 grid gap-6 md:grid-cols-3">
                @foreach($page['features'] as $feature)
                    <article class="rounded-2xl bg-surface-container-low p-6 sm:p-8">
                        <span aria-hidden="true" class="material-symbols-outlined text-3xl text-primary">{{ $feature['icon'] }}</span>
                        <h3 class="mt-4 font-headline text-xl font-bold">{{ $feature['title'] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-on-surface-variant">{{ $feature['text'] }}</p>
                    </article>
                @endforeach
            </div>
            <p class="mt-6 text-sm leading-6 text-on-surface-variant">These are planned features, not yet available. Details and availability will be shared as development progresses.</p>
        </div>
    </section>
    <section class="px-4 py-14 sm:px-6 sm:py-16 lg:px-8" aria-labelledby="ecosystem-heading">
        <div class="mx-auto max-w-7xl">
            <h2 id="ecosystem-heading" class="font-headline text-3xl font-extrabold">One community. Connected support.</h2>
            <p class="mt-4 max-w-3xl leading-7 text-on-surface-variant">{{ $page['role'] }}</p>
            <a href="{{ route('programs.ecosystem') }}" class="mt-4 inline-flex font-bold text-primary hover:underline">Explore the FLAME PH ecosystem <span aria-hidden="true" class="ml-2">→</span></a>
            <div class="mt-8 grid gap-5 sm:grid-cols-2">
                @foreach(config('program-previews') as $key => $related)
                    @if($key !== $program)
                        <a href="{{ route($related['route']) }}" class="group rounded-2xl bg-white p-6 shadow-sm ring-1 ring-primary/10 transition hover:shadow-md">
                            <span class="text-xs font-bold uppercase tracking-wider text-secondary">Coming soon</span>
                            <h3 class="mt-3 font-headline text-xl font-bold text-primary group-hover:underline">{{ $related['name'] }} <span aria-hidden="true">→</span></h3>
                            <p class="mt-3 text-sm leading-6 text-on-surface-variant">{{ $related['summary'] }}</p>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</main>
@include('partials.home-footer')
@include('partials.mobile-navigation')
<script>
(() => {
    const header = document.querySelector('[data-site-header]');
    const updateHeaderSpace = () => document.documentElement.style.setProperty('--program-header-height', `${header.getBoundingClientRect().height}px`);
    new ResizeObserver(updateHeaderSpace).observe(header);
    updateHeaderSpace();
})();
</script>
</body>
</html>

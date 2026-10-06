<section class="bg-primary px-4 py-16 sm:px-6 sm:py-20 lg:px-8" aria-labelledby="free-benefits-heading">
    <div class="mx-auto max-w-7xl">
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-flex rounded-full bg-emerald-100 px-4 py-2 text-xs font-bold uppercase tracking-widest text-emerald-700">Member benefits</span>
            <h2 id="free-benefits-heading" class="mt-5 font-headline text-4xl font-extrabold tracking-tight text-white sm:text-5xl">LIBRE PAG SUMALI KA SA FLAME PH!</h2>
            <p class="mt-4 text-base leading-7 text-white/85 sm:text-lg">Practical tools, learning, and connections to help Filipino entrepreneurs move forward.</p>
        </div>
        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $freeBenefits = [
                    ['icon' => 'storefront', 'title' => 'Free Business Directory Listing', 'description' => 'Get your business discovered.'],
                    ['icon' => 'campaign', 'title' => 'Free Marketplace Posting', 'description' => 'Promote products and services.'],
                    ['icon' => 'point_of_sale', 'title' => 'Free POS (Point of Sale)', 'description' => 'Help manage sales.'],
                    ['icon' => 'web', 'title' => 'Free Business Profile (Mini Website)', 'description' => 'Build an online presence.'],
                    ['icon' => 'school', 'title' => 'Free Business Learning', 'description' => 'Learn practical entrepreneurship, digital and AI skills.'],
                    ['icon' => 'smart_toy', 'title' => 'Free FLAME AI Business Consultation', 'description' => 'Ask business-related questions.'],
                    ['icon' => 'groups', 'title' => 'Free Community Access Nationwide', 'description' => 'Connect with entrepreneurs.'],
                    ['icon' => 'location_on', 'title' => 'Local Chapter Access (City/Town/Provincial)', 'description' => 'Meet business owners around your area.'],
                ];
            @endphp
            @foreach ($freeBenefits as $benefit)
                <article class="rounded-3xl bg-surface-container-low p-6 ring-1 ring-primary/5 transition hover:-translate-y-1 hover:bg-surface-container hover:shadow-lg">
                    <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary text-white shadow-sm"><span class="material-symbols-outlined text-3xl" aria-hidden="true">{{ $benefit['icon'] }}</span></span>
                    <h3 class="mt-5 font-headline text-xl font-extrabold leading-tight text-primary">{{ $benefit['title'] }}</h3>
                    <p class="mt-3 leading-6 text-on-surface-variant">{{ $benefit['description'] }}</p>
                </article>
            @endforeach
        </div>
        <div class="mt-10 text-center">
            <a class="inline-flex items-center justify-center rounded-full bg-secondary px-7 py-4 text-center font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-secondary-container" href="/membership#registration">Get these benefits — Join FLAME PH for FREE <span class="material-symbols-outlined ml-2 text-xl" aria-hidden="true">arrow_forward</span></a>
        </div>
    </div>
</section>

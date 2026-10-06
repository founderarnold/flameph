<section class="bg-surface-container-low px-4 py-16 sm:px-6 sm:py-20 lg:px-8" aria-labelledby="needs-heading">
    <div class="mx-auto max-w-7xl">
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-flex rounded-full bg-white px-4 py-2 text-xs font-bold uppercase tracking-widest text-primary shadow-sm">Find your next step</span>
            <h2 id="needs-heading" class="mt-5 font-headline text-4xl font-extrabold tracking-tight sm:text-5xl">Ano ang kailangan mo ngayon?</h2>
            <p class="mt-4 text-base leading-7 text-on-surface-variant sm:text-lg">Tell us what you need and find the right FLAME PH path for your business journey.</p>
        </div>
        <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $needsCards = [
                    ['title' => 'Gusto kong magsimula ng negosyo', 'href' => '/learn', 'image' => '/assets/images/home/needs/start-business.png', 'alt' => 'Illustration of starting a business'],
                    ['title' => 'May negosyo ako at gusto kong lumago', 'href' => '/learn', 'image' => '/assets/images/home/needs/grow-business.png', 'alt' => 'Illustration of growing a business'],
                    ['title' => 'Gusto kong makahanap ng customers', 'href' => '/events', 'image' => '/assets/images/home/needs/find-customers.png', 'alt' => 'Illustration of finding customers'],
                    ['title' => 'Naghahanap ako ng suppliers', 'href' => '/directory', 'image' => '/assets/images/home/needs/find-suppliers.png', 'alt' => 'Illustration of finding suppliers'],
                    ['title' => 'Kailangan ko ng business tools', 'href' => '/learn', 'image' => '/assets/images/home/needs/business-tools.png', 'alt' => 'Illustration of business tools'],
                    ['title' => 'Gusto kong makahanap ng business connections', 'href' => '/directory', 'image' => '/assets/images/home/needs/business-connections.png', 'alt' => 'Illustration of business connections'],
                    ['title' => 'Gusto kong sumali sa FLAME PH Chapter', 'href' => '/directory', 'image' => '/assets/images/home/needs/join-chapter.png', 'alt' => 'Illustration of joining a local FLAME PH chapter'],
                    ['title' => 'Gusto kong palakihin ang brand ko', 'href' => '/events', 'image' => '/assets/images/home/needs/grow-brand.png', 'alt' => 'Illustration of growing a brand'],
                ];
            @endphp
            @foreach ($needsCards as $card)
                <a class="group overflow-hidden rounded-3xl bg-white p-5 shadow-sm ring-1 ring-primary/5 transition hover:-translate-y-1 hover:shadow-xl" href="{{ $card['href'] }}">
                    <div class="flex justify-end"><span class="material-symbols-outlined text-3xl text-primary transition group-hover:translate-x-1">arrow_forward</span></div>
                    <img class="mx-auto mt-1 h-44 w-full object-contain transition group-hover:scale-105" src="{{ $card['image'] }}" alt="{{ $card['alt'] }}" loading="lazy">
                    <h3 class="mt-4 font-headline text-xl font-extrabold leading-tight">{{ $card['title'] }}</h3>
                </a>
            @endforeach
        </div>
    </div>
</section>

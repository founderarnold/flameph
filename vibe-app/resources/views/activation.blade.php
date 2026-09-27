<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate your FLAME PH account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#faf8ff] font-['DM_Sans'] text-[#131b2e]">
    <header class="border-b border-[#e2e7ff] bg-white">
        <div class="mx-auto flex h-20 max-w-5xl items-center px-5 sm:px-8">
            <a href="/" class="flex items-center"><img src="/assets/images/flameph-logo.png" alt="FLAME PH logo" class="h-12 w-44 object-cover object-[center_36%]"></a>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-5 pb-10 pt-36 sm:px-8 sm:pb-16 sm:pt-40">
        <div class="mx-auto max-w-2xl">
            <div class="mb-8 flex items-center gap-3 text-xs font-bold uppercase tracking-[0.14em] text-[#003289]">
                <span class="grid h-8 w-8 place-items-center rounded-full bg-[#dbe1ff]">1</span>
                <span>Google verified</span>
                <span class="h-px flex-1 bg-[#c3c6d6]"></span>
                <span class="grid h-8 w-8 place-items-center rounded-full bg-[#003289] text-white">2</span>
                <span class="hidden sm:inline">Activate account</span>
            </div>

            <section class="rounded-3xl border border-[#c3c6d6]/60 bg-white p-6 shadow-sm sm:p-10">
                <div class="mb-8">
                    <p class="mb-2 text-sm font-bold uppercase tracking-wider text-[#bc000c]">Welcome to FLAME PH</p>
                    <h1 class="font-['Plus_Jakarta_Sans'] text-3xl font-extrabold tracking-tight sm:text-4xl">Activate your Free Community account</h1>
                    <p class="mt-3 leading-7 text-[#434653]">Your Google account is connected securely. Confirm the details below so we can prepare your FLAME PH member profile.</p>
                </div>

                <div class="mb-7 flex items-center gap-3 rounded-2xl bg-[#f2f3ff] p-4">
                    <span class="grid h-10 w-10 place-items-center rounded-full bg-white text-lg font-bold text-[#003289] shadow-sm">G</span>
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-[#131b2e]">Google account verified</p>
                        <p class="truncate text-sm text-[#434653]">{{ $application['email'] }}</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert">
                        <p class="font-bold">Please check your activation details.</p>
                        <ul class="mt-1 list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('membership.activate.complete') }}" method="POST" class="grid gap-5">
                    @csrf
                    <label class="text-sm font-bold">Full name
                        <input name="name" type="text" required maxlength="120" autocomplete="name" value="{{ old('name', $application['name']) }}" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]">
                    </label>
                    <label class="text-sm font-bold">Business or project name
                        <input name="business_name" type="text" required maxlength="160" autocomplete="organization" value="{{ old('business_name') }}" placeholder="e.g. Maria's Home Bakes" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]">
                    </label>
                    <label class="text-sm font-bold">Mobile number <span class="font-normal text-[#737685]">(optional)</span>
                        <input name="mobile_number" type="tel" maxlength="24" inputmode="tel" autocomplete="tel" value="{{ old('mobile_number') }}" placeholder="0917 123 4567" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]">
                    </label>
                    <label class="flex items-start gap-3 text-sm leading-6 text-[#434653]">
                        <input name="activation_consent" type="checkbox" value="1" required class="mt-1 h-4 w-4 rounded border-[#c3c6d6] text-[#003289]">
                        <span>I agree to activate my FLAME PH Free Community account and be contacted about membership support.</span>
                    </label>
                    <button type="submit" class="mt-2 inline-flex items-center justify-center gap-2 rounded-xl bg-[#bc000c] px-5 py-3.5 font-bold text-white shadow-sm transition hover:bg-[#930007]">Activate my FLAME PH account <span aria-hidden="true">→</span></button>
                </form>

                <p class="mt-6 border-t border-[#e2e7ff] pt-5 text-xs leading-5 text-[#737685]">FLAME PH only receives the Google profile name and email needed for registration. No Google password is shared with FLAME PH.</p>
            </section>
            <p class="mt-6 text-center text-sm text-[#434653]"><a href="{{ route('membership') }}#registration" class="font-bold text-[#003289] hover:underline">Back to registration options</a></p>
        </div>
    </main>
    <footer class="border-t border-[#e2e7ff] bg-white">
        <div class="mx-auto flex max-w-5xl flex-col gap-3 px-5 py-6 text-sm text-[#737685] sm:flex-row sm:items-center sm:justify-between sm:px-8">
            <p>© {{ date('Y') }} FLAME PH. Free Community registration.</p>
            <nav class="flex gap-4" aria-label="Footer navigation">
                <a href="/about" class="hover:text-[#003289]">About FLAME PH</a>
                <a href="/legal#privacy" class="hover:text-[#003289]">Privacy</a>
                <a href="/legal#terms" class="hover:text-[#003289]">Terms</a>
            </nav>
        </div>
    </footer>
    @include('partials.mobile-navigation')
</body>
</html>

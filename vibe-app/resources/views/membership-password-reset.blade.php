<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset your FLAME PH password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-[#f7f8fc] px-4 py-12 font-['Plus_Jakarta_Sans'] text-[#131b2e]">
    <main class="mx-auto max-w-lg rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-9">
        <a href="/" class="inline-flex items-center gap-3" aria-label="FLAME PH home">
            <img src="/assets/images/flameph-logo.png" alt="FLAME PH" class="h-12 w-auto object-contain">
        </a>
        <p class="mt-8 text-sm font-bold uppercase tracking-widest text-[#bc000c]">Member account recovery</p>
        <h1 class="mt-2 text-2xl font-extrabold sm:text-3xl">Choose a new password</h1>
        <p class="mt-2 text-sm leading-6 text-slate-600">Choose a new password with at least 12 characters, then use it to sign in to your FLAME PH account.</p>

        @if ($errors->any())
            <div role="alert" class="mt-5 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-800">
                @foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach
            </div>
        @endif

        <form action="{{ route('membership.password.reset') }}" method="POST" class="mt-6 space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <label class="block text-sm font-bold" for="email">Membership email
                <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email', $email) }}" class="mt-1.5 min-h-12 w-full rounded-lg border border-slate-300 px-3 font-normal">
            </label>
            <label class="block text-sm font-bold" for="password">New password
                <input id="password" name="password" type="password" autocomplete="new-password" minlength="12" required class="mt-1.5 min-h-12 w-full rounded-lg border border-slate-300 px-3 font-normal">
            </label>
            <label class="block text-sm font-bold" for="password_confirmation">Confirm new password
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" minlength="12" required class="mt-1.5 min-h-12 w-full rounded-lg border border-slate-300 px-3 font-normal">
            </label>
            <button type="submit" class="min-h-12 w-full rounded-xl bg-[#003289] px-5 py-3 font-bold text-white hover:bg-[#0047ba]">Save new password</button>
        </form>
        <p class="mt-5 text-center text-sm"><a class="font-semibold text-[#003289] underline" href="{{ route('membership') }}#login">Return to member login</a></p>
    </main>
@include('partials.home-footer')</body>
</html>

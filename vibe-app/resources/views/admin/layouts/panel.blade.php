<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') • FLAME PH</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Material+Symbols+Outlined" rel="stylesheet">
    <style>
      *{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:#faf8ff;color:#131b2e;font-family:"DM Sans",sans-serif}.admin-main{max-width:1160px;margin:auto;padding:170px 22px 70px;min-height:70vh}.admin-brand{font-family:"Plus Jakarta Sans",sans-serif}.admin-card{background:#fff;border:1px solid #e2e7ff;border-radius:18px;padding:22px;box-shadow:0 8px 28px rgba(0,47,108,.05)}.admin-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(210px,1fr));gap:16px}.admin-topbar{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:12px;margin:0 0 24px}.admin-nav{display:flex;flex-wrap:wrap;gap:8px}.admin-nav a,.admin-button{display:inline-flex;align-items:center;justify-content:center;gap:7px;border:0;border-radius:10px;padding:10px 14px;background:#003289;color:#fff;text-decoration:none;font:600 14px "DM Sans",sans-serif;cursor:pointer}.admin-nav a.secondary{background:#f2f3ff;color:#003289}.admin-field{display:grid;gap:6px;margin:0 0 14px}.admin-field label{font-weight:700;font-size:14px}.admin-field input,.admin-field select{width:100%;min-height:44px;border:1px solid #c3c6d6;border-radius:9px;padding:10px 12px;background:#fff;font:16px "DM Sans",sans-serif}.admin-password-control{position:relative}.admin-password-control input{padding-right:54px}.admin-password-toggle{position:absolute;right:4px;top:50%;transform:translateY(-50%);width:44px;height:44px;display:grid;place-items:center;border:0;border-radius:8px;background:transparent;color:#003289;cursor:pointer}.admin-password-toggle:hover{background:#f2f3ff}.admin-password-toggle:focus-visible{outline:3px solid #7598ff;outline-offset:1px}.admin-table-wrap{overflow:auto}.admin-table{width:100%;border-collapse:collapse;min-width:720px}.admin-table th,.admin-table td{padding:12px;border-bottom:1px solid #eaedff;text-align:left;vertical-align:top;font-size:14px}.admin-table th{color:#434653;background:#f7f8ff}.admin-alert{padding:12px 15px;border-radius:10px;background:#edfbf2;color:#155c31;margin:0 0 16px}.admin-error{color:#a4000a;font-size:14px}.admin-footer{background:#fff;border-top:1px solid #eaedff;padding:35px 22px;color:#5c6070}.admin-footer-inner{max-width:1160px;margin:auto;display:flex;align-items:center;justify-content:space-between;gap:15px;flex-wrap:wrap}.admin-pagination nav{display:flex;gap:10px;align-items:center;margin-top:18px}.admin-pagination a,.admin-pagination span{padding:7px 10px;border-radius:7px;background:#f2f3ff;color:#003289;text-decoration:none}
      @media(max-width:767px){.admin-main{padding:170px 15px 56px}.admin-card{padding:17px}.admin-table{min-width:690px}}
    </style>
</head>
<body>
    <header></header>
    <main class="admin-main">
        @if(session('status'))<div class="admin-alert" role="status">{{ session('status') }}</div>@endif
        @if($errors->any())<div class="admin-alert" style="background:#fff0f0;color:#8b1111" role="alert">{{ $errors->first() }}</div>@endif
        @yield('content')
    </main>
    <footer class="admin-footer"><div class="admin-footer-inner"><a href="/" style="display:flex;align-items:center;gap:12px;color:#003289;text-decoration:none;font-weight:700"><img src="/assets/images/flameph-logo.png" alt="FLAME PH" style="width:138px;height:44px;object-fit:cover;object-position:center 36%"> Admin workspace</a><span>© {{ date('Y') }} FLAME PH • Protected administrative access</span><a href="/about" style="color:#003289">About FLAME PH</a></div></footer>
    <script>
      document.addEventListener('click', function (event) {
        const toggle = event.target.closest('[data-admin-password-toggle]');
        if (!toggle) return;
        const input = toggle.parentElement.querySelector('input[type="password"], input[type="text"][data-password-visible]');
        if (!input) return;
        const show = input.type === 'password';
        input.type = show ? 'text' : 'password';
        input.toggleAttribute('data-password-visible', show);
        toggle.setAttribute('aria-pressed', String(show));
        toggle.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
        toggle.title = show ? 'Hide password' : 'Show password';
        toggle.querySelector('.material-symbols-outlined').textContent = show ? 'visibility_off' : 'visibility';
      });
    </script>
    @include('partials.mobile-navigation')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 2: Your FLAME PH profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { theme: { extend: { colors: { "surface-container-lowest": "#ffffff", "surface-container": "#eaedff", "on-surface": "#131b2e", "on-surface-variant": "#434653", "outline-variant": "#c3c6d6", "primary": "#003289" }, fontFamily: { "body-sm": ["DM Sans"], "label-md": ["Plus Jakarta Sans"] }, fontSize: { "body-sm": ["14px", { lineHeight: "20px" }], "label-md": ["14px", { lineHeight: "20px" }] } } } };</script>
</head>
<body class="min-h-screen bg-[#faf8ff] font-['DM_Sans'] text-[#131b2e]">
    <header class="border-b border-[#e2e7ff] bg-white"><div class="mx-auto flex h-20 max-w-7xl items-center px-5 sm:px-8"><a href="/" class="flex items-center"><img src="/assets/images/flameph-logo.png" alt="FLAME PH logo" class="h-12 w-44 object-cover object-[center_36%]"></a></div></header>

    <main class="mx-auto max-w-7xl px-5 pb-12 pt-36 sm:px-8 sm:pb-16 sm:pt-40">
        <div class="mx-auto max-w-6xl">
            <div class="mb-8 flex items-center gap-3 text-xs font-bold uppercase tracking-[0.12em] text-[#003289]">
                <span class="grid h-8 w-8 place-items-center rounded-full bg-[#dbe1ff]">✓</span><span>Step 1 complete</span><span class="h-px flex-1 bg-[#c3c6d6]"></span><span class="grid h-8 w-8 place-items-center rounded-full bg-[#003289] text-white">2</span><span class="hidden sm:inline">Step 2 of 2 • Create your FLAME profile</span>
            </div>

            <div class="mb-8 max-w-3xl">
                <p class="mb-2 text-sm font-bold uppercase tracking-wider text-[#bc000c]">Welcome, {{ $membership->full_name ?: $application['name'] }}</p>
                <h1 class="font-['Plus_Jakarta_Sans'] text-3xl font-extrabold tracking-tight sm:text-4xl">Let’s shape your next business step</h1>
                <p class="mt-3 text-lg leading-7 text-[#434653]">Your Free Community membership is active. A few details help FLAME PH point you toward practical learning and support for where you are today.</p>
            </div>

            @if (session('profile_saved'))
                <div class="mb-7 rounded-2xl border border-green-200 bg-green-50 p-5 text-green-900" role="status">
                    <p class="font-bold">Your member profile has been saved.</p>
                    <p class="mt-1 text-sm">Use the guide below to choose a manageable next step. You can update your profile by returning to this page.</p>
                </div>
            @endif

            <div class="grid items-start gap-8 lg:grid-cols-[1.1fr_0.9fr]">
                <section class="rounded-3xl border border-[#c3c6d6]/60 bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="font-['Plus_Jakarta_Sans'] text-2xl font-bold">Your member profile</h2>
                    <p class="mt-2 text-sm leading-6 text-[#434653]">Your answers help us tailor your FLAME PH experience. Text fields are cleared whenever this page loads; saving still updates your member record.</p>

                    @if ($errors->any())
                        <div class="mt-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><p class="font-bold">Please review these details.</p><ul class="mt-1 list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                    @endif

                    <form action="{{ route('membership.profile.save') }}" method="POST" enctype="multipart/form-data" class="mt-6 grid gap-5 sm:grid-cols-2">
                        @csrf
                        <label class="text-sm font-bold">Full Name <span class="text-[#bc000c]">*</span><input name="full_name" required maxlength="160" autocomplete="name" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]"></label>
                        <label class="text-sm font-bold">City or Municipality <span class="text-[#bc000c]">*</span><input name="city_municipality" required maxlength="100" autocomplete="address-level2" placeholder="e.g. Quezon City" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]"></label>
                        <label class="text-sm font-bold">Province <span class="text-[#bc000c]">*</span><input name="province" required maxlength="100" autocomplete="address-level1" placeholder="e.g. Cebu" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]"></label>
                        <label class="text-sm font-bold sm:col-span-2">Complete Address <span class="text-[#bc000c]">*</span><textarea name="complete_address" required maxlength="600" rows="2" autocomplete="street-address" placeholder="House/building number, street, barangay, and other address details" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]"></textarea></label>
                        <label class="text-sm font-bold sm:col-span-2">Business or idea name <span class="text-[#bc000c]">*</span><input name="business_name" required maxlength="160" autocomplete="organization" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]"></label>
                        <label class="text-sm font-bold">Where are you in your business journey? <span class="text-[#bc000c]">*</span><select name="entrepreneur_stage" required class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] bg-white px-4 py-3 font-normal outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]">
                            <option value="">Choose the closest match</option><option value="idea" @selected(old('entrepreneur_stage', $membership->entrepreneur_stage) === 'idea')>I have an idea, but haven’t started yet</option><option value="preparing" @selected(old('entrepreneur_stage', $membership->entrepreneur_stage) === 'preparing')>I’m preparing to launch</option><option value="selling" @selected(old('entrepreneur_stage', $membership->entrepreneur_stage) === 'selling')>I’m already selling</option><option value="established" @selected(old('entrepreneur_stage', $membership->entrepreneur_stage) === 'established')>My business is established and I want to grow</option>
                        </select></label>
                        <label class="text-sm font-bold">Business registration status <span class="text-[#bc000c]">*</span><select name="business_registration_status" required class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] bg-white px-4 py-3 font-normal outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]">
                            <option value="">Choose one</option><option value="not_started" @selected(old('business_registration_status', $membership->business_registration_status) === 'not_started')>Not registered yet</option><option value="planning" @selected(old('business_registration_status', $membership->business_registration_status) === 'planning')>I’m learning what registration involves</option><option value="registered" @selected(old('business_registration_status', $membership->business_registration_status) === 'registered')>Already registered</option><option value="not_sure" @selected(old('business_registration_status', $membership->business_registration_status) === 'not_sure')>I’m not sure</option>
                        </select></label>
                        <label class="text-sm font-bold">Business or idea area <span class="font-normal text-[#737685]">(optional)</span><input name="industry" maxlength="100" placeholder="e.g. food, farming, retail, services" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]"></label>
                        <label class="text-sm font-bold sm:col-span-2">What do you make, sell, or hope to offer? <span class="font-normal text-[#737685]">(optional)</span><textarea name="products_services" maxlength="1200" rows="3" placeholder="A few words are enough. If you’re still exploring, tell us what interests you." class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]"></textarea></label>
                        <label class="text-sm font-bold sm:col-span-2">What would you most like to accomplish next? <span class="text-[#bc000c]">*</span><select name="primary_goal" required class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] bg-white px-4 py-3 font-normal outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]">
                            <option value="">Choose your main goal</option><option value="validate_idea" @selected(old('primary_goal', $membership->primary_goal) === 'validate_idea')>Check whether my idea can work</option><option value="first_sales" @selected(old('primary_goal', $membership->primary_goal) === 'first_sales')>Prepare to launch or make my first sales</option><option value="registration" @selected(old('primary_goal', $membership->primary_goal) === 'registration')>Understand permits and business registration</option><option value="marketing" @selected(old('primary_goal', $membership->primary_goal) === 'marketing')>Reach more customers and improve marketing</option><option value="operations" @selected(old('primary_goal', $membership->primary_goal) === 'operations')>Improve costing, bookkeeping, or daily operations</option><option value="connections" @selected(old('primary_goal', $membership->primary_goal) === 'connections')>Find customers, suppliers, or business connections</option><option value="finance_skills" @selected(old('primary_goal', $membership->primary_goal) === 'finance_skills')>Build financial or digital skills</option>
                        </select></label>
                        <fieldset class="sm:col-span-2"><legend class="text-sm font-bold">What kind of help would be useful? <span class="font-normal text-[#737685]">(optional; choose any)</span></legend>
                            <div class="mt-3 grid gap-2 sm:grid-cols-2">@foreach ([['idea_validation','Testing a business idea'],['pricing_bookkeeping','Pricing, costing, or bookkeeping'],['permits','Permits and registration steps'],['marketing','Marketing and online selling'],['connections','Finding customers or suppliers'],['funding_readiness','Preparing to understand funding options'],['digital_tools','Digital tools and business skills']] as [$value,$label])<label class="flex items-start gap-2 rounded-xl border border-[#e2e7ff] p-3 text-sm font-normal text-[#434653]"><input type="checkbox" name="support_needs[]" value="{{ $value }}" class="mt-0.5 rounded border-[#c3c6d6] text-[#003289]"><span>{{ $label }}</span></label>@endforeach</div>
                        </fieldset>
                        <label class="text-sm font-bold sm:col-span-2">Upload Valid ID <span class="font-normal text-[#737685]">(optional, JPG/PNG/PDF up to 5 MB)</span><input id="id-document-upload" name="id_document" type="file" accept=".jpg,.jpeg,.png,.pdf,image/jpeg,image/png,application/pdf" class="mt-1.5 block w-full rounded-xl border border-[#c3c6d6] bg-white px-4 py-3 text-sm font-normal file:mr-4 file:rounded-lg file:border-0 file:bg-[#e2e7ff] file:px-4 file:py-2 file:font-bold file:text-[#003289]"></label>
                        <label class="flex items-start gap-2 text-xs leading-5 text-[#434653] sm:col-span-2"><input id="id-document-consent" type="checkbox" name="id_document_consent" value="1" class="mt-1"><span>If I upload an ID, I consent to FLAME PH storing it in private app storage for membership identity review. The file is not placed in the Google Sheet. I understand this prototype does not provide an ID review/download page.</span></label>
                        <label class="text-sm font-bold sm:col-span-2">Preferred learning language <span class="text-[#bc000c]">*</span><select name="preferred_language" required class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] bg-white px-4 py-3 font-normal outline-none focus:border-[#003289] focus:ring-2 focus:ring-[#dbe1ff]"><option value="both" @selected(old('preferred_language', $membership->preferred_language ?? 'both') === 'both')>English and Filipino</option><option value="english" @selected(old('preferred_language', $membership->preferred_language) === 'english')>English</option><option value="filipino" @selected(old('preferred_language', $membership->preferred_language) === 'filipino')>Filipino</option></select></label>
                        <div class="flex flex-col gap-3 pt-1 sm:col-span-2 sm:flex-row sm:items-center"><button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#bc000c] px-6 py-3.5 font-bold text-white shadow-sm transition hover:bg-[#930007]">Save my profile <span aria-hidden="true">→</span></button><a href="{{ route('membership') }}#next-steps" class="text-center text-sm font-bold text-[#003289] hover:underline">Back to membership</a></div>
                    </form>
                    <p class="mt-5 border-t border-[#e2e7ff] pt-4 text-xs leading-5 text-[#737685]">Government-issued ID details are sensitive personal information. Uploaded files are kept outside the public website folder and are not sent to Google Sheets. ID upload is optional. Please do not upload one unless required, and never enter passwords or bank details.</p>
                </section>

                <aside class="space-y-6">
                    <section class="rounded-3xl bg-[#003289] p-6 text-white shadow-sm sm:p-8">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-[#ffddb8]">A simple roadmap</p>
                        <h2 class="mt-2 font-['Plus_Jakarta_Sans'] text-2xl font-extrabold">One step at a time</h2>
                        <ol class="mt-6 space-y-5 text-sm leading-6 text-white/90">
                            <li><strong class="text-white">1. Start with your customer.</strong> Think about who has the problem your product or service could solve. Ask a few people what they need before spending much money.</li>
                            <li><strong class="text-white">2. Try a small version.</strong> Make a sample, offer a simple service, or test a small batch. Learn what people actually choose and what they are willing to pay.</li>
                            <li><strong class="text-white">3. Track the basics.</strong> Write down sales and costs from day one. This helps you see whether each sale leaves enough to keep the business going.</li>
                            <li><strong class="text-white">4. Learn the official steps.</strong> When you’re ready, check current requirements with DTI, BIR, and your local government. Requirements depend on your business and location.</li>
                            <li><strong class="text-white">5. Keep learning and connect.</strong> Use FLAME PH resources, meet other entrepreneurs, and look for suppliers or customers as your needs become clearer.</li>
                        </ol>
                    </section>

                    <section class="rounded-3xl border border-[#c3c6d6]/60 bg-white p-6 shadow-sm sm:p-8">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-[#bc000c]">A path that fits your stage</p>
                        @switch($membership->entrepreneur_stage)
                            @case('idea')<h2 class="mt-2 font-['Plus_Jakarta_Sans'] text-xl font-extrabold">If you’re exploring an idea</h2><p class="mt-3 text-sm leading-6 text-[#434653]">Choose one customer group, ask what they need, and compare a few possible ways to help. Keep notes and test interest before making a large purchase.</p>@break
                            @case('preparing')<h2 class="mt-2 font-['Plus_Jakarta_Sans'] text-xl font-extrabold">If you’re preparing to launch</h2><p class="mt-3 text-sm leading-6 text-[#434653]">Decide what your first offer will be, estimate its costs, set a simple price, and try a small launch. Make a checklist of local requirements and verify it with official offices.</p>@break
                            @case('selling')<h2 class="mt-2 font-['Plus_Jakarta_Sans'] text-xl font-extrabold">If you’re already selling</h2><p class="mt-3 text-sm leading-6 text-[#434653]">Record each sale and expense, notice which products customers return for, and pick one improvement to test this month—such as clearer pricing or easier ordering.</p>@break
                            @case('established')<h2 class="mt-2 font-['Plus_Jakarta_Sans'] text-xl font-extrabold">If you’re ready to grow</h2><p class="mt-3 text-sm leading-6 text-[#434653]">Look for one bottleneck in your daily work, improve a process, and build a repeatable way to reach customers. Explore suitable suppliers and partnerships at a pace you can manage.</p>@break
                            @default<h2 class="mt-2 font-['Plus_Jakarta_Sans'] text-xl font-extrabold">Choose the closest starting point</h2><p class="mt-3 text-sm leading-6 text-[#434653]">Select your current stage in the profile form. We’ll use it to point you toward a manageable next step. You can begin exploring free lessons and community resources anytime.</p>
                        @endswitch
                        <div class="mt-5 grid gap-2"><a href="/learn" class="rounded-xl bg-[#f2f3ff] px-4 py-3 text-sm font-bold text-[#003289] hover:bg-[#e2e7ff]">Explore free learning resources →</a><a href="/directory" class="rounded-xl bg-[#f2f3ff] px-4 py-3 text-sm font-bold text-[#003289] hover:bg-[#e2e7ff]">Browse the MSME directory →</a><a href="/events" class="rounded-xl bg-[#f2f3ff] px-4 py-3 text-sm font-bold text-[#003289] hover:bg-[#e2e7ff]">See workshops and events →</a></div>
                    </section>
                </aside>
            </div>

            <section class="mt-10 rounded-3xl border border-[#c3c6d6]/60 bg-white p-6 shadow-sm sm:p-8" id="membership-upgrade">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-[#bc000c]">Membership options</p>
                <h2 class="mt-2 font-['Plus_Jakarta_Sans'] text-2xl font-extrabold">Upgrade from Free Community</h2>
                <p class="mt-2 max-w-3xl text-sm leading-6 text-[#434653]">Choose a paid tier and billing cycle, then report any amount you have paid. This form records your request only; it does not process payments or activate a paid plan automatically. FLAME PH must provide payment details and verify payment first.</p>

                @if (session('upgrade_requested'))
                    <div class="mt-5 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-900" role="status"><p class="font-bold">Your upgrade request was saved.</p><p class="mt-1">Your active plan remains Free Community until FLAME PH verifies the payment and confirms the upgrade.</p></div>
                @endif
                @if ($membership->requested_plan)
                    <div class="mt-5 rounded-xl border border-[#c3c6d6] bg-[#f2f3ff] p-4 text-sm text-[#202536]">
                        <p><strong>Requested tier:</strong> {{ ucfirst($membership->requested_plan) }} • <strong>Billing:</strong> {{ ucfirst($membership->billing_cycle ?? 'monthly') }} • <strong>Amount due:</strong> ₱{{ number_format((float) $membership->amount_due, 2) }} • <strong>Amount reported paid:</strong> ₱{{ number_format((float) $membership->amount_paid, 2) }} • <strong>Payment method:</strong> {{ ucfirst(str_replace('_', ' ', $membership->payment_method ?? 'not selected')) }}</p>
                        <p class="mt-1"><strong>Payment status:</strong> {{ ucfirst(str_replace('_', ' ', $membership->payment_status)) }}. Your current active plan is still {{ ucfirst($membership->plan) }} until payment verification is complete.</p>
                    </div>
                @endif

                @if ($errors->hasAny(['upgrade', 'requested_plan', 'payment_method', 'amount_paid']))
                    <div class="mt-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><ul class="list-disc pl-5">@foreach (['upgrade', 'requested_plan', 'payment_method', 'amount_paid'] as $field) @error($field)<li>{{ $message }}</li>@enderror @endforeach</ul></div>
                @endif

                @if ($membership->plan === 'free')
                    <form action="{{ route('membership.profile.upgrade') }}" method="POST" class="mt-6 grid gap-5 sm:grid-cols-2">
                        @csrf
                        <label class="text-sm font-bold">Paid membership tier<select name="requested_plan" required class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] bg-white px-4 py-3 font-normal"><option value="">Choose a tier</option><option value="starter" @selected(old('requested_plan', $membership->requested_plan) === 'starter')>Starter — ₱50/month</option><option value="micro" @selected(old('requested_plan', $membership->requested_plan) === 'micro')>Micro — ₱100/month</option><option value="neo" @selected(old('requested_plan', $membership->requested_plan) === 'neo')>Neo — ₱500/month</option><option value="pro" @selected(old('requested_plan', $membership->requested_plan) === 'pro')>Pro — ₱1,000/month</option><option value="champion" @selected(old('requested_plan', $membership->requested_plan) === 'champion')>Champion — ₱2,000/month</option></select></label>
                        <label class="text-sm font-bold">Billing cycle<select name="billing_cycle" required class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] bg-white px-4 py-3 font-normal"><option value="monthly" @selected(old('billing_cycle', $membership->billing_cycle ?? 'monthly') === 'monthly')>Monthly</option><option value="annual" @selected(old('billing_cycle', $membership->billing_cycle) === 'annual')>Annual — 10 months’ price (17% off)</option></select></label>
                        <label class="text-sm font-bold">Payment method used (or planned)<select name="payment_method" required class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] bg-white px-4 py-3 font-normal"><option value="">Choose a method</option><option value="gcash" @selected(old('payment_method', $membership->payment_method) === 'gcash')>GCash</option><option value="maya" @selected(old('payment_method', $membership->payment_method) === 'maya')>Maya</option><option value="bank_transfer" @selected(old('payment_method', $membership->payment_method) === 'bank_transfer')>Bank transfer</option><option value="cash" @selected(old('payment_method', $membership->payment_method) === 'cash')>Cash</option></select></label>
                        <label class="text-sm font-bold sm:col-span-2">Amount paid so far (PHP)<input type="number" name="amount_paid" required min="0" max="99999999.99" step="0.01" value="{{ old('amount_paid', $membership->requested_plan ? $membership->amount_paid : '0.00') }}" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal"><span class="mt-1 block text-xs font-normal text-[#737685]">Enter 0 if you have not paid yet. Do not enter card, wallet, or bank account credentials.</span></label>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#bc000c] px-6 py-3.5 font-bold text-white shadow-sm transition hover:bg-[#930007] sm:col-span-2 sm:justify-self-start">Submit upgrade request <span aria-hidden="true">→</span></button>
                    </form>
                @else
                    <p class="mt-5 rounded-xl bg-[#f2f3ff] p-4 text-sm text-[#434653]">Your current membership is {{ ucfirst($membership->plan) }}. Contact FLAME PH if you would like to change to a different paid tier.</p>
                @endif
            </section>

            <section class="mt-10 rounded-3xl border border-[#c3c6d6]/60 bg-white p-6 shadow-sm sm:p-8" id="member-faq">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-[#bc000c]">New member guide</p>
                <h2 class="mt-2 font-['Plus_Jakarta_Sans'] text-2xl font-extrabold">Frequently asked questions</h2>
                <div class="mt-5 grid gap-3 md:grid-cols-2">
                    <details class="rounded-2xl bg-[#f2f3ff] p-5"><summary class="cursor-pointer font-bold text-[#003289]">I only have an idea. Can I still be a member?</summary><p class="mt-3 text-sm leading-6 text-[#434653]">Yes. You can join while exploring. Start by talking to possible customers and testing a small, low-cost version of your idea before making a big investment.</p></details>
                    <details class="rounded-2xl bg-[#f2f3ff] p-5"><summary class="cursor-pointer font-bold text-[#003289]">Do I need to register my business right away?</summary><p class="mt-3 text-sm leading-6 text-[#434653]">Not necessarily. Requirements depend on what you do and where you operate. When you’re ready, confirm the current steps with the relevant DTI, BIR, and local government offices.</p></details>
                    <details class="rounded-2xl bg-[#f2f3ff] p-5"><summary class="cursor-pointer font-bold text-[#003289]">What should I do first as a new entrepreneur?</summary><p class="mt-3 text-sm leading-6 text-[#434653]">Choose one type of customer, learn what they need, and see whether they would pay for your offer. Keep a simple record of your costs and any sales.</p></details>
                    <details class="rounded-2xl bg-[#f2f3ff] p-5"><summary class="cursor-pointer font-bold text-[#003289]">Can FLAME PH promise funding, customers, or business approval?</summary><p class="mt-3 text-sm leading-6 text-[#434653]">No. Membership does not guarantee funding, sales, permits, or approvals. Be cautious of anyone asking for fees or passwords while claiming to guarantee these results.</p></details>
                    <details class="rounded-2xl bg-[#f2f3ff] p-5"><summary class="cursor-pointer font-bold text-[#003289]">How can I get involved in the FLAME PH MSME ecosystem?</summary><p class="mt-3 text-sm leading-6 text-[#434653]">Complete your profile, explore learning resources and events, and look for relevant connections in the directory. Opportunities and activities may grow as the community develops.</p></details>
                    <details class="rounded-2xl bg-[#f2f3ff] p-5"><summary class="cursor-pointer font-bold text-[#003289]">Can I update my answers later?</summary><p class="mt-3 text-sm leading-6 text-[#434653]">Yes. Return to this page to edit and save your profile as your business goals and needs change.</p></details>
                </div>
            </section>

            <section class="mt-8 grid gap-6 rounded-3xl bg-[#003289] p-6 text-white shadow-sm sm:p-8 lg:grid-cols-[0.8fr_1.2fr]" id="founder-contact">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-[#ffddb8]">We’re listening</p>
                    <h2 class="mt-2 font-['Plus_Jakarta_Sans'] text-2xl font-extrabold">Email your queries or concerns to FLAME PH Founder Arnold</h2>
                    <p class="mt-3 text-sm leading-6 text-white/85">Share a question about your business, a personal concern related to your entrepreneurship journey, or the MSME ecosystem being built by FLAME PH officers and members.</p>
                    <p class="mt-4 text-sm">Email: <a class="font-bold underline underline-offset-4" href="mailto:federationofmsmes@gmail.com">federationofmsmes@gmail.com</a></p>
                </div>
                <div class="rounded-2xl bg-white p-5 text-[#131b2e] sm:p-6">
                    @if (session('contact_sent'))
                        <div class="mb-5 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-900" role="status"><p class="font-bold">Your email was accepted for delivery.</p><p class="mt-1">Thank you for reaching out. Your message has been handed to the configured email service for the Founder’s attention.</p></div>
                    @endif
                    @if (session('contact_send_failed'))
                        <div class="mb-5 rounded-xl border border-amber-300 bg-amber-50 p-4 text-sm text-amber-900" role="alert">{{ session('contact_send_failed') }}</div>
                    @endif
                    @if ($errors->hasAny(['contact_name', 'contact_email', 'contact_mobile', 'contact_address', 'contact_business_name', 'contact_business_type', 'contact_business_position', 'contact_facebook_name', 'contact_facebook_page', 'contact_website', 'contact_topic', 'contact_message', 'contact_consent']))
                        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert"><p class="font-bold">Please check the contact form.</p><ul class="mt-1 list-disc pl-5">@foreach (['contact_name', 'contact_email', 'contact_mobile', 'contact_address', 'contact_business_name', 'contact_business_type', 'contact_business_position', 'contact_facebook_name', 'contact_facebook_page', 'contact_website', 'contact_topic', 'contact_message', 'contact_consent'] as $field) @error($field)<li>{{ $message }}</li>@enderror @endforeach</ul></div>
                    @endif
                    <form action="{{ route('membership.profile.contact') }}" method="POST" class="grid gap-4 sm:grid-cols-2">
                        @csrf
                        <label class="text-sm font-bold">Your name<input name="contact_name" required maxlength="120" autocomplete="name" value="{{ old('contact_name', $application['name']) }}" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal"></label>
                        <label class="text-sm font-bold">Your email<input name="contact_email" required type="email" maxlength="255" autocomplete="email" value="{{ old('contact_email', $application['email']) }}" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal"></label>
                        <label class="text-sm font-bold">Mobile phone number <span class="font-normal text-[#737685]">(optional)</span><input name="contact_mobile" type="tel" maxlength="24" autocomplete="tel" value="{{ old('contact_mobile') }}" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal"></label>
                        <label class="text-sm font-bold">Home or business address <span class="font-normal text-[#737685]">(optional)</span><input name="contact_address" maxlength="500" autocomplete="street-address" value="{{ old('contact_address') }}" placeholder="City / municipality and province is enough" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal"></label>
                        <label class="text-sm font-bold">Business name <span class="font-normal text-[#737685]">(optional)</span><input name="contact_business_name" maxlength="160" autocomplete="organization" value="{{ old('contact_business_name') }}" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal"></label>
                        <label class="text-sm font-bold">Type of business <span class="font-normal text-[#737685]">(optional)</span><input name="contact_business_type" maxlength="120" value="{{ old('contact_business_type') }}" placeholder="e.g. food, retail, farming, services" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal"></label>
                        <label class="text-sm font-bold">Your position in the business <span class="font-normal text-[#737685]">(optional)</span><input name="contact_business_position" maxlength="120" value="{{ old('contact_business_position') }}" placeholder="e.g. owner, co-founder, staff, aspiring owner" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal"></label>
                        <label class="text-sm font-bold">Facebook account name <span class="font-normal text-[#737685]">(optional)</span><input name="contact_facebook_name" maxlength="120" value="{{ old('contact_facebook_name') }}" autocomplete="off" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal"></label>
                        <label class="text-sm font-bold sm:col-span-2">Facebook business page URL <span class="font-normal text-[#737685]">(optional)</span><input name="contact_facebook_page" type="url" maxlength="255" value="{{ old('contact_facebook_page') }}" placeholder="https://facebook.com/your-page" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal"></label>
                        <label class="text-sm font-bold sm:col-span-2">Website URL <span class="font-normal text-[#737685]">(optional)</span><input name="contact_website" type="url" maxlength="255" value="{{ old('contact_website') }}" placeholder="https://example.com" class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal"></label>
                        <label class="text-sm font-bold sm:col-span-2">What is your message about?<select name="contact_topic" required class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] bg-white px-4 py-3 font-normal"><option value="">Choose a topic</option><option value="business" @selected(old('contact_topic') === 'business')>My business or business idea</option><option value="personal" @selected(old('contact_topic') === 'personal')>A personal concern about my journey</option><option value="msme_ecosystem" @selected(old('contact_topic') === 'msme_ecosystem')>FLAME PH or the MSME ecosystem</option><option value="website" @selected(old('contact_topic') === 'website')>Website or membership help</option><option value="other" @selected(old('contact_topic') === 'other')>Something else</option></select></label>
                        <label class="text-sm font-bold sm:col-span-2">Your query, issue, or concern<textarea name="contact_message" required maxlength="5000" rows="5" placeholder="Please don’t include passwords, bank details, or sensitive personal information." class="mt-1.5 w-full rounded-xl border border-[#c3c6d6] px-4 py-3 font-normal">{{ old('contact_message') }}</textarea></label>
                        <label class="flex items-start gap-2 text-sm leading-5 text-[#434653] sm:col-span-2"><input type="checkbox" name="contact_consent" value="1" required class="mt-1"><span>I agree to send the details I provided, including optional contact and business information, to FLAME PH Founder Arnold at federationofmsmes@gmail.com so he can review and respond.</span></label>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#bc000c] px-5 py-3.5 font-bold text-white transition hover:bg-[#930007] sm:col-span-2">Email the FLAME PH Founder <span aria-hidden="true">→</span></button>
                    </form>
                    <p class="mt-4 text-xs leading-5 text-[#737685]">Your contact and business details, message, and reply email are sent to federationofmsmes@gmail.com so the team can respond. Address, business, and social links are optional. Please avoid sharing passwords or financial account details.</p>
                </div>
            </section>
        </div>
    </main>

    @include('partials.mobile-navigation')
    <script>
        const idUploadInput = document.getElementById('id-document-upload');
        const idUploadConsent = document.getElementById('id-document-consent');
        idUploadInput?.addEventListener('change', () => {
            idUploadConsent.required = idUploadInput.files.length > 0;
            if (!idUploadConsent.required) idUploadConsent.checked = false;
        });
    </script>
@include('partials.home-footer')</body>
</html>

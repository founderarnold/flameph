<style>
header[data-site-header] {
  position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  right: 0 !important;
  z-index: 50 !important;
  width: 100% !important;
  background: rgba(250, 248, 255, .96) !important;
  backdrop-filter: blur(18px);
  box-shadow: 0 1px 8px rgba(0, 71, 186, .06) !important;
  border-bottom: 1px solid rgba(218, 226, 253, .6);
}
header[data-site-header] [data-site-announcement] {
  min-height: 44px;
  padding: 6px 16px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #003289;
  color: #fff;
  text-align: center;
}
header[data-site-header] [data-site-announcement] a {
  color: inherit;
  font-size: 14px;
  line-height: 20px;
  font-weight: 700;
  letter-spacing: .01em;
  text-decoration: none;
}
header[data-site-header] [data-site-announcement] span { color: #ffddb8; text-decoration: underline; }
header[data-site-header] [data-site-row] {
  box-sizing: border-box;
  width: 100%;
  max-width: none;
  height: 80px;
  margin: 0 auto;
  padding: 0 clamp(16px, 4.2vw, 80px);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  background: transparent;
}
header[data-site-header] [data-site-brand-nav] {
  min-width: 0;
  display: flex;
  align-items: center;
  gap: 16px;
}
header[data-site-header] [data-site-logo-link] {
  display: inline-flex;
  flex: 0 0 176px;
  width: 176px;
  align-items: center;
}
header[data-site-header] [data-site-logo] {
  display: block;
  width: 176px;
  height: 48px;
  object-fit: cover;
  object-position: center 36%;
}
header[data-site-header] [data-site-primary-nav] {
  display: flex;
  align-items: center;
  gap: 4px;
  white-space: nowrap;
}
header[data-site-header] [data-site-primary-nav] a {
  display: inline-flex;
  align-items: center;
  min-height: 42px;
  padding: 8px 12px;
  border-radius: 12px;
  color: #434653;
  font-family: "Plus Jakarta Sans", sans-serif;
  font-size: 14px;
  line-height: 20px;
  font-weight: 600;
  text-decoration: none;
  white-space: nowrap;
  transition: color .15s, background-color .15s;
}
header[data-site-header] [data-site-primary-nav] a:hover { color: #003289; background: #f2f3ff; }
header[data-site-header] [data-site-primary-nav] a[aria-current="page"] {
  color: #003289;
  background: #f2f3ff;
  border-bottom: 2px solid #003289;
  font-weight: 700;
}
header[data-site-header] [data-site-nav-item] { position: relative; }
header[data-site-header] [data-site-nav-trigger] {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  min-height: 42px;
  padding: 8px 12px;
  border: 0;
  border-radius: 12px;
  background: transparent;
  color: #434653;
  font-family: "Plus Jakarta Sans", sans-serif;
  font-size: 14px;
  line-height: 20px;
  font-weight: 600;
  white-space: nowrap;
  cursor: pointer;
  transition: color .15s, background-color .15s;
}
header[data-site-header] [data-site-nav-trigger]:hover,
header[data-site-header] [data-site-nav-trigger][aria-expanded="true"] { color: #003289; background: #f2f3ff; }
header[data-site-header] [data-site-nav-trigger] svg { width: 14px; height: 14px; transition: transform .15s; }
header[data-site-header] [data-site-nav-trigger][aria-expanded="true"] svg { transform: rotate(180deg); }
header[data-site-header] [data-site-dropdown] {
  position: absolute;
  top: calc(100% + 8px);
  left: 0;
  z-index: 80;
  display: none;
  min-width: 268px;
  max-width: min(360px, calc(100vw - 32px));
  padding: 8px;
  border: 1px solid #eaedff;
  border-radius: 14px;
  background: #fff;
  box-shadow: 0 14px 28px rgba(19, 27, 46, .16);
}
header[data-site-header] [data-site-dropdown][data-open="true"] { display: block; }
header[data-site-header] [data-site-dropdown] a {
  display: block;
  padding: 10px 12px;
  border-radius: 9px;
  color: #434653;
  font-family: "Plus Jakarta Sans", sans-serif;
  font-size: 13px;
  line-height: 18px;
  font-weight: 600;
  text-decoration: none;
  white-space: normal;
}
header[data-site-header] [data-site-dropdown] a:hover,
header[data-site-header] [data-site-dropdown] a:focus-visible { color: #003289; background: #f2f3ff; outline: none; }
header[data-site-header] [data-site-actions] {
  flex: 0 0 auto;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 10px;
}
header[data-site-header] [data-site-search] {
  display: none;
  width: 224px;
  height: 44px;
  box-sizing: border-box;
  align-items: center;
  gap: 8px;
  padding: 0 12px;
  border-radius: 12px;
  background: #f2f3ff;
  color: #737685;
}
header[data-site-header] [data-site-search] input {
  width: 100%;
  min-width: 0;
  border: 0;
  padding: 0;
  outline: 0;
  background: transparent;
  color: #131b2e;
  font-size: 14px;
}
header[data-site-header] [data-site-search-toggle] { display: none; }
header[data-site-header] [data-site-login] {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 40px;
  padding: 0 10px;
  color: #003289;
  font-family: "Plus Jakarta Sans", sans-serif;
  font-size: 16px;
  line-height: 22px;
  font-weight: 600;
  text-decoration: none;
  white-space: nowrap;
}
header[data-site-header] [data-site-join] {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  min-height: 48px;
  padding: 0 20px;
  border-radius: 999px;
  background: #bc000c;
  color: #fff;
  font-family: "Plus Jakarta Sans", sans-serif;
  font-size: 16px;
  line-height: 22px;
  font-weight: 700;
  text-decoration: none;
  white-space: nowrap;
  box-shadow: 0 4px 12px rgba(188, 0, 12, .22);
}
header[data-site-header] [data-site-join] svg { width: 18px; height: 18px; flex: 0 0 18px; fill: none; stroke: currentColor; stroke-width: 1.9; stroke-linecap: round; stroke-linejoin: round; }
header[data-site-header] [data-site-menu-toggle] { display: none; }
header[data-site-header] [data-site-mobile-menu] { display: none; }
@media (min-width: 1280px) {
  header[data-site-header] [data-site-search] { display: flex; }
}
@media (max-width: 1499px) and (min-width: 1101px) {
  header[data-site-header] [data-site-row] { padding-left: 32px; padding-right: 32px; gap: 8px; }
  header[data-site-header] [data-site-search] { display: flex; width: 176px; }
  header[data-site-header] [data-site-actions] { gap: 6px; }
  header[data-site-header] [data-site-primary-nav] { gap: 0; }
  header[data-site-header] [data-site-primary-nav] a { padding-left: 9px; padding-right: 9px; }
}
@media (max-width: 1100px) and (min-width: 768px) {
  header[data-site-header] [data-site-row] { padding-left: 24px; padding-right: 24px; gap: 8px; }
  header[data-site-header] [data-site-logo-link], header[data-site-header] [data-site-logo] { width: 144px; }
  header[data-site-header] [data-site-logo-link] { flex-basis: 144px; }
  header[data-site-header] [data-site-primary-nav] { display: none; }
  header[data-site-header] [data-site-menu-toggle] { display: inline-flex; }
  header[data-site-header] [data-site-search] { display: none; }
  header[data-site-header] [data-site-actions] { gap: 4px; }
  header[data-site-header] [data-site-join] { padding-left: 14px; padding-right: 14px; }
  header[data-site-header] [data-site-mobile-menu] { top: 100%; }
}
@media (max-width: 767px) {
  body { padding-bottom: calc(68px + env(safe-area-inset-bottom, 0px)) !important; }
  header[data-site-header] [data-site-announcement] { min-height: 38px; padding: 5px 10px; }
  header[data-site-header] [data-site-announcement] a { font-size: 11px; line-height: 16px; }
  header[data-site-header] [data-site-row] { position: relative; display: grid; grid-template-columns: minmax(88px, 1fr) auto; align-items: start; height: 64px; padding: 10px 12px; gap: 6px; }
  header[data-site-header] [data-site-brand-nav] { min-width: 0; }
  header[data-site-header] [data-site-logo-link], header[data-site-header] [data-site-logo] { width: 104px; }
  header[data-site-header] [data-site-logo-link] { flex-basis: 104px; }
  header[data-site-header] [data-site-logo] { height: 40px; }
  header[data-site-header] [data-site-primary-nav] { display: none; }
  header[data-site-header] [data-site-actions] { display: flex; align-items: center; gap: 4px; }
  header[data-site-header] [data-site-search] { position: absolute; right: 12px; bottom: 7px; left: 12px; display: none; width: auto; height: 36px; }
  header[data-site-header][data-search-open="true"] [data-site-row] { height: 112px; padding-bottom: 48px; }
  header[data-site-header][data-search-open="true"] [data-site-search] { display: flex; }
  header[data-site-header] [data-site-search-toggle] { display: inline-flex; width: 36px; height: 38px; align-items: center; justify-content: center; border: 0; border-radius: 9px; background: #f2f3ff; color: #003289; }
  header[data-site-header] [data-site-login] { width: 36px; min-height: 38px; padding: 0; border-radius: 9px; background: #f2f3ff; }
  header[data-site-header] [data-site-login] [data-login-label] { display: none; }
  header[data-site-header] [data-site-login] [data-login-icon] { display: inline-block; font-size: 22px; }
  header[data-site-header] [data-site-menu-toggle] {
    display: inline-flex;
    width: 36px;
    height: 38px;
    align-items: center;
    justify-content: center;
    border: 0;
    border-radius: 10px;
    background: transparent;
    color: #131b2e;
  }
  @media (max-width: 380px) {
    header[data-site-header] [data-site-logo-link], header[data-site-header] [data-site-logo] { width: 88px; }
    header[data-site-header] [data-site-logo-link] { flex-basis: 88px; }
  }
  header[data-site-header] [data-site-mobile-menu] {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 60;
    display: none;
    max-height: calc(100dvh - 102px);
    overflow-y: auto;
    border-top: 1px solid #eaedff;
    background: #fff;
    box-shadow: 0 16px 28px rgba(19, 27, 46, .14);
    padding: 10px 12px 14px;
  }
  header[data-site-header] [data-site-mobile-menu][data-open="true"] { display: block; }
  header[data-site-header] [data-site-mobile-menu] a {
    display: block;
    padding: 12px 14px;
    border-radius: 12px;
    color: #434653;
    font-weight: 600;
    text-decoration: none;
  }
  header[data-site-header] [data-site-mobile-menu] a[aria-current="page"] { color: #003289; background: #f2f3ff; }
  header[data-site-header] [data-site-mobile-menu] [data-site-nav-item] { position: static; }
  header[data-site-header] [data-site-mobile-menu] [data-site-nav-trigger] {
    width: 100%;
    justify-content: space-between;
    font: inherit;
    font-weight: 600;
    text-align: left;
  }
  header[data-site-header] [data-site-mobile-menu] [data-site-dropdown] {
    position: static;
    min-width: 0;
    padding: 0 0 4px 14px;
    border: 0;
    border-radius: 0;
    box-shadow: none;
  }
  header[data-site-header] [data-site-mobile-menu] [data-site-dropdown] a { font-size: 14px; }
  #site-bottom-navigation {
    position: fixed;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 70;
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    min-height: 64px;
    padding: 5px 8px calc(5px + env(safe-area-inset-bottom, 0px));
    border-top: 1px solid rgba(195, 198, 214, .55);
    background: rgba(255, 255, 255, .97);
    box-shadow: 0 -3px 16px rgba(0, 47, 108, .08);
    backdrop-filter: blur(16px);
  }
  #site-bottom-navigation a {
    display: flex;
    min-width: 0;
    min-height: 52px;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 3px;
    border-radius: 10px;
    color: #4c5060;
    font-family: "Plus Jakarta Sans", sans-serif;
    font-size: 12px;
    line-height: 16px;
    font-weight: 600;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
  }
  #site-bottom-navigation a[aria-current="page"] { color: #003289; font-weight: 700; }
  #site-bottom-navigation a:focus-visible { outline: 2px solid #003289; outline-offset: -2px; }
  #site-bottom-navigation svg { width: 24px; height: 24px; fill: none; stroke: currentColor; stroke-width: 1.9; stroke-linecap: round; stroke-linejoin: round; }
}
@media (min-width: 768px) { #site-bottom-navigation { display: none; } }
</style>
<script>
(() => {
  let favicon = document.querySelector('link[rel~="icon"]');
  if (!favicon) {
    favicon = document.createElement('link');
    favicon.rel = 'icon';
    document.head.append(favicon);
  }
  favicon.type = 'image/png';
  favicon.sizes = '256x256';
  favicon.href = '/favicon.png?v=1';
})();

(() => {
  const previousHeader = document.querySelector('header');
  if (!previousHeader) return;

  const pathname = window.location.pathname.replace(/\/$/, '') || '/';
  // Keep the shared header aligned with the current FLAME PH homepage IA.
  // The homepage itself is not the only place this header is rendered: this
  // partial replaces the server-rendered header on every public page.
  const pages = [
    { label: 'What We Do', items: [
      { label: 'Programs & MSME Ecosystem', href: '/programs-ecosystem' },
      { label: 'Educational Workshops', href: '/events' },
      { label: 'Trainings & Webinars', href: '/learn' },
      { label: 'Expos & Summits', href: '/events' },
      { label: 'Annual Awards for MSMEs', href: '/events#awards' },
    ] },
    { label: 'Membership', items: [
      { label: 'Benefits', href: '/membership#membership-tiers' },
      { label: 'Access More Benefits', href: '/membership' },
      { label: 'Resources', href: '/learn' },
      { label: 'Advocacy', href: '/about' },
      { label: 'Chapters Near You', href: '/directory' },
      { label: 'Featured Members', href: '/directory' },
      { label: 'Volunteering', href: '/events' },
      { label: 'Free POS for MSMEs', href: '/learn' },
      { label: 'Free Business Directory', href: '/directory' },
      { label: 'Free Consultation @ Flame AI', href: '/about#contact' },
    ] },
    { label: 'Support Us', items: [
      { label: 'FLAME PH Merchs', href: '/flameph-merchs' },
      { label: 'Flame Signature Brands', href: '/about/merch-shop' },
      { label: 'Personalized by FLAMEPH', href: '/about/merch-shop' },
      { label: 'Shop or Sell @ MarketplacePH', href: '/about/merch-shop' },
      { label: 'Start & Grow @ NegosyoDepot', href: '/about/merch-shop' },
      { label: 'Fulfillment by MSMEs', href: '/about/merch-shop' },
    ] },
    { label: 'Get Involved', items: [
      { label: 'Volunteer as Mentor', href: '/get-involved' },
      { label: 'Join as Partner', href: '/get-involved' },
      { label: 'Sponsor an Event', href: '/get-involved' },
      { label: 'Sponsor a Community', href: '/get-involved' },
      { label: 'Nominate an MSME Awardee', href: '/get-involved' },
      { label: 'Support Poverty Alleviation Program', href: '/about#contact' },
      { label: 'News & Updates', href: '/events' },
    ] },
    { label: 'About Us', items: [
      { label: 'What is FLAME PH', href: '/about' },
      { label: 'Meet the Founders', href: '/about#founders' },
      { label: 'Meet the Teams', href: '/about#teams' },
      { label: 'Featured Chapters', href: '/directory' },
      { label: 'Featured Members', href: '/directory' },
      { label: 'Featured Partners', href: '/about#partners' },
    ] },
  ];
  const mobilePages = [
    { label: 'Home', href: '/', icon: '<path d="M3 10.8 12 3l9 7.8"></path><path d="M5.5 9.5V21h13V9.5M9 21v-7h6v7"></path>' },
    { label: 'Membership', href: '/membership', icon: '<rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18M8 15h4"></path>' },
    { label: 'Get Involved', href: '/events', icon: '<rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M16 3v4M8 3v4M3 10h18M8 14h3M8 17h6"></path>' },
    { label: 'Support Us', href: '/about/merch-shop', icon: '<path d="M3 9h18l-1.5 12h-15L3 9Z"></path><path d="M8 9a4 4 0 0 1 8 0"></path>' },
  ];
  const navItem = (page, mobile = false) => {
    const id = `site-nav-${page.label.toLowerCase().replace(/[^a-z0-9]+/g, '-')}${mobile ? '-mobile' : ''}`;
    const items = page.items.map((item) => `<a href="${item.href}" role="menuitem">${item.label}</a>`).join('');
    return `<div data-site-nav-item><button type="button" data-site-nav-trigger aria-expanded="false" aria-controls="${id}">${page.label}<svg viewBox="0 0 20 20" aria-hidden="true"><path d="m5 7 5 5 5-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path></svg></button><div id="${id}" data-site-dropdown role="menu">${items}</div></div>`;
  };

  const header = document.createElement('header');
  header.dataset.siteHeader = 'true';
  header.innerHTML = `
    <div data-site-announcement><a href="/membership#registration">Unite Filipino MSMEs • Grow Together • Build a Stronger Philippines → <span>Join FLAME PH Free →</span></a></div>
    <div data-site-row>
      <div data-site-brand-nav>
        <a data-site-logo-link href="/"><img data-site-logo alt="FLAME PH logo" src="/assets/images/flameph-logo.png"></a>
        <nav data-site-primary-nav aria-label="Primary navigation">${pages.map((page) => navItem(page)).join('')}</nav>
      </div>
      <div data-site-actions>
        <label data-site-search><span class="material-symbols-outlined">search</span><input type="search" placeholder="Search FLAME PH" aria-label="Search FLAME PH"></label>
        <button data-site-search-toggle type="button" aria-label="Open search" aria-expanded="false"><span class="material-symbols-outlined" aria-hidden="true">search</span></button>
        <a data-site-login href="/membership#login" aria-label="Log in"><span data-login-icon class="material-symbols-outlined" aria-hidden="true">login</span><span data-login-label>Log In</span></a>
        <a data-site-join href="/membership#registration"><span>Join Free</span><span aria-hidden="true">→</span></a>
        <button data-site-menu-toggle type="button" aria-label="Open navigation menu" aria-expanded="false" aria-controls="site-mobile-menu"><span class="material-symbols-outlined" data-site-menu-icon>menu</span></button>
      </div>
    </div>
    <nav data-site-mobile-menu id="site-mobile-menu" aria-label="Main navigation menu"><a href="/">Home</a>${pages.map((page) => navItem(page, true)).join('')}</nav>
  `;
  previousHeader.replaceWith(header);

  const searchToggle = header.querySelector('[data-site-search-toggle]');
  const searchInput = header.querySelector('[data-site-search] input');
  searchToggle.addEventListener('click', () => {
    const isOpen = header.getAttribute('data-search-open') === 'true';
    header.setAttribute('data-search-open', String(!isOpen));
    searchToggle.setAttribute('aria-expanded', String(!isOpen));
    searchToggle.setAttribute('aria-label', isOpen ? 'Open search' : 'Close search');
    if (!isOpen) searchInput.focus();
  });

  const mobileNavigation = document.createElement('nav');
  mobileNavigation.id = 'site-bottom-navigation';
  mobileNavigation.setAttribute('aria-label', 'Mobile navigation');
  mobileNavigation.innerHTML = mobilePages.map((page) => {
    const isActive = page.label === 'Membership'
        ? pathname.startsWith('/membership')
        : pathname === page.href;
    return `<a href="${page.href}"${isActive ? ' aria-current="page"' : ''}><svg viewBox="0 0 24 24" aria-hidden="true">${page.icon}</svg><span>${page.label}</span></a>`;
  }).join('');
  document.body.append(mobileNavigation);

  const toggle = header.querySelector('[data-site-menu-toggle]');
  const menu = header.querySelector('[data-site-mobile-menu]');
  const closeDropdowns = (except = null) => header.querySelectorAll('[data-site-dropdown][data-open="true"]').forEach((dropdown) => {
    if (dropdown !== except) {
      dropdown.dataset.open = 'false';
      dropdown.parentElement.querySelector('[data-site-nav-trigger]')?.setAttribute('aria-expanded', 'false');
    }
  });
  header.querySelectorAll('[data-site-nav-trigger]').forEach((trigger) => {
    const dropdown = trigger.parentElement.querySelector('[data-site-dropdown]');
    trigger.addEventListener('click', (event) => {
      event.stopPropagation();
      const open = trigger.getAttribute('aria-expanded') === 'true';
      closeDropdowns(dropdown);
      dropdown.dataset.open = String(!open);
      trigger.setAttribute('aria-expanded', String(!open));
    });
  });
  header.querySelectorAll('[data-site-dropdown] a').forEach((link) => link.addEventListener('click', () => closeDropdowns()));
  document.addEventListener('click', () => closeDropdowns());
  const setMenuOpen = (open) => {
    menu.dataset.open = String(open);
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Close navigation menu' : 'Open navigation menu');
    header.querySelector('[data-site-menu-icon]').textContent = open ? 'close' : 'menu';
    document.body.classList.toggle('overflow-hidden', open);
  };
  toggle.addEventListener('click', () => setMenuOpen(toggle.getAttribute('aria-expanded') !== 'true'));
  menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
    closeDropdowns();
    setMenuOpen(false);
  }));
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') setMenuOpen(false);
  });
})();
</script>

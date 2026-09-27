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
  header[data-site-header] [data-site-row] { position: relative; display: grid; grid-template-columns: minmax(88px, 1fr) auto; align-items: start; height: 112px; padding: 10px 12px 48px; gap: 6px; }
  header[data-site-header] [data-site-brand-nav] { min-width: 0; }
  header[data-site-header] [data-site-logo-link], header[data-site-header] [data-site-logo] { width: 104px; }
  header[data-site-header] [data-site-logo-link] { flex-basis: 104px; }
  header[data-site-header] [data-site-logo] { height: 40px; }
  header[data-site-header] [data-site-primary-nav] { display: none; }
  header[data-site-header] [data-site-actions] { display: flex; align-items: center; gap: 4px; }
  header[data-site-header] [data-site-search] { position: absolute; right: 12px; bottom: 7px; left: 12px; display: flex; width: auto; height: 36px; }
  header[data-site-header] [data-site-login] { width: 36px; min-height: 38px; padding: 0; border-radius: 9px; background: #f2f3ff; }
  header[data-site-header] [data-site-login] [data-login-label] { display: none; }
  header[data-site-header] [data-site-login] [data-login-icon] { display: inline-block; font-size: 22px; }
  header[data-site-header] [data-site-join] { min-height: 38px; padding: 0 9px; font-size: 12px; }
  header[data-site-header] [data-site-join] .material-symbols-outlined { display: none; }
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
  const previousHeader = document.querySelector('header');
  if (!previousHeader) return;

  const pathname = window.location.pathname.replace(/\/$/, '') || '/';
  const pages = [
    { label: 'Home', href: '/' },
    { label: 'Membership', href: '/membership' },
    { label: 'Events', href: '/events' },
    { label: 'Resources', href: '/learn' },
    { label: 'Directory', href: '/directory' },
    { label: 'About', href: '/about' },
  ];
  const mobilePages = [
    { label: 'Home', href: '/', icon: '<path d="M3 10.8 12 3l9 7.8"></path><path d="M5.5 9.5V21h13V9.5M9 21v-7h6v7"></path>' },
    { label: 'Membership', href: '/membership', icon: '<rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18M8 15h4"></path>' },
    { label: 'Events', href: '/events', icon: '<rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M16 3v4M8 3v4M3 10h18M8 14h3M8 17h6"></path>' },
    { label: 'Join', href: '/membership#registration', icon: '<circle cx="9" cy="8" r="4"></circle><path d="M2.5 21v-2a6.5 6.5 0 0 1 10.8-4.9M19 14v7M15.5 17.5h7"></path>' },
  ];
  const navLink = (page, mobile = false) => {
    const active = pathname === page.href;
    return `<a href="${page.href}"${active ? ' aria-current="page"' : ''}${mobile ? '' : ''}>${page.label}</a>`;
  };

  const header = document.createElement('header');
  header.dataset.siteHeader = 'true';
  header.innerHTML = `
    <div data-site-announcement><a href="/membership#registration">Unite Filipino MSMEs • Grow Together • Build a Stronger Philippines → <span>Join FLAME PH Free →</span></a></div>
    <div data-site-row>
      <div data-site-brand-nav>
        <a data-site-logo-link href="/"><img data-site-logo alt="FLAME PH logo" src="/assets/images/flameph-logo.png"></a>
        <nav data-site-primary-nav aria-label="Primary navigation">${pages.map((page) => navLink(page)).join('')}</nav>
      </div>
      <div data-site-actions>
        <label data-site-search><span class="material-symbols-outlined">search</span><input type="search" placeholder="Search FLAME PH" aria-label="Search FLAME PH"></label>
        <a data-site-login href="/membership#login" aria-label="Log in"><span data-login-icon class="material-symbols-outlined" aria-hidden="true">login</span><span data-login-label>Log In</span></a>
        <a data-site-join href="/membership#registration">Join Free <span class="material-symbols-outlined">arrow_forward</span></a>
        <button data-site-menu-toggle type="button" aria-label="Open navigation menu" aria-expanded="false" aria-controls="site-mobile-menu"><span class="material-symbols-outlined" data-site-menu-icon>menu</span></button>
      </div>
    </div>
    <nav data-site-mobile-menu id="site-mobile-menu" aria-label="Main navigation menu">${pages.map((page) => navLink(page, true)).join('')}</nav>
  `;
  previousHeader.replaceWith(header);

  const mobileNavigation = document.createElement('nav');
  mobileNavigation.id = 'site-bottom-navigation';
  mobileNavigation.setAttribute('aria-label', 'Mobile navigation');
  mobileNavigation.innerHTML = mobilePages.map((page) => {
    const isActive = page.label === 'Join'
      ? pathname === '/membership' && window.location.hash === '#registration'
      : page.label === 'Membership'
        ? pathname.startsWith('/membership')
        : pathname === page.href;
    return `<a href="${page.href}"${isActive ? ' aria-current="page"' : ''}><svg viewBox="0 0 24 24" aria-hidden="true">${page.icon}</svg><span>${page.label}</span></a>`;
  }).join('');
  document.body.append(mobileNavigation);

  const toggle = header.querySelector('[data-site-menu-toggle]');
  const menu = header.querySelector('[data-site-mobile-menu]');
  const setMenuOpen = (open) => {
    menu.dataset.open = String(open);
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Close navigation menu' : 'Open navigation menu');
    header.querySelector('[data-site-menu-icon]').textContent = open ? 'close' : 'menu';
    document.body.classList.toggle('overflow-hidden', open);
  };
  toggle.addEventListener('click', () => setMenuOpen(toggle.getAttribute('aria-expanded') !== 'true'));
  menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => setMenuOpen(false)));
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') setMenuOpen(false);
  });
})();
</script>

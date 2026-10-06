<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddSeoMetadata
{
    private const PAGES = [
        'home' => [
            'title' => 'FLAME PH | Entrepreneurship Learning & MSME Community in the Philippines',
            'description' => 'Explore entrepreneurship learning, practical small-business resources, and a growing Filipino MSME community with FLAME PH. Start with an idea and find your next step.',
        ],
        'about' => [
            'title' => 'About FLAME PH | Filipino MSME and Entrepreneur Ecosystem',
            'description' => 'Learn about FLAME PH, its vision for a stronger MSME ecosystem, and its work to encourage entrepreneurship and support Filipino entrepreneurs and organizations.',
        ],
        'programs.ecosystem' => [
            'title' => 'MSME Programs and Ecosystem Support in the Philippines | FLAME PH',
            'description' => 'Discover FLAME PH programs that connect Filipino MSMEs with practical learning, market access, community support, and ecosystem partners.',
        ],
        'get-involved' => [
            'title' => 'Partner, Sponsor, Mentor or Support Filipino MSMEs | FLAME PH',
            'description' => 'Partner with FLAME PH to support Filipino MSMEs through mentoring, sponsorship, community programs, skills training, and ecosystem collaboration.',
        ],
        'flameph.merchs' => [
            'title' => 'Support the FLAME PH MSME Ecosystem | FLAME PH',
            'description' => 'Support FLAME PH programs and Filipino MSMEs through official merchandise and ecosystem initiatives that help local businesses grow together.',
        ],
        'learn' => [
            'title' => 'Learn to Start and Grow a Small Business | FLAME PH',
            'description' => 'Explore FLAME PH learning resources for aspiring entrepreneurs and Filipino MSMEs, including practical guidance for planning, starting, and developing a business.',
        ],
        'membership' => [
            'title' => 'Join FLAME PH | Free Community for Filipino Entrepreneurs',
            'description' => 'Join the FLAME PH Free Community to explore entrepreneurship, connect with a developing Filipino MSME ecosystem, and take your next business-learning step.',
        ],
        'events' => [
            'title' => 'Entrepreneurship Events and Learning | FLAME PH',
            'description' => 'See FLAME PH entrepreneurship events, workshops, and learning opportunities for aspiring business owners and Filipino MSMEs.',
        ],
        'directory' => [
            'title' => 'Filipino MSME Directory | FLAME PH',
            'description' => 'Explore the developing FLAME PH directory of Filipino micro, small, and medium enterprises and discover businesses across industry categories.',
        ],
        'legal' => [
            'title' => 'FLAME PH Terms, Privacy and Website Disclaimer',
            'description' => 'Read the FLAME PH website terms, privacy information, and important notices about the organization and its developing online platform.',
        ],
        'membership.terms' => [
            'title' => 'FLAME PH Membership Terms and Conditions',
            'description' => 'Review the terms and conditions for joining the FLAME PH Free Community before completing membership registration.',
        ],
        'membership.profile' => [
            'title' => 'Your FLAME PH Member Profile',
            'description' => 'Complete your FLAME PH member profile and explore possible next steps in your entrepreneurship journey.',
        ],
        'membership.activate' => [
            'title' => 'Activate Your FLAME PH Membership',
            'description' => 'Continue setting up your FLAME PH Free Community membership.',
        ],
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $routeName = $request->route()?->getName();

        if (!str_starts_with((string) $response->headers->get('Content-Type'), 'text/html') || !isset(self::PAGES[$routeName])) {
            return $response;
        }

        $page = self::PAGES[$routeName];
        $canonicalPath = $request->route()?->uri() === '/' ? '/' : '/' . trim($request->route()?->uri() ?? '', '/');
        $canonical = 'https://www.flameph.org' . $canonicalPath;
        $robots = in_array($routeName, ['membership.profile', 'membership.activate'], true)
            || str_contains($routeName, '.callback')
            ? 'noindex, nofollow'
            : 'index, follow';

        $image = 'https://www.flameph.org/assets/images/flameph-social-preview.png';
        $metadata = '<title>' . e($page['title']) . '</title>'
            . '<meta name="description" content="' . e($page['description']) . '">'
            . '<meta name="robots" content="' . $robots . '">'
            . '<link rel="canonical" href="' . e($canonical) . '">'
            . '<meta name="theme-color" content="#003289">'
            . '<meta property="og:type" content="website">'
            . '<meta property="og:site_name" content="FLAME PH">'
            . '<meta property="og:title" content="' . e($page['title']) . '">'
            . '<meta property="og:description" content="' . e($page['description']) . '">'
            . '<meta property="og:url" content="' . e($canonical) . '">'
            . '<meta property="og:image" content="' . e($image) . '">'
            . '<meta property="og:image:alt" content="FLAME PH — Federation of Leaders Advancing MSME Ecosystem in the Philippines">'
            . '<meta name="twitter:card" content="summary_large_image">'
            . '<meta name="twitter:title" content="' . e($page['title']) . '">'
            . '<meta name="twitter:description" content="' . e($page['description']) . '">'
            . '<meta name="twitter:image" content="' . e($image) . '">';

        $siteVerification = config('services.seo.google_site_verification');
        if ($siteVerification) {
            $metadata .= '<meta name="google-site-verification" content="' . e($siteVerification) . '">';
        }

        $measurementId = config('services.seo.ga4_measurement_id');
        if ($measurementId) {
            $metadata .= '<script async src="https://www.googletagmanager.com/gtag/js?id=' . e($measurementId) . '"></script>'
                . '<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag("js",new Date);gtag("config",' . json_encode($measurementId) . ',{"anonymize_ip":true});</script>';
        }

        $pageType = $routeName === 'home' ? 'WebPage' : 'CollectionPage';
        $graph = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Organization',
                    '@id' => 'https://www.flameph.org/#organization',
                    'name' => 'FLAME PH',
                    'alternateName' => 'Federation of Leaders Advancing MSME Ecosystem in the Philippines',
                    'url' => 'https://www.flameph.org/',
                    'logo' => 'https://www.flameph.org/assets/images/flameph-logo.png',
                    'description' => 'A Filipino MSME ecosystem connecting entrepreneurs, practical learning, trusted partners, and sustainable growth opportunities.',
                    'areaServed' => ['@type' => 'Country', 'name' => 'Philippines'],
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => 'https://www.flameph.org/#website',
                    'name' => 'FLAME PH',
                    'url' => 'https://www.flameph.org/',
                    'publisher' => ['@id' => 'https://www.flameph.org/#organization'],
                ],
                [
                    '@type' => $pageType,
                    '@id' => $canonical . '#webpage',
                    'url' => $canonical,
                    'name' => $page['title'],
                    'description' => $page['description'],
                    'isPartOf' => ['@id' => 'https://www.flameph.org/#website'],
                    'about' => ['@id' => 'https://www.flameph.org/#organization'],
                ],
                [
                    '@type' => 'BreadcrumbList',
                    'itemListElement' => array_values(array_filter([
                        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => 'https://www.flameph.org/'],
                        $routeName !== 'home' ? ['@type' => 'ListItem', 'position' => 2, 'name' => $page['title'], 'item' => $canonical] : null,
                    ])),
                ],
            ],
        ];
        $metadata .= '<script type="application/ld+json">' . json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

        $html = $response->getContent();
        $html = preg_replace('/<title\b[^>]*>.*?<\/title>/is', '', $html, 1) ?? $html;
        $html = preg_replace('/<meta\s+name=["\']description["\'][^>]*>/i', '', $html) ?? $html;
        $html = preg_replace('/<meta\s+name=["\']robots["\'][^>]*>/i', '', $html) ?? $html;
        $html = preg_replace('/<link\s+rel=["\']canonical["\'][^>]*>/i', '', $html) ?? $html;
        $response->setContent(preg_replace('/<\/head>/i', $metadata . '</head>', $html, 1) ?? $html);

        return $response;
    }
}

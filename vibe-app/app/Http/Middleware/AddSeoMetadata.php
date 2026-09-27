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

        $metadata = '<title>' . e($page['title']) . '</title>'
            . '<meta name="description" content="' . e($page['description']) . '">'
            . '<meta name="robots" content="' . $robots . '">'
            . '<link rel="canonical" href="' . e($canonical) . '">'
            . '<meta property="og:type" content="website">'
            . '<meta property="og:site_name" content="FLAME PH">'
            . '<meta property="og:title" content="' . e($page['title']) . '">'
            . '<meta property="og:description" content="' . e($page['description']) . '">'
            . '<meta property="og:url" content="' . e($canonical) . '">'
            . '<meta name="twitter:card" content="summary">'
            . '<meta name="twitter:title" content="' . e($page['title']) . '">'
            . '<meta name="twitter:description" content="' . e($page['description']) . '">';

        if ($routeName === 'home') {
            $organization = [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => 'FLAME PH',
                'alternateName' => 'Federation of Leaders Advancing MSME Ecosystem in the Philippines',
                'url' => 'https://www.flameph.org/',
                'logo' => 'https://www.flameph.org/assets/images/flameph-logo.png',
                'description' => $page['description'],
                'areaServed' => ['@type' => 'Country', 'name' => 'Philippines'],
            ];
            $website = [
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => 'FLAME PH',
                'url' => 'https://www.flameph.org/',
            ];
            $metadata .= '<script type="application/ld+json">' . json_encode($organization, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>'
                . '<script type="application/ld+json">' . json_encode($website, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
        }

        $html = $response->getContent();
        $html = preg_replace('/<title\b[^>]*>.*?<\/title>/is', '', $html, 1) ?? $html;
        $response->setContent(preg_replace('/<\/head>/i', $metadata . '</head>', $html, 1) ?? $html);

        return $response;
    }
}

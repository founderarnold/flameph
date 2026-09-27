<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoMetadataTest extends TestCase
{
    public function test_public_pages_include_search_metadata_and_canonical_urls(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('<title>FLAME PH | Entrepreneurship Learning &amp; MSME Community in the Philippines</title>', false)
            ->assertSee('<link rel="canonical" href="https://www.flameph.org/">', false)
            ->assertSee('application/ld+json', false)
            ->assertSee('name="robots" content="index, follow"', false);
    }

    public function test_sitemap_lists_public_pages_and_excludes_member_accounts(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee('https://www.flameph.org/membership/terms', false)
            ->assertDontSee('/membership/profile', false)
            ->assertDontSee('/membership/activate', false);
    }

    public function test_robots_txt_points_search_engines_to_the_sitemap(): void
    {
        $this->get('/robots.txt')
            ->assertOk()
            ->assertSee('Sitemap: https://www.flameph.org/sitemap.xml', false);
    }
}

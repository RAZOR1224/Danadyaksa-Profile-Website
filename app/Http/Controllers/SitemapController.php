<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function generate()
    {
        $sitemap = Sitemap::create();

        $staticPages = ['/', '/about', '/services', '/team', '/articles', '/contact'];

        foreach ($staticPages as $page) {
            $sitemap->add(
                Url::create('/en' . $page)
                    ->addAlternate('/id' . $page, 'id')
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        }

        // Manually get the XML content as a string using the render() method.
        $xmlContent = $sitemap->render();

        // Manually create a new Response with the XML content and the correct header.
        // This is the most direct and foolproof way.
        return response($xmlContent, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
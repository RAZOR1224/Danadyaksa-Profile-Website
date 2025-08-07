<?php

namespace App\Http\Controllers;

// Import all the necessary classes
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Team;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    /**
     * Generate the sitemap.
     */
    public function generate()
    {
        $sitemap = Sitemap::create();

        // Define your static pages
        $staticPages = ['/', '/about', '/services', '/team', '/articles', '/contact'];

        // Add each static page with its language alternatives
        foreach ($staticPages as $page) {
            $sitemap->add(
                Url::create('/en' . $page)
                    ->addAlternate('/id' . $page, 'id') // Assumes you also have an 'id' locale
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        }
        
        // This part requires your Article and Team models to be set up for multilingual routes.
        // For now, focus on getting the static pages correct.
        // You can add logic here later to add your dynamic multilingual URLs.
        // For example:
        //
        // foreach (Article::all() as $article) {
        //     $sitemap->add(
        //         Url::create('/en/articles/' . $article->slug)
        //             ->addAlternate('/id/articles/' . $article->slug, 'id')
        //     );
        // }

        return $sitemap;
    }
}
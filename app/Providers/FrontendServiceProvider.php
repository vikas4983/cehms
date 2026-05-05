<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Book;
use App\Models\Cms;
use App\Models\Menu;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $setting = Cache::remember('web_setting', 120, function () {
            return SiteSetting::first();
        });
        $headers = Cache::remember('headers', 160, function () {
            return Menu::header()->where('status', 1)->get();
        });
        $footers = Cache::remember('footers', 160, function () {
            return Menu::footer()->where('status', 1)->get();
        });
        $banners = Cache::remember('banners', 160, function () {
            return Banner::activeBanner()->get();
        });
        $books = Cache::remember('books', 160, function () {
            return Book::active()->get();
        });
        $testimonials = Cache::remember('testimonials', 160, function () {
            return Testimonial::activeTetimonials()->get();
        });
       

        View::share([
            'setting' => $setting,
            'headers' => $headers,
            'footers' => $footers,
            'banners' => $banners,
            'books' => $books,
            'testimonials' => $testimonials,
           
        ]);
    }
}

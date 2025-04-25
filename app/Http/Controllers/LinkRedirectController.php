<?php

namespace App\Http\Controllers;

use App\Models\Link;

class LinkRedirectController extends Controller
{
    public static string $routeName = 'link.redirect';

    /**
     * Handle the incoming request.
     */
    public function __invoke(string $slug)
    {
        $link = Link::where('slug', $slug)->firstOrFail();

        return redirect($link->dest_url, 308);
    }
}

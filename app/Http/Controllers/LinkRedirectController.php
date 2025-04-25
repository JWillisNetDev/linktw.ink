<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Concurrency;
use App\Models\Link;

class LinkRedirectController extends Controller
{
    public static string $routeName = 'link.redirect';

    /**
     * Handle the incoming request.
     */
    public function __invoke(string $slug)
    {
        /** @var Link $link */
        $link = Link::where('slug', $slug)->firstOrFail();

        $link->clicks = $link->clicks + 1;
        $link->save();

        return redirect($link->dest_url, 308);
    }
}

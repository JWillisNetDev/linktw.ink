<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Link;
use Illuminate\Support\Facades\URL;

class LinkTrimController extends Controller
{
    public static string $routeName = 'link.trim';

    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreLinkRequest $request)
    {
        $userId = Auth::id();
        $validated = $request->validated();

        $link = new Link;
        $link->slug = Link::generateUniqueSlug($userId);
        $link->dest_url = $validated['url'];
        $link->created_by_id = $userId;

        $link->save();

        return response(route('link.redirect', ['link' => $link->slug]), 201);
    }
}

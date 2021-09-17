<?php

namespace App\Http\Controllers;

use App\Actions\Discogs\GetReleases;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

use function Couchbase\defaultDecoder;

class DiscogsController extends Controller
{
    public function getReleases()
    {
        $user = auth()->user();

        $items = [];
        if ($user->discogs_username) {
            $items = (new GetReleases())->releases($user->discogs_username);
        }

        return Inertia::render('Dashboard', [
            'releases' => $items
        ]);
    }

    public function storeUsername(Request $request)
    {
        Validator::make($request->all(), [
            'discogs_username' => ['required', 'string', 'max:255'],
        ])->validateWithBag('saveDiscogsUsername');

        auth()->user()->forceFill([
            'discogs_username' => $request->discogs_username,
        ])->save();

        return redirect()->back();
    }
}

<?php

namespace App\Actions\Discogs;

use Illuminate\Support\Facades\Http;

class GetReleases
{
    /**
     * @param  string  $username
     * @param  int|null  $page
     * @return array
     */
    public function releases(string $username, int $page = null): array
    {
        $endpoint = 'https://api.discogs.com';
        $page = $page ? '&page='.$page : '';
        $sort = '&sort=added&sort_order=desc';
        $key = '&key='.config('services.discogs.key').'&secret='.config('services.discogs.secret');

        $collection = Http::withHeaders(['User-Agent' => 'AdamsDiscogsApp/1.0',])
            ->get($endpoint.'/users/'.$username.'/collection/folders/0/releases?'.$sort.$page.'&per_page=50'.$key);

        if ($collection->successful()) {
//            dd($collection->json());
            if (auth()->user()->discogs_username !== strtolower($username)) {
                auth()->user()->update(
                    [
                        'discogs_username' => strtolower($username)
                    ]
                );
            }

            return $collection->json();
        }

        return [];
    }
}
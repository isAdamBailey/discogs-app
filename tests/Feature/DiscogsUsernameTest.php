<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DiscogsUsernameTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_discogs_username_can_be_added()
    {
        $this->actingAs($user = User::factory()->create());

        $name = $this->faker->username;

        $this->put(route('discogs-username.store'), [
            'discogs_username' => $name,
        ]);

        $this->assertEquals($name, $user->fresh()->discogs_username);
    }
}

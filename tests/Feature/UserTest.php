<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function save_user_and_see_it()
    {
        // Given we have user in the database
        $user = User::factory()->create();

        $res = $this->actingAs($user)->get(route('profile.show'));
        
        $res->assertStatus(200);
    }
}

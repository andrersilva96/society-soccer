<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function visit_home(): void
    {
        $user = User::factory()->create();
        $res = $this->actingAs($user)->get(route('dashboard'));
        $res->assertStatus(200);
    }
}

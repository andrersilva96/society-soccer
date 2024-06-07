<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;

class ApiTest extends TestCase
{
    use DatabaseMigrations;

     public function test_store_user_from_api()
    {
        $user = User::factory()->create();
        $token = $user->generateTokenString();
        $res = $this->actingAs($user)->withHeaders(['Authorization' => "Bearer $token"])->post(route('api.users.store'));
        $res->assertJsonCount(10, 'data');
    }
    /**
     ** TODO: Create teams to pass on unit.
        public function test_sort_teams_api()
        {
            $user = User::factory()->create();
            $token = $user->generateTokenString();
            $res = $this->actingAs($user)->withHeaders(['Authorization' => "Bearer $token"])->get(route('api.sort', ['num' => 2]));
            dd($res->baseResponse);
            $res->assertJsonCount(10, 'data');
        }
    */

    public function test_get_user_data_valid_format()
    {
        $user = User::factory()->create();
        $token = $user->generateTokenString();

        $this->actingAs($user)->withHeaders(['Authorization' => "Bearer $token"])->json('get', route('api.users.index', 1))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => []
                ]
            );
    }

    public function test_get_users_bulk_data_valid_format()
    {
        $user = User::factory()->create();
        $token = $user->generateTokenString();
        $this->actingAs($user)->withHeaders(['Authorization' => "Bearer $token"])->json('get', route('api.users.index'))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => []
                    ],
                    'links' => ['first', 'last', 'prev', 'next'],
                    'meta' => [
                        'current_page',
                        'from',
                        'last_page',
                        'links' => [
                            ['url', 'label', 'active'],
                            ['url', 'label', 'active'],
                            ['url', 'label', 'active']
                        ],
                        'path',
                        'per_page',
                        'to',
                        'total',
                    ]
                ]
            );
    } */
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{Player, Sort, Team};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('team_sorts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sort::class)->nullable();
            $table->foreignIdFor(Team::class)->nullable();
            $table->foreignIdFor(Player::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams_players_sort');
    }
};

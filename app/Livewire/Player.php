<?php

namespace App\Livewire;

use App\Models\Player as ModelsPlayer;
use Livewire\Component;

class Player extends Component
{
    public ModelsPlayer $player;

    protected $rules = [
        'player.name' => 'required|min:6|unique:players,name',
        'player.level' => 'required',
        'player.is_goalkeeper' => 'required',
        'player.is_presence' => 'required',
    ];

    protected $validationAttributes = [
        'player.name' => 'nome',
        'player.level' => 'nível',
        'player.is_goalkeeper' => 'goleiro',
        'player.is_presence' => 'presença',
    ];

    public function mount()
    {
        $this->player = new ModelsPlayer;
    }

    public function render()
    {
        return view('pages.players.index');
    }

    public function save()
    {
        $this->validate();
        $this->player->save();
        $this->player = new ModelsPlayer;
    }

    public function delete(ModelsPlayer $player)
    {
        $player->delete();
    }

    public function update(ModelsPlayer $player)
    {
        $this->player = $player;
    }
}

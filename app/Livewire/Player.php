<?php

namespace App\Livewire;

use App\Models\Player as ModelsPlayer;
use App\Services\AlertService;
use Livewire\Component;

class Player extends Component
{
    public ModelsPlayer $player;

    protected $validationAttributes = [
        'player.name' => 'nome',
        'player.level' => 'nível',
        'player.is_goalkeeper' => 'goleiro',
        'player.is_presence' => 'presença',
    ];

    public function rules()
    {
        return [
            'player.name' => 'required|min:6|unique:players,name,'.$this->player->id,
            'player.level' => 'required',
            'player.is_goalkeeper' => 'required',
            'player.is_presence' => 'required',
        ];
    }

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
        $msg = $this->player->wasRecentlyCreated ? 'Jogador criado!' : 'Jogador atualizado!';
        AlertService::success($msg, $this);
        $this->player = new ModelsPlayer;
    }

    public function delete(ModelsPlayer $player)
    {
        $player->delete();
        AlertService::success('Jogador exlcuído!', $this);
    }

    public function update(ModelsPlayer $player)
    {
        $this->player = $player;
    }
}

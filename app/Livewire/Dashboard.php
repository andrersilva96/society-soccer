<?php

namespace App\Livewire;

use App\Services\TeamService;
use Livewire\Component;

class Dashboard extends Component
{
    public ?int $num;

    public function render()
    {
        return view('pages.dashboard.index');
    }

    public function submit()
    {
        $this->validate(['num' => 'required|numeric|gt:0']);
        (new TeamService())->sort($this->num);
        $this->num = null;
    }
}

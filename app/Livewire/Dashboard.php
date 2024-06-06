<?php

namespace App\Livewire;

use App\Http\Requests\SortRequest;
use App\Services\TeamService;
use App\Services\AlertService;
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
        $this->validate(SortRequest::rules());
        try {
            (new TeamService())->sort($this->num);
            $this->num = null;
        } catch (\Exception $e) {
            return AlertService::danger($e->getMessage(), $this);
        }
        AlertService::success('Sorteio criado!', $this);
    }
}

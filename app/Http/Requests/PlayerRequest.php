<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class PlayerRequest extends Request
{
    public function commonRules() : array
    {
        return [
            'level' => 'required',
            'is_goalkeeper' => 'required',
            'is_presence' => 'required',
        ];
    }

    public function updateRules() : array
    {
        return [
            'name' => 'required|min:6|unique:players,name,'.$this->player
        ];
    }

    public function storeRules() : array
    {
        return [
            'name' => 'required|min:6|unique:players,name'
        ];
    }
}


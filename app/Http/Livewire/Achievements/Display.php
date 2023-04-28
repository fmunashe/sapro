<?php

namespace App\Http\Livewire\Achievements;

use Livewire\Component;
use App\Models\Achievement;

class Display extends Component
{
    public $saproId;

    public function mount($saproId)
    {
        $this->saproId = $saproId;
    }

    public function render()
    {
        $achievements = Achievement::query()->where('saproId', '=', $this->saproId)->get();
        return view('livewire.achievements.display', compact('achievements'));
    }
}

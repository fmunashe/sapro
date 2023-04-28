<?php

namespace App\Http\Livewire\Achievements;

use App\Enums\UserTypeEnum;
use Livewire\Component;
use Livewire\WithPagination;

class Achievement extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $achievements = \App\Models\Achievement::with('user')
                    ->where('achievement', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $achievements = \App\Models\Achievement::query()->with('user')->paginate(10);
            }
        } else {
            $achievements = \App\Models\Achievement::query()->where('saproId', '=', auth()->user()->saproId)->with('user')->paginate(10);
        }

        return view('livewire.achievements.achievement', compact('achievements'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->reset('search');
    }
}

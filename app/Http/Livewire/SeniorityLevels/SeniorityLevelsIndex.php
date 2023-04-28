<?php

namespace App\Http\Livewire\SeniorityLevels;

use App\Models\SeniorityLevel;
use Livewire\Component;
use Livewire\WithPagination;

class SeniorityLevelsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if ($this->search != null) {
            $levels = SeniorityLevel::query()
                ->where('seniorityLevelDescription', 'like', '%' . $this->search . '%')
                ->orWhere('seniorityLevelCode', 'like', '%' . $this->search . '%')
                ->latest()->paginate(10);
        } else {
            $levels = SeniorityLevel::query()->paginate(10);
        }
        return view('livewire.seniority-levels.seniority-levels-index', compact('levels'));
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

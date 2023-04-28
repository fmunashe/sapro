<?php

namespace App\Http\Livewire\FirmExperience;

use App\Enums\UserTypeEnum;
use App\Models\FirmExperience;
use Livewire\Component;
use Livewire\WithPagination;

class FirmExperienceIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $firmExperiences = FirmExperience::with('user')
                    ->where('company', 'like', '%' . $this->search . '%')
                    ->orWhere('country', 'like', '%' . $this->search . '%')
                    ->orWhere('level', 'like', '%' . $this->search . '%')
                    ->orWhere('startPeriod', 'like', '%' . $this->search . '%')
                    ->orWhere('endPeriod', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $firmExperiences = FirmExperience::query()->with('user')->paginate(10);
            }
        } else {
            $firmExperiences = FirmExperience::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }
        return view('livewire.firm-experience.firm-experience-index', compact('firmExperiences'));
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

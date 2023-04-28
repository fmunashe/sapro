<?php

namespace App\Http\Livewire\SoftwareExperience;

use App\Enums\UserTypeEnum;
use App\Models\SoftwareExperience;
use Livewire\Component;
use Livewire\WithPagination;

class SoftwareExperienceIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $softwareExperience = SoftwareExperience::with('user')
                    ->where('level', 'like', '%' . $this->search . '%')
                    ->orWhere('softwareExperience', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $softwareExperience = SoftwareExperience::query()->with('user')->paginate(10);
            }
        } else {
            $softwareExperience = SoftwareExperience::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }
        return view('livewire.software-experience.software-experience-index', compact('softwareExperience'));
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

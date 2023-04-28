<?php

namespace App\Http\Livewire\ProfessionalExperience;

use App\Enums\UserTypeEnum;
use App\Models\ListedClient;
use App\Models\ProfessionalExperience;
use Livewire\Component;
use Livewire\WithPagination;

class ProfessionalExperienceIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $professionalExperience = ProfessionalExperience::with('user')
                    ->where('professionalExperience', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $professionalExperience = ProfessionalExperience::query()->with('user')->paginate(10);
            }
        } else {
            $professionalExperience = ProfessionalExperience::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }
        return view('livewire.professional-experience.professional-experience-index', compact('professionalExperience'));
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

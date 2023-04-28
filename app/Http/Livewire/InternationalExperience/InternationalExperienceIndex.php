<?php

namespace App\Http\Livewire\InternationalExperience;

use App\Enums\UserTypeEnum;
use App\Models\InternationalExperience;
use Livewire\Component;
use Livewire\WithPagination;

class InternationalExperienceIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $internationalExperiences = InternationalExperience::with('user')
                    ->where('city', 'like', '%' . $this->search . '%')
                    ->orWhere('country', 'like', '%' . $this->search . '%')
                    ->orWhere('sector', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $internationalExperiences = InternationalExperience::query()->with('user')->paginate(10);
            }
        } else {
            $internationalExperiences = InternationalExperience::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }

        return view('livewire.international-experience.international-experience-index', compact('internationalExperiences'));
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

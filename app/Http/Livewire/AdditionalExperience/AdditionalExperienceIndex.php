<?php

namespace App\Http\Livewire\AdditionalExperience;

use App\Enums\UserTypeEnum;
use App\Models\AdditionalExperience;
use Livewire\Component;
use Livewire\WithPagination;

class AdditionalExperienceIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $additionalExperiences = AdditionalExperience::with('user')
                    ->where('additionalExperience', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $additionalExperiences = AdditionalExperience::query()->with('user')->paginate(10);
            }
        } else {
            $additionalExperiences = AdditionalExperience::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }
        return view('livewire.additional-experience.additional-experience-index', compact('additionalExperiences'));
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

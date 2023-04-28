<?php

namespace App\Http\Livewire\Specialisation;

use App\Models\Specialisation;
use Livewire\Component;
use Livewire\WithPagination;

class SpecialisationIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if ($this->search != null) {
            $specialisations = Specialisation::query()
                ->where('specialisationCode', 'like', '%' . $this->search . '%')
                ->orWhere('specialisationDescription', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10);
        } else {
            $specialisations = Specialisation::query()->paginate(10);
        }
        return view('livewire.specialisation.specialisation-index', compact('specialisations'));
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

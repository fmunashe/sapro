<?php

namespace App\Http\Livewire\Sectors;

use App\Enums\UserTypeEnum;
use App\Models\Sector;
use Livewire\Component;
use Livewire\WithPagination;

class SectorsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $sectors = Sector::with('user')
                    ->where('sector', 'like', '%' . $this->search . '%')
                    ->orWhere('sectorCategory', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $sectors = Sector::query()->with('user')->paginate(10);
            }
        } else {
            $sectors = Sector::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }

        return view('livewire.sectors.sectors-index', compact('sectors'));
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

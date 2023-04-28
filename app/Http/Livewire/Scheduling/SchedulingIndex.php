<?php

namespace App\Http\Livewire\Scheduling;

use App\Enums\UserTypeEnum;
use App\Models\Scheduling;
use Livewire\Component;
use Livewire\WithPagination;

class SchedulingIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $scheduling = Scheduling::with('user')
                    ->where('bsHostFirmCode', 'like', '%' . $this->search . '%')
                    ->orWhere('postBsHostFirmCode', 'like', '%' . $this->search . '%')
                    ->orWhere('year', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $scheduling = Scheduling::query()->with('user')->paginate(10);
            }
        } else {
            $scheduling = Scheduling::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }
        return view('livewire.scheduling.scheduling-index', compact('scheduling'));
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

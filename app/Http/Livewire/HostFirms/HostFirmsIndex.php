<?php

namespace App\Http\Livewire\HostFirms;

use App\Enums\UserTypeEnum;
use App\Models\HostFirm;
use Livewire\Component;
use Livewire\WithPagination;

class HostFirmsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $hostFirms = HostFirm::with('user')
                    ->where('hostFirmCode', 'like', '%' . $this->search . '%')
                    ->orWhere('hostFirmName', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $hostFirms = HostFirm::query()->with('user')->paginate(10);
            }
        } else {
            $hostFirms = HostFirm::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }

        return view('livewire.host-firms.host-firms-index', compact('hostFirms'));
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

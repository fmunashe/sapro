<?php

namespace App\Http\Livewire\ClientRevenue;

use App\Enums\UserTypeEnum;
use App\Models\ClientRevenue;
use Livewire\Component;
use Livewire\WithPagination;

class ClientRevenueIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $revenues = ClientRevenue::with('user')
                    ->where('revenue', 'like', '%' . $this->search . '%')
                    ->orWhere('mainClient', 'like', '%' . $this->search . '%')
                    ->orWhere('sector', 'like', '%' . $this->search . '%')
                    ->orWhereHas('auditedWork', function ($query) {
                        $query->where('auditWorkPerformed', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $revenues = ClientRevenue::query()->with('user')->paginate(10);
            }
        } else {
            $revenues = ClientRevenue::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }

        return view('livewire.client-revenue.client-revenue-index', compact('revenues'));
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

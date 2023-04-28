<?php

namespace App\Http\Livewire\ContractStatus;

use App\Models\ContractStatus;
use Livewire\Component;
use Livewire\WithPagination;

class ContractStatusIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if ($this->search != null) {
            $contractStatus = ContractStatus::query()
                ->where('contractStatusDescription', 'like', '%' . $this->search . '%')
                ->orWhere('contractStatusCode', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10);
        } else {
            $contractStatus = ContractStatus::query()->paginate(10);
        }
        return view('livewire.contract-status.contract-status-index', compact('contractStatus'));
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

<?php

namespace App\Http\Livewire\ClientRequests;

use App\Enums\UserTypeEnum;
use App\Models\ClientRequest;
use Livewire\Component;
use Livewire\WithPagination;

class ClientRequestsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if ($this->search != null) {
            if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
                $clientRequests = ClientRequest::with(['profiles', 'createdBy'])
                    ->where('status', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhereHas('createdBy', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('surname', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('client', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('surname', 'like', '%' . $this->search . '%');
                    })
                    ->latest()
                    ->paginate(10);
            } else {
                $clientRequests = ClientRequest::with(['profiles', 'createdBy'])
                    ->where('client_id', '=', auth()->user()->id)
                    ->orWhere('status', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhereHas('createdBy', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('surname', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('client', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('surname', 'like', '%' . $this->search . '%');
                    })
                    ->latest()
                    ->paginate(10);
            }
        } else {
            if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
                $clientRequests = ClientRequest::query()->with(['profiles', 'createdBy'])->paginate(10);
            } else {
                $clientRequests = ClientRequest::query()->where('client_id', '=', auth()->user()->id)->with(['profiles', 'createdBy'])->paginate(10);
            }
        }
        return view('livewire.client-requests.client-requests-index', compact('clientRequests'));
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

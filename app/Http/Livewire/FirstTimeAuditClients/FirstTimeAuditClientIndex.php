<?php

namespace App\Http\Livewire\FirstTimeAuditClients;

use App\Enums\UserTypeEnum;
use App\Models\FirstTimeAuditClient;
use Livewire\Component;
use Livewire\WithPagination;

class FirstTimeAuditClientIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $auditClients = FirstTimeAuditClient::with('user')
                    ->where('firstTimeAuditClient', 'like', '%' . $this->search . '%')
                    ->orWhere('sector', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $auditClients = FirstTimeAuditClient::query()->with('user')->paginate(10);
            }
        } else {
            $auditClients = FirstTimeAuditClient::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }
        return view('livewire.first-time-audit-clients.first-time-audit-client-index', compact('auditClients'));
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

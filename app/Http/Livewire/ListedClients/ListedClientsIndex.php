<?php

namespace App\Http\Livewire\ListedClients;

use App\Enums\UserTypeEnum;
use App\Models\ListedClient;
use Livewire\Component;
use Livewire\WithPagination;

class ListedClientsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $listedClients = ListedClient::with('user')
                    ->where('listedClient', 'like', '%' . $this->search . '%')
                    ->orWhere('sector', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $listedClients = ListedClient::query()->with('user')->paginate(10);
            }
        } else {
            $listedClients = ListedClient::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }

        return view('livewire.listed-clients.listed-clients-index', compact('listedClients'));
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

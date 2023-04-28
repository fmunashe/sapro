<?php

namespace App\Http\Livewire\ClientRequests;

use App\Models\ClientRequest;
use Livewire\Component;

class ClientRequestsShow extends Component
{
    public ClientRequest $clientRequest;

    public function mount(ClientRequest $clientRequest)
    {
        $this->clientRequest = $clientRequest;
    }
    public function render()
    {
        return view('livewire.client-requests.client-requests-show');
    }
}

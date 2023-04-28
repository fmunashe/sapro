<?php

namespace App\Http\Livewire\ClientRequests;

use App\Enums\UserTypeEnum;
use App\Models\ClientRequest;
use App\Models\User;
use Livewire\Component;

class ClientRequestsCreate extends Component
{
    public ClientRequest $clientRequest;
    public $clients;

    public function mount(ClientRequest $clientRequest)
    {
        $this->clientRequest = $clientRequest;
        $this->clientRequest->created_by = auth()->user()->id;
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            $this->clients = User::query()->clients()->get(['id', 'name', 'surname', 'email']);
        } else {
            $this->clients = User::query()->clients()->where('id', '=', auth()->user()->id)->get(['id', 'name', 'surname', 'email']);
        }
    }

    public function render()
    {
        return view('livewire.client-requests.client-requests-create');
    }

    public function store()
    {
        $this->validate();
        $this->clientRequest->save();
        toast('New Request Successfully Created', 'success');
        return to_route('client-requests.index');
    }

    protected function rules()
    {
        return [
            'clientRequest.description' => 'required',
            'clientRequest.client_id' => [
                'required',
                'exists:users,id',
            ],
            'clientRequest.created_by' => [
                'required',
                'exists:users,id',
            ],
        ];
    }

    protected function messages()
    {
        return [
            'clientRequest.description.required' => 'Please enter a description for your request'
        ];
    }
}

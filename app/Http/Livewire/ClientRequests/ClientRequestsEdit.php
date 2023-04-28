<?php

namespace App\Http\Livewire\ClientRequests;

use App\Enums\RequestStatus;
use App\Enums\UserTypeEnum;
use App\Models\ClientRequest;
use App\Models\Profile;
use App\Models\User;
use Livewire\Component;

class ClientRequestsEdit extends Component
{
    public ClientRequest $clientRequest;
    public $clients;
    public $auditors;
    public $inputs;
    public $i;
    public $statuses;
    public $attachedProfiles;

    public function mount(ClientRequest $clientRequest)
    {
        $this->clientRequest = $clientRequest;
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            $this->clients = User::query()->clients()->get(['id', 'name', 'surname', 'email']);
        } else {
            $this->clients = User::query()->clients()->where('id', '=', auth()->user()->id)->get(['id', 'name', 'surname', 'email']);
        }

        $this->auditors = User::query()->auditors()->get(['id', 'name', 'surname', 'email', 'saproId']);
        $this->i = 0;
        $this->inputs = [];
        $this->statuses = [RequestStatus::APPROVED, RequestStatus::REJECTED, RequestStatus::IN_REVIEW, RequestStatus::PROCESSED, RequestStatus::PROCESSING, RequestStatus::CLOSED, RequestStatus::OPEN];
    }

    protected $listeners = ['profileUpdated' => '$refresh'];

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->attachedProfiles[$i]);
        unset($this->inputs[$i]);
    }

    public function render()
    {
        return view('livewire.client-requests.client-requests-edit');
    }

    public function updateData()
    {
        $this->validate();
        $this->clientRequest->save();

        if ($this->attachedProfiles != null) {
            foreach ($this->attachedProfiles as $profile) {
                Profile::query()->firstOrCreate([
                    'client_request_id' => $this->clientRequest->id,
                    'user_id' => $profile
                ]);
            }
            $this->clientRequest->status = RequestStatus::PROCESSING;
            $this->clientRequest->save();
        }
        $this->inputs = [];
        toast('Client Request Successfully Updated', 'success');
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
            'clientRequest.status' => [
                'required'
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

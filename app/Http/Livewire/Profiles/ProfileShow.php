<?php

namespace App\Http\Livewire\Profiles;

use App\Enums\RequestStatus;
use App\Models\ClientRequest;
use App\Models\Profile;
use Livewire\Component;

class ProfileShow extends Component
{
    public Profile $profile;
    public ClientRequest $clientRequest;

    public function mount(Profile $profile, ClientRequest $clientRequest)
    {
        $this->profile = $profile;
        $this->clientRequest = $clientRequest;
    }

    public function render()
    {
        return view('livewire.profiles.profile-show');
    }

    public function approveProfile()
    {
        $this->profile->status = RequestStatus::APPROVED;
        $this->profile->save();
        $this->emitUp('profileUpdated');
    }

    public function rejectProfile()
    {
        $this->profile->status = RequestStatus::REJECTED;
        $this->profile->save();
        $this->emitUp('profileUpdated');
    }
}

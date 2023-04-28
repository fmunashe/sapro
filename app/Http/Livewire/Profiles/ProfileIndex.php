<?php

namespace App\Http\Livewire\Profiles;

use App\Enums\RequestStatus;
use App\Models\Profile;
use App\Models\User;
use Livewire\Component;

class ProfileIndex extends Component
{
    public Profile $profile;

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function render()
    {
        return view('livewire.profiles.profile-index');
    }

    public function removeProfile()
    {
        $this->profile->delete();
        $this->emitUp('profileUpdated');
    }
}

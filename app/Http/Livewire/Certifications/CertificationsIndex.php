<?php

namespace App\Http\Livewire\Certifications;

use App\Enums\UserTypeEnum;
use App\Models\CertificationsAndEducation;
use Livewire\Component;
use Livewire\WithPagination;

class CertificationsIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $certifications = CertificationsAndEducation::with('user')
                    ->where('institute', 'like', '%' . $this->search . '%')
                    ->orWhere('certificationsAndEducation', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%')
                            ->orWhere('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $certifications = CertificationsAndEducation::query()->with('user')->paginate(10);
            }
        } else {
            $certifications = CertificationsAndEducation::query()
                ->where('saproId', '=', auth()->user()->saproId)
                ->with('user')
                ->paginate(10);
        }

        return view('livewire.certifications.certifications-index', compact('certifications'));
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

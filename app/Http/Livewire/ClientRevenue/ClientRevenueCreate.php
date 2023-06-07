<?php

namespace App\Http\Livewire\ClientRevenue;

use App\Models\AuditedWork;
use App\Models\ClientRevenue;
use App\Models\SectorCategory;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ClientRevenueCreate extends Component
{
    public $saproId;
    public $mainClient;
    public $sector_category_id;
    public $revenue;
    public $timeOnClient;
    public $auditWorkPerformed;
    public $inputs = [];
    public $i = 0;

    public function mount()
    {
        $this->saproId = auth()->user()->saproId;
    }


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->auditWorkPerformed[$i]);
        unset($this->inputs[$i]);
    }

    private function resetInputFields()
    {
        $this->saproId = '';
        $this->mainClient = '';
        $this->sector_category_id = '';
        $this->revenue = '';
        $this->timeOnClient = '';
        $this->auditWorkPerformed = '';
    }


    public function render()
    {
        $sectorCategories =$this->getSectorCategories();
        return view('livewire.client-revenue.client-revenue-create',compact('sectorCategories'));
    }

    public function store()
    {
        $validatedDate = $this->validate(
            [
                'saproId' => [
                    'required',
                    Rule::in($this->getSaproIds()),
                ],
                'mainClient' => 'required',
                'sector_category_id' => 'required',
                'revenue' => 'required',
                'timeOnClient' => 'required',
                'auditWorkPerformed.0' => 'required',
                'auditWorkPerformed.*' => 'required',
            ],
            [
                'saproId.required' => 'Sapro Id field is required',
                'saproId.in' => 'A valid sapro id is required (make sure there is a user with that sapro id)',
                'mainClient.required' => 'Main client field is required',
                'sector_category_id.required' => 'Sector field is required',
                'revenue.required' => 'Revenue field is required',
                'timeOnClient.required' => 'Time on client field is required',
                'auditWorkPerformed.*.required' => 'Audit work performed field is required',
                'auditWorkPerformed.0.required' => 'Audit work performed field is required',
            ]
        );

        $revenue = ClientRevenue::query()->create([
            'saproId' => $this->saproId,
            'mainClient' => $this->mainClient,
            'revenue' => $this->revenue,
            'sector_category_id' => $this->sector_category_id,
            'timeOnClient' => $this->timeOnClient,
        ]);

        foreach ($this->auditWorkPerformed as $work) {
            AuditedWork::query()->create([
                'revenueId' => $revenue->clientRevenueId,
                'auditWorkPerformed' => $work
            ]);
        }

        $this->inputs = [];

        $this->resetInputFields();
        toast('Client Revenue Successfully Saved', 'success');
        return to_route('client-revenue.index');
    }

    private function getSaproIds(): array
    {
        return User::query()->whereNotNull('saproId')->pluck('saproId')->unique()->toArray();
    }

    public function getSectorCategories(): \Illuminate\Database\Eloquent\Collection
    {
        return SectorCategory::all();
    }
}

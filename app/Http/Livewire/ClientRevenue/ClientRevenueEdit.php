<?php

namespace App\Http\Livewire\ClientRevenue;

use App\Models\AuditedWork;
use App\Models\ClientRevenue;
use Livewire\Component;

class ClientRevenueEdit extends Component
{
    public ClientRevenue $revenue;
    public $inputs;
    public $i;
    public $auditWorkPerformed;

    public function mount(ClientRevenue $revenue)
    {
        $this->revenue = $revenue;
        $this->inputs = [];
        $this->i = 0;
    }

    protected $listeners = ['auditWorkRemoved' => '$refresh'];

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


    public function render()
    {
        return view('livewire.client-revenue.client-revenue-edit');
    }

    public function updateData()
    {
        $this->validate();

        $this->revenue->save();

        if ($this->auditWorkPerformed != null) {
            foreach ($this->auditWorkPerformed as $work) {
                AuditedWork::query()->create([
                    'revenueId' => $this->revenue->clientRevenueId,
                    'auditWorkPerformed' => $work
                ]);
            }
        }

        $this->inputs = [];

        toast('Client Revenue Successfully Updated', 'success');

        return to_route('client-revenue.index');
    }

    protected function rules(): array
    {
        return [
            'revenue.saproId' => [
                'required',
                'exists:users,saproId',
            ],
            'revenue.mainClient' => [
                'required',
                'string'
            ],
            'revenue.revenue' => [
                'required',
                'integer'
            ],
            'revenue.sector' => [
                'required',
                'string'
            ],
            'revenue.timeOnClient' => [
                'required'
            ],

        ];
    }

    protected function messages(): array
    {
        return [
            'revenue.saproId.required' => 'Sapro Id field is required',
            'revenue.saproId.exists' => 'A valid sapro id is required (make sure there is a user with that sapro id)',
            'revenue.mainClient.required' => 'Main client field is required',
            'revenue.sector.required' => 'Sector field is required',
            'revenue.revenue.required' => 'Revenue field is required',
            'revenue.timeOnClient.required' => 'Time on client field is required',
        ];
    }
}

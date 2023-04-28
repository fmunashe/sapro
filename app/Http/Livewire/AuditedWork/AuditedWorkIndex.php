<?php

namespace App\Http\Livewire\AuditedWork;

use App\Models\AuditedWork;
use Livewire\Component;

class AuditedWorkIndex extends Component
{
    public AuditedWork $auditedWork;

    public function mount(AuditedWork $auditedWork)
    {
        $this->auditedWork = $auditedWork;
    }

    public function render()
    {
        return view('livewire.audited-work.audited-work-index');
    }

    public function remove()
    {
        $this->auditedWork->delete();
        $this->emitUp('auditWorkRemoved');
    }
}

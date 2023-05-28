<?php

namespace App\Http\Livewire\AssignmentTypes;

use App\Models\AssignmentType;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AssignmentTypeIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return AssignmentType::query();
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('assignmentType')
                ->searchable()
                ->filterable()
                ->label(trans('Assignment Type')),

            Column::callback(['id'], function ($id) {
                $type = AssignmentType::query()->where('id', '=', $id)->first();
                return view('assignmentTypes.assignment_type_action_buttons',
                    ['type' => $type]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

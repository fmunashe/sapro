<?php

namespace App\Http\Livewire\PriorExperienceRoles;

use App\Models\PriorExperienceRole;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PriorExperienceRolesIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return PriorExperienceRole::query();
    }

    public function columns(): array
    {
        return [
            Column::name('id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('priorExperienceRole')
                ->searchable()
                ->filterable()
                ->label(trans('Prior Experience Role')),

            Column::callback(['id'], function ($id) {
                $priorExperience = PriorExperienceRole::query()->where('id', '=', $id)->first();
                return view('priorExperienceRoles.prior_action_buttons',
                    ['priorExperience' => $priorExperience]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

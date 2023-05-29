<?php

namespace App\Http\Livewire\CompetenceLevel;

use App\Models\CompetenceLevel;
use App\Models\SeniorityLevel;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CompetenceLevelIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return CompetenceLevel::query()
            ->with('seniorityLevel')
            ->join('seniority_levels', 'seniority_levels.seniorityLevelId', '=', 'competence_levels.seniorityLevelId');
    }

    public function columns(): array
    {
        return [
            Column::name('competence_levels.id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),
            Column::name('seniority_levels.seniorityLevelDescription')
                ->searchable()
                ->filterable($this->seniorityLevels)
                ->label(trans('Seniority Level')),

            Column::name('competenceLevel')
                ->searchable()
                ->filterable()
                ->label(trans('Competence')),


            Column::callback(['competence_levels.id'], function ($id) {
                $competence = CompetenceLevel::query()->where('id', '=', $id)->first();
                $seniorityLevels = SeniorityLevel::all();
                return view('competenceLevel.competence_action_buttons', compact('competence', 'seniorityLevels'));
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }

    public function getSeniorityLevelsProperty(): \Illuminate\Support\Collection
    {
        return SeniorityLevel::query()->pluck('seniorityLevelDescription');
    }
}

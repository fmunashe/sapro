<?php

namespace App\Http\Livewire\ProfessionalExperience;

use App\Enums\UserTypeEnum;
use App\Models\ProfessionalExperience;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProfessionalExperienceTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return ProfessionalExperience::query()
                ->with('user')
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'professional_experiences.saproId');
        }
        return ProfessionalExperience::query()->with('user')
            ->leftJoin('users', 'users.saproId', '=', 'professional_experiences.saproId');

    }

    public function columns()
    {
        return [
            Column::name('professional_experiences.saproId')
                ->searchable()
                ->filterable()
                ->label(trans('Sapro ID')),

            Column::name('users.name')
                ->searchable()
                ->filterable()
                ->label(trans('Name')),

            Column::name('users.surname')
                ->searchable()
                ->filterable()
                ->label(trans('Surname')),

            Column::name('users.email')
                ->searchable()
                ->filterable()
                ->label(trans('Email')),

            Column::name('professionalExperience')
                ->searchable()
                ->filterable()
                ->label(trans('Professional Experience')),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label(trans('Approved')),

            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label(trans('Approved By')),

            Column::callback(['professionalExperienceId'], function ($id) {
                $experience = ProfessionalExperience::query()->where('professionalExperienceId', '=', $id)->first();
                return view('professionalExperience.professional_experience_action_buttons',
                    ['experience' => $experience]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

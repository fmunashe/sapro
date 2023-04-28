<?php

namespace App\Http\Livewire\SoftwareExperience;

use App\Enums\UserTypeEnum;
use App\Models\SoftwareExperience;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SoftwareExperienceTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return SoftwareExperience::query()
                ->with('user')
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'software_experiences.saproId');
        }
        return SoftwareExperience::query()->with('user')
            ->leftJoin('users', 'users.saproId', '=', 'software_experiences.saproId');

    }

    public function columns()
    {
        return [
            Column::name('software_experiences.saproId')
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

            Column::name('softwareExperience')
                ->searchable()
                ->filterable()
                ->label(trans('Software Experience')),

            Column::name('level')
                ->searchable()
                ->filterable()
                ->label(trans('Level')),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label(trans('Approved')),

            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label(trans('Approved By')),

            Column::callback(['softwareExperienceId'], function ($id) {
                $experience = SoftwareExperience::query()->where('softwareExperienceId', '=', $id)->first();
                return view('softwareExperience.software_experience_action_buttons',
                    ['experience' => $experience]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

<?php

namespace App\Http\Livewire\FirmExperience;

use App\Enums\UserTypeEnum;
use App\Models\FirmExperience;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class FirmExperienceTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return FirmExperience::query()
                ->with('user')
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'firm_experiences.saproId');
        }
        return FirmExperience::query()->with('user')
            ->leftJoin('users', 'users.saproId', '=', 'firm_experiences.saproId');

    }

    public function columns()
    {
        return [
            Column::name('firm_experiences.saproId')
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
            DateColumn::name('startPeriod')
                ->searchable()
                ->filterable()
                ->label(trans('Start Date')),
            DateColumn::name('endPeriod')
                ->searchable()
                ->filterable()
                ->label(trans('End Date')),


            Column::name('level')
                ->searchable()
                ->filterable()
                ->label(trans('Level')),

            Column::name('company')
                ->searchable()
                ->filterable()
                ->label(trans('Company')),

            Column::name('country')
                ->searchable()
                ->filterable()
                ->label(trans('Country')),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label(trans('Approved')),

            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label(trans('Approved By')),

            Column::callback(['firmExperienceId'], function ($id) {
                $experience = FirmExperience::query()->where('firmExperienceId', '=', $id)->first();
                return view('firmExperience.firm_experience_action_buttons',
                    ['experience' => $experience]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

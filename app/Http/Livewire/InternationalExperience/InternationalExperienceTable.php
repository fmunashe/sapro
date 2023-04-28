<?php

namespace App\Http\Livewire\InternationalExperience;

use App\Enums\UserTypeEnum;
use App\Models\InternationalExperience;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class InternationalExperienceTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return InternationalExperience::query()
                ->with('user')
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'international_experiences.saproId');
        }
        return InternationalExperience::query()->with('user')
            ->leftJoin('users', 'users.saproId', '=', 'international_experiences.saproId');

    }

    public function columns()
    {
        return [
            Column::name('international_experiences.saproId')
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

            Column::name('country')
                ->searchable()
                ->filterable()
                ->label(trans('Country')),

        Column::name('city')
                ->searchable()
                ->filterable()
                ->label(trans('City')),
            Column::name('sector')
                ->searchable()
                ->filterable()
                ->label(trans('Sector')),

            DateColumn::name('startPeriod')
                ->searchable()
                ->filterable()
                ->label(trans('Start Period')),

            DateColumn::name('endPeriod')
                ->searchable()
                ->filterable()
                ->label(trans('End Period')),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label(trans('Approved')),

            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label(trans('Approved By')),

            Column::callback(['internationalExperienceId'], function ($id) {
                $experience = InternationalExperience::query()->where('internationalExperienceId', '=', $id)->first();
                return view('internationalExperience.international_experience_action_buttons',
                    ['experience' => $experience]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

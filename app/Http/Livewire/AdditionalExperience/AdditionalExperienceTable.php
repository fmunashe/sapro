<?php

namespace App\Http\Livewire\AdditionalExperience;

use App\Enums\UserTypeEnum;
use App\Models\Achievement;
use App\Models\AdditionalExperience;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AdditionalExperienceTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return AdditionalExperience::query()
                ->with('user')
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'additional_experiences.saproId');
        }
        return AdditionalExperience::query()->with('user')
            ->leftJoin('users', 'users.saproId', '=', 'additional_experiences.saproId');

    }

    public function columns()
    {
        return [
            Column::name('additional_experiences.saproId')
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

            Column::name('additionalExperience')
                ->searchable()
                ->filterable()
                ->label(trans('Experience')),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label(trans('Approved')),

            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label(trans('Approved By')),

            Column::callback(['additionalExperienceId'], function ($id) {
                $experience = AdditionalExperience::query()->where('additionalExperienceId', '=', $id)->first();
                return view('additionalExperience.additional_experience_action_buttons',
                    ['experience' => $experience]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

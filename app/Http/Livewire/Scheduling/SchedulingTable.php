<?php

namespace App\Http\Livewire\Scheduling;

use App\Enums\UserTypeEnum;
use App\Models\Scheduling;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SchedulingTable extends LivewireDatatable
{
    public $hideable = "select";
    public $model = Scheduling::class;
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return Scheduling::query()->with('user')
                ->where('schedulings.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'schedulings.saproId');
        }
        return Scheduling::query()->with('user')
            ->leftJoin('users', 'users.saproId', '=', 'schedulings.saproId');
    }

    public function columns()
    {
        return [
            Column::name('saproId')
                ->searchable()
                ->filterable()
                ->label(trans('Sapro ID')),

            Column::name('user.name')
                ->searchable()
                ->filterable()
                ->label(trans('Name')),
            Column::name('user.surname')
                ->searchable()
                ->filterable()
                ->label(trans('Surname')),

            Column::name('user.email')
                ->searchable()
                ->filterable()
                ->label(trans('Email')),

            DateColumn::name('year')
                ->searchable()
                ->filterable()
                ->label(trans('Year')),

            Column::name('bsHostFirmCode')
                ->searchable()
                ->filterable()
                ->label(trans('BS Host Firm Code')),

            DateColumn::name('bsStartDate')
                ->searchable()
                ->filterable()
                ->label(trans('BS Start Date')),

            DateColumn::name('bsEndDate')
                ->searchable()
                ->filterable()
                ->label(trans('BS Start Date')),

            Column::name('postBsHostFirmCode')
                ->searchable()
                ->filterable()
                ->label(trans('Post BS Host Firm Code')),

            DateColumn::name('postBsStartDate')
                ->searchable()
                ->filterable()
                ->label(trans('Post BS Start Date')),

            DateColumn::name('postBsEndDate')
                ->searchable()
                ->filterable()
                ->label(trans('Post BS End Date')),

            Column::callback(['schedulingId'], function ($id) {
                $schedule = Scheduling::query()->where('schedulingId', '=', $id)->first();
                return view('scheduling.scheduling_action_buttons',
                    ['schedule' => $schedule]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

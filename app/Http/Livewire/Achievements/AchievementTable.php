<?php

namespace App\Http\Livewire\Achievements;

use App\Enums\UserTypeEnum;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Models\Achievement;

class AchievementTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return Achievement::query()
                ->with('user')
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'achievements.saproId');
        }
        return Achievement::query()->with('user')
            ->leftJoin('users', 'users.saproId', '=', 'achievements.saproId');

    }

    public function columns()
    {
        return [
            Column::name('achievements.saproId')
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

            Column::name('achievement')
                ->searchable()
                ->filterable()
                ->label(trans('Achievement')),

            DateColumn::name('year')
                ->searchable()
                ->filterable()
                ->label(trans('Year')),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label(trans('Approved')),

            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label(trans('Approved By')),

            Column::callback(['achievementId'], function ($id) {
                $achievement = Achievement::query()->where('achievementId', '=', $id)->first();
                return view('achievements.achievement_action_buttons',
                    ['achievement' => $achievement]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

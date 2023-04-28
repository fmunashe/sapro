<?php

namespace App\Http\Livewire\Industries;

use App\Enums\UserTypeEnum;
use App\Models\Industry;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class IndustryTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return Industry::query()
                ->with('user')
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'industries.saproId');
        }
        return Industry::query()->with('user')
            ->leftJoin('users', 'users.saproId', '=', 'industries.saproId');

    }

    public function columns()
    {
        return [
            Column::name('industries.saproId')
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

            Column::name('industry')
                ->searchable()
                ->filterable()
                ->label(trans('Industry')),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label(trans('Approved')),

            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label(trans('Approved By')),

            Column::callback(['industryId'], function ($id) {
                $industry = Industry::query()->where('industryId', '=', $id)->first();
                return view('industries.industry_action_buttons',
                    ['industry' => $industry]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

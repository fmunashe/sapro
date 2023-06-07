<?php

namespace App\Http\Livewire\Industries;

use App\Enums\UserTypeEnum;
use App\Models\Industry;
use App\Models\IndustryCategory;
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
                ->with(['industryCategory', 'user'])
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->join('industry_categories', 'industry_categories.id', '=', 'industries.industry_category_id')
                ->leftJoin('users', 'users.saproId', '=', 'industries.saproId');
        }
        return Industry::query()->with(['industryCategory', 'user'])
            ->join('industry_categories', 'industry_categories.id', '=', 'industries.industry_category_id')
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

            Column::name('industry_categories.name')
                ->searchable()
                ->filterable($this->industryCategories)
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
                $industryCategories = IndustryCategory::all();
                return view('industries.industry_action_buttons', compact('industry', 'industryCategories'));
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }

    public function getIndustryCategoriesProperty()
    {
        return IndustryCategory::query()->pluck('name');
    }
}

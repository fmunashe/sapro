<?php

namespace App\Http\Livewire\IndustryCategory;

use App\Models\IndustryCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class IndustryCategoryIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return IndustryCategory::query()->with('sectorCategories');

    }

    public function columns()
    {
        return [
            Column::name('id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('name')
                ->searchable()
                ->filterable()
                ->label(trans('Industry Name')),

            Column::callback(['id'], function ($id) {
                $industryCategory = IndustryCategory::query()->where('id', '=', $id)->first();
                return view('industryCategories.industry_category_action_buttons',
                    ['industryCategory' => $industryCategory]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

<?php

namespace App\Http\Livewire\AdditionalExperienceCategories;

use App\Models\AdditionalExperienceCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AdditionalExperienceCategoriesIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return AdditionalExperienceCategory::query();
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('additionalExperienceCategory')
                ->searchable()
                ->filterable()
                ->label(trans('Additional Experience Category')),

            Column::callback(['id'], function ($id) {
                $category = AdditionalExperienceCategory::query()->where('id', '=', $id)->first();
                return view('additionalExperienceCategory.category_action_buttons',
                    ['category' => $category]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

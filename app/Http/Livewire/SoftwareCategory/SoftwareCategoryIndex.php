<?php

namespace App\Http\Livewire\SoftwareCategory;

use App\Models\SoftwareCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SoftwareCategoryIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return SoftwareCategory::query();
    }

    public function columns(): array
    {
        return [
            Column::name('id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('softwareCategory')
                ->searchable()
                ->filterable()
                ->label(trans('Software Category')),

            Column::callback(['id'], function ($id) {
                $category = SoftwareCategory::query()->where('id', '=', $id)->first();
                return view('softwareCategories.category_action_buttons', compact('category'));
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

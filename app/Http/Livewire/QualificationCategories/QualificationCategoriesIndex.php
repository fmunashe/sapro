<?php

namespace App\Http\Livewire\QualificationCategories;

use App\Models\QualificationCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class QualificationCategoriesIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return QualificationCategory::query();
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('qualification')
                ->searchable()
                ->filterable()
                ->label(trans('Qualification')),

            Column::name('group')
                ->searchable()
                ->filterable()
                ->label(trans('Group')),
            Column::name('comments')
                ->searchable()
                ->filterable()
                ->label(trans('Comments')),

            Column::callback(['id'], function ($id) {
                $category = QualificationCategory::query()->where('id', '=', $id)->first();
                return view('qualificationCategories.category_action_buttons',
                    ['category' => $category]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

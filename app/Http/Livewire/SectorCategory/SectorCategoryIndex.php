<?php

namespace App\Http\Livewire\SectorCategory;

use App\Models\IndustryCategory;
use App\Models\SectorCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SectorCategoryIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return SectorCategory::query()->with('industryCategory')
            ->join('industry_categories', 'industry_categories.id', '=', 'sector_categories.industry_category_id');

    }

    public function columns()
    {
        return [
            Column::name('sector_categories.id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('industry_categories.name')
                ->searchable()
                ->filterable($this->industryCategories)
                ->label(trans('Industry Name')),

            Column::name('sector_categories.name')
                ->searchable()
                ->filterable()
                ->label(trans('Sector Name')),

            Column::callback(['sector_categories.id'], function ($id) {
                $sectorCategory = SectorCategory::query()->where('id', '=', $id)->first();
                $industryCategories = IndustryCategory::all();
                return view('sectorCategories.sector_category_action_buttons', compact('sectorCategory', 'industryCategories'));
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }

    public function getIndustryCategoriesProperty(): \Illuminate\Support\Collection
    {
        return IndustryCategory::query()->pluck('name');
    }
}

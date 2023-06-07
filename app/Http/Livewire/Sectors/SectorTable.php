<?php

namespace App\Http\Livewire\Sectors;

use App\Enums\UserTypeEnum;
use App\Models\Sector;
use App\Models\SectorCategory;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SectorTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return Sector::query()->with(['sectorCategories', 'user'])
                ->where('sectors.saproId', '=', auth()->user()->saproId)
                ->join('sector_categories', 'sector_categories.id', '=', 'sectors.sector_category_id')
                ->leftJoin('users', 'users.saproId', '=', 'sectors.saproId');
        }
        return Sector::query()->with(['sectorCategories', 'user'])
            ->join('sector_categories', 'sector_categories.id', '=', 'sectors.sector_category_id')
            ->leftJoin('users', 'users.saproId', '=', 'sectors.saproId');
    }

    public function columns()
    {
        return [
            Column::name('saproId')
                ->searchable()
                ->filterable()
                ->label('Sapro ID'),

            Column::name('users.name')
                ->searchable()
                ->filterable()
                ->label('Name'),
            Column::name('users.surname')
                ->searchable()
                ->filterable()
                ->label('Surname'),
            Column::name('users.email')
                ->searchable()
                ->filterable()
                ->label('Email'),
            Column::name('sector_categories.name')
                ->searchable()
                ->filterable($this->sectors)
                ->label('Sector'),
            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label('Approved'),
            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label('Approved By'),

            Column::callback(['sectorId'], function ($id) {
                $sector = Sector::query()->where('sectorId', '=', $id)->first();
                $sectorCategories = SectorCategory::all();
                return view('sectors.sector_action_buttons', compact('sectorCategories', 'sector'));
            })
                ->unsortable()
                ->excludeFromExport()
        ];
    }

    public function getSectorsProperty()
    {
        return SectorCategory::query()->pluck('name');
    }
}

<?php

namespace App\Http\Livewire\Sectors;

use App\Enums\UserTypeEnum;
use App\Models\Sector;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SectorTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable =true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return Sector::query()->with('user')
                ->where('sectors.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'sectors.saproId');
        }
        return Sector::query()->with('user')
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
            Column::name('sector')
                ->searchable()
                ->filterable()
                ->label('Sector'),
            Column::name('sectorCategory')
                ->searchable()
                ->filterable()
                ->label('Sector Category'),
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
                return view('sectors.sector_action_buttons',
                    ['sector' => $sector]);
            })
                ->unsortable()
            ->excludeFromExport()
        ];
    }
}

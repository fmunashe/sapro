<?php

namespace App\Http\Livewire\ClientRevenue;

use App\Enums\UserTypeEnum;
use App\Models\ClientRevenue;
use App\Models\SectorCategory;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ClientRevenueTable extends LivewireDatatable
{
    public $hideable = "select";
    public $perPage = 5;
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return ClientRevenue::query()->with(['user', 'auditedWork', 'sectorCategory'])
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->join('sector_categories', 'sector_categories.id', '=', 'client_revenues.sector_category_id')
                ->leftJoin('users', 'users.saproId', '=', 'client_revenues.saproId');
        }
        return ClientRevenue::query()->with(['user', 'auditedWork', 'sectorCategory'])
            ->join('sector_categories', 'sector_categories.id', '=', 'client_revenues.sector_category_id')
            ->leftJoin('users', 'users.saproId', '=', 'client_revenues.saproId');
    }

    public function columns()
    {
        return [
            Column::name('saproId')
                ->searchable()
                ->filterable()
                ->label('Sapro ID'),
            Column::name('user.name')
                ->searchable()
                ->filterable()
                ->label('Name'),
            Column::name('user.surname')
                ->searchable()
                ->filterable()
                ->label('Surname'),
            Column::name('user.email')
                ->searchable()
                ->filterable()
                ->label('Email'),

            Column::name('mainClient')
                ->searchable()
                ->filterable()
                ->label('Main Client'),
            Column::name('revenue')
                ->searchable()
                ->filterable()
                ->view('clientRevenue.formatted_revenue')
                ->label('Revenue'),

            Column::name('sector_categories.name')
                ->searchable()
                ->filterable($this->sectorCategories)
                ->label('Sector'),

            Column::name('timeOnClient')
                ->searchable()
                ->filterable()
                ->label('Time On Client'),

            Column::name('auditedWork.auditWorkPerformed')
                ->filterable()
                ->searchable()
                ->view('clientRevenue.work')
                ->label('Audit Work Performed'),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label('Approved'),
            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label('Approved By'),
            Column::callback(['clientRevenueId'], function ($id) {
                $revenue = ClientRevenue::query()->where('clientRevenueId', '=', $id)->first();
                $sectorCategories = SectorCategory::all();
                return view('clientRevenue.revenue_action_buttons', compact('sectorCategories', 'revenue'));
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }

    public function getSectorCategoriesProperty(): \Illuminate\Support\Collection
    {
        return SectorCategory::query()->pluck('name');
    }
}

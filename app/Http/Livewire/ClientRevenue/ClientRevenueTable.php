<?php

namespace App\Http\Livewire\ClientRevenue;

use App\Enums\UserTypeEnum;
use App\Models\ClientRevenue;
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
            return ClientRevenue::query()->with(['user', 'auditedWork'])
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'client_revenues.saproId');
        }
        return ClientRevenue::query()->with(['user'])
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

            Column::name('sector')
                ->searchable()
                ->filterable()
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
                return view('clientRevenue.revenue_action_buttons',
                    ['revenue' => $revenue]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

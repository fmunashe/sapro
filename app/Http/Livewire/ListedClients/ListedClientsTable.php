<?php

namespace App\Http\Livewire\ListedClients;

use App\Enums\UserTypeEnum;
use App\Models\ListedClient;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ListedClientsTable extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        if (auth()->user()->type == UserTypeEnum::USER) {
            return ListedClient::query()
                ->with('user')
                ->where('users.saproId', '=', auth()->user()->saproId)
                ->leftJoin('users', 'users.saproId', '=', 'listed_clients.saproId');
        }
        return ListedClient::query()->with('user')
            ->leftJoin('users', 'users.saproId', '=', 'listed_clients.saproId');

    }

    public function columns()
    {
        return [
            Column::name('listed_clients.saproId')
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

            Column::name('listedClient')
                ->searchable()
                ->filterable()
                ->label(trans('Listed Client')),
            Column::name('sector')
                ->searchable()
                ->filterable()
                ->label(trans('Sector')),

            BooleanColumn::name('approved')
                ->searchable()
                ->filterable()
                ->label(trans('Approved')),

            Column::name('approvedBy')
                ->searchable()
                ->filterable()
                ->label(trans('Approved By')),

            Column::callback(['listedClientId'], function ($id) {
                $listedClient = ListedClient::query()->where('listedClientId', '=', $id)->first();
                return view('listedClients.listed_clients_action_buttons',
                    ['listedClient' => $listedClient]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

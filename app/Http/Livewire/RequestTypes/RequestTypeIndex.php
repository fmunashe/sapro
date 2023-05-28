<?php

namespace App\Http\Livewire\RequestTypes;

use App\Models\RequestType;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class RequestTypeIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return RequestType::query();
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('requestType')
                ->searchable()
                ->filterable()
                ->label(trans('Request Type')),

            Column::callback(['id'], function ($id) {
                $requestType = RequestType::query()->where('id', '=', $id)->first();
                return view('requestTypes.request_type_action_buttons',
                    ['requestType' => $requestType]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

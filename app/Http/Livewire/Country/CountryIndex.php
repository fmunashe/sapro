<?php

namespace App\Http\Livewire\Country;

use App\Models\Country;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CountryIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {
        return Country::query();
    }

    public function columns(): array
    {
        return [
            Column::name('id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('country')
                ->searchable()
                ->filterable()
                ->label(trans('Country')),

            Column::name('nationality')
                ->searchable()
                ->filterable()
                ->label(trans('Nationality')),

            Column::callback(['id'], function ($id) {
                $country = Country::query()->where('id', '=', $id)->first();
                return view('countries.country_action_buttons',
                    ['country' => $country]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}

<?php

namespace App\Http\Livewire\Office;

use App\Models\Country;
use App\Models\Office;
use App\Models\Province;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class OfficeIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {

        return Office::query()->with('country')
            ->join('countries', 'countries.id', '=', 'offices.country_id');

    }

    public function columns(): array
    {
        return [
            Column::name('offices.id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('countries.country')
                ->searchable()
                ->filterable($this->countries)
                ->label(trans('Country')),

            Column::name('offices.office')
                ->searchable()
                ->filterable()
                ->label(trans('Office')),

            Column::callback(['offices.id'], function ($id) {
                $office = Office::query()->where('id', '=', $id)->first();
                $countries = Country::all();
                return view('offices.office_action_buttons', compact('office', 'countries'));
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }

    public function getCountriesProperty(): \Illuminate\Support\Collection
    {
        return Country::query()->pluck('country');
    }
}

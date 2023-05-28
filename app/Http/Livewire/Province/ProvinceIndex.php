<?php

namespace App\Http\Livewire\Province;

use App\Models\Country;
use App\Models\Province;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProvinceIndex extends LivewireDatatable
{
    public $hideable = "select";
    public $exportable = true;

    public function builder()
    {

        return Province::query()->with('country')
            ->join('countries', 'countries.id', '=', 'provinces.country_id');

    }

    public function columns()
    {
        return [
            Column::name('provinces.id')
                ->searchable()
                ->filterable()
                ->label(trans('ID')),

            Column::name('countries.country')
                ->searchable()
                ->filterable($this->countries)
                ->label(trans('Country')),

            Column::name('provinces.province')
                ->searchable()
                ->filterable()
                ->label(trans('Province')),

            Column::callback(['provinces.id'], function ($id) {
                $province = Province::query()->where('id', '=', $id)->first();
                $countries = Country::all();
                return view('provinces.province_action_buttons', compact('province', 'countries'));
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

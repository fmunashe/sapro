<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use App\Models\Province;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

class CityController extends Controller
{

    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', City::class);
        $cities = City::query()->paginate(10);
        $provinces = Province::all();
        return view('cities.index', compact('cities', 'provinces'));
    }


    public function create()
    {
        //
    }


    public function store(StoreCityRequest $request)
    {
        $this->authorize('create', City::class);
        $data = $request->all();

        City::query()->create($data);
        toast('City Successfully Created', 'success');
        return to_route('cities.index');
    }


    public function show(City $city): City
    {
        return $city;
    }


    public function edit(City $city): City
    {
        return $city;
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdateCityRequest $request, City $city): RedirectResponse
    {
        $this->authorize('update', $city);
        $data = $request->all();
        $city->update([
            'city' => $data['city'],
            'province_id' => $data['province_id'],
        ]);


        toast('City Successfully Updated', 'success');
        return to_route('cities.index');
    }


    /**
     * @throws AuthorizationException
     */
    public function destroy(City $city): RedirectResponse
    {
        $this->authorize('delete', $city);
        $city->delete();
        toast('City Successfully Removed', 'success');
        return to_route('cities.index');
    }
}

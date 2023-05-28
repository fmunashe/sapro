<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProvinceRequest;
use App\Http\Requests\UpdateProvinceRequest;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

class ProvinceController extends Controller
{

    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', Province::class);
        $provinces = Province::query()->paginate(10);
        $countries = Country::all();
        return view('provinces.index', compact('provinces','countries'));
    }


    public function create()
    {
        //
    }


    /**
     * @throws AuthorizationException
     */
    public function store(StoreProvinceRequest $request): RedirectResponse
    {
        $this->authorize('create', Province::class);
        $data = $request->all();

        Province::query()->create($data);
        toast('Province Successfully Created', 'success');
        return to_route('provinces.index');
    }


    public function show(Province $province): Province
    {
        return $province;
    }


    public function edit(Province $province): Province
    {
        return $province;
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdateProvinceRequest $request, Province $province): RedirectResponse
    {
        $this->authorize('update', $province);
        $data = $request->all();
        $province->update([
            'province' => $data['province'],
            'country_id' => $data['country_id'],
        ]);


        toast('Province Successfully Updated', 'success');
        return to_route('provinces.index');
    }


    /**
     * @throws AuthorizationException
     */
    public function destroy(Province $province): RedirectResponse
    {
        $this->authorize('delete', $province);
        $province->delete();
        toast('Province Successfully Removed', 'success');
        return to_route('provinces.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

class CountryController extends Controller
{

    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', Country::class);
        $countries = Country::query()->paginate(10);
        return view('countries.index', compact('countries'));
    }


    public function create()
    {
        //
    }


    /**
     * @throws AuthorizationException
     */
    public function store(StoreCountryRequest $request): RedirectResponse
    {
        $this->authorize('create', Country::class);
        $data = $request->all();

        Country::query()->create($data);
        toast('Country Successfully Created', 'success');
        return to_route('countries.index');
    }


    public function show(Country $country): Country
    {
        return $country;
    }


    public function edit(Country $country): Country
    {
        return $country;
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdateCountryRequest $request, Country $country): RedirectResponse
    {
        $this->authorize('update', $country);
        $data = $request->all();
        $country->update([
            'country' => $data['country'],
            'nationality' => $data['nationality'],
        ]);


        toast('Country Successfully Updated', 'success');
        return to_route('countries.index');
    }

    /**
     *
     * @throws AuthorizationException
     */
    public function destroy(Country $country): RedirectResponse
    {
        $this->authorize('delete', $country);
        $country->delete();
        toast('Country Successfully Removed', 'success');
        return to_route('countries.index');
    }
}

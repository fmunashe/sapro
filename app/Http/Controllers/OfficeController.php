<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;
use App\Models\Country;
use App\Models\Office;
use Illuminate\Auth\Access\AuthorizationException;

class OfficeController extends Controller
{

    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', Office::class);
        $offices = Office::query()->paginate(10);
        $countries = Country::all();
        return view('offices.index', compact('offices', 'countries'));
    }


    public function create()
    {
        //
    }


    /**
     * @throws AuthorizationException
     */
    public function store(StoreOfficeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('create', Office::class);
        $data = $request->all();

        Office::query()->create($data);
        toast('Office Successfully Created', 'success');
        return to_route('offices.index');
    }


    public function show(Office $office): Office
    {
        return $office;
    }


    public function edit(Office $office): Office
    {
        return $office;
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdateOfficeRequest $request, Office $office): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $office);
        $data = $request->all();
        $office->update([
            'office' => $data['office'],
            'country_id' => $data['country_id'],
        ]);


        toast('Office Successfully Updated', 'success');
        return to_route('offices.index');
    }


    /**
     * @throws AuthorizationException
     */
    public function destroy(Office $office): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $office);
        $office->delete();
        toast('Office Successfully Removed', 'success');
        return to_route('offices.index');
    }
}

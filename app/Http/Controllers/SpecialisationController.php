<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecialisationRequest;
use App\Http\Requests\UpdateSpecialisationRequest;
use App\Models\SeniorityLevel;
use App\Models\Specialisation;
use RealRashid\SweetAlert\Facades\Alert;

class SpecialisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Specialisation::class);
        $specialisations = Specialisation::query()->paginate(10);
        return view('specialisation.index', compact('specialisations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecialisationRequest $request)
    {
        $this->authorize('create', Specialisation::class);
        $data = $request->all();

        Specialisation::query()->create($data);
        toast('Specialisation Successfully Created', 'success');
        return to_route('specialisation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialisation $specialisation)
    {
        return $specialisation;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialisation $specialisation)
    {
        return $specialisation;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecialisationRequest $request, Specialisation $specialisation)
    {
        $this->authorize('update', $specialisation);
        $data = $request->all();
        $specialisation->update([
            'specialisationCode' => $data['specialisationCode'],
            'specialisationDescription' => $data['specialisationDescription'],
        ]);

        toast('Specialisation Successfully Updated', 'success');
        return to_route('specialisation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialisation $specialisation)
    {
        $this->authorize('delete', $specialisation);
        $specialisation->delete();
        toast('Specialisation Successfully Removed', 'success');
        return to_route('specialisation.index');
    }
}

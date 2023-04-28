<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeniorityLevelRequest;
use App\Http\Requests\UpdateSeniorityLevelRequest;
use App\Models\SeniorityLevel;
use RealRashid\SweetAlert\Facades\Alert;

class SeniorityLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', SeniorityLevel::class);
        $levels = SeniorityLevel::query()->paginate(10);
        return view('seniorityLevels.index', compact('levels'));
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
    public function store(StoreSeniorityLevelRequest $request)
    {
        $this->authorize('create', SeniorityLevel::class);
        $data = $request->all();

        SeniorityLevel::query()->create($data);
        toast('Seniority Level Successfully Created', 'success');
        return to_route('seniority-levels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SeniorityLevel $seniorityLevel)
    {
        return $seniorityLevel;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeniorityLevel $seniorityLevel)
    {
        return $seniorityLevel;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeniorityLevelRequest $request, SeniorityLevel $seniorityLevel)
    {
        $this->authorize('update', $seniorityLevel);
        $data = $request->all();
        $seniorityLevel->update([
            'seniorityLevelCode' => $data['seniorityLevelCode'],
            'seniorityLevelDescription' => $data['seniorityLevelDescription'],
        ]);


        toast('Seniority Level Successfully Updated', 'success');
        return to_route('seniority-levels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeniorityLevel $seniorityLevel)
    {
        $this->authorize('delete', $seniorityLevel);
        $seniorityLevel->delete();
        toast('Seniority Level Successfully Removed', 'success');
        return to_route('seniority-levels.index');
    }
}

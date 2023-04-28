<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectorRequest;
use App\Http\Requests\UpdateSectorRequest;
use App\Models\Sector;
use RealRashid\SweetAlert\Facades\Alert;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Sector::class);
        $sectors = Sector::query()->paginate(10);
        return view('sectors.index', compact('sectors'));
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
    public function store(StoreSectorRequest $request)
    {
        $this->authorize('create', Sector::class);
        $data = $request->all();
        Sector::query()->create($data);
        toast('Sector Successfully Created', 'success');
        return to_route('sectors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sector $sector)
    {
        return $sector;
    }

    public function approveSector(Sector $sector)
    {
        $this->authorize('approveSector', $sector);
        if ($sector->approved) {
            Alert::error('', 'This sector entry was previously approved by ' . $sector->approvedBy)->autoClose(false);
            return to_route('sectors.index');
        }
        $sector->approved = true;
        $sector->approvedBy = auth()->user()->email;
        $sector->save();
        toast('Sector Successfully Approved', 'success');
        return to_route('sectors.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sector $sector)
    {
        return $sector;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectorRequest $request, Sector $sector)
    {
        $this->authorize('update', $sector);
        $data = $request->all();
        $sector->update([
            'saproId' => $data['saproId'],
            'sector' => $data['sector'],
            'sectorCategory' => $data['sectorCategory'],
        ]);
        toast('Sector Successfully Updated', 'success');
        return to_route('sectors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        $this->authorize('delete', $sector);
        $sector->delete();
        toast('Sector Successfully Removed', 'success');
        return to_route('sectors.index');
    }
}

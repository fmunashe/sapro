<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHostFirmRequest;
use App\Http\Requests\UpdateHostFirmRequest;
use App\Models\HostFirm;
use RealRashid\SweetAlert\Facades\Alert;

class HostFirmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', HostFirm::class);
        $hostFirms = HostFirm::query()->paginate(10);
        return view('hostFirms.index', compact('hostFirms'));
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
    public function store(StoreHostFirmRequest $request)
    {
        $this->authorize('create', HostFirm::class);
        $data = $request->all();
        HostFirm::query()->create($data);
        Alert::success('', 'Host Firm Successfully Saved');
        return to_route('host-firms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HostFirm $hostFirm)
    {
        return $hostFirm;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HostFirm $hostFirm)
    {
        return $hostFirm;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHostFirmRequest $request, HostFirm $hostFirm)
    {
        $this->authorize('update', $hostFirm);
        $data = $request->all();
        $hostFirm->update([
            'saproId' => $data['saproId'],
            'hostFirmCode' => $data['hostFirmCode'],
            'hostFirmName' => $data['hostFirmName'],
        ]);
        Alert::success('', 'Host Firm Successfully Updated');
        return to_route('host-firms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HostFirm $hostFirm)
    {
        $this->authorize('delete', $hostFirm);
        $hostFirm->delete();
        Alert::success('', 'Host Firm Successfully Removed');
        return to_route('host-firms.index');
    }
}

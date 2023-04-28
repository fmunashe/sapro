<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFirstTimeAuditClientRequest;
use App\Http\Requests\UpdateFirstTimeAuditClientRequest;
use App\Models\FirstTimeAuditClient;
use RealRashid\SweetAlert\Facades\Alert;

class FirstTimeAuditClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', FirstTimeAuditClient::class);
        $auditClients = FirstTimeAuditClient::query()->paginate(10);
        return view('firstTimeAuditClients.index', compact('auditClients'));
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
    public function store(StoreFirstTimeAuditClientRequest $request)
    {
        $this->authorize('create', FirstTimeAuditClient::class);
        $data = $request->all();
        FirstTimeAuditClient::query()->create($data);
        Alert::success('', 'First Time Audit Client Successfully Saved');
        return redirect()->route('first-time-audit-clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FirstTimeAuditClient $firstTimeAuditClient)
    {
        return $firstTimeAuditClient;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FirstTimeAuditClient $firstTimeAuditClient)
    {
        return $firstTimeAuditClient;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFirstTimeAuditClientRequest $request, FirstTimeAuditClient $firstTimeAuditClient)
    {
        $this->authorize('update', $firstTimeAuditClient);
        $data = $request->all();
        $firstTimeAuditClient->update([
            'saproId' => $data['saproId'],
            'firstTimeAuditClient' => $data['firstTimeAuditClient'],
            'sector' => $data['sector'],
        ]);
        Alert::success('', 'First Time Audit Client Successfully Updated');
        return redirect()->route('first-time-audit-clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FirstTimeAuditClient $firstTimeAuditClient)
    {
        $this->authorize('delete', $firstTimeAuditClient);
        $firstTimeAuditClient->delete();
        Alert::success('', 'First Time Audit Client Successfully Removed');
        return redirect()->route('first-time-audit-clients.index');
    }
}

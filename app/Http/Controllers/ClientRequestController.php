<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequestRequest;
use App\Http\Requests\UpdateClientRequestRequest;
use App\Models\ClientRequest;

class ClientRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', ClientRequest::class);
        return view('clientRequests.index');
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
    public function store(StoreClientRequestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientRequest $clientRequest)
    {
        $this->authorize('view', $clientRequest);
        return view('clientRequests.detailed-request', compact('clientRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientRequest $clientRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequestRequest $request, ClientRequest $clientRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientRequest $clientRequest)
    {
        $this->authorize('delete', $clientRequest);
        $clientRequest->delete();
        toast('Client Request Successfully Removed', 'success');
        return to_route('client-requests.index');
    }
}

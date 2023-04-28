<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListedClientRequest;
use App\Http\Requests\UpdateListedClientRequest;
use App\Models\ListedClient;
use RealRashid\SweetAlert\Facades\Alert;

class ListedClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', ListedClient::class);
        $listedClients = ListedClient::query()->paginate(10);
        return view('listedClients.index', compact('listedClients'));
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
    public function store(StoreListedClientRequest $request)
    {
        $this->authorize('create', ListedClient::class);
        $data = $request->all();
        ListedClient::query()->create($data);
        Alert::success('', 'Listed Client Successfully Created');
        return to_route('listed-clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ListedClient $listedClient)
    {
        return $listedClient;
    }
    public function approveListedClient(ListedClient $listedClient)
    {
        $this->authorize('approveListedClient', $listedClient);
        if ($listedClient->approved) {
            Alert::error('', 'This listed client entry was previously approved by ' . $listedClient->approvedBy)->autoClose(false);
            return to_route('listed-clients.index');
        }
        $listedClient->approved = true;
        $listedClient->approvedBy = auth()->user()->email;
        $listedClient->save();
        toast('Listed Client Successfully Approved', 'success');
        return to_route('listed-clients.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListedClient $listedClient)
    {
        return $listedClient;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListedClientRequest $request, ListedClient $listedClient)
    {
        $this->authorize('update', $listedClient);
        $data = $request->all();
        $listedClient->update([
            'saproId' => $data['saproId'],
            'listedClient' => $data['listedClient'],
            'sector' => $data['sector'],
        ]);

        Alert::success('', 'Listed Client Successfully Updated');
        return to_route('listed-clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListedClient $listedClient)
    {
        $this->authorize('delete', $listedClient);
        $listedClient->delete();
        Alert::success('', 'Listed Client Successfully Removed');
        return to_route('listed-clients.index');
    }
}

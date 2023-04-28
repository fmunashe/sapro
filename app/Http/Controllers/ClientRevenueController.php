<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRevenueRequest;
use App\Http\Requests\UpdateClientRevenueRequest;
use App\Models\Achievement;
use App\Models\ClientRevenue;
use RealRashid\SweetAlert\Facades\Alert;

class ClientRevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', ClientRevenue::class);
        $revenues = ClientRevenue::query()->paginate(10);
        return view('clientRevenue.index', compact('revenues'));
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
    public function store(StoreClientRevenueRequest $request)
    {
        $this->authorize('create', ClientRevenue::class);
        $data = $request->all();
        ClientRevenue::query()->create($data);
        toast('Client Revenue Successfully Saved', 'success');
        return to_route('client-revenue.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientRevenue $clientRevenue)
    {
        return $clientRevenue;
    }

    public function approveClientRevenue(ClientRevenue $clientRevenue)
    {
        $this->authorize('approveClientRevenue', $clientRevenue);
        if ($clientRevenue->approved) {
            Alert::error('', 'This client revenue entry was previously approved by ' . $clientRevenue->approvedBy);
            return to_route('achievements.index');
        }
        $clientRevenue->approved = true;
        $clientRevenue->approvedBy = auth()->user()->email;
        $clientRevenue->save();
        toast('Client Revenue Successfully Approved', 'success');
        return to_route('client-revenue.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientRevenue $clientRevenue)
    {
        return $clientRevenue;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRevenueRequest $request, ClientRevenue $clientRevenue)
    {
        $this->authorize('update', $clientRevenue);
        $data = $request->all();
        $clientRevenue->update([
            'saproId' => $data['saproId'],
            'mainClient' => $data['mainClient'],
            'revenue' => $data['revenue'],
            'sector' => $data['sector'],
            'timeOnClient' => $data['timeOnClient'],
        ]);

        toast('Client Revenue Successfully Updated', 'success');
        return to_route('client-revenue.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientRevenue $clientRevenue)
    {
        $this->authorize('delete', $clientRevenue);
        $clientRevenue->delete();
        toast('Client Revenue Successfully Removed', 'success');
        return to_route('client-revenue.index');
    }
}

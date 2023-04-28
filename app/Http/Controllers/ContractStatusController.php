<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractStatusRequest;
use App\Http\Requests\UpdateContractStatusRequest;
use App\Models\ContractStatus;
use RealRashid\SweetAlert\Facades\Alert;

class ContractStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', ContractStatus::class);
        $contractStatus = ContractStatus::query()->paginate(10);
        return view('contractStatus.index', compact('contractStatus'));
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
    public function store(StoreContractStatusRequest $request)
    {
        $this->authorize('create', ContractStatus::class);
        $data = $request->all();
        ContractStatus::query()->create($data);
        toast('Contract Status Successfully Created', 'success');
        return to_route('contract-status.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContractStatus $contractStatus)
    {
        return $contractStatus;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContractStatus $contractStatus)
    {
        return $contractStatus;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractStatusRequest $request, ContractStatus $contractStatus)
    {
        $this->authorize('update', $contractStatus);
        $data = $request->all();
        $contractStatus->update([
            'contractStatusCode' => $data['contractStatusCode'],
            'contractStatusDescription' => $data['contractStatusDescription'],
        ]);

        toast('Contract Status Successfully Updated', 'success');
        return to_route('contract-status.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContractStatus $contractStatus)
    {
        $this->authorize('delete', $contractStatus);
        $contractStatus->delete();
        toast('Contract Status Successfully Removed', 'success');
        return to_route('contract-status.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestTypeRequest;
use App\Http\Requests\UpdateRequestTypeRequest;
use App\Models\AssignmentType;
use App\Models\RequestType;

class RequestTypeController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', RequestType::class);
        $requestTypes = RequestType::query()->paginate(10);
        return view('requestTypes.index', compact('requestTypes'));
    }

    public function create()
    {
        //
    }


    public function store(StoreRequestTypeRequest $request)
    {
        $this->authorize('create', RequestType::class);
        $data = $request->all();

        RequestType::query()->create($data);
        toast('Request Type Successfully Created', 'success');
        return to_route('request-types.index');
    }


    public function show(RequestType $requestType)
    {
        return $requestType;
    }

    public function edit(RequestType $requestType)
    {
        return $requestType;
    }


    public function update(UpdateRequestTypeRequest $request, RequestType $requestType)
    {
        $this->authorize('update', $requestType);
        $data = $request->all();
        $requestType->update([
            'requestType' => $data['requestType'],
        ]);


        toast('Request Type Successfully Updated', 'success');
        return to_route('request-types.index');
    }

    public function destroy(RequestType $requestType)
    {
        $this->authorize('delete', $requestType);
        $requestType->delete();
        toast('Request Type Successfully Removed', 'success');
        return to_route('request-types.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHostFirmConfigRequest;
use App\Http\Requests\UpdateHostFirmConfigRequest;
use App\Models\Country;
use App\Models\HostFirmConfig;
use Illuminate\Auth\Access\AuthorizationException;

class HostFirmConfigController extends Controller
{

    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', HostFirmConfig::class);
        $hostFirmConfigs = HostFirmConfig::query()->paginate(10);
        $countries = Country::all();
        return view('hostFirmConfigs.index', compact('hostFirmConfigs','countries'));
    }


    public function create()
    {
        //
    }


    /**
     * @throws AuthorizationException
     */
    public function store(StoreHostFirmConfigRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('create', HostFirmConfig::class);
        $data = $request->all();

        HostFirmConfig::query()->create($data);
        toast('Host Firm Successfully Created', 'success');
        return to_route('host-firm-configs.index');
    }


    public function show(HostFirmConfig $hostFirmConfig): HostFirmConfig
    {
        return $hostFirmConfig;
    }


    public function edit(HostFirmConfig $hostFirmConfig): HostFirmConfig
    {
        return $hostFirmConfig;
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdateHostFirmConfigRequest $request, HostFirmConfig $hostFirmConfig): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $hostFirmConfig);
        $data = $request->all();
        $hostFirmConfig->update([
            'hostFirm' => $data['hostFirm'],
            'code' => $data['code'],
            'country_id' => $data['country_id'],
        ]);


        toast('Host Firm Details Successfully Updated', 'success');
        return to_route('host-firm-configs.index');
    }


    /**
     * @throws AuthorizationException
     */
    public function destroy(HostFirmConfig $hostFirmConfig): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $hostFirmConfig);
        $hostFirmConfig->delete();
        toast('Host Firm Successfully Removed', 'success');
        return to_route('host-firm-configs.index');
    }
}

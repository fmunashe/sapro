<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\AssignmentType;
use App\Models\Company;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{

    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', Company::class);
        $companies = Company::query()->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * @throws AuthorizationException
     */
    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $this->authorize('create', Company::class);
        $data = $request->all();

        Company::query()->create($data);
        toast('Company Successfully Created', 'success');
        return to_route('companies.index');
    }


    public function show(Company $company): Company
    {
        return $company;
    }


    public function edit(Company $company): Company
    {
        return $company;
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $this->authorize('update', $company);
        $data = $request->all();
        $company->update([
            'company' => $data['company'],
        ]);


        toast('company Successfully Updated', 'success');
        return to_route('companies.index');
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Company $company): RedirectResponse
    {
        $this->authorize('delete', $company);
        $company->delete();
        toast('Company Successfully Removed', 'success');
        return to_route('companies.index');
    }
}

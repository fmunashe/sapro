<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Http\Requests\StoreCertificationsAndEducationRequest;
use App\Http\Requests\UpdateCertificationsAndEducationRequest;
use App\Models\CertificationsAndEducation;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class CertificationsAndEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', CertificationsAndEducation::class);
        $certifications = CertificationsAndEducation::query()->paginate(10);
        return view('certifications.index', compact('certifications'));
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
    public function store(StoreCertificationsAndEducationRequest $request)
    {
        $this->authorize('create', CertificationsAndEducation::class);
        $data = $request->all();
        if (isset($data['certificate'])) {
            $fileName = time() . '_' . $data['certificate']->getClientOriginalName();
            $filePath = $data['certificate']->storeAs('uploads', $fileName, 'public');
            $data['certificateName'] = $fileName;
            $data['certificatePath'] = public_path($filePath);
            unset($data['certificate']);
        }
        if (isset($data['certificateName'])) {
            if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
                $data['approved'] = true;
                $data['approvedBy'] = auth()->user()->email;
            }
        }

        CertificationsAndEducation::query()->create($data);

        toast('Education Entry Successfully Saved', 'success');
        return to_route('certifications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CertificationsAndEducation $certification)
    {
        return Response()->file(storage_path() . '/app/public/uploads/' . $certification->certificateName);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CertificationsAndEducation $certification)
    {
        return $certification;
    }

    public function approveCertificate(CertificationsAndEducation $certification)
    {
        $this->authorize('approveCertificate', $certification);
        if ($certification->approved) {
            Alert::error('', 'This certificate was previously approved by ' . $certification->approvedBy);
            return to_route('certifications.index');
        }
        $certification->approved = true;
        $certification->approvedBy = auth()->user()->email;
        $certification->save();
        toast('Certificate Successfully Approved', 'success');
        return to_route('certifications.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificationsAndEducationRequest $request, CertificationsAndEducation $certification)
    {
        $this->authorize('update', $certification);
        $data = $request->all();


        if (isset($data['certificate'])) {
            if (!empty($certification->certificateName)) {
                if (auth()->user()->type == UserTypeEnum::USER) {
                    Alert::error('', 'This certificate was previously approved by ' . $certification->approvedBy . " Please delete the current approved file and reupload a new one if you intend to use an updated version of your certificate ");
                    return to_route('certifications.index');
                }
                $file_path = storage_path() . '/app/public/uploads/' . $certification->certificateName;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
            }
            $fileName = time() . '_' . $data['certificate']->getClientOriginalName();
            $filePath = $data['certificate']->storeAs('uploads', $fileName, 'public');
            $data['certificateName'] = $fileName;
            $data['certificatePath'] = public_path($filePath);
            unset($data['certificate']);
        }

        if (isset($data['certificateName'])) {
            if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
                $data['approved'] = true;
                $data['approvedBy'] = auth()->user()->email;
            }
        }


        $certification->update($data);


        toast('Education Entry Successfully Updated', 'success');
        return to_route('certifications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CertificationsAndEducation $certification)
    {
        $this->authorize('delete', $certification);
        $file_path = storage_path() . '/app/public/uploads/' . $certification->certificateName;
        if (File::exists($file_path)) {
            unlink($file_path);
        }
        $certification->delete();
        toast('Education Entry Successfully Removed', 'success');
        return to_route('certifications.index');
    }
}

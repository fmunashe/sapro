<?php

namespace App\Http\Controllers;

use App\Models\ContractStatus;
use App\Models\SeniorityLevel;
use App\Models\Specialisation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;
use \Mpdf\Mpdf as mPDF;
use Mpdf\Output\Destination;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $seniorityLevels = SeniorityLevel::all();
        $specialisations = Specialisation::all();
        $contractStatus = ContractStatus::all();
        return view('users.index', compact('seniorityLevels', 'specialisations', 'contractStatus'));
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
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $data = $request->except(['password_confirmation']);
        $data['password'] = Hash::make($data['password']);
        User::query()->create($data);
        toast('User Profile Successfully Created', 'success');
        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $data = [
            'user' => $user
        ];
        $document = new mPDF([
            'mode' => 'utf-8',
            'format' => 'A3',
            'margin_top' => '0',
//            'padding_top' => '20',
            'margin_left' => '0',
            'margin_right' => '0',
            'margin-bottom' => '0',
        ]);
        $document->SetAutoPageBreak(true, 13);
        $document->setFooter('{PAGENO}');
//        $document->SetFooter('<div style="text-align:left"><img src="'.public_path('assets/images/sapro_cv_footer_image.png').'" height="70px" width="45%"></div> {PAGENO}');
////        $document->SetFooter('<div  style="text-align: left; border-style: none !important;">
//        <img src="'.public_path('assets/images/sapro_cv_footer_image.png').'" height="70px" width="45%">
//</div>');
        $document->WriteHTML(view('users.UsersProfile', $data));

        return $document->Output($user->name . '-' . $user->surname . '-cv.pdf', Destination::INLINE);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): User
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $user);
        $data = $request->except(['password_confirmation']);
        $data['password'] = $data['password'] ? Hash::make($data['password']) : $user->password;
        $user->update($data);

        toast('User Profile Successfully Updated', 'success');
        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        if (auth()->user()->id == $user->id) {
            Alert::error('', 'You cannot delete your own profile');
            return redirect()->route('users.index');
        }
        $user->delete();
        toast('User Profile Successfully Removed', 'success');
        return to_route('users.index');
    }

    public function generatePDF()
    {
        $users = User::all();
        $data = [
            'title' => 'Registered users as at ',
            'date' => date('d-m-Y'),
            'users' => $users
        ];
//        $pdf = new PDF();
//        $pdf->WriteHTML(view('users.allUsersReport',$data));
//        return $pdf->Output('sapro-registered-users.pdf', Destination::DOWNLOAD);
        $pdf = PDF::loadView('users.allUsersReport', $data);
//        $pdf->setPaper('L', 'landscape');
//        $password = auth()->user()->email;
//        $pdf->setEncryption($password, $password,[]);
//        $canvas = $pdf->getDomPDF()->getCanvas();
//        $height = $canvas->get_height();
//        $width = $canvas->get_width();
//        $canvas->set_opacity(.2,"Multiply");
//        $canvas->page_text($width/10, $height/2, 'Larabytes solutions', null, 60, array(0,0,0),2,2,-30);

        return $pdf->stream('sapro-registered-users.pdf');
    }
}

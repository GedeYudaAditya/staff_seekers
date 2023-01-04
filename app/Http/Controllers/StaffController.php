<?php

namespace App\Http\Controllers;

use App\Models\RequestStaff;
use App\Models\RequestVilla;
use App\Models\User;
use App\Models\Contract;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    //
    public function index()
    {
        return view('staff.pages.index', [
            'title' => 'Staff Home',
            'active' => 'staff.home'
        ]);
    }

    // public function find()
    // {
    //     $villas = User::where('role', 'villa')
    //         ->where('status', 'active')
    //         ->get();
    //     return view('staff.pages.findjob', [
    //         'title' => 'Find Job',
    //         'active' => 'staff.find-job',
    //         'villas' => $villas
    //     ]);
    // }

    public function desc(User $user)
    {
        $userRequest = RequestStaff::where('user_id', auth()->user()->id)->where('villa_id', $user->id)->first();

        $userRequest = $userRequest ? $userRequest->status : 'null';

        // dd($userRequest);

        return view('staff.pages.description', [
            'title' => 'Detail Villa',
            'active' => 'staff.find-job',
            'villa' => $user,
            'userRequest' => $userRequest
        ]);
    }

    public function manage()
    {
        $requestedJob = RequestStaff::where('user_id', auth()->user()->id)->count();
        $receivedJob = RequestVilla::where('staff_id', auth()->user()->id)->count();
        return view('staff.pages.manage', [
            'title' => 'Manage',
            'active' => 'staff.manage',
            'requestedJob' => $requestedJob,
            'receivedJob' => $receivedJob
        ]);
    }

    public function updateProfile(Request $request)
    {
        $role = [
            'name' => 'required',
            'phone' => 'required',
            'salary' => 'required',
            'bio' => 'required',
            'detailBio' => 'required',
            'address' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:2048',
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        ];

        try {

            if ($request->email != auth()->user()->email) {
                $role['email'] = 'required|unique:users,email';
            }

            if ($request->username != auth()->user()->username) {
                $role['username'] = 'required|unique:users,username';
            }

            if ($request->password != null) {
                $role['password'] = 'min:8|confirmed';
                $validateData['password'] = bcrypt($request->password);
            }

            $validateData = $request->validate($role);

            if ($request->hasFile('cv')) {
                Storage::delete('cv/' . auth()->user()->cv);

                $file = $request->file('cv');
                $filename = Str::random(10) . '_' . Str::slug($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

                $path = $file->storeAs('cv', $filename);

                $validateData['cv'] = $filename;
                $validateData['cv_path'] = $path;
            }

            if ($request->hasFile('image')) {
                Storage::delete('avatars/' . auth()->user()->image);

                $file = $request->file('image');
                $filename = Str::random(10) . '_' . Str::slug($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

                $path = $file->storeAs('avatars', $filename);

                $validateData['image'] = $filename;
                $validateData['image_path'] = $path;
            }


            DB::beginTransaction();

            $user = User::find(auth()->user()->id);

            $user->update($validateData);

            DB::commit();

            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function searchJob(Request $request)
    {
        if ($request->search == null) {
            $villas = User::where('role', 'villa')
                ->where('status', 'active')
                ->get();
        } else {
            $villas = User::where('role', 'villa')
                ->where(function (EloquentBuilder $query) {
                    $request = request();
                    return $query->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('villa_name', 'like', '%' . $request->search . '%')
                        ->orWhere('username', 'like', '%' . $request->search . '%')
                        ->orWhere('address', 'like', '%' . $request->search . '%')
                        ->orWhere('bio', 'like', '%' . $request->search . '%')
                        ->orWhere('detailBio', 'like', '%' . $request->search . '%');
                })
                ->where('status', 'active')
                ->get();

            // dd($villas);
        }

        return view('staff.pages.findjob', [
            'title' => 'Find Job',
            'active' => 'staff.find-job',
            'villas' => $villas
        ]);
    }

    public function requestJob(Request $request, User $user)
    {

        try {

            $data = [
                'user_id' => auth()->user()->id,
                'villa_id' => $user->id,
                'status' => 'pending',
            ];

            DB::beginTransaction();

            RequestStaff::create($data);

            DB::commit();

            return redirect()->back()->with('success', 'Request sent successfully');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function requestedJobList()
    {
        $requestedJobs = RequestStaff::where('user_id', auth()->user()->id)->get();
        return view('staff.pages.requestedjoblist', [
            'title' => 'Requested Job List',
            'active' => 'staff.requested-job-list',
            'jobs' => $requestedJobs
        ]);
    }

    public function cencelRequestedJob(RequestStaff $request)
    {
        try {
            $request = RequestStaff::find($request->id);
            $request->delete();

            return redirect()->back()->with('success', 'Request canceled successfully');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function receivedJobList()
    {
        $receivedJobs = RequestVilla::where('staff_id', auth()->user()->id)->get();
        return view('staff.pages.receivedjoblist', [
            'title' => 'Received Job List',
            'active' => 'staff.received-job-list',
            'jobs' => $receivedJobs
        ]);
    }

    public function acceptJob(RequestVilla $request)
    {
        // dd($request);
        try {
            $request = RequestVilla::find($request->id);
            $request->update([
                'status' => 'accepted'
            ]);

            return redirect()->back()->with('success', 'Job accepted successfully');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function rejectReceivedJob(RequestVilla $request)
    {
        try {
            $request = RequestVilla::find($request->id);
            $request->update([
                'status' => 'rejected'
            ]);

            return redirect()->back()->with('success', 'Job reject successfully');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function contractList()
    {
        $contracts = Contract::where('staff_id', auth()->user()->id)->get();
        return view('staff.pages.contractlist', [
            'title' => 'Contract List',
            'active' => 'staff.contract-list',
            'contracts' => $contracts
        ]);
    }

    public function acceptContract()
    {
        $contract = Contract::find(request()->id);
        // dd($contract);
        try {
            Contract::where('id', $contract->id)->update([
                'status' => 'berjalan'
            ]);

            return redirect()->back()->with('success', 'Contract accepted successfully');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function declineContract()
    {
        $contract = Contract::with('transaction')->find(request()->id);

        try {
            Contract::where('id', $contract->id)->update([
                'status' => 'batal'
            ]);

            return redirect()->back()->with('success', 'Contract declined successfully');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

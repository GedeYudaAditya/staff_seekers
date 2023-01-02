<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Announcement;
use App\Models\Contract;
use App\Models\RequestStaff;
use App\Models\RequestVilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\Builder;

class VillaController extends Controller
{
    //
    public function index()
    {
        return view('villa.pages.index', [
            'title' => 'Villa',
            'active' => 'villa'
        ]);
    }

    public function findStaff(Request $request)
    {
        // $staffs = User::where('role', 'staff')->get();
        // return view('villa.pages.findstaff', [
        //     'title' => 'Find Staff',
        //     'active' => 'villa.find-staff',
        //     'staffs' => $staffs
        // ]);

        if ($request->search == null) {
            $staff = User::where('role', 'staff')
                ->where('status', 'active')
                ->get();
        } else {
            $staff = User::where('role', 'villa')
                ->where(function (Builder $query) {
                    $request = request();
                    return $query->where('name', 'like', '%' . $request->search . '%')
                        // ->orWhere('villa_name', 'like', '%' . $request->search . '%')
                        ->orWhere('username', 'like', '%' . $request->search . '%')
                        ->orWhere('address', 'like', '%' . $request->search . '%')
                        ->orWhere('bio', 'like', '%' . $request->search . '%')
                        ->orWhere('detailBio', 'like', '%' . $request->search . '%');
                })
                ->where('status', 'active')
                ->get();

            // dd($staff);
        }

        return view('villa.pages.findstaff', [
            'title' => 'Find Job',
            'active' => 'staff.find-job',
            'staffs' => $staff
        ]);
    }

    public function detailStaff(User $user)
    {
        $staffRequest = RequestVilla::where('user_id', auth()->user()->id)->where('staff_id', $user->id)->first();

        $staffRequest = $staffRequest ? $staffRequest->status : 'null';

        return view('villa.pages.staff_desc', [
            'title' => 'Detail Staff',
            'active' => 'villa.find-staff',
            'staff' => $user,
            'staffRequest' => $staffRequest
        ]);
    }

    public function about()
    {
        return view('villa.pages.about', [
            'title' => 'About',
            'active' => 'villa.about'
        ]);
    }

    public function dashboard()
    {
        return view('villa.pages.dashboard', [
            'title' => 'Dashboard',
            'active' => 'villa.dashboard'
        ]);
    }

    public function profile()
    {
        $requestedStaff = RequestVilla::where('user_id', auth()->user()->id)->count();
        $receivedStaff = RequestStaff::where('villa_id', auth()->user()->id)->count();
        return view('villa.pages.profile', [
            'title' => 'Profile',
            'active' => 'villa.profile',
            'requestedStaff' => $requestedStaff,
            'receivedStaff' => $receivedStaff
        ]);
    }

    public function updateProfile(Request $request)
    {
        $role = [
            'name' => 'required',
            'villa_name' => 'required',
            'phone' => 'required',
            'salary' => 'required',
            'bio' => 'required',
            'detailBio' => 'required',
            'address' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:2048',
            'villa_image' => 'required|mimes:jpg,jpeg,png|max:2048',
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

            if ($request->hasFile('villa_image')) {
                Storage::delete('villa/' . auth()->user()->villa_image);

                $file = $request->file('villa_image');
                $filename = Str::random(10) . '_' . Str::slug($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

                $path = $file->storeAs('villa', $filename);

                $validateData['villa_image'] = $filename;
                $validateData['villa_image_path'] = $path;
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

            // dd($validateData);

            $user->update($validateData);

            DB::commit();

            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function lowongan()
    {
        $announcements = Announcement::where('user_id', auth()->user()->id)->get();

        // dd($announcements);

        return view('villa.pages.lowongan', [
            'title' => 'Lowongan',
            'active' => 'villa.lowongan',
            'announcements' => $announcements
        ]);
    }

    public function tambahLowongan(Request $request)
    {
        $role = [
            'title' => 'required',
            'hiring' => 'required',
            'slug' => 'required|unique:announcements,slug',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:2048',
        ];

        // dd($request->all());

        try {

            $validateData = $request->validate($role);

            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $filename = Str::random(10) . '_' . Str::slug($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

                $path = $file->storeAs('announcements', $filename);

                $validateData['thumbnail'] = $filename;
                // $validateData['thumbnail_path'] = $path;
            }

            DB::beginTransaction();

            Announcement::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'hiring' => $request->hiring,
                'slug' => $request->slug,
                'thumbnail' => $validateData['thumbnail'],
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Announcement created successfully');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function pendaftar()
    {
        $jobs = RequestStaff::where('villa_id', auth()->user()->id)->get();
        return view('villa.pages.pendaftar', [
            'title' => 'Lowongan',
            'active' => 'villa.lowongan',
            'jobs' => $jobs
        ]);
    }

    public function permintaanStaff()
    {
        $jobs = RequestVilla::where('user_id', auth()->user()->id)->get();
        return view('villa.pages.permintaanStaff', [
            'title' => 'Permintaan Staff',
            'active' => 'villa.permintaanStaff',
            'jobs' => $jobs
        ]);
    }

    public function requestStaff(Request $request, User $user)
    {
        // $role = [
        //     'message' => 'required',
        // ];

        try {

            // $validateData = $request->validate($role);

            DB::beginTransaction();

            RequestVilla::create([
                'user_id' => auth()->user()->id,
                'staff_id' => $user->id,
                'status' => 'pending',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Request sent successfully');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function kelolaPendaftar(Request $request, User $user)
    {
        // dd($request->all());
        if ($request->terima == 'ya') {
            try {
                DB::beginTransaction();

                RequestStaff::where('user_id', $user->id)
                    ->where('villa_id', auth()->user()->id)
                    ->update([
                        'status' => 'accepted',
                    ]);

                DB::commit();

                return redirect()->back()->with('success', 'Request sent successfully');
            } catch (\Throwable $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else if ($request->terima == 'pending') {
            try {
                DB::beginTransaction();

                RequestStaff::where('user_id', $user->id)
                    ->where('villa_id', auth()->user()->id)
                    ->update([
                        'status' => 'pending',
                    ]);

                DB::commit();

                return redirect()->back()->with('success', 'Request sent successfully');
            } catch (\Throwable $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            try {
                DB::beginTransaction();

                RequestStaff::where('user_id', $user->id)
                    ->where('villa_id', auth()->user()->id)
                    ->update([
                        'status' => 'rejected',
                    ]);

                DB::commit();

                return redirect()->back()->with('success', 'Request sent successfully');
            } catch (\Throwable $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function kelolaPermintaan(Request $request, User $user)
    {
        // dd($request->all());
        if ($request->terima == 'batal') {
            try {
                DB::beginTransaction();

                RequestVilla::where('staff_id', $user->id)
                    ->where('user_id', auth()->user()->id)
                    ->delete();

                DB::commit();

                return redirect()->back()->with('success', 'Request sent successfully');
            } catch (\Throwable $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function downloadCVStaff(Request $request, User $user)
    {
        try {
            $file = public_path() . '/storage/cv/' . $user->cv;

            // dd($user->name);
            $headers = array(
                'Content-Type: application/pdf',
            );

            return Response::download($file, "CV Staff - $user->name - $user->cv", $headers);
        } catch (\Throwable $e) {
            // DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function manageContract(){
        $contracts = Contract::where('villa_id', auth()->user()->id)->get();

        // Get all user staff that have accepted the request and user staff that request to join villa
        $staffsRequest = RequestStaff::where('villa_id', auth()->user()->id)
            ->where('status', 'accepted')
            ->get();

        $villaStaffsRequest = RequestVilla::where('user_id', auth()->user()->id)
            ->where('status', 'accepted')
            ->get();
        
        return view('villa.pages.manageContract', [
            'title' => 'Manage Contract',
            'active' => 'villa.manageContract',
            'contracts' => $contracts,
            'staffsRequest' => $staffsRequest,
            'villaStaffsRequest' => $villaStaffsRequest
        ]);
    }
}

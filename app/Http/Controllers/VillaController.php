<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Announcement;
use App\Models\Contract;
use App\Models\RequestStaff;
use App\Models\RequestVilla;
use App\Models\Transaction;
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
            $staff = User::where('role', 'staff')
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

            return redirect()->back()->with('success', 'Permintaan Staff berhasil dikirim');
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

                return redirect()->back()->with('success', 'Permintaan Staff berhasil diterima');
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

                return redirect()->back()->with('success', 'Permintaan Staff berhasil dikembalikan ke status pending');
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

                return redirect()->back()->with('success', 'Permintaan Staff berhasil ditolak');
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

                return redirect()->back()->with('success', 'Permintaan berhasil dibatalkan');
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

    public function manageContract()
    {
        $contracts = Contract::with('transaction')->where('villa_id', auth()->user()->id)->get();

        // dd transaction payment status
        // dd($contracts[0]->transaction->payment_status);

        // Get all user staff that have accepted the request and user staff that request to join villa
        $staffsRequest = RequestStaff::where('villa_id', auth()->user()->id)
            ->where('status', 'accepted')
            ->get();

        $villaStaffsRequest = RequestVilla::where('user_id', auth()->user()->id)
            ->where('status', 'accepted')
            ->get();

        // check if user staff have contract with villa
        foreach ($staffsRequest as $staff) {
            $checkContract = Contract::where('staff_id', $staff->user_id)
                ->where('villa_id', $staff->villa_id)
                ->first();

            if ($checkContract) {
                $staffsRequest = $staffsRequest->except($staff->id);
                $villaStaffsRequest = $villaStaffsRequest->except($staff->id);
            }
        }

        // check if villa have contract with user staff
        foreach ($villaStaffsRequest as $staff) {
            $checkContract = Contract::where('staff_id', $staff->staff_id)
                ->where('villa_id', $staff->user_id)
                ->first();

            if ($checkContract) {
                $villaStaffsRequest = $villaStaffsRequest->except($staff->id);
                $staffsRequest = $staffsRequest->except($staff->id);
            }
        }

        return view('villa.pages.manageContract', [
            'title' => 'Manage Contract',
            'active' => 'villa.manageContract',
            'contracts' => $contracts,
            'staffsRequest' => $staffsRequest,
            'villaStaffsRequest' => $villaStaffsRequest
        ]);
    }

    public function createContract(Request $request, User $user)
    {

        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'position' => 'required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'signatures_villa' => 'required',

            'price' => 'required|numeric',
            'bukti_pembayaran' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        if (password_verify($validateData['signatures_villa'], auth()->user()->password)) {
            try {
                DB::beginTransaction();

                Contract::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'position' => $request->position,
                    'villa_id' => auth()->user()->id,
                    'staff_id' => $user->id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'signatures_villa' => $request->signatures_villa,
                    'status' => 'process',
                ]);

                $contract = Contract::where('villa_id', auth()->user()->id)
                    ->where('staff_id', $user->id)
                    ->where('status', 'process')
                    ->orWhere('status', 'berjalan')
                    ->first();

                // dd($contract);
                // get total_price + 5% from price
                $total_price = $request->price + ($request->price * 0.05);

                // store bukti pembayaran
                if ($request->hasFile('bukti_pembayaran')) {
                    $file = $request->file('bukti_pembayaran');
                    $filename = Str::random(10) . '_' . Str::slug($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

                    $path = $file->storeAs('bukti_pembayaran', $filename);

                    $validateData['bukti_pembayaran'] = $filename;
                    // $validateData['thumbnail_path'] = $path;
                }

                Transaction::create([
                    'villa_id' => auth()->user()->id,
                    'slug' => Str::slug(auth()->user()->name . '-' . time()),
                    'contract_id' => $contract->id,
                    'code_transaction' => 'StaffSeekers-' . time(),
                    'price' => $request->price,
                    'total_price' => $total_price,
                    'payment_status' => 'pending',
                    'status' => 'process',
                    'bukti_pembayaran' => $validateData['bukti_pembayaran'],
                ]);

                DB::commit();

                return redirect()->back()->with('success', 'Kontrak berhasil dibuat');
            } catch (\Throwable $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'Password villa salah');
        }
    }

    public function processContract(Request $request, Contract $contract)
    {
        $validateData = $request->validate([
            'confirm' => 'required',
        ]);

        // dd($contract->id);

        if ($validateData['confirm'] == 'cencel') {
            try {
                DB::beginTransaction();

                $contract->update([
                    'status' => 'cencel',
                ]);

                DB::commit();

                return redirect()->back()->with('success', 'Kontrak berhasil dibatalkan');
            } catch (\Throwable $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else if ($validateData['confirm'] == 'finish') {
            try {
                DB::beginTransaction();

                $contract->update([
                    'status' => 'selesai',
                ]);

                DB::commit();

                return redirect()->back()->with('success', 'Kontrak berhasil diselesaikan');
            } catch (\Throwable $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else if ($validateData['confirm'] == 'delete') {
            try {
                DB::beginTransaction();

                $contract->delete();

                DB::commit();

                return redirect()->back()->with('success', 'Kontrak berhasil dihapus');
            } catch (\Throwable $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else if ($validateData['confirm'] == 'perpanjang') {
            try {
                DB::beginTransaction();

                $contract->update([
                    'status' => 'process',
                ]);

                DB::commit();

                return redirect()->back()->with('success', 'Kontrak berhasil diperpanjang');
            } catch (\Throwable $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }
    }
}

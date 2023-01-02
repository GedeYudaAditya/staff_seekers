<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class AdminController extends Controller
{
    //
    public function index()
    {
        $user = User::where('role','staff')->count();
         $villa = User::where('role','villa')->count();
        return view('admin.pages.index', [
            'title' => 'Admin',
            'active' => 'admin',
            'user' => $user,
            'villa' => $villa
        ]);
    }

    public function user()
    {
        $user = User::all();
        return view('admin.pages.user', [
            'title' => 'User',
            'active' => 'user',
            'user' => $user
        ]);
    }
    public function userReport()
    {
       $report = Report::where('type','report')->get();
        return view('admin.pages.userReports',[
            'title' => 'User',
            'active' => 'user',
            'report' => $report
            
        ]
        );
    }
    public function reportProcess(Request $request, Report $report){
        $validateData = $request->validate(
            [
                'status'=>'required'
            ]
        );
        DB::beginTransaction();
        try {
            //code...
            Report::where('id',$report->id)->update($validateData);
            DB::commit();
            return back()->with('success','data updated successfully');

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return back()->with('error','cannot update data');

        }
        

    }
    public function bug()
    {
        $bug = Report::where('type','bug')->get();
        return view('admin.pages.bug',[
            'title' => 'bug',
            'active' => 'bug',
            'bug' => $bug
            
        ]
        );
    }
    public function reportBug(Request $request, Report $bug){
        $validateData = $request->validate(
            [
                'status'=>'required'
            ]
        );
        DB::beginTransaction();
        try {
            //code...
            Report::where('id',$bug->id)->update($validateData);
            DB::commit();
            return back()->with('success','data updated successfully');

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return back()->with('error','cannot update data');

        }

    }

    public function destroy(User $user)
    {
        // dd($username);
        // User::destroy($username->id);
        User::where('id', $user->id)->delete();
        return back()->with('success', 'Delete data user success');
    }

    public function edit(User $user, Request $request)
    {
        $validationData = $request->validate([
            'status' => 'required',
            'role' => 'required'
        ]);

        try {
            User::where('id', $user->id)->update($validationData);

            return back()->with('success', 'Update data user success');
        } catch (\Exception $e) {
            dd($e);
            // return back()->with('error', 'Update data user failed | ' . $e->getMessage());
        }
    }
}

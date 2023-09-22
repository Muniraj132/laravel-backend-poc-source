<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NewsEvent;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;

class AuthController extends Controller
{
    public function dashboard()
    {
        // Retrieve the count of users
        $userCount = User::count();
        
        // Retrieve the count of products
        $productCount = NewsEvent::count();

       // Retrieve the count of news
        $contentCount = Content::count();
    
        // Pass both user count and product count to the dashboard view
        return view('dashboard', ['userCount' => $userCount, 'productCount' => $productCount,'contentCount' => $contentCount ]);
    }
    
    

    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
    
       
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' =>  $request->role,
        ]);
    
        return redirect()->route('login');
    }

    public function userregisterSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
    
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    
        return response()->json(['success'=> 'User Created Successfully']);
    }
    
    

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
    
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
    
        $request->session()->regenerate();
    
        // Record login activity
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'login_time' => now(),
        ]);
    
        return redirect()->route('dashboard');
    }
    
    public function logout(Request $request)
    {
        // Record logout activity
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'logout_time' => now(),
        ]);
    
        Auth::guard('web')->logout();
    
        $request->session()->invalidate();
    
        return redirect('/');
    }
    public function profile()
    {
        return view('profile');
    }
    
    public function users()
{
    $users = DB::table('users')->select('id', 'name', 'email', 'role' ,'password')->get();

    return view('users.users', compact('users'));
}

    public function edit(Request $request)
    {
    $reqId = $request->all();
    $fileData = User::where('id',$reqId)->get();
    $fileDataVal = $fileData[0];
    return response()->json(['fileData'=> $fileDataVal]);
    }
    
    public function update(Request $request)
    {   $id = $request->id;
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
 
        return response()->json(['success'=> 'User Updated Successfully']);
    }
    public function destroy(Request $request)
    {
         $id = $request->id;
        $user =  User::find($id);
        if ($user) {
            $user->activityLogs()->delete();
            $user->delete();
            return response()->json(['success'=> 'User Deleted Successfully']);
        }
        return response()->json(['error'=> 'User not found']);
    }
    public function user(Request $request){

        if ($request->ajax()) {
            $data = User::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('id', function($row){
                    static $id = 1;
                    $serialNumber = $id++;
                    return $serialNumber;
                    })
                 ->addColumn('action', function($row){
                     $btn = '';
                     $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip" class="usersedit" id="usersedit'.$row->id.'" data-id="'.$row->id.'" data-original-title="view"><i class="fa fa-edit"></i></a>';
                     $btn = $btn.'   <a href="javascript:void(0)" data-toggle="tooltip" class="usersdel"  id="usersdel'.$row->id.'"  data-id="'.$row->id.'" data-original-title="Delete"><i class="fa fa-trash"></i></a>';
                     return $btn;
                 })
                 ->rawColumns(['action','id'])
                 ->make(true);
      } 

    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Pelapor;
use App\Models\Laporan;
use App\Models\Feedback;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = Auth::user();
        // return view('user.index', ['user' => $user]);
        $user = Auth::user();
        if($user->role == 'Admin')
        {
            
        $users = DB::table('user')->where('role', 'User')->count();
        // return dd($user);
        $masuk = Laporan::where('status', 'Masuk')->count();
        $proses = Laporan::where('status', 'Diproses')->count();
        $selesai = Laporan::where('status', 'selesai')->count();
            return view('admin.index', compact('users', 'masuk', 'proses', 'selesai'));
            // return ;
        }
        elseif($user->role == 'User')
        {
            return view('user.index', compact('user'));
        }
    
    }
}

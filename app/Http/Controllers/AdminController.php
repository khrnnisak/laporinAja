<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelapor;
use App\Models\Laporan;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = DB::table('user')->where('role', 'User')->count();
        // // return dd($user);
        // $masuk = Laporan::where('status', 'Masuk')->count();
        // $proses = Laporan::where('status', 'Diproses')->count();
        // $selesai = Laporan::where('status', 'selesai')->count();
        return view('admin.index', ['user' => $user, ]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $userr = Auth::user()->id;
        $user = DB::table('user')->where('id', $userr)->first();

        return view('admin.profil', compact( 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $akun = User::where('id', $id)->first();
        
        if($akun != null){
            $akun->delete();
            return redirect()->route('admin.showPengguna')
                ->with('success', 'Akun User Berhasil Dihapus');
        }
        return redirect()->route('admin.showPengguna')
            ->with('success', 'Akun User Gagal Dihapus');
    }
    public function showPengguna(){

        $laporan = DB::table('user')->where('id', '!=',  auth()->id())->get();
        $paginate = User::orderBy('name', 'asc')->paginate(5);
        return view('admin.pengguna', ['akun' => $laporan, 'paginate' => $paginate]);
    }
    public function showLaporan(){
        
        $laporan = Laporan::with('user')->get();
        // dd($laporan);
        $paginate = Laporan::orderBy('created_at', 'asc')->paginate(5);
        return view('admin.laporan', ['laporan' => $laporan, 'paginate' => $paginate ]);
        
    }
    public function showDetailLaporan($id){
        $feedback = DB::table('feedback')->where('laporan_id', $id)->first();
        $laporan = DB::table('laporan')->where('id', $id)->first();
        return view('admin.detailLaporan', compact('laporan', 'feedback'));
    }
    public function destroyLaporan($id)
    {
        
        $laporan = Laporan::where('id', $id)->first();
        
        if($laporan != null){
            $laporan->delete();
            return redirect()->route('admin.showLaporan')
                ->with('success', 'Laporan Berhasil Dihapus');
        }
        return redirect()->route('admin.showLaporan')
            ->with('success', 'Laporan Gagal Dihapus');
    }
    public function status(Request $request, $id){
        $request->validate([
            'status' => 'required',
        ]);

        $laporan = Laporan::where('id', $id)->first();
        $laporan->status = $request->get('status');
        $laporan->save();
        
        return redirect()->route('admin.showLaporan')
            ->with('success', 'Status Laporan Berhasil Diupdate');
    }
}

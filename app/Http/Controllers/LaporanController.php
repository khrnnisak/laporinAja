<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Laporan;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('foto')){
            $image_name = $request->file('foto')->store('image', 'public');
        }
            $request->validate([
                'kategori' => 'required',
                'isi' => 'required',
                'foto' => 'mimes:jpeg,png,jpg|max:2048',
            ]);            
            $laporan = new Laporan;

            $user = Auth::user()->id;
            $laporan->user_id = $user;
            $laporan->is_hidden = $request->has('is_hidden');
            $laporan->kategori = $request->get('kategori');
            $laporan->isi = $request->get('isi');
            $laporan->foto = $image_name;
            
            $laporan->save();
            
            return redirect()->route('user')->with('success', 'Laporan berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::user()->id;
        $akun = Auth::user();
        $paginate = Laporan::where('user_id', $id)->orderBy('created_at', 'asc')->paginate(5);
        $laporan = Laporan::join('user','user.id','laporan.user_id')
                ->select('laporan.*','user.username')
                ->where('laporan.user_id' , $id)
                ->first();

        return view('laporan.riwayat', compact( 'laporan', 'paginate'));
        
    }
    public function showDetail($id)
    {
       
        $laporan = DB::table('laporan')->where('id', $id)->first();
        $fb = DB::table('feedback')->where('laporan_id', $id)->first();
        return view('laporan.detailLaporan', compact('laporan', 'fb'));
    }
    public function showFeedback($id){
        $feedback = DB::table('feedback')->where('laporan_id', $id)->first();
        return view('laporan.feedback', compact('feedback'));
    }
    // public function statusFB(Request $request, $id){
    //     $request->validate([
    //         'status' => 'required',
    //     ]);

    //     $feedback = Feedback::where('laporan_id', $id)->first();
        
    //     $feedback->status = $request->get('status');
    //     $feedback->kritik = $request->get('kritik');
    //     $feedback->save();
        
    //     return redirect()->route('ratePuas', $id)
    //         ->with('success', 'Terima kasih!!');
    // }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
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
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelapor;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class PelaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('user_foto')){
            $image_name = $request->file('user_foto')->store('image', 'public');
        }
            $request->validate([
                'nama_awal' => 'required|string|max:200',
                'nama_akhir' => 'required|string|max:200',
                'alamat' => 'required',
                'kota' => 'required|string|max:100',
                'provinsi' => 'required|string|max:100',
                'kode_pos' => 'required|string|max:20',
                'user_foto' => 'mimes:jpeg,png,jpg|max:2048',
            ]);         
            $pelapor = new Pelapor;
            $pelapor->nama_awal = $request->get('nama_awal');
            $pelapor->nama_akhir = $request->get('nama_akhir');
            $pelapor->alamat = $request->get('alamat');
            $pelapor->kota = $request->get('kota');
            $pelapor->provinsi = $request->get('provinsi');
            $pelapor->kode_pos = $request->get('kode_pos');
            $pelapor->user_foto = $image_name;

            $user = Auth::user()->id;
            $pelapor->user_id = $user;
            
            $pelapor->save();
            return redirect()->route('profil')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $otherData = Auth::user();
        $userr = Auth::user()->id;
        $user = DB::table('pelapor')->where('user_id', $userr)->first();

        return view('user.detail', compact( 'user', 'otherData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $userr = Auth::user()->id;
        $user = DB::table('pelapor')->where('user_id', $userr)->first();

        return view('user.edit', compact('userr', 'user'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->file('user_foto')){
            $image_name = $request->file('user_foto')->store('image', 'public');
        }
            $request->validate([
                'nama_awal' => 'required|string|max:200',
                'nama_akhir' => 'required|string|max:200',
                'alamat' => 'required',
                'kota' => 'required|string|max:100',
                'provinsi' => 'required|string|max:100',
                'kode_pos' => 'required|string|max:20',
                'user_foto' => 'mimes:jpeg,png,jpg|max:2048',
                    ]);  
                $user = Auth::user()->id;
                $pelapor = Pelapor::where('user_id', $user)->first(); 
                $pelapor->nama_awal = $request->get('nama_awal');
                $pelapor->nama_akhir = $request->get('nama_akhir');
                $pelapor->alamat = $request->get('alamat');
                $pelapor->kota = $request->get('kota');
                $pelapor->provinsi = $request->get('provinsi');
                $pelapor->kode_pos = $request->get('kode_pos'); 
                $pelapor->user_foto = $image_name;   
                $pelapor->user_id = $user;
                
                $pelapor->save();
                return redirect()->route('profil')->with('success', 'Data berhasil disimpan!');
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

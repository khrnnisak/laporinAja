<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Feedback;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $fb = DB::table('laporan')->where('id', $id)->first();
        return view('feedback.create', compact('fb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        
        if ($request->file('foto')){
            $image_name = $request->file('foto')->store('image', 'public');
        }
            $request->validate([
                'isi' => 'required',
                'foto' => 'mimes:jpeg,png,jpg|max:2048',
            ]);        
            $lap = DB::table('laporan')->where('id', $id)->get();    
            $feedback = new Feedback;
            $feedback->laporan_id = $id;
            $feedback->isi = $request->get('isi');
            $feedback->foto = $image_name;
            
            $feedback->save();
            return redirect()->route('showFeedback', $id)->with('success', 'Feedback berhasil dikirim!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = DB::table('feedback')->where('laporan_id', $id)->first();
        return view('feedback.detail', compact('feedback'));
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
        //
    }
}

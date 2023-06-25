<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PIC_Seminar;
use App\Models\Pembicara;
use Illuminate\Support\Facades\Auth;

class PIC_SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seminar = PIC_Seminar::all()->where('id_user', 3);
        //$seminar = PIC_Seminar::all();
        return view('pic_seminar.list-seminar',['seminar' => $seminar]);
    }

    public function create_seminar(){
        return view('pic_seminar.create-seminar');
    }

    public function view_peserta(){
        return view('pic_seminar.view-peserta-seminar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_seminar(Request $request)
    {
        $this->validate($request, [
            'nama_seminar' => 'required',
            'deskripi_seminar' => 'required',
            'lokasi_seminar' => 'required',
            'gmaps_seminar' => 'required',
            'vidcon_seminar' => 'required',
            'tanggal_seminar' => 'required',
            'gratis_berbayar' => 'required',
            'tgl_pendaftaran_awal' => 'required',
            'tgl_pendaftaran_akhir' => 'required',
            'setup_tgl_unduh' => 'required',
            'sertifikat' => 'required',
            'poster' => 'required'
        ]);

        $setup_tgl_unduh = $request->input('setup_tgl_unduh');
        $sertifikat = $request->input('sertifikat');

        $poster = $request->file('poster');
        $posterPath = null;

        if ($poster) {
            $posterPath = 'public/poster' . uniqid() . '.' . $poster->extension();
            $poster->storeAs($posterPath);
        }

        
        PIC_Seminar::create([
            'id_user' => 3,
            'nama_seminar' => $request->nama_seminar,
            'deskripi_seminar' => $request->deskripi_seminar,
            'lokasi_seminar' => $request->lokasi_seminar,
            'gmaps_seminar' => $request->gmaps_seminar,
            'vidcon_seminar' => $request->vidcon_seminar,
            'tanggal_seminar' => $request->tanggal_seminar,
            'gratis_berbayar' => $request->gratis_berbayar,
            'tgl_pendaftaran_awal' => $request->tgl_pendaftaran_awal,
            'tgl_pendaftaran_akhir' => $request->tgl_pendaftaran_akhir,
            'poster' => $posterPath
        ]);

        $photo = $request->file('photo');
        $photo->storeAs('public', 'poster'.uniqid().'.'.$photo->extension());
        return redirect('/pic-seminar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seminar = PIC_Seminar::find($id);
        return view('dashboard.details-seminar',['seminar' => $seminar]);
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

     // public function layout_pic_seminar(){
    //     return view('view-list-seminar');
    // }

    public function create_layout(){
        // return view('pic_seminar.add-seminar');
    }

    // public function edit_layout(){
    //     return view('view-list-seminar');
    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\Data_Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PIC_Seminar;
use App\Models\Pembicara;
use App\Models\Users;
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

    public function create_sertifikat($id){
        $seminar = PIC_Seminar::find($id);
        return view('pic_seminar.create-sertifikat', compact('seminar'));
    }

    public function create_pembicara(){
        return view('pic_seminar.create-pembicara');
    }

    public function view_peserta($id){
        $peserta = Data_Pendaftaran::all()->where('id_pic_seminar', $id);
        return view('pic_seminar.list-seminar',['peserta' => $peserta]);
    }

    public function view_sertifikat($id){
        $seminar = PIC_Seminar::all()->where('id', $id);
        return view('pic_seminar.view-sertifikat',['seminar' => $seminar]);
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
            'poster' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        

        $posterPath = null;

        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');

            if (!is_null($poster)) {
                $posterPath = 'public/poster/' . uniqid() . '.' . $poster->getClientOriginalExtension();
                $poster->storeAs('poster', $posterPath);
            }
        }

        $sertifikatPath = null;

        if ($request->hasFile('sertifikat')) {
            $sertifikat = $request->file('sertifikat');

            if (!is_null($sertifikat)) {
                $sertifikatPath = 'public/sertifikat/' . uniqid() . '.' . $sertifikat->getClientOriginalExtension();
                $sertifikat->storeAs('sertifikat', $sertifikatPath);
            }
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
            'setup_tgl_unduh' => $request->tgl_pendaftaran_akhir,
            'sertifikat' => $sertifikatPath,
            'poster' => $posterPath,
            'status' => 'pending'
        ]);

        return redirect('/pic-seminar/create-pembicara');
    }

    public function store_pembicara(Request $request)
    {

        $this->validate($request, [
            'nama_pembicara' => 'required',
            'asal_instansi' => 'required',
            'topik_pembicara' => 'required',
            'materi_seminar' => 'required|mimes:pdf',
        ]);

        $materiPath = null;

        if ($request->hasFile('materi_seminar')) {
            $materi_seminar = $request->file('materi_seminar');

            if (!is_null($materi_seminar)) {
                $materiPath = 'public/materi/' . uniqid() . '.' . $materi_seminar->getClientOriginalExtension();
                $materi_seminar->storeAs('materi', $materiPath);
            }
        }

        Pembicara::create([
            'id_pic_seminar' => 6,
            'nama_pembicara' => $request->nama_pembicara,
            'asal_instansi' => $request->asal_instansi,
            'topik_pembicara' => $request->topik_pembicara,
            'materi_seminar' => $materiPath
        ]);

        return redirect('/pic-seminar');
    }

    public function store_sertifikat(Request $request)
    {

        $this->validate($request, [
            'id' => 'required',
            'sertifikat' => 'required|file|mimes:pdf',
            'setup_tgl_unduh' => 'required'
        ]);

        $sertifikatPath = null;

        if ($request->hasFile('sertifikat')) {
            $sertifikat = $request->file('sertifikat');

            if (!is_null($sertifikat)) {
                $sertifikatPath = 'public/materi/' . uniqid() . '.' . $sertifikat->getClientOriginalExtension();
                $sertifikat->storeAs('materi', $sertifikatPath);
            }
        }

        $id = $request->input('id');
        $seminar = PIC_Seminar::find($id);

        if ($seminar) {
            $seminar->sertifikat = $sertifikatPath;
            $seminar->setup_tgl_unduh = $request->input('setup_tgl_unduh');
            $seminar->save();
        
            // Tampilkan pesan sukses atau alihkan pengguna ke halaman lain
            return redirect('/pic-seminar')->with('success', 'Sertifikat berhasil disimpan.');
        } else {
            // Tampilkan pesan error jika id seminar tidak ditemukan
            return redirect('/pic-seminar')->with('error', 'Gagal menyimpan sertifikat. Seminar tidak ditemukan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seminar = PIC_Seminar::find($id);
        return view('dashboard.details-seminar',['seminar' => $seminar]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Lakukan pencarian berdasarkan kata kunci
        $seminar = PIC_Seminar::where('nama_seminar', 'LIKE', "%$keyword%")->get();

        // return redirect('/pic-seminar');
        return view('pic_seminar.list-seminar', compact('seminar'));
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

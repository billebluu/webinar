<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PIC_Seminar;
use App\Models\User;
use App\Models\Pembicara;
use App\Models\Data_Pendaftaran;
use App\Models\Users;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PIC_SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seminars = PIC_Seminar::where('id_user', 3)->get();

        $id_pic = $seminars->pluck('id')->toArray();
        $rekap_peserta = Data_Pendaftaran::whereIn('id_pic_seminar', $id_pic)->count();
        $rekap_seminar = $seminars->where('status', 'accepted')->count();

        foreach ($seminars as $seminar) {
            $id = $seminar->id;
            $jumlah_peserta = Data_Pendaftaran::where('id_pic_seminar', $id)->count();
            $pembicara = Pembicara::where('id_pic_seminar', $id)->get();

            $seminar->jumlah_peserta = $jumlah_peserta;
            $seminar->pembicara = $pembicara;
        }

        return view('pic_seminar.list-seminar', compact('seminars', 'rekap_peserta', 'rekap_seminar'));
    }


    public function create_seminar(){
        return view('pic_seminar.create-seminar');
    }

    public function create_sertifikat($id){
        $seminar = PIC_Seminar::find($id);
        return view('pic_seminar.create-sertifikat', compact('seminar'));
    }

    public function create_pembicara($id){
        $seminar = PIC_Seminar::find($id);
        return view('pic_seminar.create-pembicara', compact('seminar'));
    }

    public function upload_ulang_materi($id){
        $pembicara = Pembicara::find($id);
        return view('pic_seminar.upload-ulang-materi', compact('pembicara'));
    }

    public function edit_status_peserta($id){
        $peserta = Data_Pendaftaran::find($id);
        return view('pic_seminar.edit-status-peserta', compact('peserta'));
    }

    public function edit_pembicara($id){
        $pembicara = Pembicara::find($id);
        return view('pic_seminar.edit-pembicara', compact('pembicara'));
    }

    public function view_peserta($id){
        $seminar = PIC_Seminar::all()->where('id', $id);
        $peserta = Data_Pendaftaran::where('id_pic_seminar', $id)->get();
        $user = User::join('data_pendaftaran', 'users.id', '=', 'data_pendaftaran.id_users')
        ->where('data_pendaftaran.id_pic_seminar', $id)
        ->get();

        return view('pic_seminar.view-peserta-seminar', ['seminar' => $seminar, 'peserta' => $peserta, 'users' => $user]);
    }
    
    public function view_pembicara($id){
        $pembicaras = Pembicara::where('id_pic_seminar', $id)->get();

        return view('pic_seminar.view-pembicara', compact('pembicaras'));
    }

    public function view_sertifikat($id){
        $seminar = PIC_Seminar::all()->where('id', $id);
        return view('pic_seminar.view-sertifikat', compact('seminar'));
        // return view('pic_seminar.view-sertifikat');
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
                $posterPath = $poster->store('public/poster');
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
            'poster' => $posterPath,
            'status' => 'pending'
        ]);

        return redirect('/pic-seminar');
    }

    public function store_pembicara(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'nama_pembicara' => 'required',
            'asal_instansi' => 'required',
            'topik_pembicara' => 'required',
            'materi_seminar' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $id = $request->input('id');
        $id_pic_seminar = null;

        if ($request->hasFile('materi_seminar')) {
            $materi_seminar = $request->file('materi_seminar');
            $materiPath = $materi_seminar->store('public/materi');

            $pembicara = new Pembicara();
            $pembicara->id_pic_seminar = $id;
            $pembicara->nama_pembicara = $request->nama_pembicara;
            $pembicara->asal_instansi = $request->asal_instansi;
            $pembicara->topik_pembicara = $request->topik_pembicara;
            $pembicara->materi_seminar = $materiPath;
            $pembicara->save();

            $id_pic_seminar = $id;
        }

        return redirect('/pic-seminar/view-pembicara/'.$id_pic_seminar);
    }

    public function store_sertifikat(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'sertifikat' => 'required|image|mimes:jpg, jpeg, png',
            'setup_tgl_unduh' => 'required'
        ]);

        $sertifikatPath = null;

        if ($request->hasFile('sertifikat')) {
            $sertifikat = $request->file('sertifikat');

            if (!is_null($sertifikat)) {
                $sertifikatPath = $sertifikat->store('public/sertifikat');
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

    public function store_status_peserta(Request $request)
    {

        $this->validate($request, [
            'id' => 'required',
            'status_peserta' => 'required'
        ]);

        $id = $request->input('id');
        $peserta = Data_Pendaftaran::find($id);

        $id_pic_seminar = Data_Pendaftaran::where('id', $id)->pluck('id_pic_seminar')->first();
        
        if ($peserta) {
            $peserta->status_peserta = $request->input('status_peserta');
            $peserta->save();

            // Tampilkan pesan sukses atau alihkan pengguna ke halaman lain
            return redirect('/pic-seminar/view-peserta-seminar/'.$id_pic_seminar)->with('success', 'Status peserta berhasil diperbarui.');
        } else {
            // Tampilkan pesan error jika id seminar tidak ditemukan
            return redirect('/pic-seminar/view-peserta-seminar/'.$id_pic_seminar)->with('error', 'Gagal memperbarui status peserta.');
        }
    }

    public function store_pembicara_edited(Request $request)
    {

        $this->validate($request, [
            'id' => 'required',
            'nama_pembicara' => 'required',
            'asal_instansi' => 'required',
            'nama_pembicara' => 'required'
        ]);

        $id = $request->input('id');
        $pembicara = Pembicara::find($id);

        $id_pic_seminar = Pembicara::where('id', $id)->pluck('id_pic_seminar')->first();
        
        if ($pembicara) {
            $pembicara->nama_pembicara = $request->input('nama_pembicara');
            $pembicara->asal_instansi = $request->input('asal_instansi');
            $pembicara->topik_pembicara = $request->input('topik_pembicara');
            $pembicara->save();

            // Tampilkan pesan sukses atau alihkan pengguna ke halaman lain
            return redirect('/pic-seminar/view-pembicara/'.$id_pic_seminar)->with('success', 'Status peserta berhasil diperbarui.');
        } else {
            // Tampilkan pesan error jika id seminar tidak ditemukan
            return redirect('/pic-seminar/view-pembicara/'.$id_pic_seminar)->with('error', 'Gagal memperbarui status peserta.');
        }
    }

    public function store_ulang_materi(Request $request)
    {

        $this->validate($request, [
            'materi_seminar' => 'required|file|mimes:pdf, doc, docx'
        ]);

        $id = $request->input('id');
        $pembicara = Pembicara::find($id);

        $id_pic_seminar = Pembicara::where('id', $id)->pluck('id_pic_seminar')->first();

        if ($request->hasFile('materi_seminar')) {
            $materi_seminar = $request->file('materi_seminar');

            if (!is_null($materi_seminar)) {
                $materiPath = $materi_seminar->store('public/materi');
            }
        }
        
        if ($pembicara) {
            $pembicara->materi_seminar = $materiPath;
            $pembicara->save();

            // Tampilkan pesan sukses atau alihkan pengguna ke halaman lain
            return redirect('/pic-seminar/view-pembicara/'.$id_pic_seminar)->with('success', 'Status peserta berhasil diperbarui.');
        } else {
            // Tampilkan pesan error jika id seminar tidak ditemukan
            return redirect('/pic-seminar/view-pembicara/'.$id_pic_seminar)->with('error', 'Gagal memperbarui status peserta.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seminar = PIC_Seminar::find($id);
        return view('dashboard.details-seminar', compact('seminar'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Lakukan pencarian berdasarkan kata kunci
        $seminars = PIC_Seminar::where('id_user', 3)
            ->where(function ($query) use ($keyword) {
                $query->where('nama_seminar', 'LIKE', "%$keyword%")
                    ->orWhere('tanggal_seminar', 'LIKE', "%$keyword%")
                    ->orWhere('tanggal_seminar', 'LIKE', "%{$keyword}-%")
                    ->orWhere('tanggal_seminar', 'LIKE', "%-%{$keyword}-%")
                    ->orWhere('tanggal_seminar', 'LIKE', "%-%{$keyword}");
            })
            ->get();

        $id_pic = PIC_Seminar::where('id_user', 3)->pluck('id')->toArray();

        $rekap_peserta = Data_Pendaftaran::whereIn('id_pic_seminar', $id_pic)->count();            

        $rekap_seminar = PIC_Seminar::where('id_user', 3)
            ->where('status', 'accepted')
            ->count();

        foreach ($seminars as $seminar) {
            $id = $seminar->id;
            $jumlah_peserta = Data_Pendaftaran::where('id_pic_seminar', $id)->count();
            $pembicara = Pembicara::where('id_pic_seminar', $id)->get();

            $seminar->jumlah_peserta = $jumlah_peserta;
            $seminar->pembicara = $pembicara;
        }

        $compactVariables = compact('seminars', 'rekap_peserta', 'rekap_seminar');

        return view('pic_seminar.list-seminar', $compactVariables);
    }

    public function delete_pembicara($id)
    {
        $pembicara = Pembicara::findOrFail($id);

        // Hapus file materi seminar jika ada
        if ($pembicara->materi_seminar) {
            Storage::delete('materi/'.$pembicara->materi_seminar);
        }

        // Hapus data pembicara
        $pembicara->delete();

        return redirect()->back()->with('message', 'Data pembicara berhasil dihapus.');
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

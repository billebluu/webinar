<?php

namespace App\Http\Controllers;

use App\Models\Data_Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\DashboardController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\PIC_Seminar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $model = new Data_Pendaftaran ;
        // return  view('dashboard.details-seminar');
        // return view('users');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function insert(Request $request){
        $model = new Data_Pendaftaran;
        $model->id_peserta = 1;
        $model->id_pic_seminar = 1;
        $model->no_identitas = $request->no_identitas;
        $model->tgl_pembayaran = $request->tgl_pembayaran;
        $model->status_peserta = $request->status_peserta;
        $model->sumber_info = $request->sumber_info;
        // $model->bukti_pembayaran = 0;

       
            $request->file('bukti_pembayaran')->move('pendaftaranimg/', $request->file('bukti_pembayaran')->getClientOriginalName());
            $model->bukti_pembayaran = $request->file('bukti_pembayaran')->getClientOriginalName();
            $model->save();
       


        return redirect('/pic-seminar')->with('success','Data berhasil ditambahakan');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'id_peserta'=>'',
        //     'id_PIC_seminar'=>'',
        //     'bukti_pembayaran' => 'required',
        //     'tgl_pembayaran' => 'required',
        //     'sumber_info' => 'required',
        //     'no_identitas' => 'required',
        //     'status_peserta' => 'required',
        // ]);
        // Data_Pendaftaran::create($request->all());
        //sekar
    //     $validated = $request->validate([
    //         'bukti_pembayaran' => ['required'],
    //         'tgl_pembayaran' => ['required', 'date'],
    //         'sumber_info' => ['required', 'string'],
    //         'no_identitas' => ['required', 'integer'],
    //        // 'status_peserta' => ['required', 'string'],
    //     ]);

    //     // send error message
    //     if (!$validated) {
    //         return redirect()->back()->withInput()->withErrors($validated)->with('error', 'Validation failed. Data Gagal Dikirim!');

    //     // return view('dashboard.detail-seminar')->with('succes','Data Berhasil di Input');
    // }
    // Data_Pendafataran::create([
    //     'bukti_pembayaran' => $validated['bukti_pembayaran'],
    //     'tgl_pembayaran' => $validated['tgl_pembayaran'],
    //     'sumber_info' => $validated['sumber_info'],
    //     'no_identitas' => $validated['no_identitas'],
    //     // 'status_peserta' => $validated['categostatus_pesertary'],
    // ]);

    // // send success message
    // return redirect('/dashboard')->with('success', 'Pendaftaran Berhasil!');


    //coba 3
    // $this->validate($request,[
    //     // 'id_peserta'=>'required',
    //     // 'id_pic_seminar'=>'required',
    //     'no_identitas'=>'required',
    //     'bukti_pembayaran' => 'required|image|mimes:jpeg,jpg,png',
    //     'tgl_pembayaran' => 'required',
    //     'sumber_info' => 'required',
    //     'status_peserta' => 'required',
    // ]);

    $validated = $request->validate([
        // 'id_peserta'=>'required',
        // 'id_pic_seminar'=>'required',
        'no_identitas'=>'required',
        'bukti_pembayaran' => 'required|image|mimes:jpeg,jpg,png',
        'tgl_pembayaran' => 'required',
        'sumber_info' => 'required',
        'status_peserta' => 'required',
    ]);



    $bukti_bayar = $request->file('bukti_pembayaran');
    $bukti_bayarPath = null;

    if ($bukti_bayar) {
        $bukti_bayarPath = 'storage/buktibayar/' . uniqid() . '.' . $bukti_bayar->extension();
        $bukti_bayar->storeAs('', $bukti_bayarPath, 'public');
    }

    if (!$validated) {
        return redirect()->back()->withInput()->withErrors($validated)->with('error', 'Validation failed. Data Gagal Dikirim!');
    }
    // if ($validator->fails()) {
    //     // validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
    //     return redirect()->back()->withErrors($validator)->withInput();
    // }
    // $model = new Data_Pendaftaran;
    // // $model->id_user = auth()->user()->id;
    // // $model->id_pic_seminar = pic_seminar()->id;
    // $model->id_user = $id_user; // Menggunakan parameter $id_user yang diterima
    // $model->id_pic_seminar = $id_pic_seminar; // Menggunakan parameter $id_pic_seminar yang diterima
    // // $model->id_peserta = 1 ;
    // // $model->id_pic_seminar = 1;
    // $model->no_identitas = $request->no_identitas;
    // $model->bukti_bayar = $request->file('bukti_bayar')->store('bukti_bayar');
    // $model->tgl_pembayaran = $request->tgl_pembayaran;
    // $model->sumber_info = $request->sumber_info;
    // $model->status_peserta = $request->status_peserta;
    // $model->save();
    Data_Pendaftaran::create([
        'id_peserta' => 1,
        'id_pic_seminar' => 1,
        'no_identitas' => $validated['no_identitas'],
        'bukti_pembayaran' => $validated['bukti_bayarPath'],
        'tgl_pembayaran' => $validated['tgl_pembayaran'],
        'sumber_info' => $validated['sumber_info'],
        'status_peserta' => $validate['status_peserta'],
        
    ]);

    // return redirect()->back()->withSuccess('Pendaftaran berhasil.');
    return redirect('/dashboard')->withSuccess('Pendaftaran berhasil.');
}
    
    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        //
    }
}

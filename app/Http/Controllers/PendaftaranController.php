<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DashboardController;
use App\Models\Data_Pendaftaran;
use App\Models\PIC_Seminar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function __construct()
     {
         $this->middleware('auth');
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_pic_seminar, $id_users)
{
    $seminar = PIC_Seminar::find($id_pic_seminar);
    // $id_users = Auth::user()->id;

    return view('dashboard.pendaftaran', compact('seminar', 'id_users'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'id_users' => 'required',
        'id_pic_seminar' => 'required',
        'no_identitas' => 'required',
        // 'tgl_pembayaran' => 'required',
        'sumber_info' => 'required',
        
        
    ]);

    $seminar = PIC_Seminar::findOrFail($request->input('id_pic_seminar'));
    if ($seminar->gratis_berbayar === 'Berbayar') {
       
        $validatedData = $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,jpg,png',
            'tgl_pembayaran' => 'required'
        ]);
    }

    $bukti_bayarPath = null;

    if ($request->hasFile('bukti_pembayaran')) {
        $buktibayar = $request->file('bukti_pembayaran');

        if (!is_null($buktibayar)) {
            $bukti_bayarPath = 'public/pendaftaranimg' . uniqid() . '.' . $buktibayar->getClientOriginalExtension();
            $buktibayar->storeAs('public/pendaftaranimg', $bukti_bayarPath);
        }
    }

    $model = new Data_Pendaftaran;
    $model->id_users = $request->input('id_users');
    $model->id_pic_seminar = $request->input('id_pic_seminar');
    $model->no_identitas = $request->input('no_identitas');
    $model->tgl_pembayaran = $request->input('tgl_pembayaran');
    $model->sumber_info = $request->input('sumber_info');
    $model->bukti_pembayaran = $bukti_bayarPath;
    $model->status_peserta = 'Peserta';
    $model->save();

    return redirect('/dashboard')->withSuccess('Pendaftaran berhasil. Silahkan Mendaftar di Seminar Lainnya');
}
    
    /**
     * Display the specified resource.
     */
   
     public function unduhSertifikat($id_pic_seminar)
     {
         // Ambil path file sertifikat berdasarkan $id_pic_seminar
         $seminar = PIC_Seminar::find($id_pic_seminar);
         $fileName = basename($seminar->sertifikat);
     
         if (Storage::exists('public/sertifikat/' . $fileName)) {
             return response()->download(storage_path('app/public/sertifikat/' . $fileName));
         } else {
             abort(404, 'File sertifikat tidak ditemukan');
         }
     }
     
    }









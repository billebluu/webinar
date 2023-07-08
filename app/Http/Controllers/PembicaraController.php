<?php

namespace App\Http\Controllers;

use App\Models\Pembicara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembicaraController extends Controller
{
    public function unduhMateriSeminar($id_pembicara)
{
    $pembicara = Pembicara::findOrFail($id_pembicara);
    $fileName = basename($pembicara->materi_seminar);

    // Cek apakah materi seminar tersedia
    if (Storage::exists('public/materi/' . $fileName)) {
        return response()->download(storage_path('app/public/materi/' . $fileName));
    } else {
        abort(404, 'File materi tidak ditemukan');
    }
}

}

<?php

namespace App\Http\Controllers;

use App\Models\Pembicara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembicaraController extends Controller
{
    public function unduhMateriSeminar($id_pembicara)
    {
        $pembicara = Pembicara::find($id_pembicara);

        // Cek apakah materi seminar tersedia
        if ($pembicara && $pembicara->materi_seminar) {
            $materiPath = 'materi/' . $pembicara->materi_seminar;
            $fullPath = storage_path('app/public/' . $materiPath);
            return response()->file($fullPath, ['Content-Type' => 'application/pdf']);
        } else {
            abort(404, 'Materi Seminar tidak tersedia');
        }
    }
}

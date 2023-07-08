<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Pendaftaran extends Model
{
    use HasFactory;
    protected $table = "data_pendaftaran";

    protected $fillable = [
        'id_peserta',
        'id_pic_seminar',
        'no_identitas',
        'tgl_pembayaran',
        'bukti_pembayaran',
        'sumber_info',
        'status_peserta'
        
    ];

    public function picSeminar()
        {
        return $this->belongsTo(PIC_Seminar::class, 'id_pic_seminar');
        }
}

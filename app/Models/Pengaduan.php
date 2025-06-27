<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mhs_id',
        'judul',
        'isi_pengaduan',
        'bagian',
        'status',
        'lampiran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'pengaduan_id');
    }
}

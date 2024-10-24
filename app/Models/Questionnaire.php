<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'user_id', 'name', 'usia', 'jenis_kelamin', 'jurusan', 'angkatan', 'email', 
        'no_hp', 'domisili', 'layanan', 'keluhan', 'tanggal_konseling', 'waktu_konseling', 'psikolog', 
        'status', 'admin_message', 'feedback', 'rating', 'ulasan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


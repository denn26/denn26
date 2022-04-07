<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nisn';

    protected $keyType = 'string';

    protected $table = 'siswa';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'username', 'nisn');
    }

    protected $fillable = [
        'nisn',
        'kelas_id',
        'nama',
        'jenis_kelamin',
        'tgl_lahir',
        'agama',
        'alamat',
        'nama_ayah',
        'nama_ibu',
    ];
}

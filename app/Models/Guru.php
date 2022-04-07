<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 * @method static find($id)
 * @method static create(array $array)
 */
class Guru extends Model
{
    use HasFactory;

    protected $primaryKey = 'nip';

    protected $table = "guru";

    protected $keyType = 'string';

    public function user()
    {
        return $this->hasOne(User::class, 'username', 'nip');
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nip',
        'nama',
        'status',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'pendidikan',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 * @method static find($id)
 * @method static create(array $array)
 */
class Mapel extends Model
{
    use HasFactory;

    protected $table = "mapel";

    public function guru()
    {
        return $this->belongsToMany(Guru::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama',
    ];
}

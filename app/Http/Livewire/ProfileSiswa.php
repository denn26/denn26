<?php

namespace App\Http\Livewire;

use App\Models\Siswa;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileSiswa extends Component
{

    use WithFileUploads;

    public $header;

    public $nisn;
    public $nama;
    public $tglLahir;
    public $jenisKelamin;
    public $agama;
    public $alamat;
    public $foto;
    public $namaAyah;
    public $namaIbu;

    public function mount($id)
    {
        $k = Siswa::where('nisn', $id)->first();

        $this->nisn = $k->nisn;
        $this->nama = $k->nama;
        $this->jenisKelamin = $k->jenis_kelamin;
        $this->namaAyah = $k->nama_ayah;
        $this->namaIbu = $k->nama_ibu;
        $this->tglLahir = $k->tgl_lahir;
        $this->agama = $k->agama;
        $this->alamat = $k->alamat;
        $this->kelas = $k->kelas_id;
    }

    public function render()
    {
        $this->header = "Profil Siswa";

        return view('livewire.profile-siswa');
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'namaAyah' => 'required',
            'namaIbu' => 'required',
            'tglLahir' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'kelas' => 'required',
        ]);

        $siswaImg = null;

        if ($image = $this->foto) {
            $siswaImg = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $this->foto->storeAs(
                'public/',
                $siswaImg
            );

            User::where('username', $this->nisn)->update(['profile_photo_path' => $siswaImg]);
        }

        $k = Siswa::where('nisn', $this->nisn)->first();

        $k->nama = $this->nama;
        $k->nama_ayah = $this->namaAyah;
        $k->nama_ibu = $this->namaIbu;
        $k->tgl_lahir = $this->tglLahir;
        $k->jenis_kelamin = $this->jenisKelamin;
        $k->agama = $this->agama;
        $k->alamat = $this->alamat;

        $k->save();

        session()->flash(
            'success',
            'Berhasil Memperbaharui Data Siswa'
        );
    }
}

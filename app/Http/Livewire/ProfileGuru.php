<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileGuru extends Component
{
    use WithFileUploads;

    public $nip;
    public $nama;
    public $status;
    public $tglLahir;
    public $jenisKelamin;
    public $agama;
    public $pendidikan;
    public $foto;

    public function mount($id)
    {
        $k = Guru::where('nip', $id)->first();

        $this->nip = $k->nip;
        $this->nama = $k->nama;
        $this->status = $k->status;
        $this->tglLahir = $k->tgl_lahir;
        $this->jenisKelamin = $k->jenis_kelamin;
        $this->agama = $k->agama;
        $this->pendidikan = $k->pendidikan;
    }

    public function render()
    {
        $this->header = "Profil Guru";
        return view('livewire.profile-guru');
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'status' => 'required',
            'tglLahir' => 'required',
            'jenisKelamin' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
        ]);

        $guruImg = null;

        if ($image = $this->foto) {
            $guruImg = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $this->foto->storeAs(
                'public/',
                $guruImg
            );

            User::where('username', $this->nip)->update(['profile_photo_path' => $guruImg]);
        }

        $k = Guru::where('nip', $this->nip)->first();

        $k->nama = $this->nama;
        $k->status = $this->status;
        $k->tgl_lahir = $this->tglLahir;
        $k->jenis_kelamin = $this->jenisKelamin;
        $k->agama = $this->agama;
        $k->pendidikan = $this->pendidikan;

        $k->save();

        session()->flash(
            'success',
            'Berhasil Memperbaharui Data Guru'
        );
    }
}

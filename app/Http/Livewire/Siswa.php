<?php

namespace App\Http\Livewire;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Siswa extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search;
    public $perPage = 5;
    public $header;
    public $createSiswaModal = false;
    public $updateSiswaModal = false;
    public $deleteModalOpen = false;
    public $deleteId = '';

    public $nisn;
    public $nama;
    public $tglLahir;
    public $jenisKelamin;
    public $agama;
    public $alamat;
    public $foto;
    public $namaAyah;
    public $namaIbu;

    public $kelas;

    public function render()
    {
        $this->header = 'Siswa';

        return view('siswa.index', [
            'siswa' => \App\Models\Siswa::with(['user', 'kelas', 'kelas.jurusan'])->where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('nisn', 'like', '%' . $this->search . '%')
                ->paginate($this->perPage),
        ]);
    }

    public function createSiswaModalPopover()
    {
        $this->createSiswaModal = true;
    }

    public function createSiswaModalClose()
    {
        $this->createSiswaModal = false;
    }

    public function updateSiswaModalPopover()
    {
        $this->updateSiswaModal = true;
    }

    public function updateSiswaModalClose()
    {
        $this->updateSiswaModal = false;
    }

    public function openDeleteModalPopover($id)
    {
        $this->deleteId = $id;
        $this->deleteModalOpen = true;
    }

    public function closeDeleteModalPopover()
    {
        $this->deleteModalOpen = false;
    }

    public function create()
    {
        $this->header = 'Tambah Siswa';
        $this->resetInputFields();
        $this->createSiswaModalPopover();
    }

    public function edit($id)
    {
        $k = \App\Models\Siswa::where('nisn', $id)->first();

        $this->nisn = $k->nisn;
        $this->nama = $k->nama;
        $this->jenisKelamin = $k->jenis_kelamin;
        $this->namaAyah = $k->nama_ayah;
        $this->namaIbu = $k->nama_ibu;
        $this->tglLahir = $k->tgl_lahir;
        $this->agama = $k->agama;
        $this->alamat = $k->alamat;
        $this->kelas = $k->kelas_id;

        $this->updateSiswaModalPopover();
    }

    public function store()
    {
        $this->validate([
            'nisn' => 'required|unique:siswa',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'namaAyah' => 'required',
            'namaIbu' => 'required',
            'tglLahir' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'kelas' => 'required',
        ]);

        \App\Models\Siswa::create(
            [
                'nisn' => $this->nisn,
                'nama' => $this->nama,
                'kelas_id' => $this->kelas,
                'jenis_kelamin' => $this->jenisKelamin,
                'nama_ayah' => $this->namaAyah,
                'nama_ibu' => $this->namaIbu,
                'tgl_lahir' => $this->tglLahir,
                'alamat' => $this->alamat,
                'agama' => $this->agama,
            ]
        );

        $siswaImg = null;

        if ($image = $this->foto) {
            $siswaImg = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $this->foto->storeAs(
                'public/',
                $siswaImg
            );
        }

        User::create([
            'username' => $this->nisn,
            'password' => Hash::make($this->nisn),
            'roles_id' => 3,
            'profile_photo_path' => $siswaImg,
        ]);

        session()->flash(
            'success',
            'Berhasil Menambahkan Data Siswa'
        );

        $this->createSiswaModalClose();
        $this->resetInputFields();
    }

    public function update($id)
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

        $k = \App\Models\Siswa::where('nisn', $id)->first();

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

        $this->updateSiswaModalClose();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->nisn = '';
        $this->nama = '';
        $this->namaAyah = '';
        $this->namaIbu = '';
        $this->tglLahir = '';
        $this->jenisKelamin = '';
        $this->agama = '';
        $this->alamat = '';
        $this->kelas = '';
        $this->foto = null;
    }

    public function delete()
    {
        $siswa = \App\Models\Siswa::where('nisn', $this->deleteId)->first();

        $siswa->delete();
        $user = User::where('username', $this->deleteId)->first();
        $user->tokens->each->delete();
        $user->delete();

        session()->flash('success', 'Berhasil menghapus data siswa');

        $this->closeDeleteModalPopover();
    }
}

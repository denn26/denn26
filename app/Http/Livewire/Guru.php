<?php

namespace App\Http\Livewire;

use App\Actions\Jetstream\DeleteUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Guru as GuruModel;

class Guru extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search;
    public $perPage = 5;
    public $header;
    public $createGuruModal = false;
    public $updateGurulModal = false;
    public $deleteModalOpen = false;
    public $deleteId = '';

    public $nip;
    public $nama;
    public $status;
    public $tglLahir;
    public $jenisKelamin;
    public $agama;
    public $pendidikan;
    public $foto;

    public function render()
    {
        $this->header = 'Guru';

        return view('guru.index', [
            'guru' => GuruModel::with(['user'])->where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('nip', 'like', '%' . $this->search . '%')
                ->paginate($this->perPage),
        ]);
    }

    public function createGuruModalPopover()
    {
        $this->createGuruModal = true;
    }

    public function createGuruModalClose()
    {
        $this->createGuruModal = false;
    }

    public function updateGuruModalPopover()
    {
        $this->updateGurulModal = true;
    }

    public function updateGuruModalClose()
    {
        $this->updateGurulModal = false;
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
        $this->header = 'Tambah Guru';
        $this->resetInputFields();
        $this->createGuruModalPopover();
    }

    public function edit($id)
    {
        $k = GuruModel::where('nip', $id)->first();

        $this->nip = $k->nip;
        $this->nama = $k->nama;
        $this->status = $k->status;
        $this->tglLahir = $k->tgl_lahir;
        $this->jenisKelamin = $k->jenis_kelamin;
        $this->agama = $k->agama;
        $this->pendidikan = $k->pendidikan;

        $this->updateGuruModalPopover();
    }

    public function store()
    {
        $guruImage = null;

        $this->validate([
            'nip' => 'required|unique:guru',
            'nama' => 'required',
            'status' => 'required',
            'tglLahir' => 'required',
            'jenisKelamin' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
        ]);

        if ($image = $this->foto) {
            $guruImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $this->foto->storeAs(
                'public/',
                $guruImage
            );
        }

        GuruModel::create(
            [
                'nip' => $this->nip,
                'nama' => $this->nama,
                'status' => $this->status,
                'tgl_lahir' => $this->tglLahir,
                'jenis_kelamin' => $this->jenisKelamin,
                'agama' => $this->agama,
                'pendidikan' => $this->pendidikan,
            ]
        );

        User::create([
            'username' => $this->nip,
            'password' => Hash::make($this->nip),
            'roles_id' => 2,
            'profile_photo_path' => $guruImage,
        ]);

        session()->flash(
            'success',
            'Berhasil Menambahkan Data Guru'
        );

        $this->createGuruModalClose();
        $this->resetInputFields();
    }

    public function update($id)
    {
        $k = GuruModel::find($id);

        $this->validate([
            'nama' => 'required',
            'status' => 'required',
            'tglLahir' => 'required',
            'jenisKelamin' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
        ]);

        $guruImage = null;

        $k->nama = $this->nama;
        $k->status = $this->status;
        $k->tgl_lahir = $this->tglLahir;
        $k->jenis_kelamin = $this->jenisKelamin;
        $k->agama = $this->agama;
        $k->pendidikan = $this->pendidikan;

        if ($image = $this->foto) {
            $guruImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $this->foto->storeAs(
                'public/',
                $guruImage
            );
        }

        $k->save();

        User::where('username', $this->nip)->update(['profile_photo_path' => $guruImage]);

        session()->flash(
            'success',
            'Berhasil Memperbaharui Data Guru'
        );

        $this->updateGuruModalClose();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->nip = '';
        $this->nama = '';
        $this->status = '';
        $this->tglLahir = '';
        $this->jenisKelamin = '';
        $this->agama = '';
        $this->pendidikan = '';
        $this->foto = null;
    }

    public function delete()
    {
        $guru = GuruModel::where('nip', $this->deleteId)->first();

        $guru->delete();
        $user = User::where('username', $this->deleteId)->first();
        $user->tokens->each->delete();
        $user->delete();
        session()->flash('success', 'Berhasil menghapus data guru');

        $this->closeDeleteModalPopover();
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Berita as ModelsBerita;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Berita extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search;
    public $perPage = 5;
    public $header;
    public $isCreateModalOpen = 0;
    public $isUpdateModalOpen = 0;
    public $deleteModalOpen = false;
    public $deleteId = '';

    public $beritaId;
    public $judul;
    public $deskripsi;
    public $foto;

    public function render()
    {
        $this->header = 'Berita';

        return view('berita.index', [
            'berita' => ModelsBerita::where('judul', 'like', '%' . $this->search . '%')->paginate($this->perPage)
        ]);
    }

    public function openCreateModalPopover()
    {
        $this->isCreateModalOpen = true;
    }
    public function closeCreateModalPopover()
    {
        $this->isCreateModalOpen = false;
    }

    public function openUpdateModalPopover()
    {
        $this->isUpdateModalOpen = true;
    }
    public function closeUpdateModalPopover()
    {
        $this->isUpdateModalOpen = false;
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
        $this->header = 'Tambah Berita';
        $this->resetInputFields();
        $this->openCreateModalPopover();
    }

    public function edit($id)
    {
        $b = ModelsBerita::find($id);

        $this->judul = $b->judul;
        $this->deskripsi = $b->deskripsi;
        $this->beritaId = $b->id;
        $this->openUpdateModalPopover();
    }

    private function resetInputFields()
    {
        $this->judul = '';
        $this->deskripsi = '';
        $this->beritaId = '';
    }

    public function store()
    {
        $this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($image = $this->foto) {
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $this->foto->storeAs(
                'public/images',
                $profileImage
            );
        }

        ModelsBerita::create(
            [
                'judul' => $this->judul,
                'deskripsi' => $this->deskripsi,
                'foto' => $profileImage
            ]
        );

        session()->flash(
            'success',
            'Berhasil Menambahkan Data Berita'
        );

        $this->closeCreateModalPopover();
        $this->resetInputFields();
    }

    public function update($id)
    {

        $this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $b = ModelsBerita::find($id);
        $b->judul = $this->judul;
        $b->deskripsi = $this->deskripsi;

        if ($image = $this->foto) {
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $this->foto->storeAs(
                'public/images',
                $profileImage
            );
            $b->foto = $profileImage;
        }

        $b->save();

        session()->flash(
            'success',
            'Berhasil Memperbaharui Data Berita'
        );

        $this->closeUpdateModalPopover();
        $this->resetInputFields();
    }

    public function delete()
    {
        ModelsBerita::find($this->deleteId)->delete();

        session()->flash('success', 'Berhasil menghapus data berita');

        $this->closeDeleteModalPopover();
    }
}

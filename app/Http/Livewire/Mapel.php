<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mapel as MapelModel;

class Mapel extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 5;
    public $header;
    public $createMapelModal = false;
    public $updateMapelModal = false;
    public $deleteModalOpen = false;
    public $deleteId = '';

    public $mapelId;
    public $nama;

    public function render()
    {
        $this->header = 'Mata Pelajaran';

        return view('mapel.index', [
            'mapel' => MapelModel::where('nama', 'like', '%' . $this->search . '%')->paginate($this->perPage),
        ]);
    }

    public function createMapelModalPopover()
    {
        $this->createMapelModal = true;
    }

    public function createMapelModalClose()
    {
        $this->createMapelModal = false;
    }

    public function updateMapelModalPopover()
    {
        $this->updateMapelModal = true;
    }

    public function updateMapelModalClose()
    {
        $this->updateMapelModal = false;
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
        $this->header = 'Tambah Mata Pelajaran';
        $this->resetInputFields();
        $this->createMapelModalPopover();
    }

    public function edit($id)
    {
        $k = MapelModel::find($id);

        $this->mapelId = $k->id;
        $this->nama = $k->nama;

        $this->updateMapelModalPopover();
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
        ]);

        MapelModel::create(
            [
                'nama' => $this->nama,
            ]
        );

        session()->flash(
            'success',
            'Berhasil Menambahkan Data Mata Pelajaran'
        );

        $this->createMapelModalClose();
        $this->resetInputFields();
    }

    public function update($id)
    {

        $this->validate([
            'nama' => 'required',
        ]);

        $k = MapelModel::find($id);
        $k->nama = $this->nama;
        $k->save();

        session()->flash(
            'success',
            'Berhasil Memperbaharui Data Mata Pelajaran'
        );

        $this->updateMapelModalClose();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->nama = '';
    }

    public function delete()
    {
        MapelModel::find($this->deleteId)->delete();

        session()->flash('success', 'Berhasil menghapus data mata pelajaran');

        $this->closeDeleteModalPopover();
    }
}

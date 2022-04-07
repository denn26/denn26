<?php

namespace App\Http\Livewire;

use App\Models\Berita as ModelsBerita;
use App\Models\Jurusan;
use App\Models\Kelas as ModelsKelas;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class Kelas extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 5;
    public $header;
    public $createKelasModal = false;
    public $updateKelasModal = false;
    public $deleteModalOpen = false;
    public $detailModalOpen = false;
    public $deleteId = '';

    public $kelasId;
    public $jurusanId;
    public $nama;
    public $semester;
    public $tahunAjaran;

    public $jurusan;
    public $siswa;
    public $pilihKelas;
    public $semuaKelas;
    public $selected = [];
    public $selectAll = false;

    public function render()
    {
        $this->header = 'Kelas';

        $kelas = ModelsKelas::where('nama', 'like', '%' . $this->search . '%')->paginate($this->perPage);

        return view('kelas.index', [
            'kelas' => $kelas,
        ]);
    }

    public function detail($id)
    {
        $this->siswa = Siswa::with(['kelas'])->where('kelas_id', $id)->get();
        $this->semuaKelas = \App\Models\Kelas::all();
        $this->detailModalPopOver();
    }

    public function move()
    {
        foreach ($this->selected as $select) {
            Siswa::where('nisn', $select)->update(['kelas_id' => $this->pilihKelas]);
        }

        $this->selected = [];
        $this->selectAll = false;

        $this->detailModalClose();
    }

    public function detailModalPopOver()
    {
        $this->detailModalOpen = true;
    }

    public function detailModalClose()
    {
        $this->detailModalOpen = false;
    }

    public function createKelasModalPopover()
    {
        $this->createKelasModal = true;
    }

    public function createKelasModalClose()
    {
        $this->createKelasModal = false;
    }

    public function updateKelasModalPopover()
    {
        $this->updateKelasModal = true;
    }

    public function updateKelasModalClose()
    {
        $this->updateKelasModal = false;
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

        $this->jurusan = Jurusan::all();

        $this->resetInputFields();
        $this->createKelasModalPopover();
    }

    public function edit($id)
    {
        $k = \App\Models\Kelas::find($id);

        $this->kelasId = $k->id;
        $this->nama = $k->nama;
        $this->jurusanId = $k->jurusan_id;
        $this->semester = $k->semester;
        $this->tahunAjaran = $k->tahun_ajaran;
        $this->updateKelasModalPopover();
    }

    public function store()
    {
        $this->validate([
            'jurusanId' => 'required',
            'nama' => 'required',
            'semester' => 'required',
            'tahunAjaran' => 'required'
        ]);

        \App\Models\Kelas::create(
            [
                'jurusan_id' => $this->jurusanId,
                'nama' => $this->nama,
                'semester' => $this->semester,
                'tahun_ajaran' => $this->tahunAjaran
            ]
        );

        session()->flash(
            'success',
            'Berhasil Menambahkan Data Kelas'
        );

        $this->createKelasModalClose();
        $this->resetInputFields();
    }

    public function update($id)
    {

        $this->validate([
            'jurusanId' => 'required',
            'nama' => 'required',
            'semester' => 'required',
            'tahunAjaran' => 'required'
        ]);

        $k = \App\Models\Kelas::find($id);
        $k->jurusan_id = $this->jurusanId;
        $k->nama = $this->nama;
        $k->semester = $this->semester;
        $k->tahun_ajaran = $this->tahunAjaran;

        $k->save();

        session()->flash(
            'success',
            'Berhasil Memperbaharui Data Kelas'
        );

        $this->updateKelasModalClose();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->jurusanId = '';
        $this->nama = '';
        $this->semester = '';
        $this->tahunAjaran = '';
    }

    public function delete()
    {
        $kelas = \App\Models\Kelas::find($this->deleteId);

        if ($kelas->siswa()->exists()
        ) {
            session()->flash('failed', 'Gagal Menghapus! Data sedang digunakan di tabel lain');
            $this->closeDeleteModalPopover();
            return;
        }

        $kelas->delete();
        session()->flash('success', 'Berhasil menghapus data kelas');

        $this->closeDeleteModalPopover();
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = Siswa::pluck('nisn');
        } else {
            $this->selected = [];
        }
    }
}

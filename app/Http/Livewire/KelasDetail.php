<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class KelasDetail extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 5;
    public $header;

    public $kelasId;

    public function render()
    {



        $siswa = Siswa::with(['kelas'])->where('kelas_id', $id)->paginate($this->perPage);

        return view('kelas.detail', [
            'siswa' => $siswa,
        ]);
    }
}

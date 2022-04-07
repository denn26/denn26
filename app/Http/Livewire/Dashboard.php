<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use Livewire\Component;

class Dashboard extends Component
{

    public $guru;
    public $siswa;
    public $kelas;
    public $mapel;

    public function render()
    {
        $this->guru = Guru::all()->count();
        $this->siswa = Siswa::all()->count();
        $this->kelas = Kelas::all()->count();
        $this->mapel = Mapel::all()->count();

        return view('livewire.dashboard');
    }
}

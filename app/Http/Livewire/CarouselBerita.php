<?php

namespace App\Http\Livewire;

use App\Models\Berita;
use Livewire\Component;

class CarouselBerita extends Component
{

    public $berita;

    public function render()
    {
        $this->berita = Berita::all();

        return view('livewire.carousel-berita');
    }
}

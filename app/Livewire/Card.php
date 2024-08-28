<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\lapak;
use App\Models\Image;


class Card extends Component
{
    public $lapak;
    public $image;
    
    public function mount()
    {
        $this->lapak = Lapak::get();
        $this->image = Image::all();
        // foreach ($variable as $key => $value) {
        //     # code...
        // }
        // $image= Image::where($this->lapak->id,'lapak_id')->first();
    }

    public function render()
    {
        return view('livewire.card',[
            'hiro' => $this->image
        ]);
    }
}

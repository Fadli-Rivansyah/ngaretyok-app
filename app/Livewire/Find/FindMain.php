<?php

namespace App\Livewire\Find;

use Livewire\Component;
use App\Models\Lapak;
use App\Models\User;
use App\Notifications\NewNotification;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Attributes\On; 
use App\Mail\RumputKitaEmail;
use Illuminate\Support\Facades\Mail;

class FindMain extends Component
{
    public $lapak=[];
    public $dataLapak=[];
    public $panen;

    #[Url] 
    public $search;

    public function mount()
    {
        if(empty($this->search)){
            $this->dataLapak = Lapak::all();
        }
    }
    public function placeholder()
    {
        return view('loading')->layout('layouts.app');
    }

    #[Title('Find Lapak')] 
    public function render()
    {
        $waktuSaatIni = now();
        $waktu = Lapak::where('tanggal_lapak', '==', 'siap panen')->get();
        
        return view('find',[
            'searchLapak' => Lapak::search($this->search)->get(),
            'panenRumput' => $waktu,
        ])->layout('layouts.app');
    }
}

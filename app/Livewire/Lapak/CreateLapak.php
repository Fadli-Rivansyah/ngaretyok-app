<?php

namespace App\Livewire\Lapak;

use Livewire\Component;
use App\Models\Lapak;
use App\Models\Image;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\Title;

class CreateLapak extends Component
{
    use WithFileUploads;
    
    public $user_id;
    // validasi data
    #[Validate('required|string|max:100')] 
    public $nama_lapak = '';
 
    #[Validate('required|date')] 
    public $tanggal_lapak = '';

    #[Validate('required|string')] 
    public $deskripsi_lapak = '';

    #[Validate('required|image|max:10240')] 
    public $foto_lapak = [];

    public $idicator = false;

    public function deletePreview($index)
    {
        if(isset($this->foto_lapak[$index])) {
            unset($this->foto_lapak[$index]);
            // Reindex array to remove gaps
            $this->foto_lapak = array_values($this->foto_lapak);
        }
    }

    //menyimpan data kedatabase
    public function save(){
        $lapak = Lapak::create([
            'user_id' => Auth::user()->id,
            'nama_lapak' => $this->nama_lapak,
            'tanggal_lapak' => $this->tanggal_lapak,
            'deskripsi_lapak' => $this->deskripsi_lapak
        ]);

        foreach ($this->foto_lapak as $photo) {
            $filePath = $photo->storeAs('public/gambar/' . uniqid() . '.' . $photo->getClientOriginalExtension());
            Image::create([
                'lapak_id' => $lapak->id,
                'path' => $filePath,
            ]);
        }
        $this->reset(); 
   
        return redirect()->to('/lapak')->with('message', 'Berhasil ditambahkan!');
    }

    

    #[Title('Create Lapak')] 
    public function render()
    {
        return view('livewire.lapak.create-lapak',[
            'header' => 'Buat lapak',
            'previewUpdate' => ''
        ])->layout('layouts.app');
    }
}

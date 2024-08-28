<?php

namespace App\Livewire\Lapak;

use Livewire\Component;
use App\Models\Lapak;
use App\Models\Image;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ViewLapak extends Component
{
    public $lapak;
    public $images;
    public $idlapak;
    public $foto_lapak=[];

    public $isOpen = false;
    use WithFileUploads;

    public function mount($idlapak)
    {
        $this->idlapak = $idlapak;
        $lapak = Lapak::find($idlapak);
        $this->lapak= $lapak;
        $this->images= $lapak->images()->get();
    }

    public function deletePreview($index)
    {
        unset($this->foto_lapak[$index]);
        // Reindex array to remove gaps
        $this->foto_lapak = array_values($this->foto_lapak);
    }

    public function deleteImage($index)
    {
        $image = Image::find($this->images[$index]->id);
        unset($this->images[$index]);
        // Reindex array to remove gaps
        // delete lapak 
        $image->delete();
        Storage::delete($image);
    }
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function uploadGambar()
    {
        $this->validate([
            'foto_lapak.*' => 'required|image|max:10240'
        ]);

        foreach ($this->foto_lapak as $photo) {
            $filePath = $photo->storeAs('public/gambar/' . uniqid() . '.' . $photo->getClientOriginalExtension());
            Image::create([
                'lapak_id' => $this->idlapak,
                'path' => $filePath,
            ]);
        }
        $this->isOpen= false;
    }

    public function render()
    {
        return view('livewire.lapak.view-lapak',[
            'images' => $this->images,
            'hiro' => $this->images->first()->path ?? null,
        ])->layout('layouts.app');
    }
}

<?php

namespace App\Livewire\Lapak;

use Livewire\Component;
use App\Models\Lapak;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Livewire\Lapak\CreateLapak;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;

class UpdateLapak extends Component
{
    use WithFileUploads;
    // validasi data
    public $nama_lapak = '';
    public $tanggal_lapak = '';
    public $foto_lapak = [];
    public $deskripsi_lapak = '';

    public $idlapak;
    public $previewUpdate;
    public $images;
    
    public function mount(Lapak $lapak, $idlapak)
    {
        $this->idlapak = $idlapak;
        if($this->idlapak) {
            $lapak = Lapak::find($idlapak);
            $this->fill(
                $lapak->only('nama_lapak','tanggal_lapak','deskripsi_lapak'), 
            );;
            $this->previewUpdate =$lapak->images;
            $this->images = $lapak->images;
        }
    }

    public function deletePreview($index)
    {
        if(isset($this->foto_lapak[$index])) {
            unset($this->foto_lapak[$index]);
            // Reindex array to remove gaps
            $this->foto_lapak = array_values($this->foto_lapak);
        }
    }
 
    public function save(){
        $this->validate([
            'nama_lapak' => 'required|string|max:255',
            'tanggal_lapak' => 'required|date',
            'deskripsi_lapak' => 'required|string',
            'foto_lapak.*' => 'required|image|max:10240' ,
        ]);
        
        $lapak = Lapak::find($this->idlapak);
        $image = Image::where('lapak_id', $lapak->id);
        
        if(!empty($this->foto_lapak)){
            foreach ($this->previewUpdate as $item) {
                $image->delete($item->path);
                if(Storage::exists($item->path)){
                    $path = str_replace('storage', 'public', $item->path);
                    Storage::delete($path);
                }
            }

            foreach ($this->foto_lapak as $item) {
                $filePath = $item->storeAs('public/gambar/' . uniqid() . '.' . $item->getClientOriginalExtension());
                Image::create([
                    'lapak_id' => $lapak->id,
                    'path' => $filePath,
                ]);
            }
        } 

        $lapak->update([
            'user_id' => auth()->user()->id,
            'nama_lapak' => $this->nama_lapak,
            'tanggal_lapak' => $this->tanggal_lapak,
            'deskripsi_lapak' => $this->deskripsi_lapak
        ]);
        return redirect()->to('/lapak')->with('message', 'Berhasil diubah!');
    }

    #[Title('Update Lapak')] 
    public function render()
    {
        return view('livewire.lapak.create-lapak',[
            'header' => 'Edit lapak',
            'previewUpdate' => $this->previewUpdate
        ])->layout('layouts.app');
    }
}

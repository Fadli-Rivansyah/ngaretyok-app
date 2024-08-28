<?php

namespace App\Livewire\Lapak;

use Livewire\Component;
use App\Models\Lapak;
use Livewire\Attributes\Title;
use App\Livewire\Find\FindLapak;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Mail;
use App\Mail\RumputKitaEmail;
use Illuminate\Support\Facades\Storage;

// sms package
// use App\Notifications\SuccessfulRegistration;
// use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Carbon;


class LapakMain extends Component
{
    #[Url] 
    public $search='';
    public $lapak;

    public function mount()
    {
        $this->siapPanen();
        
        if(empty($this->search))
        {
            $this->lapak = Lapak::all();
        } 
    }
    public function viewLapak($idlapak)
    {
        return redirect()->route('view.lapak', ['idlapak' => $idlapak]);
    }

    public function editLapak($idlapak)
    {
        return redirect()->route('edit.lapak', ['idlapak' => $idlapak]);
    }

    public function aturWaktu($waktu,$idLapak){
        $lapak = Lapak::where('id', $idLapak);
        $waktuSekarang = Carbon::now()->format('Y-m-d');
        
        switch ($waktu) {
            case 'Seminggu':
                $lapak->update([
                    'created_at' => $waktuSekarang,
                    'tanggal_lapak' => Carbon::now()->addDays(7),
                ]);
                return redirect()->to('/lapak')->with('message', 'Waktu berhasil diubah');
            break;
            case 'Dua minggu':
                $lapak->update([
                    'created_at' => $waktuSekarang,
                    'tanggal_lapak' => Carbon::now()->addDays(14),
                ]);
                return redirect()->to('/lapak')->with('message', 'Waktu berhasil diubah');
            break;
            case 'Tiga minggu':
                $lapak->update([
                    'created_at' => $waktuSekarang,
                    'tanggal_lapak' => Carbon::now()->addDays(21),
                ]);
                return redirect()->to('/lapak')->with('message', 'Waktu berhasil diubah');
            break;
            case 'Sebulan':
                $lapak->update([
                    'created_at' => $waktuSekarang,
                    'tanggal_lapak' => Carbon::now()->addDays(30),
                ]);
                return redirect()->to('/lapak')->with('message', 'Waktu berhasil diubah');
            break;
        }
    }

    public function deleteLapak($id)
    {
        $lapak = Lapak::find($id);
        // Menghapus file dari storage
        foreach ($lapak->images as $image) {
            // $filePath = $image->storeAs('gambar/' . $image->id, $image->getClientOriginalName(), 'public');
            Storage::delete($image->path);
            // $filePath = $image->storeAs($image->path);
            // $filePath = $image->lapak_id;

            // Storage::delete($filePath);
        }
        $lapak->delete();
        return redirect()->to('/lapak')->with('message' ,'Lapak berhasil dihapus!');
    }

    public function siapPanen()
    {
        $waktuSaatIni = now();
        $siapPanen = Lapak::where('tanggal_lapak', '<=', $waktuSaatIni)->get();

            foreach ($siapPanen as $key => $item) {
                $item->update([
                    'tanggal_lapak' => 'siap panen'
                ]);
                Mail::to('fadlirivansyah32@gmail.com')->send(new RumputKitaEmail('fadli'));
            }
        // sms
        // Notification::route('vonage', config('app.admin_sms_number'))->notify(new SuccessfulRegistration('fadli'));
        //email
    }
    
    #[Title('Lapak')] 
    public function render()
    {
        return view('lapak',[
            'searchLapak' => Lapak::search($this->search)->get(),
        ])->layout('layouts.app');
    }
}
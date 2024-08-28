<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Lapak\CreateLapak;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use App\Models\Lapak;
use App\Models\User;
use App\Models\Image;
use Tests\TestCase;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Http\RedirectResponse;


class CreateLapakTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_access_create_lapak()
    {
        $user = User::factory()->create();
        // testing permintaaan http get lapak/create
        $response = $this->actingAs($user)->get('/lapak/create');
        $response->assertStatus(200);
    }

    #[Test]
    public function user_can_create_lapak()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Storage::fake('public');
        $file = UploadedFile::fake()->image('photo1.jpg');
        // $lapak = Lapak::find(1);

        Livewire::test(CreateLapak::class)
            ->set('nama_lapak', 'kebun coklat pak ponel')
            ->set('tanggal_lapak', 'siap panen')
            ->set('deskripsi_lapak', 'kebun coklat terdapat rumput')
            ->set('foto_lapak',[$file])
            ->call('save')
            ->assertRedirect('/lapak');

        $this->assertDatabaseHas('lapaks',[
            'user_id' => $user->id,
            'nama_lapak' => 'kebun coklat pak ponel',
            'tanggal_lapak' => 'siap panen',
            'deskripsi_lapak' => 'kebun coklat terdapat rumput'
        ]);

        // $lapak = Lapak::latest()->first();
        // $this->assertCount(1, $lapak->images);
        // $this->assertDatabaseHas('images',[
        //     'lapak_id' => $lapak->id,
        //     'path' =>  'public/gambar/' . $file->hashName()
        // ]);
        // Storage::disk('public')->assertExists('public/gambar/' . $file->hashName());
    }
    
  
}

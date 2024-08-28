<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;
use Livewire\Attributes\Title;
use Laravel\Scout\Searchable;


class Lapak extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'user_id','nama_lapak', 'tanggal_lapak', 'deskripsi_lapak'
    ];

    //search -> laravel scout
    public function toSearchableArray()
    {
        return $this->only('nama_lapak', 'deskripsi_lapak');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    } 
}

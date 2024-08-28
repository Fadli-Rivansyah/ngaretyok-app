<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lapak;

class Image extends Model
{
    use HasFactory;

    protected $fillable =[
        'lapak_id',
        'path'
    ];

    public function lapak()
    {
        return $this->belongsTo(Lapak::class);
    }
}

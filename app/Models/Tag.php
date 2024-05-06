<?php

namespace App\Models;

use App\Models\DigitalLibrary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function digital_libraries()
    {
        return $this->belongsToMany(DigitalLibrary::class, 'digital_libraries_tags');
    }
}

<?php

namespace App\Models;

use App\Enums\Status;
use App\Models\DigitalLibrary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    public function digital_library()
    {
        return $this->hasMany(DigitalLibrary::class);
    }
}

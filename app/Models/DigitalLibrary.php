<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Administrator;
use App\Enums\PublicationStatus;
use App\Models\DigitalLibraryCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DigitalLibrary extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'article_image',
        'article_file',
        'authors',
        'publication_date',
        'article_year',
        'article_volume',
        'article_number_pages',
        'article_number',
        'isnn',
        'people_opinion',
        'content',
        'status',
        'digital_library_category_id',
        'administrator_id',
    ];

    protected $casts = [
        'status' => PublicationStatus::class,
    ];

    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }

    public function digital_library_category()
    {
        return $this->belongsTo(DigitalLibraryCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'digital_libraries_tags');
    }
}

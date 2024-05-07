<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Administrator;
use App\Enums\PublicationStatus;
use App\Models\Category;
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
        'category_id',
        'administrator_id',
    ];

    protected $casts = [
        'status' => PublicationStatus::class,
    ];

    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'digital_libraries_tags');
    }
}

<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'category_id',
        'isbn',
        'title',
        'slug',
        'description',
        'author',
        'publisher',
        'publication_year',
        'stock',
        'file',
        'image',
    ];
    /**
     * Return the sluggable configuration array for this model.
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function uploaded_by()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
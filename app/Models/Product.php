<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $quarded = 'false';

    protected $fillable = [
        'title',
        'description',
        'content',
        'preview_image',
        'price',
        'count',
        'is_publiched',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->hasManyThrough(
            Tag::class,
            ProductTag::class,
            'product_id',
            'id',
            'id',
            'tag_id',
        );
    }
    public function colors()
    {
        return $this->hasManyThrough(
            Color::class,
            ColorProduct::class,
            'product_id',
            'id',
            'id',
            'color_id',
        );
    }
    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->preview_image);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function getImagesUrlAttribute()
    {
        $urls = [];
        foreach ($this->images as $key => $image) {
            $urls[$key] = url('storage/' . $image->file_path);
        }
        return $urls;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $quarded = 'false';

    protected $fillable = [
        'file_path',
        'product_id',
    ];

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->file_path);
    }
}

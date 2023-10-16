<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    protected $table = 'color_product';
    protected $quarded = 'false';

    protected $fillable = [
        'color_id',
        'product_id',
    ];
}

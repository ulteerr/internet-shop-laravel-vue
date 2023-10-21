<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
      
        $store = $request->validated();

        if (isset($store['preview_image'])) {
            $store['preview_image'] = Storage::disk('public')->put('images/product', $store['preview_image'][0]);
        }
        if (isset($store['images'])) {
            $images = [];
            foreach ($store['images'] as $key => $image) {
                $images[$key] = Storage::disk('public')->put('images/product', $image);
            }
        }
        $tagsIds = $store['tags'];
        $colorsIds = $store['colors'];
        unset($store['tags'], $store['colors'], $store['images']);

        $product = Product::firstOrCreate([
            'title' => $store['title'],
        ], $store);
        foreach ($tagsIds as $tagId) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagId,
            ]);
        }
        foreach ($colorsIds as $colorId) {
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorId,
            ]);
        }
        foreach ($images as $image) {
            ProductImage::firstOrCreate([
                'product_id' => $product->id,
                'file_path' => $image,
            ]);
        }
        $response = [
            'redirectUrl' => route('admin.product.index')
        ];
        return response()->json($response);
    }
}

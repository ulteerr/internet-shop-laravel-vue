<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }

    public function deleteImage(Request $request)
    {
        $url = $request->url;
        $id = $request->id;
        $product = Product::find($id);
        $filePath = str_replace(url('storage'), '', $url);
        $filePath = ltrim($filePath, '/');

        if ($product->preview_image === $filePath) {
            $product->preview_image = null;
            $product->save();
        } else {
            $productImages = $product->images;
            foreach ($productImages as $image) {
                if ($image->file_path === $filePath) {
                    $image->delete();
                }
            }
        }
      
        $deleted = Storage::delete($filePath);

        if ($deleted) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}

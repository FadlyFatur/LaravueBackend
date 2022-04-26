<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $tipe = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if ($id) {
            $product = Product::with('galleries')->find($id);

            if ($product)
                return ResponseFormatter::success($product, 'Data produk berhasil diambil!');
            else
                return ResponseFormatter::error(null, 'Data produk tidak ada!', 404);
        }

        if ($id) {
            $product = Product::with('galleries')
                ->where('slug', $slug)
                ->first();

            if ($product)
                return ResponseFormatter::success($product, 'Data produk berhasil diambil!');
            else
                return ResponseFormatter::error(null, 'Data produk tidak ada!', 404);
        }

        $product = Product::with('galleries');

        if ($name)
            $product->where('nama', 'like', '%' . $name . '%');

        if ($tipe)
            $product->where('tipe', 'like', '%' . $tipe . '%');

        if ($price_from)
            $product->where('harga', '>=', $price_from);

        if ($price_to)
            $product->where('harga', '<=', $price_to);


        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data list produk berhasil diambil!'
        );
    }
}

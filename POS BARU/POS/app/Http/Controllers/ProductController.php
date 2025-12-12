<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::with('category')->get();
        return view('product.index', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:150',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            Product::create($request->all());
            DB::commit();
            return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.form_edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:150',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $product->update($request->all());
            DB::commit();
            return redirect()->route('product.index')->with('success', 'Produk berhasil diupdate!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }
}

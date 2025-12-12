<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('category.index', compact('data'));
    }

    public function create()
    {
        return view('category.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            Category::create($request->all());
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('category.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Category $category)
    {
        return view('category.form_edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name,' . $category->id,
            'description' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $category->update($request->all());
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Kategori berhasil diupdate!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('category.index')->with('error', $e->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', $e->getMessage());
        }
    }
}

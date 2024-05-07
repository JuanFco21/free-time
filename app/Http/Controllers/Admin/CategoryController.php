<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        if (Auth::guard('admin')->check()) {
            $this->middleware(['permission:category.index'])->only(['index']);
            $this->middleware(['permission:category.create'])->only(['create', 'store']);
            $this->middleware(['permission:category.edit'])->only(['edit', 'update']);
            $this->middleware(['permission:category.destroy'])->only(['destroy']);
        } else {
            return response()->json([
                'message' => 'Not Authorized',
            ], 401);
        }
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.catalogs.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.catalogs.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        toast('Categoria creada con exito!', 'success')->width('400');
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.catalogs.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);        

        toast('Categoria actualizada con exito!', 'success')->width('400');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return response(['status' => 'success', 'message' => __('Categoria eliminada con exito!')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('No se pudo eliminar la categoria')]);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DigitalLibraryCategory;
use App\Http\Requests\DigitalLibraryCategoryRequest;

class DigitalLibraryCategoryController extends Controller
{
    public function __construct()
    {
        if (Auth::guard('admin')->check()) {
            $this->middleware(['permission:digital_library_category.index'])->only(['index']);
            $this->middleware(['permission:digital_library_category.create'])->only(['create', 'store']);
            $this->middleware(['permission:digital_library_category.edit'])->only(['edit', 'update']);
            $this->middleware(['permission:digital_library_category.destroy'])->only(['destroy']);
        } else {
            return response()->json([
                'message' => 'Not Authorized',
            ], 401);
        }
    }

    public function index()
    {
        $digital_library_categories = DigitalLibraryCategory::all();
        return view('admin.catalogs.digital_library_categories.index', compact('digital_library_categories'));
    }

    public function create()
    {
        return view('admin.catalogs.digital_library_categories.create');
    }

    public function store(DigitalLibraryCategoryRequest $request)
    {
        DigitalLibraryCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        toast('Categoria creada con exito!', 'success')->width('400');
        return redirect()->route('digital_library_category.index');
    }

    public function edit($id)
    {
        $digital_library_category = DigitalLibraryCategory::findOrFail($id);
        return view('admin.catalogs.digital_library_categories.edit', compact('digital_library_category'));
    }

    public function update(DigitalLibraryCategoryRequest $request, $id)
    {
        $digital_library_category = DigitalLibraryCategory::findOrFail($id);
        
        $digital_library_category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);        

        toast('Categoria actualizada con exito!', 'success')->width('400');
        return redirect()->route('digital_library_category.index');
    }

    public function destroy($id)
    {
        try {
            $digital_library_category = DigitalLibraryCategory::findOrFail($id);
            $digital_library_category->delete();
            return response(['status' => 'success', 'message' => __('Categoria eliminada con exito!')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('No se pudo eliminar la categoria')]);
        }
    }
}

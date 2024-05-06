<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\DigitalLibrary;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DigitalLibraryCategory;
use App\Http\Requests\DigitalLibraryRequest;
use App\Models\Tag;
use App\Traits\ImageUploadTrait;

class DigitalLibraryController extends Controller
{
    use ImageUploadTrait,FileUploadTrait;

    public function __construct()
    {
        if (Auth::guard('admin')->check()) {
            $this->middleware(['permission:digital_library.index'])->only(['index']);
            $this->middleware(['permission:digital_library.create'])->only(['create', 'store']);
            $this->middleware(['permission:digital_library.edit'])->only(['edit', 'update']);
            $this->middleware(['permission:digital_library.destroy'])->only(['destroy']);
        } else {
            return response()->json([
                'message' => 'Not Authorized',
            ], 401);
        }
    }

    public function index()
    {
        $digital_libraries = DigitalLibrary::all();
        return view('admin.digital_library.index', compact('digital_libraries'));
    }

    public function create()
    {
        $digital_library_categories = DigitalLibraryCategory::all();
        return view('admin.digital_library.create', compact('digital_library_categories'));
    }

    public function store(DigitalLibraryRequest $request)
    {
        $imagePath = $this->handleImageUpload($request, 'article_image');
        $filePath = $this->handleFileUpload($request, 'article_file');

        $authors = json_encode($request->authors);

        $digital_library = DigitalLibrary::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'authors' => $authors,
            'content' => $request->content,
            'article_image' => $imagePath,
            'article_file' => $filePath,
            'people_opinion' => $request->people_opinion,
            'digital_library_category_id' => $request->digital_library_category,
            'publication_date' => $request->publication_date,
            'article_year' => $request->article_year,
            'article_volume' => $request->article_volume,
            'article_number_pages' => $request->article_number_pages,
            'article_number' => $request->article_number,
            'isnn' => $request->isnn,
            'status' => $request->status,
            'administrator_id' => Auth::guard('admin')->user()->id,
        ]);

        $tags = explode(',', $request->tags);
        $tags_id = [];

        foreach($tags as $tag)
        {
            $array_tag = Tag::create([
                'name' => $tag,
            ]);

            $tags_id[] = $array_tag->id;
        }

        $digital_library->tags()->attach($tags_id);

        toast('Articulo publicado con exito!', 'success')->width('400');
        return redirect()->route('digital_library.index');
    }

    public function edit($id)
    {
        $digital_library = DigitalLibrary::findOrFail($id);
        $digital_library_categories = DigitalLibraryCategory::all();
        return view('admin.digital_library.edit', compact('digital_library', 'digital_library_categories'));
    }

    public function update(DigitalLibraryRequest $request, $id)
    {
        $digital_library = DigitalLibrary::findOrFail($id);
        $imagePath = $this->handleImageUpload($request, 'article_image');
        $filePath = $this->handleFileUpload($request, 'article_file');

        $authors = json_encode($request->authors);

        $digital_library->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'authors' => $authors,
            'content' => $request->content,
            'article_image' => !empty($imagePath) ? $imagePath : $digital_library->article_image,
            'article_file' => !empty($filePath) ? $filePath : $digital_library->article_file,
            'people_opinion' => $request->people_opinion,
            'digital_library_category_id' => $request->digital_library_category,
            'publication_date' => $request->publication_date,
            'article_year' => $request->article_year,
            'article_volume' => $request->article_volume,
            'article_number_pages' => $request->article_number_pages,
            'article_number' => $request->article_number,
            'isnn' => $request->isnn,
            'status' => $request->status,
            'administrator_id' => Auth::guard('admin')->user()->id,
        ]);

        $tags = explode(',', $request->tags);
        $tags_id = [];

        $digital_library->tags()->delete();

        $digital_library->tags()->detach($digital_library->tags);

        foreach($tags as $tag)
        {
            $array_tag = Tag::create([
                'name' => $tag,
            ]);

            $tags_id[] = $array_tag->id;
        }

        $digital_library->tags()->attach($tags_id);

        toast('Articulo actualizado con exito!', 'success')->width('400');
        return redirect()->route('digital_library.index');
    }

    public function destroy($id)
    {
        try {
            $digital_library = DigitalLibrary::findOrFail($id);
            $this->deleteImage($digital_library->article_image);
            $this->deleteFile($digital_library->article_file);
            $digital_library->tags()->delete();
            $digital_library->delete();

            return response(['status' => 'success', 'message' => __('Articulo eliminado con exito!')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('No se pudo eliminar el articulo')]);
        }
    }
}

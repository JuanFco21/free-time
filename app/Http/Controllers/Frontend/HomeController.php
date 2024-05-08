<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\DigitalLibrary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $digital_library_categories = Category::with('digital_library')->where('status', 'Activo')->get();
        $digital_libraries_carousel = DigitalLibrary::with('category', 'tags')->where('status', 'Publicado')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $digital_libraries_pills = DigitalLibrary::with('category')->where('status', 'Publicado')
            ->inRandomOrder()
            ->take(4)
            ->get();
        return view('frontend.index', compact('digital_library_categories', 'digital_libraries_carousel', 'digital_libraries_pills'));
    }

    public function digitalLibraries(Request $request, string $category)
    {
        $digital_library_categories = Category::with('digital_library')->where('status', 'Activo')->get();
        $digital_library_slug = Category::where('slug', $category)->first();

        $digital_libraries = DigitalLibrary::query();

        $digital_libraries->when($request->has('search'), function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('authors', 'like', '%' . $request->search . '%');
            })->orWhereHas('tags', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            });
        });

        $digital_libraries = $digital_libraries
            ->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            })
            ->where('status', 'Publicado')
            ->paginate(6);

        return view('frontend.digital-libraries', compact('digital_library_categories', 'digital_library_slug', 'digital_libraries'));
    }

    public function digitalLibrariesDetails(string $category, string $publication)
    {
        $digital_library_categories = Category::with('digital_library')->where('status', 'Activo')->get();
        $digital_library_slug = Category::where('slug', $category)->first();
        $digital_libraries_carousel = DigitalLibrary::with('category', 'tags')
            ->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            })
            ->where('status', 'Publicado')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $digital_library = DigitalLibrary::with('category', 'tags')
            ->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            })
            ->where('slug', $publication)
            ->where('status', 'Publicado')
            ->first();

        return view('frontend.digital-libraries-details', compact('digital_library_categories', 'digital_library_slug', 'digital_libraries_carousel', 'digital_library'));
    }

    public function login()
    {
        $digital_library_categories = Category::with('digital_library')->where('status', 'Activo')->get();
        return view('frontend.auth.login', compact('digital_library_categories'));
    }
}

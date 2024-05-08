<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DigitalLibrary;

class HomeController extends Controller
{
    public function index()
    {
        $digital_library_categories = Category::with('digital_library')->where('status', 'Activo')->get();
        return view('frontend.index', compact('digital_library_categories'));
    }

    public function digitalLibraries(string $category)
    {
        $digital_library_categories = Category::with('digital_library')->where('status', 'Activo')->get();
        $digital_library_slug = Category::where('slug', $category)->first();
        $digital_libraries = DigitalLibrary::with('category', 'tags')
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
        $digital_library = DigitalLibrary::with('category', 'tags')
            ->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            })
            ->where('slug', $publication)
            ->where('status', 'Publicado')
            ->first();

        return view('frontend.digital-libraries-details', compact('digital_library_categories', 'digital_library_slug', 'digital_library'));
    }

    public function login()
    {
        $digital_library_categories = Category::with('digital_library')->where('status', 'Activo')->get();
        return view('frontend.auth.login', compact('digital_library_categories'));
    }
}

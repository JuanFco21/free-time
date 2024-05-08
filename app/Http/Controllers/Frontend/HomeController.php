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

    public function digitalLibraries(string $slug)
    {
        $digital_library_categories = Category::with('digital_library')->where('status', 'Activo')->get();
    
        $digital_library_slug = Category::where('slug', $slug)->first();
    
        $digital_libraries = DigitalLibrary::with('category', 'tags')
                            ->whereHas('category', function ($query) use ($slug) {
                                $query->where('slug', $slug);
                            })
                            ->where('status', 'Publicado')
                            ->paginate(6);
    
        return view('frontend.digital-libraries', compact('digital_library_categories', 'digital_library_slug', 'digital_libraries'));
    }    

    public function login()
    {
        $digital_library_categories = Category::with('digital_library')->where('status', 'Activo')->get();
        return view('frontend.auth.login', compact('digital_library_categories'));
    }
}

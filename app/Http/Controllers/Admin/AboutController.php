<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AboutController extends Controller
{

    public function __construct()
    {
        if (Auth::guard('admin')->check()) {
            $this->middleware(['permission:about.index'])->only(['index']);
            $this->middleware(['permission:about.update'])->only(['update']);
        } else {
            return response()->json([
                'message' => 'Not Authorized',
            ], 401);
        }
    }
    public function index()
    {
        $about = About::all();
        return view('admin.about-page.index', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first();

        if ($about) {
            $about->update([
                'content' => $request->content,
            ]);
            toast('¡Información actualizada con éxito!', 'success')->width('400');
        } else {
            About::create([
                'content' => $request->content,
            ]);
            toast('¡Información creada con éxito!', 'success')->width('400');
        }

        return redirect()->back();
    }
}

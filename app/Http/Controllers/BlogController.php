<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $blogs = Blog::where('user_id', Auth::id())->latest()->paginate(10);
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data['user_id'] = Auth::id();

        // Si el request tiene una imagen, la almacenamos en el disco público
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('blogs', 'public');
        }

        // Creamos el blog con los datos
        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'Blog creado.');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $this->authorize('update', $blog);
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Si el request tiene una nueva imagen, la procesamos
        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($blog->imagen) {
                Storage::disk('public')->delete($blog->imagen);
            }

            // Guarda la nueva imagen
            $data['imagen'] = $request->file('imagen')->store('blogs', 'public');
        }

        // Actualizamos el blog con los nuevos datos
        $blog->update($data);

        return redirect()->route('blogs.index')->with('success', 'Blog actualizado.');
    }


    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog eliminado.');
    }

    public function publicIndex()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('blog', compact('blogs'));
    }
}

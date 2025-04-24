<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    use AuthorizesRequests;
    /**
     * Mostrar todos los productos del usuario autenticado.
     */
    public function index()
    {
        $productos = Producto::where('user_id', Auth::id())->paginate(10);
        return view('productos.index', compact('productos'));
    }

    /**
     * Mostrar formulario para crear un nuevo producto.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Guardar un nuevo producto.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0',
        ]);

        // Asegura que 'destacado' esté presente como booleano
        $validated['destacado'] = $request->has('destacado');

        // Asegura que esté el user_id
        $validated['user_id'] = Auth::id();

        // Imagen
        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        Producto::create($validated);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Mostrar un producto.
     */
    public function show(Producto $producto)
    {
        $this->authorize('view', $producto);
        return view('productos.show', compact('producto'));
    }

    /**
     * Formulario para editar.
     */
    public function edit(Producto $producto)
    {
        $this->authorize('update', $producto);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualizar producto.
     */
    public function update(Request $request, Producto $producto)
    {
        $this->authorize('update', $producto);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'destacado' => 'boolean',
            'stock' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $producto->update($data);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }

    /**
     * Eliminar producto.
     */
    public function destroy(Producto $producto)
    {
        $this->authorize('delete', $producto);

        // Eliminar la imagen si existe
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        // Eliminar el producto
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito.');
    }
}

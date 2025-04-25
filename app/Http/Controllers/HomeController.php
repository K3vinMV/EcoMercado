<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    //
    public function index()
    {
        $productos = Producto::latest()->take(6)->get();
        $blogs = Blog::with('user')->latest()->take(7)->get();

        return view('index', compact('productos', 'blogs'));
    }
}

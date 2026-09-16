<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|string|max:255|unique:productos,sku',
            'nombre' => 'required|string|max:255',
            'descripcion_corta' => 'required|string|max:255',
            'descripcion_larga' => 'required|string',
            'imagen' => 'required|image|max:2048',
            'precio_neto' => 'required|numeric|min:0',
            'stock_actual' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'stock_bajo' => 'required|integer|min:0',
            'stock_alto' => 'required|integer|min:0',
        ]);

        $rutaImagen = $request->file('imagen')->store('productos', 'public');

        $precioVenta = round($request->precio_neto * 1.19, 2);

        Producto::create([
            'sku' => $request->sku,
            'nombre' => $request->nombre,
            'descripcion_corta' => $request->descripcion_corta,
            'descripcion_larga' => $request->descripcion_larga,
            'imagen' => $rutaImagen,
            'precio_neto' => $request->precio_neto,
            'precio_venta' => $precioVenta,
            'stock_actual' => $request->stock_actual,
            'stock_minimo' => $request->stock_minimo,
            'stock_bajo' => $request->stock_bajo,
            'stock_alto' => $request->stock_alto,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros;
class LibrosController extends Controller
{
    public function index()
    {
        $libros = Libros::all()->toArray();
        return array_reverse($libros);      
    }

    public function store(Request $request)
    {
        $libros = new Libros([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'author' => $request->input('author'),
            'editorial' => $request->input('editorial'),
            'pages' => $request->input('pages')
        ]);
        $libros->save();
        return response()->json('Libro Creado');
    }

    public function show($id)
    {
        $libros = Libros::find($id);
        return response()->json($libros);
    }

    public function update($id, Request $request)
    {
        $libros = Libros::find($id);
        $libros->update($request->all());
        return response()->json('Libro Actualizado');
    }

    public function destroy($id)
    {
        $libros = Libros::find($id);
        $libros->delete();
        return response()->json('Libro Eliminado!');
    }
}
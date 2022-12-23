<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{

    //create
    public function peliculaCreate(Request $request)
    {
        // return $request;
        try {
            $request->validate([
                'nombre' => 'required|string',
                'categoria' => 'required|string',
                'lanzamiento' => 'required|date',
                'descripcion' => 'required|string',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error'=>$th->getMessage()],400);
        }

        

        Pelicula::create([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'lanzamiento' => $request->lanzamiento,
            'descripcion' => $request->descripcion,
        ]);

        return 'la pelicula ' . $request->name . ' fue agregada exitosamente';
    }

    // list
    public function peliculaList()
    {
        return Pelicula::get();
    }
    //info
    public function peliculaInfo($id)
    {
        return Pelicula::find($id);
    }

    // update
    public function peliculaUpdate($id, Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'categoria' => 'required|string',
                'lanzamiento' => 'required|string',
                'descripcion' => 'required|string',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }

        Pelicula::find($id)->update([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'lanzamiento' => $request->lanzamiento,
            'descripcion' => $request->descripcion,
        ]);

        return 'actualizado exitosamente la pelicula ' . $id;
    }

    //delete
    public function peliculaDelete($id)
    {
        Pelicula::find($id)->delete();
        return 'eliminado exitosamente la pelicula ' . $id;
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Perro;
use App\Http\Requests\PerroRequest;

class PerroController extends Controller
{

    public function listar()
    {
        $perros = Perro::all();
        return response()->json(["perros" => $perros], 200);
    }


    public function crear(PerroRequest $request)
    {
       try {
            $perro = new Perro();
            $perro->nombre = $request->nombre;
            $perro->url_nombre = $request->url_nombre;
            $perro->descripcion= $request->descripcion;
            $perro->save();

            return response()->json(["perro" => $perro], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }


    }

    public function mostrar($id)
    {
        $perro = Perro::find($id);
        if (!$perro) {
            return response()->json(["error" => "Perro no encontrado"], 404);
        }
        return response()->json(["perro" => $perro], 200);
    }

    public function actualizar(PerroRequest $request, $id)
    {
        $perro = Perro::find($id);
        if (!$perro) {
            return response()->json(["error" => "Perro no encontrado"], 404);
        }

        try {
            $perro->nombre = $request->nombre;
            $perro->url_foto = $request->url_foto;
            $perro->descripcion = $request->descripcion;
            $perro->save();

            return response()->json(["perro" => $perro], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 400);
        }
    }


    public function borrar($id)
    {
        $perro = Perro::find($id);
        if (!$perro) {
            return response()->json(["error" => "Perro no encontrado"], 404);
        }

        try {
            $perro->delete();
            return response()->json(["mensaje" => "Perro eliminado correctamente"], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 400);
        }
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Perro;
use App\Http\Requests\PerroRequest;


class PerroController extends Controller
{

    public function listarPerro()
    {
        $perros = Perro::all();
        return response()->json(["perro" => $perros], Response::HTTP_OK);
    }


    public function crearPerro(PerroRequest $request)
    {
    try {
            $perro = new Perro();
            $perro->nombre = $request->nombre;
            $perro->url_foto = $request->url_foto;
            $perro->descripcion = $request->descripcion;
            $perro->save();

            return response()->json(["perro" => $perro], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function mostrarPerro($id)
    {
        $perro = Perro::find($id);
        if (!$perro) {
            return response()->json(["error" => "Perro no encontrado"], 404);
        }
        return response()->json(["perro" => $perro], 200);
    }

    public function actualizarPerro(PerroRequest $request, $id)
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


    public function borrarPerro($id)
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

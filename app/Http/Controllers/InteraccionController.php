<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interaccion;
use App\Http\Requests\InteraccionRequest;
use Illuminate\Http\Response;

class InteraccionController extends Controller
{
    public function listarInteraccion()
    {
        $interacciones = Interaccion::all();
        return response()->json(["interacciones" => $interacciones], Response::HTTP_OK);
    }

    public function crearInteraccion(InteraccionRequest $request)
    {
        try {
            $interaccion = new Interaccion();
            $interaccion->perro_interesado_id = $request->perro_interesado_id;
            $interaccion->perro_candidato_id = $request->perro_candidato_id;
            $interaccion->preferencia = $request->preferencia;
            $interaccion->save();

            return response()->json(["interaccion" => $interaccion], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function mostrarInteraccion($id)
    {
        $interaccion = Interaccion::find($id);
        if (!$interaccion) {
            return response()->json(["error" => "Interaccion no encontrada"], Response::HTTP_NOT_FOUND);
        }
        return response()->json(["interaccion" => $interaccion], Response::HTTP_OK);
    }

    public function grupoID($id)
    {
        $interacciones = Interaccion::where('perro_interesado_id', $id)->get();
    
        if ($interacciones->isEmpty()) {
            return response()->json(["error" => "No se encontraron interacciones para el ID"], Response::HTTP_NOT_FOUND);
        }
    
        return response()->json(["interacciones" => $interacciones], Response::HTTP_OK);
    }


    public function actualizarInteraccion($id, InteraccionRequest $request)
        
    {
        
        $interaccion = Interaccion::find($id);
        if (!$interaccion) {
            return response()->json(["error" => "Interaccion no encontrada"], Response::HTTP_NOT_FOUND);
        }

        try {
            $interaccion->perro_interesado_id = $request->perro_interesado_id;
            $interaccion->perro_candidato_id = $request->perro_candidato_id;
            $interaccion->preferencia = $request->preferencia;
            $interaccion->save();

            return response()->json(["interaccion" => $interaccion], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function borrarInteraccion($id)
    {
        $interaccion = Interaccion::find($id);
        if (!$interaccion) {
            return response()->json(["error" => "Interaccion no encontrada"], Response::HTTP_NOT_FOUND);
        }

        try {
            $interaccion->delete();
            return response()->json(["mensaje" => "Interaccion eliminada correctamente"], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}


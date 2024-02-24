<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransaccionesController extends Controller
{
    
    public function index()
    {
        $cuentas = Cuenta::with('idCliente')->get();
        return view('transacciones.transacciones', compact('cuentas'));
    }

    public function prueba()
    {
        return  response()->json([
            'status' => 'success',
            'message' => 'Transacción realizada con éxito',
            'data' => [
                'id' => 1,
                'cuentaOrigen' => 'Cuenta Origen',
                'cuentaDestino' => 'Cuenta Destino',
                'monto' => 1000,],
        ]);

    }
    public function realizarTransaccion(Request $request){


        // Llamada al procedimiento almacenado con valores específicos
      try{

          $respuesta = \DB::statement('EXEC transaccion_deposito ?, ?, ?', [
                (int)$request->monto,
                $request->cuentaOrigen,
                $request->cuentaDestino
        ]);

 
        flash()->success('Cliente guardado.');

        return response()->json([
            'status' => 'success',
            'message' => 'Transacción realizada con éxito',
            'data' => $respuesta,
        ]);

      } catch (\Exception $e) {
          return response()->json([
              'status' => 'error',
              'message' => $e->getMessage(),
            ]);
        }

   

    }
}

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
        return response()->json([
            'status' => 'success',
            'message' => 'Transacción realizada con éxito',
            'data' => [
                'id' => 1,
                'cuentaOrigen' => 'Cuenta Origen',
                'cuentaDestino' => 'Cuenta Destino',
                'monto' => 1000,],
        ]);

    }

    public function realizarTransaccion(Request $request)
    {


        // Llamada al procedimiento almacenado con valores específicos
        try {
            $respuesta = \DB::statement('EXEC transaccion_deposito ?, ?, ?', [
                (float)$request->monto,
                $request->cuentaOrigen,
                $request->cuentaDestino
            ]);

            // Verificar si la transacción fue exitosa
            if ($respuesta) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Transacción realizada con éxito',
                    'data' => $respuesta,
                ]);
            } else {
                // En caso de que $respuesta no sea verdadero, considerar como un error
                throw new \Exception('La transacción no se pudo completar correctamente.');
            }
        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }


    }

    public function GuardarCuenta(Request $request)
    {

        $input = $request->all();

        $id_cliente = $request->Id_Cliente;
        $saldo = $request->Saldo;
        $fecha_apetura = $request->Fecha_Apertura;
        $id_tipo_cuenta = $request->tipo_cuenta_id;
        $estado = $request->Estado;
        $id_tipo_moneda = $request->moneda_id;
        $no_cuenta = $request->no_cuenta;

        try {
            $respuesta = \DB::statement('EXEC crearCuenta ?, ?, ?, ?, ?, ?, ?', [
                $id_cliente,
                $saldo,
                $fecha_apetura,
                $id_tipo_cuenta,
                $estado,
                $id_tipo_moneda,
                $no_cuenta
            ]);
            // Verificar si la transacción fue exitosa
            if ($respuesta) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Transacción realizada con éxito',
                    'data' => $respuesta,
                ]);
            } else {

                throw new \Exception('La transacción no se pudo completar correctamente.');
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function GuardarCliente(Request $request)
    {

        $input = $request->all();

        $Nombre = $request->Nombre;
        $Apellido = $request->Apellido;
        $Direccion = $request->Direccion;
        $Telefono = $request->Telefono;
        $Fecha_Nac = $request->Fecha_Nac;
        $Estado = $request->Estado;
        $DPI = $request->dpi;

        try {
            $respuesta = \DB::statement('EXEC crearCliente ?, ?, ?, ?, ?, ?, ?', [
                $Nombre,
                $Apellido,
                $Direccion,
                $Telefono,
                $Fecha_Nac,
                $Estado,
                $DPI,
            ]);
            // Verificar si la transacción fue exitosa
            if ($respuesta) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Transacción realizada con éxito',
                    'data' => $respuesta,
                ]);
            } else {

                throw new \Exception('La transacción no se pudo completar correctamente.');
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

}

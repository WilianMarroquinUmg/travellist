<?php

namespace App\Http\Controllers;

use App\DataTables\CuentaDataTable;
use App\Http\Requests\CreateCuentaRequest;
use App\Http\Requests\UpdateCuentaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CuentaRepository;
use Illuminate\Http\Request;
use Flash;

class CuentaController extends AppBaseController
{
    /** @var CuentaRepository $cuentaRepository */
    private $cuentaRepository;

    public function __construct(CuentaRepository $cuentaRepo)
    {
        $this->cuentaRepository = $cuentaRepo;
    }

    /**
     * Display a listing of the Cuenta.
     */
    public function index(CuentaDataTable $cuentaDataTable)
    {
        return $cuentaDataTable->render('cuentas.index');
    }


    /**
     * Show the form for creating a new Cuenta.
     */
    public function create()
    {
        $tipo_cuentas = \App\Models\TipoCuenta::all();
        $tipo_monedas = \App\Models\TipoMoneda::all();
        $clientes = \App\Models\Cliente::all();
        return view('cuentas.create', compact('tipo_cuentas', 'tipo_monedas', 'clientes'));
    }

    /**
     * Store a newly created Cuenta in storage.
     */
    public function store(CreateCuentaRequest $request)
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
                Flash::success('Cuenta Creada.');
                return redirect(route('cuentas.index'));
            } else {

                throw new \Exception('La transacción no se pudo completar correctamente.');
            }
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            $error = true;
            $detalles = $e->getMessage();
            return redirect(route('cuentas.create', compact('error', 'detalles')));
        }
    }

    /**
     * Display the specified Cuenta.
     */
    public function show($id)
    {
        $cuenta = $this->cuentaRepository->find($id);

        if (empty($cuenta)) {
            Flash::error('Cuenta not found');

            return redirect(route('cuentas.index'));
        }

        return view('cuentas.show')->with('cuenta', $cuenta);
    }

    /**
     * Show the form for editing the specified Cuenta.
     */
    public function edit($id)
    {
        $cuenta = $this->cuentaRepository->find($id);

        if (empty($cuenta)) {
            Flash::error('Cuenta not found');

            return redirect(route('cuentas.index'));
        }

        return view('cuentas.edit')->with('cuenta', $cuenta);
    }

    /**
     * Update the specified Cuenta in storage.
     */
    public function update($id, UpdateCuentaRequest $request)
    {
        $cuenta = $this->cuentaRepository->find($id);

        if (empty($cuenta)) {
            Flash::error('Cuenta not found');

            return redirect(route('cuentas.index'));
        }

        $cuenta = $this->cuentaRepository->update($request->all(), $id);

        Flash::success('Cuenta updated successfully.');

        return redirect(route('cuentas.index'));
    }

    /**
     * Remove the specified Cuenta from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cuenta = $this->cuentaRepository->find($id);

        if (empty($cuenta)) {
            Flash::error('Cuenta not found');

            return redirect(route('cuentas.index'));
        }

        $this->cuentaRepository->delete($id);

        Flash::success('Cuenta deleted successfully.');

        return redirect(route('cuentas.index'));
    }
}

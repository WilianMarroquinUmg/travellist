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
    /** @var CuentaRepository $cuentaRepository*/
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
        return view('cuentas.create');
    }

    /**
     * Store a newly created Cuenta in storage.
     */
    public function store(CreateCuentaRequest $request)
    {
        $input = $request->all();

        $cuenta = $this->cuentaRepository->create($input);

        Flash::success('Cuenta saved successfully.');

        return redirect(route('cuentas.index'));
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

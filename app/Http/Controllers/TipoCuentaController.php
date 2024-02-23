<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoCuentaRequest;
use App\Http\Requests\UpdateTipoCuentaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TipoCuentaRepository;
use Illuminate\Http\Request;
use Flash;

class TipoCuentaController extends AppBaseController
{
    /** @var TipoCuentaRepository $tipoCuentaRepository*/
    private $tipoCuentaRepository;

    public function __construct(TipoCuentaRepository $tipoCuentaRepo)
    {
        $this->tipoCuentaRepository = $tipoCuentaRepo;
    }

    /**
     * Display a listing of the TipoCuenta.
     */
    public function index(Request $request)
    {
        $tipoCuentas = $this->tipoCuentaRepository->paginate(10);

        return view('tipo_cuentas.index')
            ->with('tipoCuentas', $tipoCuentas);
    }

    /**
     * Show the form for creating a new TipoCuenta.
     */
    public function create()
    {
        return view('tipo_cuentas.create');
    }

    /**
     * Store a newly created TipoCuenta in storage.
     */
    public function store(CreateTipoCuentaRequest $request)
    {
        $input = $request->all();

        $tipoCuenta = $this->tipoCuentaRepository->create($input);

        Flash::success('Tipo Cuenta saved successfully.');

        return redirect(route('tipo_Cuentas.index'));
    }

    /**
     * Display the specified TipoCuenta.
     */
    public function show($id)
    {
        $tipoCuenta = $this->tipoCuentaRepository->find($id);

        if (empty($tipoCuenta)) {
            Flash::error('Tipo Cuenta not found');

            return redirect(route('tipoCuentas.index'));
        }

        return view('tipo_cuentas.show')->with('tipoCuenta', $tipoCuenta);
    }

    /**
     * Show the form for editing the specified TipoCuenta.
     */
    public function edit($id)
    {
        $tipoCuenta = $this->tipoCuentaRepository->find($id);

        if (empty($tipoCuenta)) {
            Flash::error('Tipo Cuenta not found');

            return redirect(route('tipoCuentas.index'));
        }

        return view('tipo_cuentas.edit')->with('tipoCuenta', $tipoCuenta);
    }

    /**
     * Update the specified TipoCuenta in storage.
     */
    public function update($id, UpdateTipoCuentaRequest $request)
    {
        $tipoCuenta = $this->tipoCuentaRepository->find($id);

        if (empty($tipoCuenta)) {
            Flash::error('Tipo Cuenta not found');

            return redirect(route('tipoCuentas.index'));
        }

        $tipoCuenta = $this->tipoCuentaRepository->update($request->all(), $id);

        Flash::success('Tipo Cuenta updated successfully.');

        return redirect(route('tipoCuentas.index'));
    }

    /**
     * Remove the specified TipoCuenta from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoCuenta = $this->tipoCuentaRepository->find($id);

        if (empty($tipoCuenta)) {
            Flash::error('Tipo Cuenta not found');

            return redirect(route('tipoCuentas.index'));
        }

        $this->tipoCuentaRepository->delete($id);

        Flash::success('Tipo Cuenta deleted successfully.');

        return redirect(route('tipoCuentas.index'));
    }
}

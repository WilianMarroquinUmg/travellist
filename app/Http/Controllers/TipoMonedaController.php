<?php

namespace App\Http\Controllers;

use App\DataTables\TipoMonedaDataTable;
use App\Http\Requests\CreateTipoMonedaRequest;
use App\Http\Requests\UpdateTipoMonedaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TipoMonedaRepository;
use Illuminate\Http\Request;
use Flash;

class TipoMonedaController extends AppBaseController
{
    /** @var TipoMonedaRepository $tipoMonedaRepository*/
    private $tipoMonedaRepository;

    public function __construct(TipoMonedaRepository $tipoMonedaRepo)
    {
        $this->tipoMonedaRepository = $tipoMonedaRepo;
    }

    /**
     * Display a listing of the TipoMoneda.
     */
    public function index(TipoMonedaDataTable $tipoMonedaDataTable)
    {
    return $tipoMonedaDataTable->render('tipo_monedas.index');
    }


    /**
     * Show the form for creating a new TipoMoneda.
     */
    public function create()
    {
        return view('tipo_monedas.create');
    }

    /**
     * Store a newly created TipoMoneda in storage.
     */
    public function store(CreateTipoMonedaRequest $request)
    {
        $input = $request->all();

        $tipoMoneda = $this->tipoMonedaRepository->create($input);

        Flash::success('Tipo Moneda saved successfully.');

        return redirect(route('tipoMonedas.index'));
    }

    /**
     * Display the specified TipoMoneda.
     */
    public function show($id)
    {
        $tipoMoneda = $this->tipoMonedaRepository->find($id);

        if (empty($tipoMoneda)) {
            Flash::error('Tipo Moneda not found');

            return redirect(route('tipoMonedas.index'));
        }

        return view('tipo_monedas.show')->with('tipoMoneda', $tipoMoneda);
    }

    /**
     * Show the form for editing the specified TipoMoneda.
     */
    public function edit($id)
    {
        $tipoMoneda = $this->tipoMonedaRepository->find($id);

        if (empty($tipoMoneda)) {
            Flash::error('Tipo Moneda not found');

            return redirect(route('tipoMonedas.index'));
        }

        return view('tipo_monedas.edit')->with('tipoMoneda', $tipoMoneda);
    }

    /**
     * Update the specified TipoMoneda in storage.
     */
    public function update($id, UpdateTipoMonedaRequest $request)
    {
        $tipoMoneda = $this->tipoMonedaRepository->find($id);

        if (empty($tipoMoneda)) {
            Flash::error('Tipo Moneda not found');

            return redirect(route('tipoMonedas.index'));
        }

        $tipoMoneda = $this->tipoMonedaRepository->update($request->all(), $id);

        Flash::success('Tipo Moneda updated successfully.');

        return redirect(route('tipoMonedas.index'));
    }

    /**
     * Remove the specified TipoMoneda from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoMoneda = $this->tipoMonedaRepository->find($id);

        if (empty($tipoMoneda)) {
            Flash::error('Tipo Moneda not found');

            return redirect(route('tipoMonedas.index'));
        }

        $this->tipoMonedaRepository->delete($id);

        Flash::success('Tipo Moneda deleted successfully.');

        return redirect(route('tipoMonedas.index'));
    }
}

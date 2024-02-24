<?php

namespace App\Http\Controllers;

use App\DataTables\TipoMovimientoDataTable;
use App\Http\Requests\CreateTipoMovimientoRequest;
use App\Http\Requests\UpdateTipoMovimientoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TipoMovimientoRepository;
use Illuminate\Http\Request;
use Flash;

class TipoMovimientoController extends AppBaseController
{
    /** @var TipoMovimientoRepository $tipoMovimientoRepository*/
    private $tipoMovimientoRepository;

    public function __construct(TipoMovimientoRepository $tipoMovimientoRepo)
    {
        $this->tipoMovimientoRepository = $tipoMovimientoRepo;
    }

    /**
     * Display a listing of the TipoMovimiento.
     */
    public function index(TipoMovimientoDataTable $tipoMovimientoDataTable)
    {
    return $tipoMovimientoDataTable->render('tipo_movimientos.index');
    }


    /**
     * Show the form for creating a new TipoMovimiento.
     */
    public function create()
    {
        return view('tipo_movimientos.create');
    }

    /**
     * Store a newly created TipoMovimiento in storage.
     */
    public function store(CreateTipoMovimientoRequest $request)
    {
        $input = $request->all();

        $tipoMovimiento = $this->tipoMovimientoRepository->create($input);

        Flash::success('Tipo Movimiento saved successfully.');

        return redirect(route('tipo-movimientos.index'));
    }

    /**
     * Display the specified TipoMovimiento.
     */
    public function show($id)
    {
        $tipoMovimiento = $this->tipoMovimientoRepository->find($id);

        if (empty($tipoMovimiento)) {
            Flash::error('Tipo Movimiento not found');

            return redirect(route('tipo-movimientos.index'));
        }

        return view('tipo_movimientos.show')->with('tipoMovimiento', $tipoMovimiento);
    }

    /**
     * Show the form for editing the specified TipoMovimiento.
     */
    public function edit($id)
    {
        $tipoMovimiento = $this->tipoMovimientoRepository->find($id);

        if (empty($tipoMovimiento)) {
            Flash::error('Tipo Movimiento not found');

            return redirect(route('tipo-movimientos.index'));
        }

        return view('tipo_movimientos.edit')->with('tipoMovimiento', $tipoMovimiento);
    }

    /**
     * Update the specified TipoMovimiento in storage.
     */
    public function update($id, UpdateTipoMovimientoRequest $request)
    {
        $tipoMovimiento = $this->tipoMovimientoRepository->find($id);

        if (empty($tipoMovimiento)) {
            Flash::error('Tipo Movimiento not found');

            return redirect(route('tipo-movimientos.index'));
        }

        $tipoMovimiento = $this->tipoMovimientoRepository->update($request->all(), $id);

        Flash::success('Tipo Movimiento updated successfully.');

        return redirect(route('tipo-movimientos.index'));
    }

    /**
     * Remove the specified TipoMovimiento from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoMovimiento = $this->tipoMovimientoRepository->find($id);

        if (empty($tipoMovimiento)) {
            Flash::error('Tipo Movimiento not found');

            return redirect(route('tipo-movimientos.index'));
        }

        $this->tipoMovimientoRepository->delete($id);

        Flash::success('Tipo Movimiento deleted successfully.');

        return redirect(route('tipo-movimientos.index'));
    }
}

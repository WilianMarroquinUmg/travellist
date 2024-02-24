<?php

namespace App\Http\Controllers;

use App\DataTables\MovimientoDataTable;
use App\Http\Requests\CreateMovimientoRequest;
use App\Http\Requests\UpdateMovimientoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MovimientoRepository;
use Illuminate\Http\Request;
use Flash;

class MovimientoController extends AppBaseController
{
    /** @var MovimientoRepository $movimientoRepository*/
    private $movimientoRepository;

    public function __construct(MovimientoRepository $movimientoRepo)
    {
        $this->movimientoRepository = $movimientoRepo;
    }

    /**
     * Display a listing of the Movimiento.
     */
    public function index(MovimientoDataTable $movimientoDataTable)
    {
    return $movimientoDataTable->render('movimientos.index');
    }


    /**
     * Show the form for creating a new Movimiento.
     */
    public function create()
    {
        return view('movimientos.create');
    }

    /**
     * Store a newly created Movimiento in storage.
     */
    public function store(CreateMovimientoRequest $request)
    {
        $input = $request->all();

        $movimiento = $this->movimientoRepository->create($input);

        Flash::success('Movimiento saved successfully.');

        return redirect(route('movimientos.index'));
    }

    /**
     * Display the specified Movimiento.
     */
    public function show($id)
    {
        $movimiento = $this->movimientoRepository->find($id);

        if (empty($movimiento)) {
            Flash::error('Movimiento not found');

            return redirect(route('movimientos.index'));
        }

        return view('movimientos.show')->with('movimiento', $movimiento);
    }

    /**
     * Show the form for editing the specified Movimiento.
     */
    public function edit($id)
    {
        $movimiento = $this->movimientoRepository->find($id);

        if (empty($movimiento)) {
            Flash::error('Movimiento not found');

            return redirect(route('movimientos.index'));
        }

        return view('movimientos.edit')->with('movimiento', $movimiento);
    }

    /**
     * Update the specified Movimiento in storage.
     */
    public function update($id, UpdateMovimientoRequest $request)
    {
        $movimiento = $this->movimientoRepository->find($id);

        if (empty($movimiento)) {
            Flash::error('Movimiento not found');

            return redirect(route('movimientos.index'));
        }

        $movimiento = $this->movimientoRepository->update($request->all(), $id);

        Flash::success('Movimiento updated successfully.');

        return redirect(route('movimientos.index'));
    }

    /**
     * Remove the specified Movimiento from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $movimiento = $this->movimientoRepository->find($id);

        if (empty($movimiento)) {
            Flash::error('Movimiento not found');

            return redirect(route('movimientos.index'));
        }

        $this->movimientoRepository->delete($id);

        Flash::success('Movimiento deleted successfully.');

        return redirect(route('movimientos.index'));
    }
}

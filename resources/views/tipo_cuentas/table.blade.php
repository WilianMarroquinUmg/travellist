<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="tipo-cuentas-table">
            <thead>
            <tr>
                <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tipoCuentas as $tipoCuenta)
                <tr>
                    <td>{{ $tipoCuenta->descripcion }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['tipoCuentas.destroy', $tipoCuenta->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('tipoCuentas.show', [$tipoCuenta->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('tipoCuentas.edit', [$tipoCuenta->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $tipoCuentas])
        </div>
    </div>
</div>

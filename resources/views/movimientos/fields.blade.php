<!-- Id Cuenta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Id_Cuenta', 'Id Cuenta:') !!}
    {!! Form::number('Id_Cuenta', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Saldo Inicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Saldo_Inicial', 'Saldo Inicial:') !!}
    {!! Form::number('Saldo_Inicial', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Saldo Final Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Saldo_Final', 'Saldo Final:') !!}
    {!! Form::number('Saldo_Final', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Monto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Monto', 'Monto:') !!}
    {!! Form::number('Monto', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Fecha Mov Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Fecha_Mov', 'Fecha Mov:') !!}
    {!! Form::text('Fecha_Mov', null, ['class' => 'form-control','id'=>'Fecha_Mov']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#Fecha_Mov').datepicker()
    </script>
@endpush

<!-- Id Tipomov Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Id_TipoMov', 'Id Tipomov:') !!}
    {!! Form::number('Id_TipoMov', null, ['class' => 'form-control', 'required']) !!}
</div>
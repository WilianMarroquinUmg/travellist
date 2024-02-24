<!-- Id Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Id_Cliente', 'Id Cliente:') !!}
    {!! Form::number('Id_Cliente', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Saldo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Saldo', 'Saldo:') !!}
    {!! Form::number('Saldo', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Fecha Apertura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Fecha_Apertura', 'Fecha Apertura:') !!}
    {!! Form::text('Fecha_Apertura', null, ['class' => 'form-control','id'=>'Fecha_Apertura']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#Fecha_Apertura').datepicker()
    </script>
@endpush

<!-- Tipo Cuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_cuenta_id', 'Tipo Cuenta Id:') !!}
    {!! Form::number('tipo_cuenta_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Estado', 'Estado:') !!}
    {!! Form::text('Estado', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Moneda Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('moneda_id', 'Moneda Id:') !!}
    {!! Form::number('moneda_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- No Cuenta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_cuenta', 'No Cuenta:') !!}
    {!! Form::text('no_cuenta', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>
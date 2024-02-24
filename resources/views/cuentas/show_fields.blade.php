<!-- Id Cliente Field -->
<div class="col-sm-12">
    {!! Form::label('Id_Cliente', 'Id Cliente:') !!}
    <p>{{ $cuenta->Id_Cliente }}</p>
</div>

<!-- Saldo Field -->
<div class="col-sm-12">
    {!! Form::label('Saldo', 'Saldo:') !!}
    <p>{{ $cuenta->Saldo }}</p>
</div>

<!-- Fecha Apertura Field -->
<div class="col-sm-12">
    {!! Form::label('Fecha_Apertura', 'Fecha Apertura:') !!}
    <p>{{ $cuenta->Fecha_Apertura }}</p>
</div>

<!-- Tipo Cuenta Id Field -->
<div class="col-sm-12">
    {!! Form::label('tipo_cuenta_id', 'Tipo Cuenta Id:') !!}
    <p>{{ $cuenta->tipo_cuenta_id }}</p>
</div>

<!-- Estado Field -->
<div class="col-sm-12">
    {!! Form::label('Estado', 'Estado:') !!}
    <p>{{ $cuenta->Estado }}</p>
</div>

<!-- Moneda Id Field -->
<div class="col-sm-12">
    {!! Form::label('moneda_id', 'Moneda Id:') !!}
    <p>{{ $cuenta->moneda_id }}</p>
</div>

<!-- No Cuenta Field -->
<div class="col-sm-12">
    {!! Form::label('no_cuenta', 'No Cuenta:') !!}
    <p>{{ $cuenta->no_cuenta }}</p>
</div>


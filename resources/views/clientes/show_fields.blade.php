<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('Nombre', 'Nombre:') !!}
    <p>{{ $cliente->Nombre }}</p>
</div>

<!-- Apellido Field -->
<div class="col-sm-12">
    {!! Form::label('Apellido', 'Apellido:') !!}
    <p>{{ $cliente->Apellido }}</p>
</div>

<!-- Direccion Field -->
<div class="col-sm-12">
    {!! Form::label('Direccion', 'Direccion:') !!}
    <p>{{ $cliente->Direccion }}</p>
</div>

<!-- Telefono Field -->
<div class="col-sm-12">
    {!! Form::label('Telefono', 'Telefono:') !!}
    <p>{{ $cliente->Telefono }}</p>
</div>

<!-- Fecha Nac Field -->
<div class="col-sm-12">
    {!! Form::label('Fecha_Nac', 'Fecha Nac:') !!}
    <p>{{ $cliente->Fecha_Nac }}</p>
</div>

<!-- Estado Field -->
<div class="col-sm-12">
    {!! Form::label('Estado', 'Estado:') !!}
    <p>{{ $cliente->Estado }}</p>
</div>

<!-- Dpi Field -->
<div class="col-sm-12">
    {!! Form::label('dpi', 'Dpi:') !!}
    <p>{{ $cliente->dpi }}</p>
</div>


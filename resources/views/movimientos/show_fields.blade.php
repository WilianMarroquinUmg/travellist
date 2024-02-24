<!-- Id Cuenta Field -->
<div class="col-sm-12">
    {!! Form::label('Id_Cuenta', 'Id Cuenta:') !!}
    <p>{{ $movimiento->Id_Cuenta }}</p>
</div>

<!-- Saldo Inicial Field -->
<div class="col-sm-12">
    {!! Form::label('Saldo_Inicial', 'Saldo Inicial:') !!}
    <p>{{ $movimiento->Saldo_Inicial }}</p>
</div>

<!-- Saldo Final Field -->
<div class="col-sm-12">
    {!! Form::label('Saldo_Final', 'Saldo Final:') !!}
    <p>{{ $movimiento->Saldo_Final }}</p>
</div>

<!-- Monto Field -->
<div class="col-sm-12">
    {!! Form::label('Monto', 'Monto:') !!}
    <p>{{ $movimiento->Monto }}</p>
</div>

<!-- Fecha Mov Field -->
<div class="col-sm-12">
    {!! Form::label('Fecha_Mov', 'Fecha Mov:') !!}
    <p>{{ $movimiento->Fecha_Mov }}</p>
</div>

<!-- Id Tipomov Field -->
<div class="col-sm-12">
    {!! Form::label('Id_TipoMov', 'Id Tipomov:') !!}
    <p>{{ $movimiento->Id_TipoMov }}</p>
</div>


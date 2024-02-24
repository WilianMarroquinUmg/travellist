<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control', 'required', 'maxlength' => 10, 'maxlength' => 10]) !!}
</div>

<!-- Simbolo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('simbolo', 'Simbolo:') !!}
    {!! Form::text('simbolo', null, ['class' => 'form-control', 'required', 'maxlength' => 10, 'maxlength' => 10]) !!}
</div>
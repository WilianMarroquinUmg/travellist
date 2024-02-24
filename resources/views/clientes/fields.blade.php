<div id="app" class="col-12" style="display: flex; flex-wrap: wrap ">    <!-- Nombre Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Nombre', 'Nombre:') !!}
        <input class="form-control" type="text" name="Nombre" id="" v-model="nombre">
    </div>

    <!-- Apellido Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Apellido', 'Apellido:') !!}
        <input class="form-control" type="text" name="Apellido" v-model="Apellido">
    </div>

    <!-- Direccion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Direccion', 'Direccion:') !!}
        <input class="form-control" type="text" name="Direccion" v-model="Direccion">
    </div>

    <!-- Telefono Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Telefono', 'Telefono:') !!}
        <input class="form-control" type="number" name="Telefono" v-model="Telefono">
    </div>

    <!-- Fecha Nac Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Fecha_Nac', 'Fecha Nac:') !!}
        <input class="form-control" type="date" name="Fecha_Nac" v-model="Fecha_Nac">
    </div>
    <div class="form-group col-sm-6">

        <label for="cuenta_Origen">Estado:</label>
        <multiselect
            v-model="estado"
            placeholder="Seleccione una cuenta"
            track-by="id"
            :options="estados"
            :multiple="false"
            :taggable="true"
        ></multiselect>

        <!-- Estado Field -->
        <input class="form-control" type="hidden" v-model="estado" name="Estado">
    </div>



    <!-- Dpi Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('dpi', 'Dpi:') !!}
        <input class="form-control" type="number" name="dpi" v-model="dpi">
    </div>

    <div class="form-group col-sm-12">
        <button class="btn btn-primary" @click="guardar">Guardar</button>
    </div>
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#Fecha_Nac').datepicker()
    </script>
@endpush

@push('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            components: {Multiselect: window.VueMultiselect.default},
            data() {
                return {
                    estados: ['activo', 'inactivo'],
                    estado: null,
                    nombre: '',
                    Apellido: '',
                    Direccion: '',
                    Telefono: '',
                    Fecha_Nac: '',
                    dpi: '',

                }
            },
            methods: {
                async guardar() {

                    let datos = {
                        Nombre: this.nombre,
                        Apellido: this.Apellido,
                        Direccion: this.Direccion,
                        Telefono: this.Telefono,
                        Fecha_Nac: this.Fecha_Nac,
                        dpi: this.dpi,
                        Estado: this.estado
                    }
                    try {
                        let url = @json(Route('api.guardarCliente'));
                        const response = await axios.post(url, datos);
                        Swal.fire({
                            title: "En Horabuena!",
                            text: response.data.message,
                            icon: "success"
                        });
                        window.location.href = @json(Route('cuentas.create'));

                    } catch (e) {

                        Swal.fire({
                            title: "Error!",
                            text: e.response.data.message,
                            icon: "error"
                        });

                    }
                },
            }


        })
    </script>

@endpush

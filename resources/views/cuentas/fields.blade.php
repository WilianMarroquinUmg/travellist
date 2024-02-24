<div id="app" class="col-12" style="display: flex; flex-wrap: wrap ">

    <div class="form-group col-sm-6">

        <label for="cuenta_Origen">Cliente:</label>
        <multiselect
            v-model="cliente"
            placeholder="Seleccione una cuenta"
            track-by="id"
            label="nombreYdpi"
            :options="clientes"
            :multiple="false"
            :taggable="true"
        ></multiselect>
        <input type="hidden" name="Id_Cliente" :value="getItemId(cliente)">
    </div>

    <!-- Saldo Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Saldo', 'Saldo:') !!}
        <input class="form-control" type="number" v-model="Saldo">
    </div>

    <!-- Fecha Apertura Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('Fecha_Apertura', 'Fecha Apertura:') !!}
        <input type="date" class="form-control" v-model="Fecha_Apertura">
    </div>

    <div class="form-group col-sm-6">

        <label for="cuenta_Origen">Tipo de Cuenta:</label>
        <multiselect
            v-model="tipo_cuenta"
            placeholder="Seleccione una cuenta"
            track-by="id"
            label="descripcion"
            :options="tipo_cuentas"
            :multiple="false"
            :taggable="true"
        ></multiselect>
        <input type="hidden" name="tipo_cuenta_id" :value="getItemId(tipo_cuenta)">
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
        <input type="hidden" name="Estado" v-model="estado">
    </div>

    <!-- Moneda Id Field -->


    <div class="form-group col-sm-6">

        <label for="cuenta_Origen">Moneda:</label>
        <multiselect
            v-model="tipo_moneda"
            placeholder="Seleccione una cuenta"
            track-by="id"
            label="nombre"
            :options="tipo_monedas"
            :multiple="false"
            :taggable="true"
        ></multiselect>
        <input type="hidden" name="moneda_id" :value="getItemId(tipo_moneda)">
    </div>

    <!-- No Cuenta Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('no_cuenta', 'No Cuenta:') !!}
        <input class="form-control" type="text" v-model="no_cuenta">
    </div>
    <div class="card-footer">
        <button @click="guardar()" class="btn btn-success" >Guardar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-default"> Cancel </a>
    </div>
</div>

@push('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            components: {Multiselect: window.VueMultiselect.default},
            data() {
                return {
                    tipo_monedas: @json($tipo_monedas),
                    tipo_moneda: null,
                    tipo_cuentas: @json($tipo_cuentas),
                    tipo_cuenta: null,
                    clientes: @json($clientes),
                    cliente: null,
                    estados: ['activo', 'inactivo'],
                    estado: null,
                    error: @json($error ?? null),
                    detallesError: @json($detallesError ?? null),
                    Saldo: 0,
                    Fecha_Apertura: '',
                    no_cuenta: ''


                }
            },
            create() {
                this.mostrarError();
            },
            methods: {
                getItemId: function (item) {
                    if (item) {
                        return item.id;
                    }
                    return null;
                },
                async guardar() {

                    let datos = {
                        Id_Cliente: this.cliente.id,
                        Saldo: this.Saldo,
                        Fecha_Apertura: this.Fecha_Apertura,
                        tipo_cuenta_id: this.tipo_cuenta.id,
                        moneda_id: this.tipo_moneda.id,
                        Estado: this.estado,
                        no_cuenta: this.no_cuenta
                    }


                    try {
                        let url = @json(Route('api.GuardarCuenta'));
                        const response = await axios.post(url, datos);
                        Swal.fire({
                            title: "En Horabuena!",
                            text: response.data.message,
                            icon: "success"
                        });
                        window.location.href = @json(Route('cuentas.index'));

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

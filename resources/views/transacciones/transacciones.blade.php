@extends('layouts.app')

@section('content')
  
    <div id="app">

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="cuenta_Origen">Cuenta Origen:</label>
                    <multiselect
                        v-model="cuentaOrigen"
                        placeholder="Seleccione una cuenta"
                        label="nombreConEspacio"
                        track-by="id"
                        :options="Cuentas"
                        :multiple="false"
                        :taggable="true"
                    ></multiselect>
                </div>
                <div class="col-sm">
                    <label for="cuenta_Origen">Cuenta Destino:</label>
                    <multiselect
                        v-model="cuentaDestino"
                        placeholder="Seleccione una cuenta"
                        label="nombreConEspacio"
                        track-by="id"
                        :options="Cuentas"
                        :multiple="false"
                        :taggable="true"
                    ></multiselect>
                </div>
                <div class="col-sm">
                    <label for="cuenta_Origen">Monto</label>
                    <input v-model="monto" type="text" class="input-group">
                </div>

            </div>
            <button type="button"
             class="btn btn-primary"
              style="margin-top: 20px; margin-left:20px"
            @click="realizarTransaccion()"
              
              >Realizar</button
              
              >
            </div>



    </div>

@endsection

@push('scripts')
    <script>



        var app = new Vue({
            el: '#app',
            components: { Multiselect: window.VueMultiselect.default },
            data () {
                return {
                    cuentaOrigen: [],
                    cuentaDestino: [],
                    Cuentas: @json($cuentas),
                    monto: 0
                }
            },
            created() {
                
            },
            methods: {
                async realizarTransaccion() {

                    let datos = {
                        cuentaOrigen: this.cuentaOrigen.no_cuenta,
                        cuentaDestino: this.cuentaDestino.no_cuenta,
                        monto: this.monto
                    }
                    ;
                
                    try{
                        let url = @json(Route('api.realizar.transaccion'));
                        const response = await axios.post(url, datos);
                            Swal.fire({
                    title: "En Horabuena!",
                    text: response.data.message,
                    icon: "success"
                }); 
                    
                }catch(e){
                
                    Swal.fire({
                    title: "Error!",
                    text: e.response.data.message,
                    icon: "error"
                });
                
                    }
            
    
                }
            }
    
        })



    </script>

@endpush

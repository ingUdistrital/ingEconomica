@extends('template.main')
@section('title',$title)

@section('head')
@endsection

@section('content')
    <div id="anualidades">
        <h1>ANUALIDADES</h1>
        <h2>{{isset($respuesta)?$respuesta:null}}</h2>
        <form name="anualidades" action="{{route('anualidades.post')}}" method="POST">
            {{csrf_field()}}
            <div class="col-sm-5">
                <div id="periodo" class="col-sm-12">
                    <h3 valign="top">Tipo de pago</h3>
                    {!! Form::select('calcular',['Anualidad  adelantada','Anualidad ordinarial'],isset($datos)?$datos->calcular:old('calcular'),['id'=>'calcular']) !!}
                </div>

                <div class="col-sm-12">
                    <div id="valorTotal">
                        <h3>Valor actual:</h3>
                        <input class="number vis biginput R W120" type="text" name="valorTotal" value="{{isset($datos)?$datos->anualidad:null}}" maxlength="10" >
                    </div>
                    <div id="redito">
                        <h3>Cuota actual:</h3>
                        <input class="number vis biginput R W120" type="text"  name="redito" value="{{isset($datos)?$datos->cuotaActual:null}}" step="any">
                    </div>

                    <h3>Peridos:</h3>
                    {!! Form::text('periodo',isset($datos)?$datos->periodo:old('periodo'),['size'=>'30','class'=>'number','placeholder'=>'Cada cuanto debe pagar','title'=>'Cada cuanto debe pagar']) !!}
                    {!! Form::select('tipoPeriodo',$tiposPeriodos,isset($datos)?$datos->tipoPeriodo:old('tipoPeriodo'),['title'=>'Cada cuanto debe pagar']) !!}
                    <h3>Tasa de interés:</h3>
                    {!! Form::text('tasa',isset($datos)?$datos->tasa:old('tasa'),['size'=>'20','id'=>'tasa','placeholder'=>'porcentaje de interés','title'=>'porcentaje de interés']) !!} %
                    {!! Form::select('tipTasa',$tiposTasas,isset($datos)?$datos->tipTasa:old('tipTasa')) !!}
                    <div>
                        {!! Form::submit('Calcular') !!}
                    </div>

                </div>
            </div>
            <div class="col-sm-7">
                <div class="col-sm-12">
                    <div  id="textos">
                        <h2>Anualidades</h2>
                        <p>Se aplica a problemas financieros en los que existen un conjunto de pagos iguales a intervalos de tiempo regulares.<br>
                            <b>Anualidades ordinarias</b> o vencidas cuando el pago correspondiente a un intervalo se hace al final del mismo, por ejemplo, al final del mes.<br>
                            <b>Anualidades adelantadas</b> cuando el pago se hace al inicio del intervalo, por ejemplo al inicio del mes</p>
                        <h2>Resultados</h2>
                    </div>

                    <!-- <h3>Anualidad</h3>
                    <input class="hid biginput R W120" id="pmt" name="pmt" readonly="readonly" value="2239.59">
                    <input class="submit" type="button" name="calcular" onclick="" value="clacular"> -->

                </div>
            </div>

            </table>
        </form>

    </div>
@endsection

@section('script')
    <script src="{{asset('js/jquery.number.min.js')}}"></script>
    <script>
        $(window).ready(function () {
            $('#tasa').keyup(function () {
                this.value = this.value.replace(/[^0-9\,]/g, '');
            });
            $('.number').number(true, 0, ',', '.');
            capital();
            $('#calcular').change(function () {
                capital();
            });

        });

        function capital() {
            if($('#calcular').val()==0){
                $('#valorTotal').show()
                $('#redito').hide()
            }else{
                $('#valorTotal').hide()
                $('#redito').show()
            }
        }
    </script>
@endsection

@extends('template.main')
@section('title',$title)

@section('head')
@endsection

@section('content')
    <div id="anualidades">
        <h1>ANUALIDADES</h1>
        <form name="anualidades" action="{{route('anualidades.post')}}" method="POST">
            {{csrf_field()}}
            <div class="col-sm-5">
                <div id="periodo" class="col-sm-12">
                    <h3 valign="top">Tipo de pago</h3>
                    <input class="css-radio" type="radio" id="p0" name="anuAd" checked="" onclick="">
                    <label class="css-label" for="p0">&ensp;Anualidad  adelantada </label><br>
                    <input class="css-radio" type="radio" id="p1" name="anuOrd" onclick="">
                    <label class="css-label" for="p1">&ensp;Anualidad ordinaria</label>
                </div>

                <div class="col-sm-12">

                    <h3>Valor actual:</h3>
                    <input class="vis biginput R W120" type="number" id="valorTotal" name="valorTotal" value="{{isset($datos)?$datos->anualidad:null}}" maxlength="10" onclick="" onkeyup="">

                    <h3>Cuota actual:</h3>
                    <input class="vis biginput R W120" type="number" id="redito" name="redito" value="{{isset($datos)?$datos->cuotaActual:null}}" step="any">

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
                        <a href="index.php">INICIO</a>
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

<script src="js/bootstrap.min.js"></script>
<script src="js/jquiery.min.js"></script>
@section('script')
@endsection

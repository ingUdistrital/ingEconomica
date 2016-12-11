@extends('template.main')
@section('title',$title)

@section('head')
@endsection

@section('content')
    <div id="anualidades">
        <h1>ANUALIDADES</h1>
        <form name="anualidades" action="" method="POST">
            <div class="col-sm-5">
                <div id="periodo" class="col-sm-12">
                    <h3 valign="top">Tipo de pago</h3>
                    <input class="css-radio" type="radio" id="p0" name="ptype" checked="" onclick=""><label class="css-label" for="p0">&ensp;Anualidad  adelantada </label><br>
                    <input class="css-radio" type="radio" id="p1" name="ptype" onclick=""><label class="css-label" for="p1">&ensp;Anualidad ordinaria</label>
                </div>

                <div id="tiempo" class="col-sm-12">
                    <input class="css-radio" type="radio" id="t1" name="PERtype" checked="" onclick=""><label class="css-label" for="t1">&ensp;Año(s)</label>
                    <input class="css-radio" type="radio" id="t2" name="PERtype" onclick=""><label class="css-label" for="t2">&ensp;Trimestre</label>
                    <input class="css-radio" type="radio" id="t3" name="PERtype" onclick=""><label class="css-label" for="t3">&ensp;Bimestre</label>
                    <input class="css-radio" type="radio" id="t4" name="PERtype" onclick=""><label class="css-label" for="t4">&ensp;Meses</label>
                </div>


                <div class="col-sm-12">

                    <h3>Valor actual:</h3>
                    <input class="vis biginput R W120" type="text" id="pv" name="pv" value="10000" maxlength="10" onclick="" onkeyup="">

                    <h3>Tipo de interés anual:</h3>
                    <input class="vis biginput R W60" type="text" id="r" name="r" value="6.00" maxlength="5" onclick="" onkeyup="">

                    <h3>Número de períodos:</h3>
                    <input class="vis biginput R W60" type="text" id="period" name="period" value="5" maxlength="3" onclick="" onkeyup="">
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

                    <h3>Anualidad</h3>
                    <input class="hid biginput R W120" id="pmt" name="pmt" readonly="readonly" value="2239.59">
                    <input class="submit" type="button" name="calcular" onclick="" value="clacular">

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

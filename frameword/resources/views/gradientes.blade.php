@extends('template.main')
@section('title',$title)

@section('head')
@endsection

@section('content')
    <div id="gradiantes">
        <h1>GRADIANTES</h1>
        <form name="gradiantes" action="" method="POST">
            <div class="col-sm-5">
                <div id="periodo" class="col-sm-12">
                    <h3 valign="top">Tipo de pago</h3>
                    <input class="css-radio" type="radio" id="p0" name="ptype" checked="" onclick=""><label class="css-label" for="p0">&ensp;Gradiente Aritmético </label><br>
                    <input class="css-radio" type="radio" id="p1" name="ptype" onclick=""><label class="css-label" for="p1">&ensp;Gradiente Geométrico</label><br>

                </div>

                <div id="tiempo" class="col-sm-12">
                    <h3 valign="valor">Valor Presente o Futuro</h3>
                    <input class="css-radio" type="radio" id="v0" name="varptype" checked="" onclick=""><label class="css-label" for="p0">&ensp;Valor Presente </label><br>
                    <input class="css-radio" type="radio" id="v1" name="varptype" onclick=""><label class="css-label" for="p1">&ensp;Valor Futuro</label>
                </div>


                <div class="col-sm-12">

                    <div class="col-sm-6">
                        <h3>Valor:</h3>
                        <input class="vis biginput R W120" type="text" id="pv" name="pv" value="" maxlength="10" onclick="" onkeyup="">
                    </div>

                    <div class="col-sm-6">
                        <h3>Variacion:</h3><input class="vis biginput R W60" type="text" id="r" name="r" value="" maxlength="5" onclick="" onkeyup="">
                    </div>

                    <h3> Serie de Pagos Uniformes:</h3>
                    <input class="vis biginput R W60" type="text" id="period" name="period" value="" maxlength="3" onclick="this.value = ;" onkeyup="">

                    <h3> Numero de Periodos:</h3>
                    <input class="vis biginput R W60" type="text" id="period" name="period" value="5" maxlength="3" onclick="this.value = ;" onkeyup="">

                    <h3> Tasa de Interes Por Periodo:</h3>
                    <input class="vis biginput R W60" type="text" id="period" name="period" value="5" maxlength="3" onclick="this.value = ;" onkeyup="">

                </div>
            </div>
            <div class="col-sm-7">
                <div class="col-sm-12">
                    <div  id="textos">
                        <button type="button" class="btn btn-primary" onclick="location.href='index.php' ">Inicio</button>
                        <h2>Gradiantes</h2>
                        <p>Son operaciones financieras en las cuales se pacta cubrir la obligación en una serie de pagos periódicos crecientes o decrecientes.<br>
                            <b>Gradiente Aritmético</b> Para el gradiente aritmético, la ley de formación indica que cada pago es igual al anterior, más una constante  ; la cual puede ser positiva en cuyo caso las cuotas son crecientes, negativa lo cual genera cuotas decrecientes.<br>
                            <b>Gradiente Geométrico  </b>En el gradiente exponencial o geométrico cada flujo es igual al anterior incrementado o disminuido en un porcentaje fijo (G). Cuando la variación es positiva, se genera el gradiente geométrico creciente. Cuando la variación constante es negativa, se genera el gradiente geométrico decreciente.</p>
                        <h2>Resultados</h2>
                        <input class="hid biginput R W120" id="pmt" name="pmt" readonly="readonly" value="">
                        <input class="submit" type="button" name="calcular" onclick="" value="clacular">
                    </div>

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

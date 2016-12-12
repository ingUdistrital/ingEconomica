@extends('template.main')
@section('title',$title)

@section('head')
@endsection

@section('content')
    <div id="amortizacion">
        @if(isset($dato1))
            {{$dato1}}
        @endif
        <h1>AMORTIZACION Y CAPITALIZACION</h1>
        <form name="amortizacion" action="{{route('amortizacion.post')}}" method="POST">
            <div id="datos" class="col-sm-6">
                <h2>Intriduce los Datos Solicitados</h2>
                <h3>Monto:</h3>
                <td> $ </td><input type="TEXT" name="p" size="10" onchange="value=formatNumber(value,2,0)">

                <h3>Plazo:</h3>
                <input type="TEXT" name="c" size="5" onchange="value=formatNumber(value,2,0)"><td> AÑOS </td><input type="TEXT" name="c" size="5" onchange="value="> MESES

                <h3>Tasa de interés:</h3>
                <input type="TEXT" name="r" size="6" value="" onchange="value=numval(value,2,0)"> %
                <input type="BUTTON" value="Calcular" onclick="">
            </div>

            <div class="col-sm-6">
                <div  id="textosi">
                    <a href="index.php">INICIO</a>
                    <h2>Amortizacion y Capitalizacion</h2>
                    <p><b>Amortizacion</b> se define como redimir o extinguir el capital de un censo, préstamo u otra deuda, como también  recuperación o compensación de los fondos invertidos en alguna empresa.<br>
                        <b>Capitalizacion</b>  se define como la fijación del capital que corresponde a determinado rendimiento o interés, según el tipo de capitalización que se adopta para el cálculo</p>
                </div>


            </div>

            <div id="cuadro" class="col-sm-10">
                <h3>Cuadro de Amortización:</h3>
                <textarea cols="60" rows="4" name="cuadro"></textarea>
            </div>



        </form>

    </div>
@endsection

<script src="js/bootstrap.min.js"></script>
<script src="js/jquiery.min.js"></script>

@section('script')
@endsection




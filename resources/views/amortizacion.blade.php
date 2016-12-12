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
        {!! Form::open(['route'=>'amortizacion.post',"name"=>"amortizacion","method"=>"POST"]) !!}
            <div class="col-sm-6">
                <h2>Intriduce los Datos Solicitados</h2>
                <h3>Que desea calcular:</h3>
                {!! Form::select('calcular',['Amortizacion','Capitalizacion'],isset($datos)?$datos->calcular:old('calcular'),['id'=>'calcular']) !!}
                <div id="montoInicial">
                    <h3>Monto:</h3>
                    {!! Form::text('monto',isset($datos)?$datos->monto:old('monto'),['size'=>'30','class'=>'number','placeholder'=>'Cuanto se paga por periodo','title'=>'Cuanto se paga por periodo']) !!}
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

            <div class="col-sm-6">
                <div  id="textosi">
                    <h2>Amortizacion y Capitalizacion</h2>
                    <p><b>Amortizacion</b> se define como redimir o extinguir el capital de un censo, préstamo u otra deuda, como también  recuperación o compensación de los fondos invertidos en alguna empresa.<br>
                        <b>Capitalizacion</b>  se define como la fijación del capital que corresponde a determinado rendimiento o interés, según el tipo de capitalización que se adopta para el cálculo</p>
                </div>
            </div>

            <div id="cuadro" class="col-sm-10">
                @if(isset($datosTabla))
                    <h3>Cuadro de Amortización:</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>|Periodo|</th>
                                <th>|Saldo|</th>
                                <th>|Interés|</th>
                                <th>|Cuota|</th>
                                <th>{{$datos->calcular==0?'|Amortización|':'|Capitalizacion|'}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datosTabla as $dato)
                                <tr>
                                    <td>|{{$dato->periodo}}|</td>
                                    <td>|{{$dato->saldo}}|</td>
                                    <td>|{{$dato->interes}}|</td>
                                    <td>|{{$dato->cuota}}|</td>
                                    <td>|{{$dato->amortCapi}}|</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>



        </form>

    </div>
@endsection

<script src="js/bootstrap.min.js"></script>
<script src="js/jquiery.min.js"></script>

@section('script')
@endsection




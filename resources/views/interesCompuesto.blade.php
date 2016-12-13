@extends('template.main')
@section('title',$title)

@section('head')
@endsection

@section('content')
    <div id="interes">
        <h1>{{$title}}</h1>
        @if(isset($respuesta))
            <h2>{{$respuesta}}</h2>
        @endif
        {!! Form::open(['route'=>'interes.post',"name"=>"interes-compuesto","method"=>"POST"]) !!}
            <div id="periodo" class="col-sm-7">
                <h3>Que desea calcular:</h3>
                {!! Form::select('calcular',['Capital Total','Capital inicial'],isset($datos)?$datos->calcular:old('calcular'),['id'=>'calcular']) !!}
                <div id="capitalTotal">
                    <h3>Capital Total:</h3>
                    {!! Form::text('capitalTotal',isset($datos)?$datos->capitalTotal:old('capitalTotal'),['size'=>'30','class'=>'number','placeholder'=>'Cuanto se desea obtener al final','title'=>'Cuanto se desea obtener al final']) !!}
                </div>
                <div id="capitalInicial">
                    <h3>Capital inicial:</h3>
                    {!! Form::text('capital',isset($datos)?$datos->capital:old('capital'),['size'=>'30','class'=>'number','placeholder'=>'Cuanto se paga por periodo','title'=>'Cuanto se paga por periodo']) !!}
                </div>

                <h3>Peridos:</h3>
                {!! Form::text('periodo',isset($datos)?$datos->periodo:old('periodo'),['size'=>'30','class'=>'number','placeholder'=>'Cada cuanto debe pagar','title'=>'Cada cuanto debe pagar']) !!}
                {!! Form::select('tipoPeriodo',$tiposPeriodos,isset($datos)?$datos->tipoPeriodo:old('tipoPeriodo'),['title'=>'Cada cuanto debe pagar']) !!}
                <h3>Tasa de interés:</h3>
                {!! Form::text('tasa',isset($datos)?$datos->tasa:old('tasa'),['size'=>'20','id'=>'tasa','placeholder'=>'porcentaje de interés','title'=>'porcentaje de interés']) !!} %
                {!! Form::select('tipTasa',$tiposTasas,isset($datos)?$datos->tipTasa:old('tipTasa')) !!}

            </div>
            <div>
                {!! Form::submit('Calcular',['id'=>'btn']) !!}
            </div>
            <div class="col-sm-5">
                <div  id="textosi">

                    <h2>Interes Compuesto</h2>
                    <p>representa el costo del dinero , beneficio o utilidad de un capital inicial (C) o principal a una tasa de interés (i) durante un período (t) , en el cual los intereses que se obtienen al final de cada período de inversión no se retiran sino que se reinvierten o añaden al capital inicial; es decir, se capitalizan , produciendo un capital final (C f ).<br>
                        Para un período determinado sería<br>
                        <b>Capital final (C f ) = capital inicial (C) más los intereses. </b></p>

                </div>
            </div>
        {!! Form::close() !!}
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
                $('#capitalInicial').show()
                $('#capitalTotal').hide()
            }else{
                $('#capitalInicial').hide()
                $('#capitalTotal').show()
            }
        }
    </script>
@endsection
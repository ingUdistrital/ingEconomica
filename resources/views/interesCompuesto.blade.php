@extends('template.main')
@section('title',$title)

@section('head')
@endsection

@section('content')
    <div id="interes">
        <h1>{{$title}}</h1>
        {!! Form::open(['route'=>'interes.post',"name"=>"interes-compuesto","method"=>"POST"]) !!}
            <div id="periodo" class="col-sm-4">
                <h3>Capital inicial:</h3>
                {!! Form::text('capital',old('number'),['size'=>'30','class'=>'number','placeholder'=>'Cuanto se paga por periodo','title'=>'Cuanto se paga por periodo']) !!}
                <h3>Peridos:</h3>
                {!! Form::text('periodo',old('periodo'),['size'=>'30','class'=>'number','placeholder'=>'Cada cuanto debe pagar','title'=>'Cada cuanto debe pagar']) !!}
                {!! Form::select('tipoPeriodo',$tiposPeriodos,old('tipoPeriodo'),['title'=>'Cada cuanto debe pagar']) !!}
                <h3>Tasa de interés:</h3>
                {!! Form::text('tasa',old('tasa'),['size'=>'20','id'=>'tasa','placeholder'=>'porcentaje de interés','title'=>'porcentaje de interés']) !!} %
                {!! Form::select('tipTasa',$tiposTasas,old('tipTasa')) !!}
                <div>
                    {!! Form::submit('Calcular') !!}
                </div>
            </div>

            <div class="col-sm-4">
                <div  id="textosi">
                    <a href="{{route('index')}}">INICIO</a>
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
        });
    </script>
@endsection
@extends('template.main')
@section('title',$title)

@section('head')
@endsection

@section('content')
    <div id="interes">
        <h1>{{$title}}</h1>
        <form name="interes-compuesto" action="{{route('interes.post')}}" method="POST">
            {{csrf_field()}}
            <div id="periodo" class="col-sm-4">
                <h3>Capital inicial:</h3>
                <td> $ </td><input type="TEXT" name="p" size="10" onchange="value=formatNumber(value,2,0)">
                <h3>Adición anual:</h3>
                <td> $ </td><input type="TEXT" name="c" size="10" onchange="value=formatNumber(value,2,0)">
                <h3>Años:</h3>
                <input type="TEXT" name="y" size="6" value="" onchange="value=numval(value,2,1)">
                <h3>Tasa de interés:</h3>
                <input type="TEXT" name="r" size="6" value="" onchange="value=numval(value,2,0)"> %
            </div>

            <div id="tiempo" class="col-sm-4">
                <h3>Interés compuesto</h3>
                <input type="TEXT" name="n" size="4" value="1" maxlength="4" onchange="value=numval(value,0,1)">
                veces por año
                <h3>Hacer las adiciones a</h3>
                <input type="RADIO" name="addTiming" value="start" checked="">&ensp;inicio
                <input type="RADIO" name="addTiming" value="end">&ensp;fin
                de cada período

                <h3>Valor futuro:</h3>
                <td> $ </td><input type="TEXT" name="fv" size="10" readonly="">

                <h3>Número de períodos</h3><input class="vis biginput R W60" type="text" id="period" name="period" value="5" maxlength="3" onclick="this.value = ;" onkeyup="">

                <input type="submit" value="Calcular">
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
        </form>

    </div>
@endsection

@section('script')
@endsection
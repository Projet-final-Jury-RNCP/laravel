@extends('layouts.public')

@section('title')
	500
@stop

@section('content')

{{--
<h1>500 - Erreur ici !</h1>

<h2>{{ $exception->getMessage() }}</h2>
--}}

    <div class="alert alert-danger">
        <p><strong>Houps&#xA0;!</strong> Erreur 500:</p>
        <ul>
            <li>{{ $exception->getMessage() }}</li>
        </ul>
    </div>


@if(Session::has('error'))
    ERROR
@endif

@if(Session::has('errors'))
    ERROR
@endif

@if (count($errors) > 0)
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif


@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Houps&#xA0;!</strong> Veuillez corriger les éléments suivants&#xA0;:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@stop
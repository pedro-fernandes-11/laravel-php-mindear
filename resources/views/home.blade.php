@extends('layouts.template')

@section('head')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content-outside">
    <div class="content">
        <p>
            <text class="title"><strong>Registre suas músicas favoritas.</strong></text><br>
            Categorize e relacione-as à imagens.
        </p>
        <div class="btn-alignment">
            <button type="button" class="btn btn-primary"><a class="start" href="{{ route('music') }}">Começar</button>
        </div>
    </div>
</div>
@endsection
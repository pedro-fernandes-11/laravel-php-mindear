@extends('layouts.template')

@section('head')
<link href="{{ asset('css/add.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content-outside">
    <div class="content">
        <form method="POST" action="{{route('music.update')}}" enctype="multipart/form-data">
            @csrf
            <div class="title"><h3>Altere uma música</h3></div>
            <input type="hidden" name="id" value="{{$data[0]->id}}">
            <div class="form-group">
                <label for="musicName">Nome</label>
                <input type="text" class="form-control" name="musicName" id="musicName" placeholder="nome" value="{{$data[0]->nome}}">
            </div>
            <div class="form-group">
                <label for="musicAuthor">Autor</label>
                <input type="text" class="form-control" name="musicAuthor" id="musicAuthor" placeholder="autor" value="{{$data[0]->autor}}">
            </div>
            <div class="form-group">
                <label for="musicLink">Link</label>
                <input type="text" class="form-control" name="musicLink" id="musicLink" placeholder="link" value="{{$data[0]->link}}">
            </div>
            <div class="form-group">
                <label for="musicPic">Insira uma imagem</label>
                <input type="file" class="form-control-file" accept="image/png, image/jpeg, image/jpg" name="musicPic" id="musicPic">
            </div>
            <div class="btn-alignment">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger" style="margin-top: 15px">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
@extends('layouts.template')

@section('head')
<script type="text/javascript" src="{{ asset('js/music.js') }}"></script>
<link href="{{ asset('css/music.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="main">
    <div class="content">
        <div class="table-head">
            <div class="title"><h3>Suas músicas</h3></div>
            <div class="create"><a href="{{ route('music.add') }}"><button type="button" class="btn btn-primary df-btn">Adicionar</button></a></div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Autor</th>
                    <th>Link</th>
                    <th>Imagem</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
            </thead>
            <tbody>
                @for($i = 0; $i < count($music); $i++)
                <tr>    
                    <td> {{$music[$i]->nome}} </td>
                    <td> {{$music[$i]->autor}} </td>
                    <td> <a href="{{$music[$i]->link}}" target="_blank"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M23 12l-22 12v-24l22 12zm-21 10.315l18.912-10.315-18.912-10.315v20.63z"/></svg></td>
                    <td> <img style="width: 150px; height: 80px; object-fit: cover" src="{{asset('storage/uploads/'.$music[$i]->imagem)}}" alt="{{$music[$i]->nome}}"> </td>
                    <td> <a href="{{ route( 'show', ['id' => $music[$i]->id] ) }}"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 30 30" style=" fill:#000000;"><path d="M 22.828125 3 C 22.316375 3 21.804562 3.1954375 21.414062 3.5859375 L 19 6 L 24 11 L 26.414062 8.5859375 C 27.195062 7.8049375 27.195062 6.5388125 26.414062 5.7578125 L 24.242188 3.5859375 C 23.851688 3.1954375 23.339875 3 22.828125 3 z M 17 8 L 5.2597656 19.740234 C 5.2597656 19.740234 6.1775313 19.658 6.5195312 20 C 6.8615312 20.342 6.58 22.58 7 23 C 7.42 23.42 9.6438906 23.124359 9.9628906 23.443359 C 10.281891 23.762359 10.259766 24.740234 10.259766 24.740234 L 22 13 L 17 8 z M 4 23 L 3.0566406 25.671875 A 1 1 0 0 0 3 26 A 1 1 0 0 0 4 27 A 1 1 0 0 0 4.328125 26.943359 A 1 1 0 0 0 4.3378906 26.939453 L 4.3632812 26.931641 A 1 1 0 0 0 4.3691406 26.927734 L 7 26 L 5.5 24.5 L 4 23 z"></path></svg></a></td>
                    <td> <a href="{{ route( 'music.delete', ['id' => $music[$i]->id] ) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-12v-2h12v2z"/></svg></a></td>
                </tr>
                @endfor
            </tbody>
        </table>
        @if ($music->hasPages())
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($music->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $music->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($music->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $music->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </nav>
        @endif
    </div>
</div>
@endsection
  
    
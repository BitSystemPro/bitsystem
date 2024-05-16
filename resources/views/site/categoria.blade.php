@extends('site.layout')
@section('title', 'Categoria')
@section('conteudo')
    
<div class="row container">

    <h5>Categoria: {{  $categoria->nome }}</h5>
    @foreach ($produto as $produtos)
        
        <div class="col s12 m4"> 
            <div class="card">
                <div class="card-image">
                <img src="{{ $produtos->imagem }}">

                <a href=" {{ route('site.details', $produtos->slug) }} " class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
                </div>
                <div class="card-content">
                <span class="card-title">{{ $produtos->nome}}</span>
                <p>{{ Str::limit($produtos->descricao,60)}}</p>
                </div>
            </div>  
        </div>
        
    @endforeach
</div>
<!-- paginação -->
<div class="row center">
    {{$produto->links('custom.pagination')}}
</div>


@endsection
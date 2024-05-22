@extends('site.layout')
@section('title', 'Home')
@section('conteudo')
    
<div class="row container">
    @foreach ($produto as $produtos)
        
        <div class="col s12 m6 l3" style="max-height:"> 
            <div class="card">
              <div class="card-image">
                <img src="{{url("storage/{$produtos->imagem}")}}">
                
                {{-- @can('verProduto', $produto) --}}
                <a href=" {{ route('site.details', $produtos->slug) }} " class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>  
                {{-- @else     
                @endcan --}}

              </div>
              <div class="card-content">
                <span class="card-title">{{ $produtos->nome}}</span>
                <p>{{ Str::limit($produtos->descricao,30)}}</p>
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
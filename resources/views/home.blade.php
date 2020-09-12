@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de produtos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach($produtos as $produto)
                            <div class="col-sm-12 col-md-3 col-lg-2 mt-3">
                                <div class="card" >
                                    @if(isset($produto->Images[0]))
                                       <img class="card-img-top" src="{{$produto->Images[0]->source}}" alt="Card image cap">
                                    @else
                                        <img class="card-img-top" src="https://loremflickr.com/500/500?random=3" alt="Card image cap">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{$produto->name}}</h5>
                                        <p><strong>Estoque: </strong> {{$produto->available_quantity}}</p>
                                        <div class="row">
                                            <div class="col-6">
                                                <strong>Preço: </strong>{{$produto->price}}
                                            </div>
                                            <div class="col-6">
                                                <strong>Anúncios: </strong> 0
                                            </div>
                                        </div>
                                        <a href="/product/{{$produto->id}}" class="btn btn-primary mt-3">Anunciar</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

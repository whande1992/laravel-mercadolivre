@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista de anuncios</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            @foreach($items as $item)
                                <div class="col-sm-12 col-md-3 col-lg-2 mt-3">
                                    <div class="card" >
                                        @if(isset($item->pictures[0]))
                                            <img class="card-img-top" src="{{$item->pictures[0]->url}}" alt="Card image cap">
                                        @else
                                            <img class="card-img-top" src="https://loremflickr.com/500/500?random=3" alt="Card image cap">
                                        @endif
                                        <div class="card-body">
                                            <h5 title="{{$item->title}}" class="card-title text-nowrap text-truncate">{{$item->title}}</h5>
                                            <b>ID: </b><a href="{{$item->permalink}}" class=" p-1 mt-3">{{$item->id}}</a>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>Estoque: </b> {{$item->available_quantity}}
                                                </div>
                                                <div class="col-6">
                                                    <b>Vendas: </b> {{$item->sold_quantity}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row justify-content-center">
                                                <div class="col-6">
                                                    <b>Preço: </b>{{$item->price}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row justify-content-center">
                                                <div class="col-4">
                                                    <a href="#" title="Detalhes" class="btn btn-primary"><i class="fas fa-external-link-alt"></i></a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="#" title="Editar" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="#" title="Pausar" class="btn btn-warning"><i class="fas fa-pause"></i></a>
                                                </div>
                                            </div>
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

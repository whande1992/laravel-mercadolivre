@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Mercado Livre</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row justify-content-center">
                            <div class="col-4">
                                <div class="card">
                                    <img class="card-img-top img-fluid p-5" src="/images/mercado-livre.png" alt="Autenticado">
                                    <div class="card-body">
                                        <h5 class="card-title">Mercado Livre Vinculado</h5>
                                        <p class="card-text">Seu aplicativo do mercado livre foi vinculado com sucesso</p>
                                        <a href="{{route('home')}}" class="btn btn-primary">Voltar para Home</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

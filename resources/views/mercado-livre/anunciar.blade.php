@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Anunciar </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row justify-content-center">
                            <div class="col-10">
                                <form method="post" action="{{route('anuncio.post')}}">
                                    @csrf
                                    <input hidden  name="product_id" value="{{$product->id}}">
                                    <div class="form-group">
                                        <label for="title_annunce">Titulo do anúncio</label>
                                        <input type="text" value="{{$product->name}}" class="form-control" id="title_annunce" name="title_annunce" aria-describedby="title_annunceHelp" >
                                        <small id="title_annunceHelp" class="form-text text-muted">Titulo do anúncio no mercado livre.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Descrição do anúncio</label>
                                        <textarea rows="3" class="form-control" id="description" name="description" aria-describedby="descriptionHelp">{{$product->description}}</textarea>
                                        <small id="descriptionHelp" class="form-text text-muted">Descrição do anúncio no mercado livre.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="description_annunce">Preço</label>
                                        <input type="text" value="{{$product->price}}" class="form-control" id="price" name="price" aria-describedby="priceHelp"/>
                                        <small id="priceHelp" class="form-text text-muted">Preço de venda do produto - Real (R$)</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="listing_type_id">Tipo de anúncio</label>
                                        <select name="listing_type_id" id="listing_type_id" class="form-control"  aria-describedby="listing_type_idHelp">
                                            <option value="gold_pro">Premium</option>
                                            <option value="gold_special">Clásica</option>
                                        </select>
                                        <small id="listing_type_idHelp" class="form-text text-muted">Selecione um dos tipos de anúncios disponíveis, o modo gratuito expira em 60 dias.</small>
                                        <!--Consulte:
                                                https://developers.mercadolivre.com.br/pt_br/tutorial-tipos-de-publicacao-y-atualizacao-de-artigos#Mercado-Libre-Argentina-Brasil-Chile-Mexico-y-Colombia
                                        -->
                                    </div>

                                    <div class="form-group">
                                        <label for="url_image">URL da imagem</label>
                                        <input type="text" class="form-control" value="{{$product->Images[0]->source}}" id="url_image" name="url_image" aria-describedby="url_imageHelp"/>
                                        <small id="url_imageHelp" class="form-text text-muted">Insira uma URL válida para imagem do produto.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_category">ID Categoria </label>
                                        <input type="text" class="form-control" value="{{$product->ml_category_id}}" id="id_category" name="id_category" aria-describedby="id_categoryHelp"/>
                                        <small id="id_categoryHelp" class="form-text text-muted">Insira o ID da categoria do produto</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="available_quantity">Estoque disponível </label>
                                        <input type="number" class="form-control" value="{{$product->available_quantity}}" id="available_quantity" name="available_quantity" aria-describedby="available_quantityHelp"/>
                                        <small id="available_quantityHelp" class="form-text text-muted">Quantidade de estoque disponível</small>
                                    </div>
                                    <!--WARRANTY_TYPE-->
                                    <div class="form-group">
                                        <label for="warranty_type">Tipo de garantia</label>
                                        <select name="warranty_type" id="warranty_type" class="form-control"  aria-describedby="warranty_typeHelp">
                                            <option value="Garantia de fábrica">Garantia de fábrica</option>
                                            <option value="Garantia do vendedor">Garantia do vendedor</option>
                                        </select>
                                        <small id="warranty_typeHelp" class="form-text text-muted">Selecione o tipo de garantia do produto</small>
                                    </div>
                                    <!--WARRANTY_TIME-->
                                    <div class="form-group">
                                        <label for="warranty_time">Tempo de garantia</label>
                                        <input type="text" class="form-control" value="90" id="warranty_time" name="warranty_time" aria-describedby="warranty_timeHelp"/>
                                        <small id="warranty_timeHelp" class="form-text text-muted">Informe o número de dias de garantia do produto</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Adicionar no Mercado Livre</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

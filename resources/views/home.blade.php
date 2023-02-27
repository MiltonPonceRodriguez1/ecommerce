@extends('layouts.master')

@section('content')
<div class="container">

    <div class="row">
        <div class="col s12 m3">
            <h5 class="title_page">Buscador</h5>
            <form method="POST" action="{{route('Product.searchByName')}}" class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" name="name" type="text" class="validate">
                        <label for="name">Nombre</label>
                    </div>
                </div>

                <div class="center-align">
                    <button class="btn waves-effect waves-light light-blue" type="submit" name="action">Filtrar por nombre
                        <i class="material-icons left">search</i>
                    </button>
                </div>
            </form>

            <form method="POST" action="{{route('Product.searchByRange')}}" class="col s12">
                <div class="row" style="margin-top: 2rem;">
                    <div class="input-field col s12">
                        <input id="min" name="min" type="number" class="validate" value="250" />
                        <label for="min">Min</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="max" name="max" type="number" class="validate" value="1800">
                        <label for="max">Max</label>
                    </div>
                </div>

                <div class="center-align">
                    <button class="btn waves-effect waves-light light-blue" type="submit" name="action">Filtrar por precio
                        <i class="material-icons left">search</i>
                    </button>
                </div>
            </form>
        </div>

        <div class="col s12 m9">
            <h5 class="title_page">Listado de productos</h5>

            @if (isset($data['products']) && isset($data['code']) && $data['code'] == 200)
            <div class="row">
                @foreach ($data['products'] as $product)
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <img
                                src="https://m.media-amazon.com/images/G/33/gc/designs/livepreview/amazon_dkblue_noto_email_v2016_mx-main._CB468300557_.png">
                            <span class="card-title truncate">{{$product->name}}</span>
                        </div>
                        <div class="card-content">
                            <p class="truncate">
                                {{$product->description}}
                            </p>
                        </div>
                        <div class="card-action">
                            <p class="center-align truncate product-price">${{number_format($product->price, 2)}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <script>
                let message = {{ Js::from($data['message']) }};

                M.toast({
                    html: message,
                    classes: 'red accent-4'
                });

            </script>
            <p class="center-align"><i>Cargando...</i></p>
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
            @endif
        </div>
    </div>


 @endsection

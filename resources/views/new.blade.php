@extends('layouts.master')

@section('content')

<div>
    @if (isset($data) && $data['code'] == 200)
    <script>
         M.toast({html: 'Producto almacenado correctamente!', classes: 'green accent-4'});
    </script>
    @elseif (isset($data) && $data['code'] == 404)
    <script>
        M.toast({html: 'Error al guardar el producto: Faltan datos!', classes: 'red accent-4'});
    </script>
    @endif
</div>


<div class="container">
    <h5 class="title_page">Agregar un nuevo producto</h5>

    <div class="row">
        <form method="POST" action="{{route('Product.store')}}" class="col s12">
            @csrf
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">edit</i>
                    <input id="name" name="name" type="text" class="validate">
                    <label for="name">Nombre</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">attach_money</i>
                    <input id="price" name="price" type="number" class="validate" step="0.01">
                    <label for="price">Precio</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">view_headline</i>
                    <textarea id="description" name="description" class="materialize-textarea"></textarea>
                    <label for="description">Descripción</label>
                </div>
            </div>

            <div class="right-align">
                <button class="btn waves-effect waves-light light-blue" type="submit" name="action">Guardar
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('template.template')

@section('conteudo')
<style>
    /* Remove margins and padding from the list */
    ul {
        margin: 0;
        padding: 0;
    }

    /* Style the list items */
    ul li {
        cursor: pointer;
        position: relative;
        padding: 12px 8px 12px 40px;
        list-style-type: none;
        background: #eee;
        font-size: 18px;
        transition: 0.2s;

        /* make the list items unselectable */
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Set all odd list items to a different color (zebra-stripes) */
    ul li:nth-child(odd) {
        background: #f9f9f9;
    }

    /* Darker background-color on hover */
    ul li:hover {
        background: #ddd;
    }

    /* Style the close button */
    .close {
        position: absolute;
        right: 0;
        top: 0;
        padding: 12px 16px 12px 16px;
    }

    .close:hover {
        background-color: #f44336;
        color: white;
    }
    
    #image {
        height: 20%;
        width: 20%;
        border: 1px solid #000;
        margin: 10px 5px 0 0;
    }
</style>
<div class="jumbotron text-center">
    <h1>Cadastrar Nova tag</h1>
</div>

<div class="container">
    @if (isset($errors) && count($errors) > 0)
    <div class="text-center alert-danger">
        @foreach ($errors->all() as $erro)
        {{ $erro }}<br>
        @endforeach
    </div>
    @endif

    @if (isset($tag))
    <form action name="edit" id="create" method="post" action="{{ url('tags.update') }}">
        @method('PUT')
        @else
        <form action name="create" id="create" method="post" action="{{ url('tags.store') }}">
            @endif
            @csrf
            <div class="form-group t-10">
                <label class="control-label col-sm-2" for="title">Título:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título"
                        value="{{ $tag ['title'] ?? '' }}" required>
                </div>
            </div>

            <div class="form-group t-10">
                <label class="control-label col-sm-2" for="tag">Tag:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tag" name="tag" placeholder="Digite a tag"
                        value="{{ $tag ['tag'] ?? '' }}" required>
                </div>
            </div>

            <div class="form-group t-10">
                <label class="control-label col-sm-2" for="image">Imagem:</label>
                <div class="col-sm-10">
                    <input type="file" multiple id="addFotoGaleria">
                    <div class="galeria">
                        <img src="{{$tag ['image'] ?? '' }}" alt="Selecione uma imagem" id="image" >
                        <input type="hidden" id="input-image" name="image" required>
                    </div>
                </div>
            </div>

            <br>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </form>
</div>

<script src="/assets/js/jquery-3.5.1.min.js"></script>

<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="/assets/vendor/wow/wow.min.js"></script>

<script src="/assets/js/mobster.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $(function () {
        // Pré-visualização de várias imagens no navegador
        var visualizacaoImagens = function (input) {

            if (input.files) {

                var reader = new FileReader();

                reader.onload = function (event) {
                    $('#image').attr('src', event.target.result);
                    $('#input-image').attr('value', event.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }

        };

        $('#addFotoGaleria').on('change', function () {
            visualizacaoImagens(this);
        });
    });
</script>
@endsection
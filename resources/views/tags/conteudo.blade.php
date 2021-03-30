@extends('template.template')

@section('conteudo')
    <div class="header_section text-center">
        <h1 class="trends_text">Tag</h1>
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
                    <input type="text" class="form-control" id="title" name="title"
                           placeholder="Digite o título"
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
                        <img src="{{$tag ['image'] ?? '' }}" alt="" id="image">
                        <input type="hidden" id="input-image" name="image"
                               value="{{$tag ['image'] ?? '' }}">
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
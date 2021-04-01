@extends('template.template')

@section('conteudo')
    <style>
        #image{
            visibility: hidden;
            width: 100px;
            height: 100px;
        }
    </style>
    <div class="header_section text-center">
        <h1 class="trends_text">Tag</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card-page mt-2 col">
                <div class="card-page">
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
                        <h5 class="fg-warning">Tag</h5>
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
                            <div tabindex="-1" class="col-sm-10" id="div-image">
                                <input type="file" multiple id="addFotoGaleria">
                                <div class="galeria">
                                    <img src="{{$tag ['image'] ?? '' }}" alt="" id="image">
                                    <input type="hidden" id="input-image" name="image"
                                           value="{{$tag ['image'] ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row justify-content-center">
                            <div class="col-lg-4 py-4">
                                <div class="team-item">
                                    <button type="submit" class="btn btn-warning rounded-pill" id="btnSalvar">⠀⠀Salvar⠀⠀
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Inicialização da imagem (parte da edição)
        let dados = document.getElementById("input-image").value

        if(dados !== ''){
            document.getElementById("image").style.visibility = "visible"
        }

        document.getElementById('btnSalvar').addEventListener('click', (event) => {
            let imageBase64 = document.getElementById('input-image').value

            if(imageBase64 == ''){
                document.getElementById('div-image').focus()
                alert("Você deve selecionar a imagem!")
                event.preventDefault()
            }
        })

        //Adição da função de visualização da imagem
        $(function () {
            var visualizacaoImagens = function (input) {

                if (input.files) {

                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $('#image').attr('src', event.target.result);
                        $('#input-image').attr('value', event.target.result);

                    }

                    reader.readAsDataURL(input.files[0]);
                }
                document.getElementById("image").style.visibility = "visible"
            };

            $('#addFotoGaleria').on('change', function () {
                visualizacaoImagens(this);
            });
        });
    </script>
@endsection
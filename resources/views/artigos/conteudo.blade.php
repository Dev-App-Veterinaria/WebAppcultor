@extends('template.template')
@section('conteudo')
    <style>
        #div-preview{
            border-radius: 10px;
            width: 370px;
            height: 400px;
        }
        .collapsible-link::before {
            content: '';
            width: 14px;
            height: 2px;
            background: #333;
            position: absolute;
            top: calc(50% - 1px);
            right: 1rem;
            display: block;
            transition: all 0.3s;
        }

        /* Vertical line */
        .collapsible-link::after {
            content: '';
            width: 2px;
            height: 14px;
            background: #333;
            position: absolute;
            top: calc(50% - 7px);
            right: calc(1rem + 6px);
            display: block;
            transition: all 0.3s;
        }

        .collapsible-link[aria-expanded='true']::after {
            transform: rotate(90deg) translateX(-1px);
        }

        .collapsible-link[aria-expanded='true']::before {
            transform: rotate(180deg);
        }
    </style>

    <div class="header_section text-center">
        <h1 class="trends_text">Artigo</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card-page mt-2 col">
                <div class="card-page">
                    @if(isset($errors) && count($errors)>0)
                        <div class="text-center alert-danger">
                            @foreach($errors->all() as $erro)
                                {{$erro}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(isset($artigo))
                        <form action name="edit" id="create" method="post" action="{{url('artigos.update')}}">
                            @method('PUT')
                    @else
                        <form action name="create" id="create" method="post" action="{{url('artigos.store')}}">
                    @endif
                        @csrf
                        <h5 class="fg-warning">Artigo</h5>
                        <div class="form-group t-10">
                            <label class="control-label col-sm-2" for="title">Título:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="Digite o título:" value="{{$artigo['title'] ?? ''}}" required>
                            </div>
                        </div>

                        <div class="form-group t-10">
                            <label class="control-label col-sm-2" for="content">Conteúdo:</label>
                            <div id="div-content" tabindex="-1" class="col-sm-10">
                                <textarea name="content"
                                          id="content">{{$artigo['content'] ?? ''}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label col-sm-2" >Preview:</label>
                            <div class="col-sm-10">
                                <textarea id="div-preview">
                                    @if(isset($artigo['content']))
                                        {!!$artigo['content']!!}
                                    @endif
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group t-10">
                            <label class="control-label col-sm-2" for="language">Linguagem:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="language" name="language"
                                       placeholder="Digite a linguagem"
                                       value="{{$artigo['language'] ?? ''}}">
                            </div>
                        </div>

                        <div class="form-group t-10">
                            <label class="control-label col-sm-2" for="author">Autor:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="author" name="author"
                                       placeholder="Digite o autor" value="{{$artigo['author'] ?? ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label col-sm-2" for="input-tags">Selecione as tags:</label>
                            <div class="col-sm-10">
                                <div tabindex="-1" id="accordionExample" class="accordion shadow">
                                    <!-- Accordion item 1 -->
                                    <div class="card">
                                        <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                            <h6 class="mb-0"><a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-uppercase collapsible-link">Tags</a></h6>
                                        </div>
                                        <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                                            <table class="table table-borderless table-responsive-sm">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        @foreach(array_slice($tags, 0, count($tags)/2 + 1) as $tag)
                                                            <input type="checkbox" name="tags[]" value="{{$tag['title']}}">
                                                            <label>{{$tag['title']}}</label>
                                                            <br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach(array_slice($tags, count($tags)/2 + 1, count($tags)) as $tag)
                                                            <input type="checkbox" name="tags[]" value="{{$tag['title']}}">
                                                            <label>{{$tag['title']}}</label>
                                                            <br>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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

    <script src="/tinymce/js/tinymce/tinymce.min.js"></script>

    <script type="text/javascript">
        <?php isset($artigo['tags']) ? $givenTags = json_encode($artigo['tags']) : $givenTags = ''; ?>

        document.getElementById('btnSalvar').addEventListener('click', (event) => {
            let checkBoxInputs = document.getElementsByName('tags[]')
            let editor = tinymce.get('content')

            let selected = 0
            checkBoxInputs.forEach(a => {
                if(a.checked){
                    selected++
                }
            })

            if(editor.getContent() == ''){
                document.getElementById('div-content').focus()
                alert("Você deve preencher o conteúdo!")
                event.preventDefault()
            }else if(selected < 1){
                document.getElementById('accordionExample').focus()
                alert("Você deve selecionar alguma tag!")
                event.preventDefault()
            }
        })

        //Inicialização das tags
        let tagsRecebidas = `<?php echo $givenTags;?>`;
        JSON.parse(tagsRecebidas)

        if (tagsRecebidas != '') {
            let inputTags = document.getElementsByName('tags[]');
            for (let i = 0; i < inputTags.length; i++) {
                if (tagsRecebidas.includes(inputTags[i].value)) {
                    inputTags[i].checked = true;
                    console.log(inputTags[i].value)
                }
            }
        }

        tinymce.init({
            menubar: false,
            statusbar: false,
            toolbar: false,
            selector: '#div-preview',
            width: 375,
            contentEditable: false
        });

        //Configurações do tinyMCE
        tinymce.init({
            setup: function(editor) {
                editor.on('focusout', function(e) {
                    let content = editor.getContent()
                    let previewEditor = tinymce.get('div-preview')
                    previewEditor.setContent(content)
                });
            },
            paste_data_images: true,
            height: 500,
            language: 'pt_BR',
            path_absolute: "/",
            selector: '#content',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | fontsizeselect forecolor fontselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image | code",
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader();

                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        //Adiciona o blob no campo do caminho da imagem
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            },
        });
    </script>
@endsection

@extends('template.template')
@section('conteudo')
    <style>
        /* Remove margins and padding from the list */
        .list {
            margin: 0;
            padding: 0;
        }

        /* Style the list items */
        .list li {
            display: flex;
            flex-direction: row;
            flex-grow: 1;
            cursor: pointer;
            position: relative;
            padding: 12px 8px 12px 8px;
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

        .list li input {
            flex: 10;
        }

        /* Set all odd list items to a different color (zebra-stripes) */
        .list li:nth-child(odd) {
            background: #f9f9f9;
        }

        /* Darker background-color on hover */
        .list li:hover {
            background: #ddd;
        }

        /* Style the close button */
        .close {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close:hover {
            background-color: #f44336;
            color: white;
        }
    </style>

    <div class="header_section text-center">
        <h1 class="trends_text">Artigo</h1>
    </div>

    <div class="container">
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
            <div class="form-group t-10">
                <label class="control-label col-sm-2" for="title">Título:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title"
                           placeholder="Digite o título:" value="{{$artigo['title'] ?? ''}}"
                           required>
                </div>
            </div>

            <div class="form-group t-10">
                <label class="control-label col-sm-2" for="content">Conteudo:</label>
                <div class="col-sm-10">
                    <textarea onchange="preview(this)" name="content"
                              id="content">{{$artigo['content'] ?? ''}}</textarea>
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
                <label class="form-control-label col-sm-2" for="input-tags">Tags:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="input-tags"
                           placeholder="Digite as tags">
                    <span onclick="newElement(this)" class="btn btn-primary rounded-pill" id="tags">Adicionar</span>
                    <div class="col-sm-5">
                        <ul id="table-tags" class="list">
                            @if(isset($artigo['tags']))
                                @foreach( $artigo['tags'] as $tag)
                                    <li>
                                        <input class="form-control" name="tags[]" value="{{$tag ?? ''}}">
                                        <span class="close">x</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function preview(textArea) {

        }

        // Click on a close button to hide the current list item
        var close = document.getElementsByClassName("close");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function () {
                var div = this.parentElement;
                $(div).remove();
            }
        }

        // Create a new list item when clicking on the "Add" button
        function newElement(spanElement) {
            let id = spanElement.id;
            var li = document.createElement("li");
            var inputValue = document.getElementById(`input-${id}`).value;
            var newInput = document.createElement("input");
            newInput.value = inputValue;
            newInput.setAttribute("class", "form-control");
            newInput.setAttribute("name", id + "[]");
            li.appendChild(newInput);

            if (inputValue === '') {
                alert("Você deve digitar algo!");
            } else {
                document.getElementById(`table-${id}`).appendChild(li);
            }
            document.getElementsByClassName(`table-${id}`).value = "";

            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);
            li.appendChild(span);

            for (i = 0; i < close.length; i++) {
                close[i].onclick = function () {
                    var div = this.parentElement;
                    div.remove();
                }
            }
        }
    </script>

    <script src="/tinymce/js/tinymce/tinymce.min.js"></script>

    <script type="text/javascript">
        tinymce.init({
            paste_data_images: true,
            height: 500,
            language: 'pt_BR',
            path_absolute: "/",
            selector: 'textarea',
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

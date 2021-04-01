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
        <h1 class="trends_text">Flor</h1>
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

                    @if(isset($flor))
                        <form action name="edit" id="create" method="post" action="{{url('flores.update')}}">
                            @method('PUT')
                    @else
                        <form action name="create" id="create" method="post" action="{{url('flores.store')}}">
                    @endif
                        @csrf
                        <h5 class="fg-warning">Flor</h5>
                        <div class="form-group">
                            <label class="form-control-label col-sm-2" for="input-names">Nomes:</label>
                            <div tabindex="-1" class="col-sm-10 divTable" id="div-inputnames">
                                <input class="form-control" type="text" id="input-names"
                                       placeholder="Digite os nomes">
                                <span onclick="newElement(this)" class="btn btn-warning rounded-pill" id="names">Adicionar</span>
                                <div class="col-sm-5">
                                    <ul id="table-names" class="list">
                                        @if(isset($flor['names']))
                                            @foreach( $flor['names'] as $name)
                                                <li>
                                                    <input class="form-control" name="names[]" value="{{$name ?? ''}}">
                                                    <span class="close">x</span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="form-group t-10">
                            <label class="control-label col-sm-2" for="scientificName">Nome Científico:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="scientificName" name="scientificName"
                                       placeholder="Digite o nome científico:" value="{{$flor['scientificName'] ?? ''}}"
                                       required>
                            </div>
                        </div>

                        <div class="form-group t-10">
                            <label class="control-label col-sm-2" for="family">Família:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="family" name="family"
                                       placeholder="Digite a família"
                                       value="{{$flor['family'] ?? ''}}">
                            </div>
                        </div>

                        <div class="form-group t-10">
                            <label class="control-label col-sm-2" for="input-flowerResources">Recursos da Flor:</label>
                            <div class="col-sm-10 divTable">
                                <input class="form-control" type="text" id="input-flowerResources"
                                       placeholder="Digite os recursos da flor">
                                <span onclick="newElement(this)" class="btn btn-warning rounded-pill"
                                      id="flowerResources">Adicionar</span>
                                <div class="col-sm-5">
                                    <ul id="table-flowerResources" class="list">
                                        @if(isset($flor['flowerResources'] ))
                                            @foreach( $flor['flowerResources'] as $flowerResources)
                                                <li>
                                                    <input class="form-control" name="flowerResources[]"
                                                           value="{{$flowerResources ?? ''}}">
                                                    <span class="close">x</span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group t-10">
                            <label class="control-label col-sm-2" for="input-images">Imagens:</label>
                            <div class="col-sm-10 divTable">
                                <input class="form-control" type="text" id="input-images" placeholder="Imagens">
                                <span onclick="newElement(this)" class="btn btn-warning rounded-pill" id="images">Adicionar</span>
                                <div class="col-sm-5">
                                    <ul id="table-images" class="list">
                                        @if(isset($flor['images']))
                                            @foreach( $flor['images'] as $image)
                                                <li>
                                                    <input class="form-control" name="images[]"
                                                           value="{{$image ?? ''}}">
                                                    <span class="close">x</span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="form-group t-10">
                            <label class="control-label col-sm-2" for="reference">Referência:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="reference" name="reference"
                                       placeholder="Digite a referência" value="{{$flor['reference'] ?? ''}}">
                            </div>
                        </div>

                        <div class="form-group t-10">
                            <label class="control-label col-sm-2" for="author">Autor:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="author" name="author"
                                       placeholder="Digite o autor"
                                       value="{{$flor['author'] ?? ''}}">
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
        document.getElementById('btnSalvar').addEventListener('click', (event) => {
            let quantidadeNomes = document.getElementById('table-names').childElementCount

            if(quantidadeNomes < 1){
                alert("Você deve digitar algum nome!")
                document.getElementById('div-inputnames').focus()
                event.preventDefault()
            }
        })

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
            let inputElement = document.getElementById(`input-${id}`)
            var inputValue = inputElement.value
            inputElement.value = ''
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
@endsection
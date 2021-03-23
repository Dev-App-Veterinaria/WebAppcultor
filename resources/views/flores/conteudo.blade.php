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
    </style>
<div class="jumbotron text-center">
    <h1>Cadastrar Nova Flor</h1>
</div>

   <div class="container">
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
        <div class="form-group">
            <label class="form-control-label col-sm-2" for="nome">Nomes:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="myInput"                      
                    placeholder="Digite os nomes" required>
                <span onclick="newElement()" class="btn btn-primary rounded-pill">Adicionar
             </span>
             <div class="col-sm-5">
                <ul id="tableUL" class="lista">
                    @if(isset($flor))
                        @foreach( $flor['names'] as $name)
                            <li>
                                <input class="form-control" name="name" value="{{$name ?? ''}}">
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
                       placeholder="Digite o nome científico:" value="{{$flor['scientificName'] ?? ''}}" required>
            </div>
        </div>

        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="family">Família:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="family" name="family"
                       placeholder="Digite a família" value="{{$flor['family'] ?? ''}}" required>
            </div>
        </div>

        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="flowerResources">Recursos da Flor:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="myInput" 
                    placeholder="Digite a Recursos da Flor"  required>
                       <span onclick="newElement()" class="btn btn-primary rounded-pill">Adicionar
                    </span>
                    <div class="col-sm-5">
                        <ul id="tableUL" class="lista">
                            @if(isset($flor))
                                @foreach( $flor['flowerResources'] as $flowerResources)
                                    <li>
                                        <input class="form-control" name="flowerResources" value="{{$flowerResources ?? ''}}">
                                        <span class="close">x</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
            </div>
        </div>
        <div class="form-group t-10">
            <label class="control-label col-sm-2" for="images">Imagens:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="myInput"                      
                    placeholder="Imagens">
                       <span onclick="newElement()" class="btn btn-primary rounded-pill">Adicionar
                        </span>
                        <div class="col-sm-5">
                            <ul id="tableUL" class="lista">
                                @if(isset($flor))
                                    @foreach( $flor['images'] as $image)
                                        <li>
                                            <input class="form-control" name="image" value="{{$image ?? ''}}">
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
                       placeholder="Digite o autor" value="{{$flor['author'] ?? ''}}">
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
    // Create a "close" button and append it to each list item
    var myNodelist = document.getElementsByTagName("LI");
    var i;
    for (i = 0; i < myNodelist.length; i++) {
        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        myNodelist[i].appendChild(span);
    }

    // Click on a close button to hide the current list item
    var close = document.getElementsByClassName("close");
    var i;
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
            var div = this.parentElement;
            div.style.display = "none";
        }
    }

    // Create a new list item when clicking on the "Add" button
    function newElement() {
        var li = document.createElement("li");
        var inputValue = document.getElementById("myInput").value;
        var t = document.createTextNode(inputValue);
        t.name = "vector[]";
        li.appendChild(t);
        if (inputValue === '') {
            alert("You must write something!");
        } else {
            document.getElementById("myUL").appendChild(li);
        }
        document.getElementById("myInput").value = "";

        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        li.appendChild(span);

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.display = "none";
            }
        }
    }
</script>
@endsection
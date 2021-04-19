@extends('template.template')

@section('conteudo')
<style>
#pagination-wrapper {
    padding: 5px;
}

.btn {
    margin: 1px;
}
</style>

<main class="bg-light">

    <div class="page-hero-section bg-image hero-mini" style="background-image: url(/assets/img/hero_mini.svg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-6">
                        <h1 class="mb-4 fw-bold">Usuários</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card-page">
                        <div class="card-page">
                            <h5 class="fg-primary">Todas os Usuários</h5>

                            <div class="container d-flex flex-row-reverse">
                                <div id="pagination-wrapper"></div>
                            </div>
                            <div class="container">
                                @csrf
                                <table class="table table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">

                                    </tbody>
                                </table>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-4 py-4">
                                    <div class="team-item">
                                        <a href="{{url('usuarios/create')}}" style="text-decoration:none">
                                            <button class="btn btn-primary rounded-pill">Adicionar Usuário</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Pop-up para confirmação de exclusão -->
                            <div class="modal" id="excluirPopUp" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Excluir usuário</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Tem certeza que você deseja excluir esse usuário?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light rounded-pill"
                                                data-dismiss="modal">Cancelar</button>
                                            <a class="botaoExcluir" style="text-decoration:none">
                                                <button type="button" class="btn btn-danger rounded-pill">Excluir
                                                    usuário</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Script em JS que passa o rapâmetr para o modal -->
                            <script type="text/javascript">
                            $('#excluirPopUp').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget) // Botão que acionou o modal
                                var recipient = button.data('id') // Extrai informação do atributos data-*
                                var modal = $(this)
                                var url = 'usuarios/' + recipient
                                modal.find('.botaoExcluir').attr('href', url)
                            })
                            </script>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
//Recebendo dador do PHP
<?php isset($usuarios) ? $usuariosJson = json_encode($usuarios) : $usuariosJson = '';?>
let usuarios = <?php echo $usuariosJson?>;
var state = {
    'querySet': usuarios,
    'page': 1,
    'rows': 5,
    'window': 5,
}

buildTable()

function pagination(querySet, page, rows) {

    var trimStart = (page - 1) * rows
    var trimEnd = trimStart + rows
    var trimmedData = querySet.slice(trimStart, trimEnd)
    var pages = Math.round(querySet.length / rows);

    return {
        'querySet': trimmedData,
        'pages': pages,
    }
}

function pageButtons(pages) {
    var wrapper = document.getElementById('pagination-wrapper')

    wrapper.innerHTML = ``

    var maxLeft = (state.page - Math.floor(state.window / 2))
    var maxRight = (state.page + Math.floor(state.window / 2))

    if (maxLeft < 1) {
        maxLeft = 1
        maxRight = state.window
    }

    if (maxRight > pages) {
        maxLeft = pages - (state.window - 1)

        if (maxLeft < 1) {
            maxLeft = 1
        }
        maxRight = pages
    }



    for (var page = maxLeft; page <= maxRight; page++) {
        let btnClass = "btn-primary";
        if (state.page == page) {
            btnClass = "btn-light";
        }
        wrapper.innerHTML += `<button value=${page} class="page btn ${btnClass} rounded-pill">${page}</button>`
    }

    if (state.page != 1) {
        wrapper.innerHTML = `<button value=${1} class="page btn btn-primary rounded-pill">&#171; Inicio</button>` +
            wrapper
            .innerHTML
    }

    if (state.page != pages) {
        wrapper.innerHTML += `<button value=${pages} class="page btn btn-primary rounded-pill">Fim &#187;</button>`
    }

    $('.page').on('click', function() {
        $('#table-body').empty()

        state.page = Number($(this).val())

        buildTable()
    })

}


function buildTable() {
    let table = $('#table-body')
    let ref = "<?php echo url('usuarios/') ?>";
    let data = pagination(state.querySet, state.page, state.rows);
    let myList = data.querySet;

    for (var i in myList) {
        //Keep in mind we are using "Template Litterals to create rows"
        let row = `<tr>
        <td>${myList[i].name}</td>
        <td>${myList[i].email}</td>
        <td>
            <button type="button" class="btn btn-danger rounded-pill fas fa-trash" 
                data-toggle="modal" data-target="#excluirPopUp"
                data-id=${myList[i]._id}></button>
        </td>
        <td>
            <a href="${ref}/${myList[i]._id}/edit"
                style="text-decoration:none">
                <button type="button"
                    class="btn btn-primary rounded-pill fas fa-edit"></button>
            </a>
        </td>
              `
        table.append(row)
    }

    pageButtons(data.pages)
}
</script>

@endsection
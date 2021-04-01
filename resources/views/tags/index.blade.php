@extends('template.template')

@section('conteudo')
    <style>
        .image {
            width: 45px;
            height: 45px;
        }
    </style>

    <div class="header_section text-center">
        <h1 class="trends_text">Tags</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-page mt-2 col">
                <div class="card-page">
                    <div class="container d-flex flex-row-reverse">
                        <div id="pagination-wrapper"></div>
                    </div>
                    @csrf
                    <table class="table table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>Tag</th>
                            <th>Título</th>
                            <th>Ícone</th>
                        </tr>
                        </thead>
                        <tbody id="table-body">
                        </tbody>
                    </table>

                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-4 py-4">
                        <div class="team-item">
                            <a href="{{url('tags/create')}}" style="text-decoration:none">
                                <button class="btn btn-warning rounded-pill">Adicionar Tag</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Pop-up para confirmação de exclusão -->
                <div class="modal" id="excluirPopUp" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Excluir tag</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>Tem certeza que você deseja excluir essa tag?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light rounded-pill"
                                        data-dismiss="modal">Cancelar</button>
                                <a class="botaoExcluir" style="text-decoration:none">
                                    <button type="button" class="btn btn-danger rounded-pill">Excluir
                                        tag</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script em JS que passa o rapâmetr para o modal
        $('#excluirPopUp').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Botão que acionou o modal
            var recipient = button.data('id') // Extrai informação do atributos data-*
            var modal = $(this)
            var url = 'tags/' + recipient
            modal.find('.botaoExcluir').attr('href', url)
        })

        //Paginação
        //Recebendo dador do PHP
        <?php isset($tags) ? $tagsJson = json_encode($tags) : $tagsJson = [];?>
        let artigos = <?php echo $tagsJson?>;
        var state = {
            'querySet': artigos,
            'page': 1,
            'rows': 5,
            'window': 5,
        }
        buildTable()

        function pagination(querySet, page, rows) {
            var trimStart = (page - 1) * rows
            var trimEnd = trimStart + rows
            var trimmedData = querySet.slice(trimStart, trimEnd)
            var pages = Math.ceil(querySet.length / rows);
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
                let btnClass = "btn-warning";
                if (state.page == page) {
                    btnClass = "btn-light";
                }
                wrapper.innerHTML += `<button value=${page} class="page btn ${btnClass} rounded-pill">${page}</button>`
            }
            if (state.page != 1) {
                wrapper.innerHTML = `<button value=${1} class="page btn btn-warning rounded-pill">&#171; Inicio</button>` +
                    wrapper
                        .innerHTML
            }
            if (state.page != pages) {
                wrapper.innerHTML += `<button value=${pages} class="page btn btn-warning rounded-pill">Fim &#187;</button>`
            }
            $('.page').on('click', function () {
                $('#table-body').empty()
                state.page = Number($(this).val())
                buildTable()
            })
        }

        function buildTable() {
            let table = $('#table-body')
            let ref = "<?php echo url('tags/') ?>";
            let data = pagination(state.querySet, state.page, state.rows);
            let myList = data.querySet;
            //Dúvida na linha 137
            for (var i in myList) {
                //Keep in mind we are using "Template Litterals to create rows"
                let row = `<tr>
            <th scope="row">${myList[i].tag}</th>
            <td>${myList[i].title}</td>
            <td>
                <img class="image" src="${myList[i].image}" alt="">
            </td>
            <td>
                <button type="button" class="btn btn-danger rounded-pill fas fa-trash"
                    data-toggle="modal" data-target="#excluirPopUp"
                    data-id=${myList[i]._id}>Excluir</button>
            </td>
            <td>
                <a href="${ref}/${myList[i]._id}/edit"
                    style="text-decoration:none">
                    <button type="button"
                        class="btn btn-warning rounded-pill fas fa-edit">Editar</button>
                </a>
            </td>
                  `
                table.append(row)
            }
            pageButtons(data.pages)
        }
    </script>
@endsection
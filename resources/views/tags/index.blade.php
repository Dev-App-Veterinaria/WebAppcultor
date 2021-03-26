@extends('template.template')

@section('conteudo')
<div class="jumbotron text-center">
    <h1>Tags</h1>
</div>
<div class="container">
    @csrf
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tag</th>
                <th>Título</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tags as $tag)
            <tr>
                <td>{{$tag['tag']}}</td>
                <td>{{$tag['title']}}</td>
                <td>
                    <a href="{{url('tags/'.$tag['_id'].'/edit')}}" style="text-decoration:none">
                        <button type="button" class="btn btn-primary">Editar</button>
                    </a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-toggle="modal"
                        data-target="#excluirPopUp" data-id={{$tag['_id']}}>Excluir</button>
                </td>
            </tr>
            @empty
            <tr>ERRO NO SERVIDOR</tr>
            @endforelse
        </tbody>
    </table>

</div>
<div class="container">
    <a href="{{url('tags/create')}}" style="text-decoration:none">
        <button type="button" class="btn btn-success btn-block">Adicionar tag</button>
    </a>
</div>
<!-- Pop-up para confirmação de exclusão -->
<div class="modal" id="excluirPopUp" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Excluir tag</h4>
            </div>
            <div class="modal-body">
                <p>Tem certeza que você deseja excluir essa tag?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a class="botaoExcluir" style="text-decoration:none">
                    <button type="button" class="btn btn-danger">Excluir tag</button>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Script em JS que passa o rapâmetr para o modal -->
<script type="text/javascript">
    $('#excluirPopUp').on('show.bs.modal', function (event) {
        dd("aqui")
        var button = $(event.relatedTarget) // Botão que acionou o modal
        var recipient = button.data('id') // Extrai informação do atributos data-*
        var modal = $(this)
        var url = 'tags/' + recipient
        modal.find('.botaoExcluir').attr('href', url)
    })
</script>
@endsection
@extends('adminlte::page')

@section('title', 'Kzas | Candidatos')

@section('content_header')
    <h1>Candidatos</h1>
@stop

@section('content')
    <div class="col-xs-12">
    </div>
    <div class="card">
        <div class="card-header">
            <span>Candidatos Desconsiderados</span>
            <label class="float-right"> <i class="fas fa-user-slash"></i> </label>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="t_candidatos">
                <thead>
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Nome</th>
                    <th>Localização</th>
                    <th>Quantidade de Repositório</th>
                    <th>Seguindo</th>
                    <th>Seguidores</th>
                    <th>Bio</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody id="body_t_candidatos">
                @foreach($candidatos as $candidato)
                    <tr>
                        <td>{{$candidato->id}}</td>
                        <td> <img class="user-image img-size-32" width="30px" height="30px" src="{{$candidato->git_avatar_url}}"></td>
                        <td>
                            {{$candidato->git_name}}
                        </td>
                        <td>{{$candidato->location}}</td>
                        <td>{{$candidato->git_public_repos}}</td>
                        <td>{{$candidato->git_public_following}}</td>
                        <td>{{$candidato->git_public_followers}}</td>
                        <td>{{$candidato->git_bio}}</td>
                        <td>
                            <a href="/candidatos/priorizar/{{$candidato->id}}" title="Priorizar"> <i class="far fa-thumbs-up text-green"></i> </a> &nbsp;
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $("#t_candidatos").DataTable({
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });
        });
    </script>
@stop
@extends('adminlte::page')

@section('title', 'Kzas | Usuários')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
    <div class="col-xs-12">
    </div>
    <div class="card">
        <div class="card-header with-border">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <a href="/usuarios/cadastrar">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>Novo</h3>
                                <p>Usuário</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="small-box-footer">Cadastrar <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-header">
            <span>Usuários</span>
            <label class="float-right"> <i class="fas fa-users"></i> </label>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="t_candidatos">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody id="body_t_candidatos">
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>#{{$usuario->id}}</td>
                        <td>{{$usuario->nome}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->password}}</td>
                        <td>
                            @if($usuario->ativo)
                                <a href="/usuarios/bloquear/{{$usuario->id}}">
                                    <div class="btn btn-danger">Bloquear</div>
                                </a>
                            @else
                                <a href="/usuarios/desbloquear/{{$usuario->id}}">
                                    <div class="btn btn-success">Desbloquear</div>
                                </a>
                            @endif
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
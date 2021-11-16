@extends('adminlte::page')
@section('title', 'Kzas | Usuários')
@section('content_header')
    <h1>Cadastro de Usuário </h1>
@stop
@section('content')
    <div class="content">
        <div class="col-xs-12">
            @if ($errors->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('error') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <span>Usuário</span>
                    <label class="float-right"> <i class="fas fa-user"> </i></label>
                </div>
                <form  enctype="multipart/form-data"  action="{{url('usuarios/cadastrar')}}" method="post" autocomplete="off">
                    <div class="card-body">
                        {!! csrf_field() !!}

                        <div class="col-xs-12">
                            <div class="form-group ">
                                <label>Nome</label>
                                <input type="text" name="nome"
                                       class="form-control {{$errors->has('nome') ? 'is-invalid' : '' }}" value="{{old('nome')}}" required>
                                @if($errors->has('nome'))
                                    <span class="help-block text-red">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="col-xs-12">
                            <div class="form-group ">
                                <label>E-mail</label>
                                <input type="email" name="email"
                                       class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}" value="{{old('email')}}" required>
                                @if($errors->has('email'))
                                    <span class="help-block text-red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="/usuarios" class="btn btn-flat bg-red float-left">Cancelar</a>
                        <button type="submit" class="btn btn-flat btn-primary float-right">Cadastrar Pessoa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('css')
@stop
@section('js')

@stop
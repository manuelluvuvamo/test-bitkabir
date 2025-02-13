@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 callout callout-success">
                <div class="col-sm-6">
                    <h1>
                      Gestão de Utilizadores
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Lista de utilizadores</a></li>
                        <li class="breadcrumb-item active">Edição de Utilizador</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        @livewire('admin.user.form.user-form', ['user' => $user, 'edition' => true])
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection

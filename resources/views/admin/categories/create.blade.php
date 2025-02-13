@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 callout callout-success">
                <div class="col-sm-6">
                    <h1>
                      Gestão de Produtos
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Lista de categorias</a></li>
                        <li class="breadcrumb-item active">Nova Categoria</li>
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
                        @livewire('admin.category.form.category-form')
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection

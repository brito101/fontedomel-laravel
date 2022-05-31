@extends('adminlte::page')

@section('title', '- Receitas')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-utensils"></i> Receitas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Receitas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @include('components.alert')

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex flex-wrap justify-content-between col-12 align-content-center">
                                <h3 class="card-title align-self-center">Receitas Cadastradas</h3>
                                @can('Criar Receitas')
                                    <a href="{{ route('admin.recipes.create') }}" title="Nova Receita"
                                        class="btn btn-success"><i class="fas fa-fw fa-plus"></i>Nova Receita</a>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-start">
                                @forelse ($recipes as $recipe)
                                    <div class="col-12 col-md-4">
                                        <div class="card p-2">
                                            <img src="{{ Storage::url('recipes/cover/' . $recipe->cover) }}"
                                                class="card-img-top" alt="{{ $recipe->title }}"
                                                style="min-height: 200px; max-height: 200px; object-fit: cover">
                                            <div class="card-body">
                                                <h5 class="card-title mb-2">{{ $recipe->title }}</h5>
                                                <p class="card-text text-muted">{{ $recipe->headline }}</p>
                                                <p class="card-text text-right text-muted">Visualizações:
                                                    {{ $recipe->views }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row d-flex flex-wrap justify-content-center">
                                                    <div class="col-12 col-md-6">
                                                        <a href="#" class="btn btn-success w-100 m-1">Ver</a>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <a href="{{ route('admin.recipes.edit', ['recipe' => $recipe->id]) }}"
                                                            class="btn btn-primary w-100 m-1">Editar</a>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <a href="recipes/destroy/{{ $recipe->id }}"
                                                            class="btn btn-danger w-100 m-1">Excluir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>Não existem receitas cadastrados</p>
                                @endforelse
                                @if (count($recipes) > 0)
                                    <div class="d-flex flex-wrap justify-content-center col-12">
                                        {{ $recipes->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

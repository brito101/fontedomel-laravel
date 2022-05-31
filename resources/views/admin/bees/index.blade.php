@extends('adminlte::page')

@section('title', '- Receitas')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><img src="{{ asset('img/bee.png') }}" alt="" title="" /> Abelhas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Abelhas</li>
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
                                <h3 class="card-title align-self-center">Abelhas Cadastradas</h3>
                                @can('Criar Abelhas')
                                    <a href="{{ route('admin.bees.create') }}" title="Nova Abelha" class="btn btn-success"><i
                                            class="fas fa-fw fa-plus"></i>Nova Abelha</a>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-start">
                                @forelse ($bees as $bee)
                                    <div class="col-12 col-md-4">
                                        <div class="card p-2">
                                            <img src="{{ Storage::url('bees/cover/' . $bee->cover) }}"
                                                class="card-img-top" alt="{{ $bee->title }}"
                                                style="min-height: 200px; max-height: 200px; object-fit: cover">
                                            <div class="card-body">
                                                <h5 class="card-title mb-2">{{ $bee->title }}</h5>
                                                <p class="card-text text-muted">{{ $bee->headline }}</p>
                                                <p class="card-text text-right text-muted">Visualizações:
                                                    {{ $bee->views }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row d-flex flex-wrap justify-content-center">
                                                    <div class="col-12 col-md-6">
                                                        <a href="#" class="btn btn-success w-100 m-1">Ver</a>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <a href="{{ route('admin.bees.edit', ['bee' => $bee->id]) }}"
                                                            class="btn btn-primary w-100 m-1">Editar</a>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <a href="bees/destroy/{{ $bee->id }}"
                                                            class="btn btn-danger w-100 m-1">Excluir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>Não existem abelhas cadastradas</p>
                                @endforelse
                                @if (count($bees) > 0)
                                    <div class="d-flex flex-wrap justify-content-center col-12">
                                        {{ $bees->links() }}
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

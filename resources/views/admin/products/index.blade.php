@extends('adminlte::page')

@section('title', '- Produtos')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-box"></i> Produtos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Produtos</li>
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
                                <h3 class="card-title align-self-center">Produtos Cadastrados</h3>
                                @can('Criar Produtos')
                                    <a href="{{ route('admin.products.create') }}" title="Novo Produto"
                                        class="btn btn-success"><i class="fas fa-fw fa-plus"></i>Novo Produto</a>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-start">
                                @forelse ($products as $product)
                                    <div class="col-12 col-md-4">
                                        <div class="card p-2">
                                            <img src="{{ Storage::url('products/cover/' . $product->cover) }}"
                                                class="card-img-top" alt="{{ $product->title }}"
                                                style="min-height: 200px; max-height: 200px; object-fit: cover">
                                            <div class="card-body">
                                                <h5 class="card-title mb-2">{{ $product->title }}</h5>
                                                <p class="card-text text-muted">{{ $product->headline }}</p>
                                                <p class="card-text text-right text-muted">Visualizações:
                                                    {{ $product->views }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row d-flex flex-wrap justify-content-center">
                                                    <div class="col-12 col-md-6">
                                                        <a href="#" class="btn btn-success w-100 m-1">Ver</a>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}"
                                                            class="btn btn-primary w-100 m-1">Editar</a>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <a href="products/destroy/{{ $product->id }}"
                                                            class="btn btn-danger w-100 m-1">Excluir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>Não existem produtos cadastrados</p>
                                @endforelse
                                @if (count($products) > 0)
                                    <div class="d-flex flex-wrap justify-content-center col-12">
                                        {{ $products->links() }}
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

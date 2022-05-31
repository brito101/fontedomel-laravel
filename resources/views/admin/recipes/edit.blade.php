@extends('adminlte::page')
@section('plugins.BsCustomFileInput', true)
@section('plugins.Summernote', true)

@section('title', '- Edição de Receita')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-utensils"></i> Editar Receita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.recipes.index') }}">Receitas</a></li>
                        <li class="breadcrumb-item active">Editar Receita</li>
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
                            <h3 class="card-title">Dados Cadastrais da Receita</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.recipes.update', ['recipe' => $recipe->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $recipe->id }}" name="id">
                            <div class="card-body">

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control" id="title" placeholder="Título da receita"
                                            name="title" value="{{ old('title') ?? $recipe->title }}" required>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="headline">Headline</label>
                                        <input type="text" class="form-control" id="headline"
                                            placeholder="Texto de destaque da receita" name="headline"
                                            value="{{ old('headline') ?? $recipe->headline }}" required>
                                    </div>
                                </div>

                                @if ($recipe->cover)
                                    <div class="col-12 img-responsive-16by9 text-center shadow-lg mb-2">
                                        <img src="{{ Storage::url('recipes/cover/' . $recipe->cover) }}"
                                            class="radius" alt="" width="100%"
                                            style="max-height: 500px; object-fit: cover">
                                    </div>
                                @endif

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <x-adminlte-input-file name="cover" label="Imagem de Capa"
                                            placeholder="Selecione uma imagem..." legend="Selecionar" />
                                    </div>
                                </div>

                                @php
                                    $config = [
                                        'height' => '100',
                                        'toolbar' => [
                                            // [groupName, [list of button]]
                                            ['style', ['bold', 'italic', 'underline', 'clear']],
                                            ['font', ['strikethrough', 'superscript', 'subscript']],
                                            ['fontsize', ['fontsize']],
                                            ['color', ['color']],
                                            ['para', ['ul', 'ol', 'paragraph']],
                                            ['height', ['height']],
                                            ['table', ['table']],
                                            ['insert', ['link', 'picture', 'video']],
                                            ['view', ['fullscreen', 'codeview', 'help']],
                                        ],
                                    ];
                                @endphp
                                <x-adminlte-text-editor name="content" label="Receita" igroup-size="sm"
                                    placeholder="Escreva aqui o texto descritivo da receita..." :config="$config">
                                    {!! $recipe->content !!}
                                </x-adminlte-text-editor>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

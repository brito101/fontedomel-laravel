@extends('site.master.master')

@section('content')
    <div class="inner-banner">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Receitas</h3>
            </div>
        </div>
    </div>

    <div class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Receitas Maravilhosas com Mel!</h2>
            </div>
            <div class="row pt-45">
                @forelse ($recipes as $recipe)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="{{ route('recipe', ['slug' => $recipe->slug]) }}" title="{{ $recipe->title }}">
                                    <img src="{{ Storage::url('recipes/cover/' . $recipe->cover) }}"
                                        alt="{{ $recipe->title }}">
                                </a>
                                <div class="blog-tag">
                                    <h3>{{ $recipe->created_at->format('d') }}</h3>
                                    @php
                                        switch ($recipe->created_at->format('M')) {
                                            case 'May':
                                                $month = 'Mai';
                                                break;
                                            case 'Aug':
                                                $month = 'Ago';
                                                break;
                                            case 'Sep':
                                                $month = 'Set';
                                                break;
                                            case 'Oct':
                                                $month = 'Out';
                                                break;
                                            case 'Dec':
                                                $month = 'Dez';
                                                break;
                                            default:
                                                $month = $recipe->created_at->format('M');
                                                break;
                                        }
                                    @endphp
                                    <span>{{ $month }}</span><br />
                                    <span>{{ $recipe->created_at->format('Y') }}</span>
                                </div>
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="{{ route('recipe', ['slug' => $recipe->slug]) }}"
                                        title="{{ $recipe->title }}">{{ $recipe->title }}</a>
                                </h3>
                                <p>{{ $recipe->headline }}</p>
                            </div>
                        </div>
                    </div>

                @empty
                    <p>Estamos preparando receitas de primeira para você :)</p>
                @endforelse

                @if (count($recipes))
                    <div class="col-lg-12 col-md-12 text-center d-flex justify-content-center">
                        <div class="pagination-area">
                            {{ $recipes->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

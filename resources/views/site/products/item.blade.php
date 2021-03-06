@extends('site.master.master')

@section('content')
    <div class="inner-banner">
        <div class="container">
            <div class="inner-title text-center">
                <h3>{{ $product->title }}</h3>
            </div>
        </div>
    </div>

    <div class="blog-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-article">
                        <div class="blog-article-img">
                            <img src="{{ Storage::url('products/cover/' . $product->cover) }}"
                                alt="{{ $product->title }}">
                            <div class="blog-article-tag">
                                <h3>{{ $product->created_at->format('d') }}</h3>
                                @php
                                    switch ($product->created_at->format('M')) {
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
                                            $month = $product->created_at->format('M');
                                            break;
                                    }
                                @endphp
                                <span>{{ $month }}</span><br />
                                <span>{{ $product->created_at->format('Y') }}</span>
                            </div>
                        </div>
                        <div class="blog-article-title">
                            <ul>
                                <li><i class="bx bx-show-alt"></i>{{ $product->views }} Visualiza????es</li>
                            </ul>
                            <h2>{{ $product->headline }}</h2>
                        </div>
                        <div class="article-content">
                            {!! $product->content !!}
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="side-bar-area">
                        <div class="search-widget">
                        </div>

                        <div class="side-bar-widget">
                            <h3 class="title">Outros Produtos</h3>
                            <div class="widget-popular-post">
                                @forelse ($products as $item)
                                    <article class="item">
                                        <a href="{{ route('product', ['slug' => $item->slug]) }}" target="_blank"
                                            title="{{ $item->title }}" class="thumb">
                                            <img src="{{ Storage::url('products/cover/' . $item->cover) }}"
                                                alt="{{ $item->title }}" class="full-image">
                                        </a>
                                        <div class="info">
                                            <h4 class="title-text">
                                                <a href="{{ route('product', ['slug' => $item->slug]) }}"
                                                    target="_blank">
                                                    {{ $item->title }}
                                                </a>
                                            </h4>
                                            <p>{{ $item->created_at->format('d/m/Y') }}</p>
                                        </div>
                                    </article>
                                @empty
                                    <p>Em breve...</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

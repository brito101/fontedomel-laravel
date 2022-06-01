@extends('site.master.master')

@section('content')
    <div class="inner-banner">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Produtos</h3>
            </div>
        </div>
    </div>

    <div class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Confira nossos Produtos!</h2>
            </div>
            <div class="row pt-45">
                @forelse ($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="{{ route('product', ['slug' => $product->slug]) }}"
                                    title="{{ $product->title }}">
                                    <img src="{{ Storage::url('products/cover/' . $product->cover) }}"
                                        alt="{{ $product->title }}">
                                </a>
                                <div class="blog-tag">
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
                            <div class="content">
                                <h3>
                                    <a href="{{ route('product', ['slug' => $product->slug]) }}"
                                        title="{{ $product->title }}">{{ $product->title }}</a>
                                </h3>
                                <p>{{ $product->headline }}</p>
                            </div>
                        </div>
                    </div>

                @empty
                    <p>Estamos preparando produtos de primeira para você :)</p>
                @endforelse

                @if (count($products))
                    <div class="col-lg-12 col-md-12 text-center d-flex justify-content-center">
                        <div class="pagination-area">
                            {{ $products->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

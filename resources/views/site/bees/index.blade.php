@extends('site.master.master')

@section('content')
    <div class="inner-banner">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Abelhas</h3>
            </div>
        </div>
    </div>

    <div class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Informações sobre Abelhas!</h2>
            </div>
            <div class="row pt-45">
                @forelse ($bees as $bee)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="{{ route('bee', ['slug' => $bee->slug]) }}" title="{{ $bee->title }}">
                                    <img src="{{ Storage::url('bees/cover/' . $bee->cover) }}" alt="{{ $bee->title }}">
                                </a>
                                <div class="blog-tag">
                                    <h3>{{ $bee->created_at->format('d') }}</h3>
                                    @php
                                        switch ($bee->created_at->format('M')) {
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
                                                $month = $bee->created_at->format('M');
                                                break;
                                        }
                                    @endphp
                                    <span>{{ $month }}</span><br />
                                    <span>{{ $bee->created_at->format('Y') }}</span>
                                </div>
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="{{ route('bee', ['slug' => $bee->slug]) }}"
                                        title="{{ $bee->title }}">{{ $bee->title }}</a>
                                </h3>
                                <p>{{ $bee->headline }}</p>
                            </div>
                        </div>
                    </div>

                @empty
                    <p>Estamos preparando informações de primeira para você :)</p>
                @endforelse

                @if (count($bees))
                    <div class="col-lg-12 col-md-12 text-center d-flex justify-content-center">
                        <div class="pagination-area">
                            {{ $bees->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

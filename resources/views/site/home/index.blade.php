@extends('site.master.master')

@section('content')
    <div class="banner-slider-area">
        <div class="banner-slider owl-carousel owl-theme">
            <div class="banner-item item-bg1">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="banner-item-content">
                                <span>Produtos das Abelhas</span>
                                <h1>Abelhas</h1>
                                <p>São conhecidas pela sua grande capacidade em fabricar vários tipos de
                                    produtos, como mel, cera, própolis, pólen, geleia real e apitoxina. Esses produtos, além
                                    de servirem como alimento, também são usados para a produção de cosméticos, pomadas,
                                    velas, xampus, sabonetes, hidratantes, e muito mais... </p>
                                <div class="banner-btn">
                                    <a href="{{ route('products') }}" title="Saiba Mais"
                                        class="default-btn btn-bg-one border-radius-5 text-dark">Saiba Mais <i
                                            class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-item item-bg2">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="banner-item-content">
                                <span>Mel, Própolis, Pólen, Favo, Geléia Real, Cera de Abelha</span>
                                <h1>Apiterapia</h1>
                                <p>consiste na mistura dos vários produtos, colhidos, transformados e segregados pelas
                                    abelhas, no tratamento de disfunções orgânicas e emocionais dos seres humanos.</p>
                                <div class="banner-btn">
                                    <a href="{{ route('products') }}" title="Saiba Mais"
                                        class="default-btn btn-bg-one border-radius-5 text-dark">Saiba Mais <i
                                            class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-item item-bg3">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="banner-item-content">
                                <span>Preservação dos ecossistemas</span>
                                <h1>Apicultura</h1>
                                <p>É o ramo da agricultura que estuda as abelhas produtoras de mel e as técnicas para
                                    explorá-las convenientemente em benefício do homem. Inclui técnicas de criação de
                                    abelhas e a extração e comercialização de mel, cera, geléia real e própolis.</p>
                                <div class="banner-btn">
                                    <a href="#" class="default-btn btn-bg-one text-dark border-radius-5"
                                        title="Saiba Mais">Saiba Mais <i class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="work-process-area-two pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="work-process-card-two">
                                <div class="number-title">01.</div>
                                <h3>Secular</h3>
                                <p>Desde o início de sua
                                    vida sobre a Terra, o homem tem usado mel não apenas como
                                    alimento, mas como fortificante, tônico, embelezador, rejuvenescedor, fator de
                                    longevidade, estimulante do crescimento, e remédio para diversas doenças.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="work-process-card-two">
                                <div class="number-title">02.</div>
                                <h3>Natural</h3>
                                <p>Elaborado pelas abelhas a partir do néctar coletado das flores
                                    e armazenado nos favos de suas colmeias, é um alimento poderoso. Seus principais
                                    constituintes são carboidratos, principalmente frutose e glicose, está aí a fonte de sua
                                    doçura!</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="work-process-card-two">
                                <div class="number-title">03.</div>
                                <h3>Vitaminado</h3>
                                <p>Conta com vitaminas A, B1, B2,
                                    B3, B5, B6, C e Biotina (vitamina H). Diferentes sais minerais também estão presentes em
                                    sua composição: cálcio, fósforo, ferro, enxofre, potássio, selênio, cloro, manganês,
                                    cobre e zinco aparecem na fórmula. Mas as funções terapêuticas do mel não se limitam às
                                    doenças do aparelho respiratório. O consumo diário provoca o aumento da
                                    <b>resistência</b> do
                                    organismo a uma série de enfermidades.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="work-process-card-two">
                                <div class="number-title">04.</div>
                                <h3>Cuidado!</h3>
                                <p>Alimento rico, puro e nutritivo, o mel <b>relegado</b> a plano secundário na
                                    mesa do brasileiro
                                    está sendo novamente procurado por um número crescente de pessoas, devido à
                                    revalorização da alimentação natural. Por causa disso, a oferta de mel não
                                    atende à
                                    procura. Assim 80% do mel que se vende no Brasil é <b>“falsificado”</b>.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="work-process-rightside">
                        <div class="section-title">
                            <span class="sp-color3">Mel de Abelhas </span>
                            <h2>As Maravilhas de um Produto Perfeito</h2>
                            <p>Aqui na Fonte do Mel, vc encontra essa delícia com propriedades especiais!!! Benefícios
                                gerais e energia. Consumidores constatam que consumir o mel em favo, tem um efeito notável
                                sobre o corpo devido às suas propriedades anti-inflamatórias. Ajuda a desobstruir as vias
                                respiratórias e os vasos sanguíneos, auxilia a digestão e ajuda a proporcionar energia
                                instantaneamente!
                            </p>
                        </div>
                        <a href="{{ route('products') }}" title="Confira Agora!"
                            class="default-btn btn-bg-two border-radius-5 text-center">Confira Agora!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="about-area about-bg2 pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img-5">
                        <img src="{{ asset('site/img/royaljelly.png') }}" alt="Geleia Real" width="500" height="500">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content-3 ml-20">
                        <div class="section-title">
                            <span class="sp-color2">Geléia Real</span>
                            <h2>Um Super Alimento</h2>
                            <p>O ovo destinado para uma rainha é posto numa célula especial alimentada com um produto de
                                elevado grau nutritivo. Isto é a <b>GELÉIA REAL</b> que permite que a rainha seja 2 vezes
                                maior que
                                as abelhas comuns, viva até 5 anos, versus 35 a 45 dias para a abelha operária, e põem 3.000
                                ou mais ovos por dia.
                            </p>
                            <p>Por se tratar de um dos alimentos mais ricos que existem na Natureza, possui uma composição
                                com mais de 100 tipos diferentes de substâncias com notáveis quantidades de proteínas,
                                lipídeos, carboidratos, vitaminas, hormônios, enzimas, substâncias minerais, fatores vitais
                                específicos, substancias biocatalizadoras nos processos de regeneração das células,
                                desenvolvendo uma importante ação fisiológica. </p>
                            <p>A geléia real é usada com sucesso nos casos de afecções cardiovasculares, do tubo digestivo,
                                de artrites, de hipertensão. Não apresenta efeito secundário, portanto, não tem contra
                                indicações.</p>
                        </div>
                        <h3>A geléia real contem:</h3>
                        <div class="all-skill-bar">
                            <div class="skill-bar" data-percentage="18%">
                                <h4 class="progress-title-holder clearfix">
                                    <span class="progress-title">Proteínas</span>
                                    <span class="progress-number-wrapper">
                                        <span class="progress-number-mark">
                                            <span class="percent"></span>
                                        </span>
                                    </span>
                                </h4>
                                <div class="progress-content-outter">
                                    <div class="progress-content"></div>
                                </div>
                            </div>
                            <div class="skill-bar" data-percentage="17%">
                                <h4 class="progress-title-holder clearfix">
                                    <span class="progress-title">Glicídios</span>
                                    <span class="progress-number-wrapper">
                                        <span class="progress-number-mark">
                                            <span class="percent"></span>
                                        </span>
                                    </span>
                                </h4>
                                <div class="progress-content-outter">
                                    <div class="progress-content"></div>
                                </div>
                            </div>
                            <div class="skill-bar" data-percentage="6%">
                                <h4 class="progress-title-holder clearfix">
                                    <span class="progress-title">Lipídios</span>
                                    <span class="progress-number-wrapper">
                                        <span class="progress-number-mark">
                                            <span class="percent"></span>
                                        </span>
                                    </span>
                                </h4>
                                <div class="progress-content-outter">
                                    <div class="progress-content"></div>
                                </div>
                            </div>
                        </div>

                        <div class="section-title">
                            <p>... e mais sais minerais! É rica em vitaminas B1, B2, B5, B6, PP, inositol,
                                provitamina D e H. É igualmente rica em hormônios sexuais e vitaminas. E que estimula a
                                atividade reprodutiva. É um excelente remédio profilático capaz de deter,
                                temporariamente o
                                envelhecimento do organismo que é uma das razões pelo seu uso em cosméticos onde as
                                vitaminas e em particular o ácido pantotênico, atua com eficiência. As indicações do uso
                                da
                                geleia real foram descritas como: “Estimulante biológico com ação energética e
                                regeneradora
                                do organismo. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="services-area-four pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color1">Nossos Produtos</span>
                <h2>Deleciosos, nutritivos e maravilhosos... Confira!</h2>
                <p class="margin-auto">
                    Nossa lista recente:
                </p>
            </div>
            <div class="row justify-content-center align-items-center pt-45">
                @forelse ($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="services-card services-card-color-bg2">
                            <a href="{{ route('product', ['slug' => $product->slug]) }}" title="{{ $product->title }}">
                                <img src="{{ Storage::url('products/cover/' . $product->cover) }}" alt="services">
                            </a>
                            <h3><a href="{{ route('product', ['slug' => $product->slug]) }}"
                                    title="{{ $product->title }}">{{ $product->title }}</a>
                            </h3>
                            <p>{{ $product->headline }}</p>
                            <a href="{{ route('product', ['slug' => $product->slug]) }}" title="Leia Mais"
                                class="learn-btn">Leia Mais
                                <i class='bx bx-chevron-right'></i></a>
                        </div>
                    </div>
                @empty
                    <p>Em breve..</p>
                @endforelse

            </div>
        </div>
    </section>
@endsection

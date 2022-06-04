@extends('site.master.master')

@section('content')
    <div class="inner-banner">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Contato</h3>
            </div>
        </div>
    </div>

    <div class="contact-form-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Entre em contato conosco!</h2>
            </div>
            <div class="row pt-45">
                <div class="col-12 col-lg-5">
                    <div class="contact-info mr-20">
                        <span>Informações de Contato</span>
                        <h2>Entreposto e Distribuição <br />Apicultura & Apiterapia</h2>
                        <p>Entregas em domicílio - (consute-nos)</p>
                        <ul>
                            <li>
                                <div class="content">
                                    <i class="bx bx-phone-call"></i>
                                    <h3>Telefone</h3>
                                    <a href="tel:+55 (11) 2307-1900">(11) 2307-1900</a>
                                    <a href="tel:+55 (11) 4117-3536">(11) 4117-3536</a>
                                    <a href="tel:+55 (11) 98586-1944">(11) 98586-1944</a>
                                </div>
                            </li>
                            <li>
                                <div class="content">
                                    <i class="bx bxs-map"></i>
                                    <h3>Endereço</h3>
                                    <span>Alameda dos Tupiniquins, nº 686, Moema, São Paulo, SP</span>
                                </div>
                            </li>
                            <li>
                                <div class="content">
                                    <i class="bx bx-message"></i>
                                    <h3>E-mail</h3>
                                    <a href="mailto:loja@fontedomel.com.br">loja@fontedomel.com.br</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="contact-form">
                        <form id="contactForm" action="{{ route('sendEmail') }}" method="POST" novalidate="true">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Seu nome <span>*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" required=""
                                            data-error="Por favor, informe seu nome" placeholder="Nome">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>E-mail <span>*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" required=""
                                            data-error="Por favor, informe seu e-mail" placeholder="E-mail">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Telefone <span>*</span></label>
                                        <input type="text" name="phone_number" id="phone_number" required=""
                                            data-error="Por favor, informe seu telefone" class="form-control"
                                            placeholder="Telefone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Assunto <span>*</span></label>
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                            required="" data-error="Por favor, informe um assunto" placeholder="Assunto">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Mensagem <span>*</span></label>
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8" required=""
                                            data-error="Escreva sua mensagem" placeholder="Sua mensagem"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 text-center">
                                    <button type="submit" class="default-btn btn-bg-two border-radius-5 disabled"
                                        style="pointer-events: all; cursor: pointer;">Enviar <i
                                            class="bx bx-chevron-right"></i>
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="map-area">
        <div class="container-fluid m-0 p-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.8338220682153!2d-46.6580735!3d-23.610291999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5a13b1368549%3A0x8a29208bc8acdd61!2sAlameda%20dos%20Tupiniquins%2C%20686%20-%20Planalto%20Paulista%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2006722-370!5e0!3m2!1spt-BR!2sbr!4v1654299205330!5m2!1spt-BR!2sbr"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection

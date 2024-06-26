@extends('frontend.layouts.master')

@section('home')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- breadcrumb -->
                    <div class="wrap__about-us">
                        <p>{!! $about[0]['content'] !!}</p>

                        <div class="clearfix"></div>
                        <h2 class="text-center">Nuestros Colaboradores</h2>
                        <!-- team member -->
                        <div class="team-member row">
                            <div class="col-md-4 col-xl-3">
                                <figure class="member"> <img src="{{ asset('admin/assets/img/about-us/news7.jpg') }}" class="img-fluid" alt="Image">
                                    <figcaption>
                                        <h4>Debora Hilton</h4>
                                        <small>Editor</small>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-youtube-play"
                                                        aria-hidden="true"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-4 col-xl-3">
                                <figure class="member"> <img src="{{ asset('admin/assets/img/about-us/news6.jpg') }}" class="img-fluid" alt="Image">
                                    <figcaption>
                                        <h4>Debora Hilton</h4>
                                        <small>Editor</small>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-youtube-play"
                                                        aria-hidden="true"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-4 col-xl-3">
                                <figure class="member"> <img src="{{ asset('admin/assets/img/about-us/news11.jpg') }}" class="img-fluid" alt="Image">
                                    <figcaption>
                                        <h4>Debora Hilton</h4>
                                        <small>Publisher</small>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-youtube-play"
                                                        aria-hidden="true"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-4 col-xl-3">
                                <figure class="member"> <img src="{{ asset('admin/assets/img/about-us/news2.jpg') }}" class="img-fluid" alt="Image">
                                    <figcaption>
                                        <h4>Debora Hilton</h4>
                                        <small>Project Manager</small>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"
                                                        aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-youtube-play"
                                                        aria-hidden="true"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

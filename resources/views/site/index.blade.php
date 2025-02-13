@extends('layouts.site')

@section('banner')
    <!-- Banner -->
    <section class="banner-con position-relative">
        <figure class="banner-lefttopimage mb-0">
            <img src="{{ asset('site/images/banner-lefttopimage.png') }}" alt="image" class="img-fluid" />
        </figure>
        <div class="container position-relative">
            <div class="row">
                <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="banner_content" data-aos="fade-up">
                        <h3>Welcome to The</h3>
                        <h1>Classic <span>Ice Cream</span> Parlor</h1>
                        <p>
                            Savor the taste of traditional ice cream made with love and
                            quality ingredients.
                        </p>
                        <a href="./#" class="text-decoration-none all_button">Browse Our Classic Flavors<i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12"></div>
            </div>
            <figure class="banner-image mb-0" data-aos="zoom-in">
                <img src="{{ asset('site/images/banner-image.png') }}" alt="image" class="img-fluid" />
            </figure>
        </div>
    </section>
@endsection

@section('content')
    @livewire('site.home')
@endsection

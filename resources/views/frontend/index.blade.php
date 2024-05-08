@extends('frontend.layouts.master')

@section('home')

    <!-- End Popular news carousel -->
    @include('frontend.home-components.carousel')
    <!-- Popular news carousel -->

    <section class="pt-0 mt-3">
        <!-- Recent News -->
        @include('frontend.home-components.recent_news')
        <!-- End Recent News -->

        <!-- Post news carousel -->
        @include('frontend.home-components.digital_libraries_carousel')
        <!-- End Popular news category -->

        <!-- Popular news category -->
        @include('frontend.home-components.category_pills')
        <!-- End news category -->

        <!-- Social Media Iframe -->
        @include('frontend.home-components.social_media_iframe')
        <!-- End Social Media Iframe -->
    </section>
    <!-- End Popular news category -->

@endsection

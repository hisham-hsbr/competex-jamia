@extends('front_end.layouts.app')



@section('mainContent')
    <!-- slider Background Area Start -->
    @include('front_end.layouts.sections.main-slider')
    <!-- slider Background Area End -->
    <!-- Service Start -->
    @include('front_end.layouts.sections.services')
    <!-- Service End -->
    <!-- About Start -->
    @include('front_end.layouts.sections.about')
    <!-- About End -->
    <!-- Courses Area Start -->
    @include('front_end.layouts.sections.courses')
    <!-- Courses Area End -->
    <!-- Notice Start -->
    @include('front_end.layouts.sections.notices')
    <!-- Notice End -->
    <!-- Event Area Start -->
    @include('front_end.layouts.sections.events')
    <!-- Event Area End -->
    <!-- Testimonial Area Start -->
    @include('front_end.layouts.sections.testimonials')
    <!-- Testimonial Area End -->
    <!-- Blog Area Start -->
    @include('front_end.layouts.sections.blogs')
    <!-- Blog Area End -->
    <!-- Subscribe Start -->
    @include('front_end.layouts.sections.subscribes')
    <!-- Subscribe End -->
@endsection
@section('footer-links')
    <x-back-end.message.message />
@endsection

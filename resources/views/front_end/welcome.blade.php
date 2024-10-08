@extends('front_end.layouts.app')



@section('mainContent')
    <!-- slider Background Area Start -->
    @include('front_end.layouts.sections.main-slider')
    <!-- slider Background Area End -->
    <!-- Service Start -->
    @include('front_end.layouts.sections.service')
    <!-- Service End -->
    <!-- About Start -->
    @include('front_end.layouts.sections.about')
    <!-- About End -->
    <!-- Courses Area Start -->
    @include('front_end.layouts.sections.course')
    <!-- Courses Area End -->
    <!-- Notice Start -->
    @include('front_end.layouts.sections.notice')
    <!-- Notice End -->
    <!-- Event Area Start -->
    @include('front_end.layouts.sections.event')
    <!-- Event Area End -->
    <!-- Testimonial Area Start -->
    @include('front_end.layouts.sections.testimonial')
    <!-- Testimonial Area End -->
    <!-- Blog Area Start -->
    @include('front_end.layouts.sections.blog')
    <!-- Blog Area End -->
    <!-- Subscribe Start -->
    @include('front_end.layouts.sections.subscribe')
    <!-- Subscribe End -->
@endsection
@section('footer-links')
    <x-back-end.message.message />
@endsection

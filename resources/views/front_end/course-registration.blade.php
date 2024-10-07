@extends('front_end.layouts.app')




@section('mainContent')
    <div class="courses-details-area blog-area pt-150 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <div class="courses-details">
                        <div class="courses-details-img">
                            <img src="img/course/courses-details.jpg" alt="courses-details">
                        </div>
                        <div class="course-details-content">
                            <h2>{{ $course->name }}</h2>
                            <p>{{ $course->description }}</p>
                            <div class="course-details-left">
                                <div class="single-course-left">
                                    <h3>about course</h3>
                                    <p>I must explain to you how all this a mistaken idea of ncing great explorer of the
                                        rut the is lder of human happinescias unde omnis iste natus error sit volptatem
                                        accuntium mque laudantium perspiciatis unde omnis iste natuss</p>
                                </div>
                                <div class="single-course-left">
                                    <h3>how to apply</h3>
                                    <p>I must explain to you how all this a mistaken idea of ncing great explorer of the
                                        rut the is lder of human happinescias unde omnis iste natus error sit volptatem
                                        accuntium mque laudantium perspiciatis unde omnis iste natuss</p>
                                </div>
                                <div class="single-course-left">
                                    <h3>certification</h3>
                                    <p class="margin">I must explain to you how all this a mistaken idea of ncing great
                                        explorer of the rut the is lder of human happinescias unde omnis iste natus
                                        error sit volptatem accuntium mque laudantium perspiciatis unde omnis iste
                                        natuss</p>
                                    <p>I must explain to you how all this a mistaken idea of ncing great explorer of the
                                        rut the is lder of human</p>
                                </div>
                            </div>
                            <div class="course-details-right">
                                <h3>COURSE FEATURES</h3>
                                <ul>
                                    <li>starts <span>25 june, 2022</span></li>
                                    <li>duration <span>6 Month</span></li>
                                    <li>class duration <span>3 hours</span></li>
                                    <li>skill level <span>all level</span></li>
                                    <li>language <span>english</span></li>
                                    <li>students <span>420</span></li>
                                    <li>assesments <span>self</span></li>
                                </ul>
                                <h3 class="red">course fee $789</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-front-end.course-registration />
        </div>
    </div>
    <!-- Blog End -->
@endsection


@section('footer-links')
    <x-back-end.script.dependent-dropdown-zip-code />
@endsection

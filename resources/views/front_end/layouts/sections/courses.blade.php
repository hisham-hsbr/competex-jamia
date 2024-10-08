<div class="text-center courses-area two pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <img src="{{ asset('front_end_links/eduhome/img/icon/section1.png') }}" alt="section-title">
                    <h2>COURSES WE OFFER</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-lg-4 col-md-6">
                    <div class="single-course">
                        <div class="course-img">
                            <a href="course-details.html"><img
                                    src="{{ asset('front_end_links/eduhome/img/course/course1.jpg') }}" alt="course">
                                <div class="course-hover">
                                    <i class="fa fa-link"></i>
                                </div>
                            </a>
                        </div>
                        <div class="course-content">
                            <h3><a href="course-details.html">{{ $course->name }}</a></h3>
                            <p>{{ $course->description }}</p>
                            <a class="default-btn"
                                href="{{ route('front-end.course-registration', encrypt($course->id)) }}">read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

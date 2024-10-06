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
            <div class="row">
                <div class="col-lg-6">
                    <div class="reply-area">
                        <h3>LEAVE A REPLY</h3>
                        <p>I must explain to you how all this a mistaken idea of ncing great explorer of the
                            rut<br>
                            the is lder of human happinescias unde omnis iste natus error sit volptatem </p>
                        <form id="contact-form" action="mail.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Name</p>
                                    <input type="text" name="name" id="name">
                                </div>
                                <div class="col-md-12">
                                    <p>Email</p>
                                    <input type="text" name="email" id="email">
                                </div>
                                <div class="col-md-12">
                                    <p>Subject</p>
                                    <input type="text" name="subject" id="subject">
                                    <p>Massage</p>
                                    <textarea name="message" id="message" cols="15" rows="10"></textarea>
                                </div>
                            </div>
                            <a class="reply-btn" href="#" data-text="send"><span>send message</span></a>
                            <p class="form-messege"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection

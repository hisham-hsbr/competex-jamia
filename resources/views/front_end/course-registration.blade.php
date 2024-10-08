@extends('front_end.layouts.app')


@section('head-links')
    <x-back-end.plugins.select-two-head />
@endsection
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
            {{-- <x-front-end.course-registration /> --}}

            <div class="row">
                <div class="col-lg-12">
                    <div class="reply-area">
                        <h3>Register For Course</h3>
                        <p>Fill all the fields<br>
                        </p>
                        <form role="form" action="{{ route('front-end.course-registration-store') }}" method="post"
                            enctype="multipart/form-data" id="quickForm" class="needs-validation" novalidate>
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">First Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="First Name" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <div class="invalid-feedback">
                                        Please Enter First Name.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        placeholder="Last Name">
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email" required>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <div class="invalid-feedback">
                                        Please Enter Email.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dob">Date Of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" required>
                                    @if ($errors->has('dob'))
                                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                                    @endif
                                    <div class="invalid-feedback">
                                        Please Enter Date Of Birth.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone_1">Phone Number 1 (eg: 919944000000)</label>
                                    <input type="number" class="form-control" id="phone_1" name="phone_1"
                                        placeholder="Phone Number 1" required>
                                    @if ($errors->has('phone_1'))
                                        <span class="text-danger">{{ $errors->first('phone_1') }}</span>
                                    @endif
                                    <div class="invalid-feedback">
                                        Please Enter Phone Number.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone_2">Phone Number 2 (eg: 919944000000)</label>
                                    <input type="number" class="form-control" id="phone_2" name="phone_2"
                                        placeholder="Phone Number 2">
                                    @if ($errors->has('phone_2'))
                                        <span class="text-danger">{{ $errors->first('phone_2') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">Select Gender</label>
                                    <select id="gender" name="gender" class="form-control select2" required>
                                        <option disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    @endif
                                    <div class="invalid-feedback">
                                        Please Select Gender.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address_detail">Address</label>
                                    <input type="text" class="form-control" id="address_detail" name="address_detail"
                                        placeholder="1234 Main St">
                                    @if ($errors->has('address_details'))
                                        <span class="text-danger">{{ $errors->first('address_details') }}</span>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="country">Select country</label>
                                        <select id="country" name="country" class="form-control select2">
                                            <option value="">Select country</option>
                                        </select>
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="state">Select state</label>
                                        <select id="state" name="state" class="form-control select2" required>
                                            <option value="">Select state</option>
                                        </select>
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please Select City.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="district">Select district</label>
                                        <select id="district" name="district" class="form-control select2">
                                            <option value="">Select district</option>
                                        </select>
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="city">Select city</label>
                                        <select id="city" name="city" class="form-control select2">
                                            <option value="">Select city</option>
                                        </select>
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="zip_code">Zip Code</label>
                                        <input type="text" name="zip_code" id="zip_code" placeholder="Zip Code"
                                            readonly required>
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please Select City.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="course_id">Select course</label>
                                        <select id="course_id" name="course_id" class="form-control select2" required>
                                            {{-- @foreach ($courses as $course) --}}
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                            {{-- @endforeach --}}
                                        </select>
                                        @if ($errors->has('course-id'))
                                            <span class="text-danger">{{ $errors->first('course-id') }}</span>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please Select A Course.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Description</label>
                                        <textarea name="description" class="form-control" rows="3" placeholder="Enter Description ..."></textarea>
                                    </div>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>






        </div>
    </div>
    <!-- Blog End -->
@endsection


@section('footer-links')
    <x-back-end.message.message />

    <x-back-end.plugins.select-two-footer />
    <x-back-end.script.address-dependent />

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection

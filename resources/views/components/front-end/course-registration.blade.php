<div class="row">
    <div class="col-lg-12">
        <div class="reply-area">
            <h3>Register For Course</h3>
            <p>Fill all the fields<br>
            </p>
            <form id="contact-form" action="mail.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2"
                        placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>



                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Address Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="form-group col-sm-4">
                                <label for="country" class="required col-form-label">Select
                                    Country</label>
                                <select name="country" id="country" class="form-control select2 dynamic"
                                    data-dependent="state">
                                    <option value="">Select Country</option>
                                    @foreach ($country_list as $country)
                                        <option value="{{ $country->country }}">
                                            {{ $country->country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="state" class="required col-form-label">Select
                                    State</label>
                                <select name="state" id="state" class="form-control select2 dynamic"
                                    data-dependent="district">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="district" class="required col-form-label">Select
                                    District</label>
                                <select name="district" id="district" class="form-control select2 dynamic"
                                    data-dependent="city">
                                    <option value="">Select District</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="city" class="required col-form-label">Select
                                    City</label>
                                <select name="city" id="city" class="form-control select2 dynamic"
                                    data-dependent="zip_code">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="zip_code" class="required col-form-label">Select Zip
                                    Code</label>
                                <select name="zip_code" id="zip_code" class="form-control select2">
                                    <option value="">Select Zip Code</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>





                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</div>

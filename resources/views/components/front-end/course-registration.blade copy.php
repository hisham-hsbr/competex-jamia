<div class="row">
    <div class="col-lg-12">
        <div class="reply-area">
            <h3>Register For Course</h3>
            <p>Fill all the fields<br>
            </p>
            <form id="contact-form" action="mail.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <p>First Name</p>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="col-md-6">
                        <p>Last Name</p>
                        <input type="text" name="last_name" id="last_name">
                    </div>
                    <div class="col-md-6">
                        <p>Email</p>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="col-md-6">
                        <p>Date Of Birth</p>
                        <input type="date" name="dob" id="dob">
                    </div>
                    <div class="col-md-6">
                        <p>Phone Number 1 (eg: 919944000000)</p>
                        <input type="number" name="phone_1" id="phone_1">
                    </div>
                    <div class="col-md-6">
                        <p>Phone Number 2 (eg: 919944000000)</p>
                        <input type="number" name="phone_2" id="phone_2">
                    </div>
                    <div class="col-md-6">
                        <p>Gender</p>
                        <select name="gender" id="gender" class="form-group">
                            <option disabled selected>--Gender--</option>

                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Status Update Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f3f3f3;
        }

        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border: 1px solid #e7e7e7;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 600px;
        }

        .email-header {
            background-color: #eaf6ff;
            color: #5a6268;
            padding: 15px;
            border-bottom: 1px solid #d6e9f8;
            border-radius: 8px 8px 0 0;
        }

        .email-header img {
            max-width: 150px;
            margin-bottom: 15px;
        }

        .email-content {
            margin: 20px 0;
            color: #333333;
        }

        .status-update {
            background-color: #e7f3e7;
            border-left: 5px solid #4caf50;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }

        .email-footer {
            background-color: #eaf6ff;
            color: #5a6268;
            padding: 15px;
            border-top: 1px solid #d6e9f8;
            border-radius: 0 0 8px 8px;
        }

        .btn-primary {
            text-decoration: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #4caf50;
            display: inline-block;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="email-container">
            <!-- Header Section with Logo -->
            <div class="text-center email-header">
                <img src="{{ asset('/storage/images/app/logo_png_2.png') }}" alt="{{ $settings['app_name'] }} Logo" />
                <h1>Application Status Update</h1>
            </div>

            <!-- Content Section -->
            <div class="email-content">
                <p>Dear {{ $courseRegister->name }} {{ $courseRegister->last_name }},</p>
                <p>
                    We hope you're doing well. We wanted to provide an update on your
                    application for the <strong>{{ $courseRegister->courseName->name }}</strong>.
                </p>

                <!-- Status Update Section -->
                <div class="status-update">
                    <h3>Current Status: {{ $courseRegister->application_status }}</h3>
                    <p>Status Updated On: <strong>{{ $courseRegister->updated_at }}</strong></p>
                    <p>Status Updated By: <strong>{{ $courseRegister->updated_by }}</strong></p>
                    <p>{{ $courseRegister->application_update }}</p>
                </div>

                <p>
                    Our team is actively working on your application and will notify you
                    once there are further updates. If you have any questions, feel free
                    to reach out to us at any time.
                </p>
                <div class="text-center">
                    <a href="https://competex.net" class="btn-primary" target="_blank">Contact Us</a>
                </div>
            </div>

            <!-- Footer Section -->
            <div class="text-center email-footer">
                <p>&copy; 2024 {{ $settings['app_name'] }}. All rights reserved.</p>
                <p>
                    Follow us:
                    <a href="#" style="color: #0b6bb4">Facebook</a> |
                    <a href="#" style="color: #0b6bb4">Twitter</a> |
                    <a href="#" style="color: #0b6bb4">LinkedIn</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

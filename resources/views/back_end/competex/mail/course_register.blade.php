<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome Email</title>
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
                <h1>Welcome to {{ $settings['app_name'] }}</h1>
            </div>

            <!-- Content Section -->
            <div class="email-content">
                <p>Dear {{ $courseRegister->name }} {{ $courseRegister->last_name }},</p>
                <p>
                    Thank you for registering for the <strong>{{ $courseRegister->courseName->name }}</strong>! We
                    are excited to have you on board. Your application has been
                    successfully submitted, and our team will be reaching out to you
                    soon with more details.
                </p>
                <p>
                    In the meantime, feel free to explore more of our courses and
                    resources on our website.
                </p>
                <div class="text-center">
                    <a href="https://competex.net" class="btn-primary" target="_blank">Visit Our Website</a>
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

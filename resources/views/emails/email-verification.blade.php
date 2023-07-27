<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h1 {
            color: #007BFF;
        }

        .btn-verify {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-verify:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Email Verification</h1>
        <p>Hi {{ $notifiable->fname }},</p>
        <p>Thank you for registering. Click the button below to verify your email address:</p>
        <a href="{{ $url }}" target="_blank" class="btn-verify">Verify Email Address</a>
        <p>If you did not create an account, no further action is required.</p>
        <p>Regards,</p>
        <p>Webethics</p>
    </div>
</body>

</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Password Reset Request</title>
</head>
<body>
    <h1>Password Reset Request</h1>
    <p>
        Someone has requested to reset the password for your account on {{ config('app.name') }}.
    </p>
    <p>
        To reset your password, click on the following link:
    </p>
    <a href="{{ url('password/reset/' . $token) }}">
        Reset Password
    </a>
    <p>
        If you did not request this, please ignore this email.
    </p>
</body>
</html>

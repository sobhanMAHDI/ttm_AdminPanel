<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <p>Hi {{ $name }},</p>
    <p>We sent you an email for resetting your password.</p>
    <p>Name: {{ $name }}</p>
    <p>Email: {{ $email }}</p>
    <p>Follow the link provided in the email to reset your password.</p>
    <a class="btn btn-success" href="{{ route('admin.user.reset_password',$token) }}" style="cursor: pointer;"><button class="btn btn-success">Reset Password</button></a>
</body>
</html>

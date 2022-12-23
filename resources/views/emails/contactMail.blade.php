<!DOCTYPE html>
<html lang="en">
<head>
    <title>You Have Mail, Tiger!</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>

    <p>You have received a correspondence from the Paddy Wack Gifts website that requires your attention.</p>

    <p>Name: {{ $mailData['name'] }}</p>
    <p>Phone: {{ $mailData['phone_no'] }}</p>
    <p>Email: {{ $mailData['email'] }}</p>
    <p>Message: {{ $mailData['message'] }}</p>

    <img src="https://paddywackgifts.com/img/banner_black.png" width="35%" alt="Paddy Wack Homemade Gifts" />
</body>
</html>
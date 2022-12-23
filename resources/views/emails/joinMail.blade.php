<!DOCTYPE html>
<html lang="en">
<head>
    <title>You Have Mail, Tiger!</title>
</head>
<body>
    <h2>You have received a join request from the Paddy Wack Gifts.</h2>

    <p>Name: {{ $data['name'] }}</p>
    <p>Phone: {{ $data['phone_no'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Country: {{ $data['country'] }}</p>
    <p>Message: {{ $data['message'] }}</p>

    <img src="https://paddywackgifts.com/img/logo_no_background.png" width="75%" alt="Paddy Wack Homemade Gifts" />
</body>
</html>
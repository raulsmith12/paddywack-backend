<!DOCTYPE html>
<html lang="en">
<head>
    <title>You Have Mail, Tiger!</title>
</head>
<body>
    <h2>You have received a commission request from the Paddy Wack Gifts website that requires your attention.</h2>

    <p>Name: {{ $data['name'] }}</p>
    <p>Phone: {{ $data['phone_no'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Size and Shape requested: {{ $data['size'] }} - {{ $data['shape'] }}</p>
    <p>Notes: {{ $data['notes'] }}</p>
    <p>Image of what customer is wanting on their custom commission piece:</p>
    <img src="{{ $message->embed($data['custom_image']) }}" width="95%" />
    <p>If you are having trouble seeing this image, enable image view in your email client</p>

    <img src="https://paddywackgifts.com/img/logo_no_background.png" width="75%" alt="Paddy Wack Homemade Gifts" />
</body>
</html>
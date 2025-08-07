<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Inquiry</title>
</head>
<body>
    <h2>New Inquiry Received</h2>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <hr>
    <p><strong>Message:</strong></p>
    <p>{!! nl2br(e($contact->message)) !!}</p>
</body>
</html>
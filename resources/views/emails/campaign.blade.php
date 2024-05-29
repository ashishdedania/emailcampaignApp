<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $emailTemplate->subject }}</title>
</head>
<body>
    <h1>{{ $emailTemplate->subject }}</h1>
    <p>{{ $emailTemplate->body }}</p>

    <p>Campaign Name: {{ $campaign->name }}</p>
    <p>Campaign Description: {{ $campaign->description }}</p>
</body>
</html>

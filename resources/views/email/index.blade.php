<!DOCTYPE html>
<html>
<head>
    <title>título de prueba</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <header>
        <h3>User data information</h3>
    </header>

    <main>
        <ul>
            <li><b>Name:</b> {{ $data["name"] }}</li>
            <li><b>Lastname:</b> {{ $data["lastname"] }}</li>
            <li><b>Email:</b> {{ $data["email"] }}</li>
            <li><b>Phone number:</b> {{ $data["phone"] }}</li>
            <li><b>Message:</b> {{ $data["message"] }}</li>
            @if(!empty($data["video_url"]))
                <li><b>Video URL:</b> {{ $data["video_url"] }}</li>
            @endif
        </ul>
    </main>

</body>
</html>
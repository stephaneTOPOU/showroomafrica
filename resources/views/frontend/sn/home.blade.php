<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/showroom/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/lanching_style.css') }}">
    <title>Launching Soon</title>
    @include('frontend.sn.header.header8')
<body>
    <div class="container">
        <div class="head">
            <a href="{{ route('home') }}">
                <img class="logo" src="{{ asset('assets/images/showroom/logo.png') }}" alt="">
            </a>
        </div>
        <div class="body">
            <span>Launching</span>
            <span class="so">soon!</span>
            <p>We are currently making some improvements to our website!</p>
        </div>
        <div class="box">
            <p>NOTIFY ME</p>
                <a href="https://www.facebook.com/profile.php?id=100088884413727&mibextid=ZbWKwL"><i class="fab fa-facebook-f" ></i></a>
                <a href="https://instagram.com/show.roomafrica?igshid=ZDdkNTZiNTM="><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com/showroomafrica?t=hZRidxlOlhKhoqxnmW2WiQ&s=09"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</body>
</html>
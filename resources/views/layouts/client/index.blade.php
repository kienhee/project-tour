<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', getEnv('APP_NAME')) | Dự án đặt chuyến đi </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('client') }}/css/animate.css">

    <link rel="stylesheet" href="{{ asset('client') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('client') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{ asset('client') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/chatbot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js" integrity="sha512-emSwuKiMyYedRwflbZB2ghzX8Cw8fmNVgZ6yQNNXXagFzFOaQmbvQ1vmDkddHjm5AITcBIZfC7k4ShQSjgPAmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    @include('layouts.client.header')

    @yield('content')

    @include('layouts.client.footer')
  
</body>

</html>

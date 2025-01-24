<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/logo.png')}}" />
    

    {{-- Style --}}
    @vite('resources/css/app.css')

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>@yield('title')</title>
</head>

<body
    style="background-image: url({{ asset('assets/img/background.jpg') }}); background-size:cover; background-position:center;">
    @yield('content')
</body>

{{-- alert --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var closeButtons = document.querySelectorAll("[data-dismiss-target]");

        closeButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var targetSelector = button.getAttribute("data-dismiss-target");
                var target = document.querySelector(targetSelector);
                if (target) {
                    target.remove();
                }
            });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>


</html>

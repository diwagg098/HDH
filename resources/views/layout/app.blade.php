<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="{{ asset('js/') }}/app.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css">

    
    <script src="https://kit.fontawesome.com/bdd89edb33.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>HDH Hotel</title>
</head>
<body>
 
{{-- 
    <div class="loader-wrapper">
        <span class="loader">
            <img src="{{asset('images/bg.svg')}}" width="50%">
            <span class="loader-inner"></span>
        </span>
    </div> --}}


    <script>
        $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
        });
    </script>

    @yield('home')
    @yield('about')
    @yield('shop')



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js"></script>
    <script src="https://kit.fontawesome.com/1006bc6174.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
  $('.carousel').slick({
  slidesToShow: 3,
  dots:true,
  centerMode: true,
  });
});

</script>



<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "400px";
  document.getElementById("main").style.marginLeft = "400px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
    </script>


@include('sweetalert::alert')

</body>
</html>
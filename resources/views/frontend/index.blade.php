<!DOCTYPE html>
<html lang="en">

<head>
    <title>Timepro | Career Carnival</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@400;600;700&display=swap"
        rel="stylesheet">

    <!-- custom styles -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />


    <!-- slick slider -->
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>

<body>
    <header>
        <nav class="navbar" id="navbar">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <img alt="TimesPro | Career Carnival" src="assets/images/logo.png" class="logo">
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="pageBody">
        <section>
            <div class="container homeBanner pt-4 pb-5 text-center">
                <h1 class="text-uppercase fw-normal text-center">Play Smart, <span class="colorRed fw-bold d-block">Win
                        Big!</span></h1>
                <img src="assets/images/banner-img.png" alt="" />
                <a href="choose_you_game"><button class="blueBtn bigFontBtn w-100 d-block m-auto">Start
                        Game</button></a>
            </div>
        </section>

        <section class="learnerSection pt-5">
            <div class="redBg mt-4 mt-md-5 pb-5">
                <h2 class="title pb-3">Learner Voice</h2>
                <div class="container">
                    <div class="customSlider">
                        <div class="slide-item">
                            <div class="videoPlayer mb-2">
                                <!-- <button class="videoBtn"><img src="assets/images/play-btn.png" /></button>
                                <video height="auto" preload="metadata" onclick="videoControls(this);return false;">
                                    <source type="video/mp4" src="https://www.w3schools.com/html/mov_bbb.mp4#t=0.1">
                                </video> -->
                                <iframe width="100%" height="200px" width="100%"
                                    src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                    frameborder="0" allowfullscreen>
                                </iframe>
                            </div>
                            <span class="smallLabel">Sector</span>
                            <div class="py-3">
                                <p class="mb-0 cardName">Akash Singh</p>
                                <small>Microsoft, Sr. Software Engineer</small>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="videoPlayer mb-2">
                                <iframe width="100%" height="200px"
                                    src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                    frameborder="0" allowfullscreen>
                                </iframe>
                            </div>
                            <span class="smallLabel">Sector</span>
                            <div class="py-3">
                                <p class="mb-0 cardName">Akash Singh</p>
                                <small>Microsoft, Sr. Software Engineer</small>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="videoPlayer mb-2">
                                <iframe width="100%" height="200px"
                                    src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                    frameborder="0" allowfullscreen>
                                </iframe>
                            </div>
                            <span class="smallLabel">Sector</span>
                            <div class="py-3">
                                <p class="mb-0 cardName">Akash Singh</p>
                                <small>Microsoft, Sr. Software Engineer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="whiteBg text-center pt-5 pb-3">
            <div class="container">
                <h2 class="title pb-3">Why TimesPro?</h2>
                <div class="customSlider blueDots">
                    <div class="slide-item">
                        <div class="videoPlayer mb-2">
                            <iframe width="100%" height="200px"
                                src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="videoPlayer mb-2">
                            <iframe width="100%" height="200px"
                                src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="videoPlayer mb-2">
                            <iframe width="100%" height="200px"
                                src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <footer>
        <div class="mt-5 text-center footer">
            <p class="fw-bold">Powered by</p>
            <img src="assets/images/timespro-logo.svg" alt="Timepro">
            <a href="{{url('term_condition')}}"><span>*Terms & Conditions Apply</span></a>
        </div>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    jQuery(document).ready(function ($) {
        $('.customSlider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
        });

    });

    const videoControls = (el) => {
        // console.log('clicked')
        // $('video').each((i, vid) => {
        //     vid.pause()
        // });
        el.paused ? el.play() : el.pause();
        // el.controls = true;
        $(el).siblings('.videoBtn').fadeToggle();
    }
</script>

</html>
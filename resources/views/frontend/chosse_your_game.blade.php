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
            <div class="container d-block">
                <div class="position-relative text-center">
                    <a href="{{url('/')}}" class="backArrow">
                        <img src="assets/images/arrow-left.png">
                    </a>
                    <h4 class="mb-0">Choose Your Game</h4>
                </div>
            </div>
        </nav>
    </header>

    <div class="pageBody">
        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{url('sector')}}">
                            <div class="infoBox mb-4">
                                <div class="infoContent">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="assets/images/circle-timer.svg" alt="" class="iconImg">
                                        <h5 class="mb-0">Win it in 2 minutes!</h5>
                                    </div>
                                    <p class="mb-0 smallTxt">Unlock your career path through our easy career assessment
                                        test and
                                        stand to win vouchers of up to Rs <b>5000</b>.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{url('sector')}}">
                            <div class="infoBox mb-4">
                                <div class="infoContent">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="assets/images/circle-job.svg" alt="" class="iconImg">
                                        <h5 class="mb-0">Are you job ready?</h5>
                                    </div>
                                    <p class="mb-0 smallTxt">Know where you stand before you enter the job market
                                        through a simple
                                        TimesPro
                                        AI powered test</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


            </div>
        </section>

        <section class="bottomGraphic"></section>
    </div>

    <footer>
        <div class="text-center footer">
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

</script>

</html>
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
                    <a href="{{url('choose_you_game')}}" class="backArrow">
                        <img src="assets/images/arrow-left.png">
                    </a>
                    <h4 class="mb-0">Sector</h4>
                </div>
            </div>
        </nav>
    </header>

    <div class="pageBody">
        <section>
            <div class="container py-5">
                <p class="smallTxt mb-4">To begin, first select the sector of your choice</p>
                <div class="row">
                    
                    <?php   $imageArray = ['circle-bfsi.svg', 'circle-logistics.svg', 'circle-IT.svg','circle-hospitality.svg'];
                            $section_type = ['BFSI', 'Logistics, E-commerce & Supply Chain', 'Information Technology','Hospitality & Hotel Management'];
                            $parameter = ['bfsi','logistics','IT','hospitality']
                    ?>

                    <div class="row">
                        <?php for ($i = 0; $i < count($imageArray); $i++) : ?>
                            <div class="col-md-6">
                                {{-- <a href="{{ url('details_form', ['section_type' => $parameter[$i]]) }}"> --}}
                            @if (auth()->check())
                                @if(auth()->user()->section_type != $parameter[$i])
                                    <a href="{{ url('details_form', ['section_type' => $parameter[$i]]) }}">
                                @elseif(auth()->user()->section_type == $parameter[$i]) 
                                
                                @endif
                            @else
                                <a href="{{ url('details_form', ['section_type' => $parameter[$i]]) }}">
                            @endif
                                    <div class="infoBox mb-4">
                                        <div class="infoContent">
                                            <div class="d-flex align-items-center">
                                                <?php
                                                $imageSrc = "assets/images/" . $imageArray[$i];
                                                $altText = ucfirst(explode('-', pathinfo($imageSrc)['filename'])[1]); 
                                                ?>
                                                <img src="<?= $imageSrc ?>" alt="<?= $altText ?>" class="iconImg">
                                                <h6 class="mb-0"><?= $section_type[$i] ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endfor; ?>
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
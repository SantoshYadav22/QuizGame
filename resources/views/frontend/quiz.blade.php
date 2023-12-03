<!DOCTYPE html>
<html lang="en">

<head>
    <title>Timepro | Career Carnival</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


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
                    <a href="{{url('details_form')}}" class="backArrow">
                        <img src="assets/images/arrow-left.png">
                    </a>
                    <h4 class="mb-0">Quiz</h4>
                    <input id="user_id" value="{{request('id')}}" style="display: none"> 
                    <?php use App\Models\User;
                        $name = User::where('id',request('id'))->first();
    
                        ?>
                    <input id="section_type" value="{{isset($name->section_type) ? $name->section_type : "Test"}}" style="display: none"> 

                    <p style="display: none" id="it_count">{{$SectionType_count}}</p> 

                </div>
            </div>
        </nav>
    </header>

    <div class="pageBody">
        <section>
            <div class="container py-5 mb-5">

                <div class="quiz_body">
                    <p class="smallTxt mb-0">
                        Question <span id="attemptedQs"></span> / <span id="totalQs"></span>
                    </p> 
                    <div id="stepList" class="mb-3">
                        <!-- steps added dynamically -->
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="scoreInfo">
                            <span>Score</span> <span id='score'></span>
                        </div>
                        <div class="timerInfo">
                            <img src="assets/images/timer-icon.svg" class="d-inline-block me-2">
                            <span id="timer">0:15</span>
                        </div>
                    </div>
                    <div id="questions" class="questionBox">
                        <!-- questions added dynamically -->
                    </div>

                    <button id="btn-next" class="blueBtn w-100 mt-5" onclick="next()">Next Question</button>
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

<script src="{{ asset('assets/js/quiz.js')}}" defer></script>

</html>
<script>
    var sectionTypesData = @json($sectionTypesJson);
    var data = JSON.parse(sectionTypesData);
    var questions = data;

</script>
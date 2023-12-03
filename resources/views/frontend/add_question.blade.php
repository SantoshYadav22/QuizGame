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
        {{-- {{dd($data);}} --}}
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
                    <form method="" action="javascript:void(0)" name="add_question_form" id="add_question_form" class="userDeatilsForm">
                        @csrf
                        <input type="text" name="id" value="{{isset($data['0']->id) ? $data['0']->id : ''}}" class="form-control" id="examplid" >

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Section Type</label>
                            <select class="form-select" name="section_type" aria-label="Default select example">
                                <option value="" selected>Open this select menu</option>
                                <option @if(isset($data['0']->section_type) && $data['0']->section_type == 'BFSI' ) selected  @endif value="BFSI">BFSI</option>
                                <option @if(isset($data['0']->section_type) && $data['0']->section_type == 'IT' ) selected  @endif value="IT">IT</option>
                                <option @if(isset($data['0']->section_type) && $data['0']->section_type == 'LOGISTICS' ) selected  @endif value="LOGISTICS">LOGISTICS</option>
                                <option @if(isset($data['0']->section_type) && $data['0']->section_type == 'HOSPITALITY' ) selected  @endif value="HOSPITALITY">HOSPITALITY</option>
                            </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputquestion" class="form-label">Question</label>
                          <input type="text" name="question" value="{{isset($data['0']->question) ? $data['0']->question : ''}}" class="form-control" id="examplquestion" >
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputanswer" class="form-label">Answer</label>
                          <input type="text" name="answer" value="{{isset($data['0']->answer) ? $data['0']->answer : ''}}" class="form-control" id="exampleInputanswer">
                        </div>
                        <div class="mb-3">
                            <label for="option" class="form-label">Options</label>
                            @php     
                                if(isset($data['0']->options)){
                                    $options = json_decode($data['0']->options);
                                }
                            @endphp
                            <input type="text" name="options" value="{{ isset($options) ? implode(',', $options) : '' }}" class="form-control" id="option">
                          </div>
                        <input type="text" name="type" value="{{$title}}" class="form-control" id="type">

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
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

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/jQuery.tagify.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

<script>

    var input = document.querySelector("#option");
    
    var tagify = new Tagify(input, {
        minTags: 2 ,
        maxTags: 4, 
    });
    
    document.addEventListener('DOMContentLoaded', function () {
        var userForm = document.getElementById('add_question_form');

        userForm.addEventListener('submit', function (event) {
            event.preventDefault();

            var form_data = new FormData(userForm);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/question_save', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var responseText = xhr.responseText;
                    var responseData = JSON.parse(responseText);
                    console.log(responseData)
                    userForm.reset();
                    window.location.href = "{{url('question_list')}}";

                } else {
                    alert('Error');
                }
            };
            xhr.onerror = function () {
                alert('Error');
            };
            xhr.send(form_data);
        });
    });
    </script>
</html>
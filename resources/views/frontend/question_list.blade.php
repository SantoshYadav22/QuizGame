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
                <a href="{{url('add_question')}}"  class="btn btn-primary " style=" margin-top: -37px;float: right;">Add Question</a>

            </div>
        </nav>
    </header>

    <div class="pageBody">
        <section>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="container py-5">
                <div class="row">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Options</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($data as $key => $item)
                            @php 
                                $options = json_decode($item->options);
                                $options_length = count($options);
                            @endphp
                            <tr>
                                <th scope="row">{{ $loop->index + 1 + ($data->currentPage() - 1) * $data->perPage() }}</th>
                                <td>{{$item->question}}</td>
                                <td>{{$item->answer}}</td>
                                <td>@if (isset($options_length) && $options_length > 0)                              
                                        @for ($i = 0; $i < $options_length; $i++)                                    
                                        <p style="    background: #0d6efd;border-radius:10px;  color: white;    display: flex;    justify-content: center;    width: auto;"> 
                                        {{$i + 1}} -> {{ $options[$i] }}</p> 
                                        @endfor
                                    @endif
                                </td>
                                <td><a href="{{ url('question/edit/' . $item->id) }}" class="btn btn-primary" id="editBtn">Edit</a></td>

                              </tr>   
                            @endforeach                          
                        </tbody>
                      </table>
                      {{ $data->links() }}

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
    
   
    </script>
</html>
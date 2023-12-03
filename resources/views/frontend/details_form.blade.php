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
                    <a href="{{url('sector')}}" class="backArrow">
                        <img src="assets/images/arrow-left.png">
                    </a>
                    <h4 class="mb-0">Fill Your Details</h4>
                </div>
            </div>
        </nav>
    </header>

    <div class="pageBody">
        <section>
            <div class="container py-5">
                <p class="smallTxt mb-4">Enter your credentials to proceed</p>
                <form method="" action="javascript:void(0)" name="user_form" id="user_form" class="userDeatilsForm">
                    @csrf
                    <input type="text" style="display:none " name="section_type" value="{{ request('section_type') }}" id="">
                    <div class="form-field">
                        <label for="name">Name<span>*</span></label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" class="form-control" required>
                    </div>
                    <div class="form-field">
                        <label for="email">Email ID<span>*</span></label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control" required>
                    </div>
                    <div class="form-field">
                        <label for="phoneNum">Phone Number<span>*</span></label>
                        <input type="number" id="phoneNum" name="phone" placeholder="Enter your phone number" class="form-control" required>
                    </div>
                    <!-- <button class="blueBtn w-100 mt-4" type="submit">Proceed</button> -->
                    <div>
                        <div class="checkbox-groupwrap">
                            <label class="checkbox-group">I agree to the <a href="terms-and-conditions.html">Terms and Conditions</a> & the <a href="https://timespro.com/privacy-policy">Privacy Policy</a>.
                                <input name="term" type="checkbox" >
                                <span class="checkmark"></span>
                              </label>
                        </div>
                        <div class="checkbox-groupwrap">
                            <label class="checkbox-group">Yes, I would like to receive updates via WhatsApp'
                                <input name="update_whatsapp" type="checkbox">
                                <span class="checkmark"></span>
                              </label>
                        </div>
                    </div>
                    
                        <button type="submit" class="blueBtn w-100 mt-4">Proceed</button>
                    
                </form>
                
                
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

document.addEventListener('DOMContentLoaded', function () {
    var userForm = document.getElementById('user_form');

    userForm.addEventListener('submit', function (event) {
        event.preventDefault();

        var form_data = new FormData(userForm);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/user/add', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                handleResponse(xhr.responseText);
            } else {
                 alert('Error');
            }
        };
        xhr.onerror = function () {
             alert('Error');
        };
        xhr.send(form_data);
    });

    function handleResponse(responseText) {
        var responseData = JSON.parse(responseText);
        // console.log('Response Data:', responseData);

        if (responseData.status == '200') {
            userForm.reset();
            window.location.href = '/{{ request('section_type') }}?id=' + responseData.data.id; 
        } else {
            alert('Error: ' + responseData.message);
        }
    }
});

</script>

</html>
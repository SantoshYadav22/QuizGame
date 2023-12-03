
let question_count = 0;
let points = 0;
// let total_questions = questions.length;
var it_count = document.getElementById('it_count').innerText;
let total_questions =it_count;
let timerInt;

window.onload = function () {
    show(question_count);
    createSteps(total_questions);
    document.getElementById('score').innerHTML = points;

};

function createSteps(steps) {
    let stepList = document.getElementById('stepList')
    for (let i = 0; i < parseInt(steps) + 1 ; i++) {
        const node = document.createElement("span");
        stepList.appendChild(node);
        if (i === parseInt(steps)) {
            node.style.display = 'none';
        }
    }
    document.getElementById('totalQs').innerHTML = steps;
}

function timer() {
    var sec = 15;
    timerInt = setInterval(function () {
        // console.log('timer called')
        document.getElementById('timer').innerHTML = '0:' + sec;
        sec--;
        if (sec < 0) {
            clearInterval(timerInt);
            next();
        }
    }, 1000);
}

function show(count) {
    document.getElementById('attemptedQs').innerHTML = question_count != 10 ? question_count + 1 : 10;
    // setTimer
    timer();

    let question = document.getElementById("questions");
    let [first, second, third, fourth] = JSON.parse(questions[count].options);

    question.innerHTML = `<h6 class='mt-2'>Q${count + 1}.  ${questions[count].question}</h6>
      <ul class="option_group">
      <li class="option">A. ${first}</li>
      <li class="option">B. ${second}</li>
      <li class="option">C. ${third}</li>
      <li class="option">D. ${fourth}</li>
      </ul>`;

    toggleActive();
}

function toggleActive() {
    let option = document.querySelectorAll("li.option");
    let nextBtn = document.getElementById('btn-next');
    nextBtn.disabled = true;
    for (let i = 0; i < option.length; i++) {
        option[i].onclick = function () {
            for (let i = 0; i < option.length; i++) {
                if (option[i].classList.contains("active")) {
                    option[i].classList.remove("active");
                }
            }
            option[i].classList.add("active");
            nextBtn.disabled = false;
        }
    }
}

function next() {
    // restart timer
    window.clearInterval(timerInt);
    var user_id = $('#user_id').val();
    if (question_count == questions.length - 1) {
        location.href = "/result?id=" +user_id;
    }
    else if (question_count == questions.length - 2) {
        let nextBtn = document.getElementById('btn-next');
        nextBtn.innerHTML = 'Submit'
    }

    let steps = document.querySelectorAll("#stepList span")
    steps[question_count + 1].classList.add("current");
    steps[question_count].classList.add("done");

    var section_type = $('#section_type').val();    

    var user_question = $('#questions h6').text();
    if (user_question && (user_question.split('.')[1].trim() == questions[question_count].question)) {
        var attemp_question = user_question.split('.')[1].trim();        
    }

    let user_answer = document.querySelector("li.option.active");
    user_answer = user_answer ? user_answer.innerHTML : null

    if (user_answer && (user_answer.split('.')[1].trim() == questions[question_count].answer)) {
        points += 1;
        sessionStorage.setItem("points", points);
        document.getElementById('score').innerHTML = points;

        var attemp_answer = user_answer.split('.')[1].trim();
        var pt = 1;
        var correct = 1;       
    }
    else{
        if(user_answer == null){
            var attemp_answer = user_answer;
        }else{
        var attemp_answer = user_answer.split('.')[1].trim();
        } 
        var pt = 0; 
        var correct = 0;      
    }

    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

    $.ajax({
        method: "POST",
        url: 'quiz/save',
        data: {
            _token: csrfToken,
            user_id: user_id,
            section_type: section_type,
            attemp_question: attemp_question,
            attemp_answer: attemp_answer,
            pt:pt,
            correct:correct,
        },
        success: function(res) {
            if (res.status == "200") {
                question_count++;
                show(question_count);
            } else {
                console.log("Error");
            }
        },
        error: function(err) {
            console.log("Error");
        }
    });
    

   
}
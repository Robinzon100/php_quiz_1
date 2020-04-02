<?php

include "./PHP/queries.php";
$queries = new Queries();

?>


<script>
localStorage.clear();
localStorage.setItem('score', 2);
window.requestAnsware = (selectElement) =>{

    


    let errorPlaceholder = selectElement.parentElement.querySelector('.error_placeholder');
    selectElement.value == selectElement.dataset.correctanswareid

    // fetch(`http://localhost/quiz/PHP/queries.php`, {
    //     method: 'post',
    //     body: {
    //         "selcted": selectElement.value
    //     }
    // }).then(res => {
    //     console.log(res)
    //     if (res.statusText ==  "Not Found") {

    //         document.write = "connection error";
    //     }
    // })



    if (selectElement.value != selectElement.dataset.correctanswareid) {
        let curentScore = +localStorage.getItem('score');
        console.log(curentScore)
        curentScore = curentScore - 2;
        localStorage.setItem('score', curentScore);


        let scoreElement = document.querySelector('.score');
        scoreElement.innerText = '';
        scoreElement.innerText = curentScore;

        errorPlaceholder.innerText = "";
        errorPlaceholder.innerText = "incorect";
        errorPlaceholder.style.color = "red";
    }else{
        let curentScore = +localStorage.getItem('score');
        console.log(curentScore)
        curentScore = curentScore + 2;
        localStorage.setItem('score', curentScore);


        let scoreElement = document.querySelector('.score');
        scoreElement.innerText = '';
        scoreElement.innerText = curentScore;

        errorPlaceholder.innerText = "";
        errorPlaceholder.innerText = "correct";
        errorPlaceholder.style.color = "green";
    } 


    if (+localStorage.getItem('score') >= 10) {
        document.querySelector('.link').style.display = "block";
    }
}



</script>


<?php

$rows = $queries->getAllQuestions();
foreach ($rows as $row) {
    echo "<div class='single_question' >";
        echo "<p>".$row['question_text']."</p>";

        echo "<select onchange='requestAnsware(this)' data-correctanswareid='".$row['correct_answare']."'>";
            echo "<option hidden >select the answare</option>";
            echo "<option value='1'>".$row['first_question_text']."</option>";
            echo "<option value='2'>".$row['second_question_text']."</option>";
        echo "</select>";

        echo "<p class='error_placeholder'></p>";

    echo "</div>";
}


?>


<h1 class="score"></h1>


<a class='link' style="display:none; font-size: 2rem" href="user_registration.php">daasrulet testi gaqvt minimaluri qula</a>

<!-- <form action="./PHP/queries.php" method="post">

</form> -->
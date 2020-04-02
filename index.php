<?php

include "./PHP/queries.php";
$queries = new Queries();

?>


<script>


window.requestAnsware = (selectElement) =>{
    let errorPlaceholder = selectElement.parentElement.querySelector('.error_placeholder');
    selectElement.value == selectElement.dataset.correctanswareid

    fetch(`http://localhost/quiz/PHP/queries.php`, {
        method: 'post',
        body: {
            "selcted": selectElement.value
        }
    }).then(res => {
        console.log(res)
        if (res.statusText ==  "Not Found") {

            document.write = "connection error";
        }
    })



    if (selectElement.value != selectElement.dataset.correctanswareid) {

        errorPlaceholder.innerText = "";
        errorPlaceholder.innerText = "incorect";
        errorPlaceholder.style.color = "red";
    }else{
        errorPlaceholder.innerText = "";
        errorPlaceholder.innerText = "correct";
        errorPlaceholder.style.color = "green";
    } 
}



</script>


<?php

$rows = $queries->getAllQuestions();
foreach ($rows as $row) {
    echo "<div class='single_question' >";
        echo "<h2>".$row['question_text']."</h2>";

        echo "<select onchange='requestAnsware(this)' data-correctanswareid='".$row['correct_answare']."'>";
            echo "<option hidden >select the answare</option>";
            echo "<option value='1'>".$row['first_question_text']."</option>";
            echo "<option value='2'>".$row['second_question_text']."</option>";
        echo "</select>";

        echo "<p class='error_placeholder'></p>";

    echo "</div>";
}


?>



<a href="user_registration.php">daasrulet testi</a>

<!-- <form action="./PHP/queries.php" method="post">

</form> -->
<form action="PHP/queries.php"  method="post">
    <label for="username">input your name</label>
    <input type="text" name="username" placeholder="input here">
    <input class='score' type="hidden" name="score" value="">
    <button type="submit">register</button>
</form>


<script>
    let score = +localStorage.getItem('score');

    document.querySelector('.score').value=score

</script>
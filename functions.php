<?php
include 'header.php';
function redirect($error,$seconds,$url){
    echo "<div class='divwrong alert alert-danger ml-5  text-align'>$error</div>";
    header("refresh:$seconds;url=$url");
}
     
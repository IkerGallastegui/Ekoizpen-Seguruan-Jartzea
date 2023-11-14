<?php
    $testua= $_POST['comment'];
    File_put_contents("comentarios.txt", $testua, FILE_APPEND);

    echo file_get_contents ("comentarios.txt");

?>
<?php

require_once 'dbconfig.php';
require_once 'auth.php';

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore :".mysqli_connect_error());
    $id = mysqli_real_escape_string($conn, checkAuth());
    $result = mysqli_query($conn,"SELECT id,title,img,descr FROM preferiti WHERE id_utente = $id");
    $arr = array();
    while($row = mysqli_fetch_assoc($result)){
        $arr[] = $row;
    }
    echo json_encode($arr);
    mysqli_free_result($result);
    mysqli_close($conn);


?>

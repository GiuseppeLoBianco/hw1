<?php

require_once 'dbconfig.php';
require_once 'auth.php';

if(isset($_GET["ti"])){

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore :".mysqli_connect_error());
    $ti = mysqli_real_escape_string($conn, $_GET["ti"]);
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $idu = mysqli_real_escape_string($conn, checkAuth());

    mysqli_query($conn, "DELETE FROM preferiti WHERE id = '$id' AND title = '$ti' AND id_utente = $idu");
    mysqli_close($conn);
 
}
?>
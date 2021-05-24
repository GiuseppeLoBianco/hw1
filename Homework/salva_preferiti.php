<?php

require_once 'dbconfig.php';
require_once 'auth.php';

if(isset($_GET["ti"]) && isset($_GET["im"]) && isset($_GET["de"])){

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore :".mysqli_connect_error());
    $ti = mysqli_real_escape_string($conn, $_GET["ti"]);
    $im = mysqli_real_escape_string($conn, $_GET["im"]);
    $de = mysqli_real_escape_string($conn, $_GET["de"]);
    $id = mysqli_real_escape_string($conn, checkAuth());

    $res = mysqli_query($conn,"SELECT * FROM preferiti where title = '$ti' AND img = '$im' AND descr = '$de' AND id_utente = '$id'");
    if(mysqli_num_rows($res)>0){
        $return_data = array('var'=>  true);
        echo json_encode($return_data);
    }
    else{
    mysqli_query($conn, "INSERT INTO preferiti(title,img,descr,id_utente) VALUES( '$ti','$im', '$de', '$id')");
    $return_data = array('var' =>  false);
    echo json_encode($return_data);
    mysqli_close($conn);
    }
 
}
?>
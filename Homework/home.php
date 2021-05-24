<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>



<html>

    <?php 
        // Carico le informazioni dell'utente loggato 
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $userid = mysqli_real_escape_string($conn, $userid);
        $query = "SELECT * FROM users WHERE id = $userid";
        $res_1 = mysqli_query($conn, $query);
        $userinfo = mysqli_fetch_assoc($res_1);   
    ?>

    <head>
    <title>Homework</title>
    <link rel="stylesheet" href="style/main-style.css" />
    <script src="scripts/home.js" defer="true"></script>
    <meta name="viewport"content="width=device-width, initial-scale=1"/>
    </head>
            
        <body>
            
            <nav>
            <div id="overlay"><h1 class="titolo"> Parliamo di film e serie TV</h1></div>
            </nav>
          
            <div class ="allflex">
            <div class ="sx_pag">
            <button  onclick="location.href='#'">Home</button>
            <button onclick="location.href='preferiti.php'">Preferiti</button>
            <button onclick="location.href='logout.php'">Logout</button>
            </div>
        
            <div class = "dx_pag">
            <h1 class = "benvenuto">Ciao <?php echo $userinfo['name']." ".$userinfo['surname'] ?>!</h1>
            <form name = "ricerca" id ="ricerca">
                <h1>Ricerca il tuo film o la tua serie TV:</h1>

                <label>Contenuto: <input type = "text" name = "content" id = "content"></label>
                
                <label>&nbsp;<input class="submit" type ="submit"></label>
                
            </form>

            <section class="griglia">
                
            </section>

            <h1 id="migliori">Le migliori del momento:</h1>
            <section class="top">
               
            </section>
             </div>
            </div>
    
            <footer>Powered by Web Programming 2021 - Unict</footer>
     </body>
   

</html>
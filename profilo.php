<?php 
    
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>
    <?php 
    
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        $userid = mysqli_real_escape_string($conn, $userid);
        
        $query = "SELECT * FROM users WHERE id = $userid";
        $res = mysqli_query($conn, $query);
        $userinfo = mysqli_fetch_assoc($res);   
        
    ?>

    <head>
        <link rel='stylesheet' href='profilo.css'>
        <script src='profilo.js' defer></script>
        <link rel="stylesheet" href="hw1.css"> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <title> Amabile profilo - <?php echo $userinfo['name']." ".$userinfo['surname'] ?></title>
    </head>

    <body>

    <!--INIZIO HEADER-->
    <?php require_once 'header.php';?>
    <!--FINE HEADER-->
    <div class="content">
        <!--UTENTE-->
        <div class="userInfo">
             <h2>Utente: <?php echo $userinfo['name']." ".$userinfo['surname'] ?></h2>
        </div>    
    <!--PREFERITI-->
    <h1>I tuoi prodotti preferiti</h1>
    <div id="contenitore-preferiti"></div>

    </div>
    </body>

</html>

<?php mysqli_close($conn); ?>
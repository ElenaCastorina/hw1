<?php
    include 'auth.php';

    if (checkAuth()) {
       
        header('Location: home.php');
        
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
       
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $query = "SELECT * FROM users WHERE username = '".$username."'";
      
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        if (mysqli_num_rows($res) > 0) {
           
            $entry = mysqli_fetch_assoc($res);
          
            if (password_verify($_POST['password'], $entry['password'])) {

                
                $_SESSION["_agora_username"] = $entry['username'];
                $_SESSION["_agora_user_id"] = $entry['id'];
                
                header("Location: home.php");
               
                mysqli_free_result($res);
                
                mysqli_close($conn);
               
                exit;
            }
        }
      
        $error = "Username e/o password errati.";
    } 

    
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";
    }

?>



<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Amabile</title>
        <link rel='stylesheet' href='login.css'>
    </head>
    <body>
        <!--LOGO-->
        <div id="logo">
             <img src="https://amabilejewels.it/media/wysiwyg/logo_amabile.png" alt="Logo Amabile">
        </div>
        <!--INTESTAZIONE PRINCIPALE-->
        <main class="login">
        <section class="main">
            <h5>Per continuare, accedi ad Amabile.</h5>
            
            <?php
                if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                }
                
            ?>
            <!--FORM LOGIN-->
            <form name='login' method='post'>
               
                <div class="username">
                    <label for='username'>Username</label>
                    <input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                </div>
                 
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                </div>
                 <!--BOTTONE FORM-->
                <div class="submit-container">
                    <div class="login-btn">
                        <input type='submit' value="ACCEDI">
                    </div>
                </div>
            </form>
            
            <div class="signup"><h4>Non hai un account?</h4></div>
            <div class="signup-btn-container"><a class="signup-btn" href="signup.php">ISCRIVITI AD AMABILE</a></div>
        </section>
        </main>
    </body>
</html>
<?php 

require_once 'auth.php';

if (!$userid = checkAuth()) {
    header("Location: login.php");
    exit;
}


$is_logged_in = isset($_SESSION['_agora_user_id']);


$conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

if ($conn->) {
    die("Connessione connect_errorfallita: " . $conn->connect_error);
}


if ($is_logged_in && $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['recensione'])) {
   
    $userid = $_SESSION['_agora_user_id'];
    $recensione = $conn->real_escape_string($_POST['recensione']);
    
    $stmt = $conn->prepare("INSERT INTO recensioni (id, recensione) VALUES (?, ?)");
    $stmt->bind_param("is", $userid, $recensione);

    
    if ($stmt->execute()) {
        echo "Recensione salvata con successo.";
    } else {
        echo "Errore durante il salvataggio della recensione: " . $conn->error;
    }

    
    $stmt->close();
}

$sql = "SELECT users.username, recensioni.recensione FROM recensioni JOIN users ON recensioni.id = users.id";
$result = $conn->query($sql);

?>

<html>

<head>
    <meta charset="UTF-8">

    <link rel='stylesheet' href='recensioni.css'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Recensioni</title>
   
</head>

<body>

    <div id="logo">
             <img src="https://amabilejewels.it/media/wysiwyg/logo_amabile.png" alt="Logo Amabile">
        </div>
    
    <h1>Recensioni</h1>
    <?php
    //VISUALIZZA RECENSIONI
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>" . $row['username'] . ":</strong> " . $row['recensione'] . "</p>";
        }
    } else {
        echo "<p>Nessuna recensione disponibile.</p>";
    }
   
    $result->free();
    ?>
   <!--FORM PER INSERIRE UNA RECENSIONE (solo se loggati) --> 
    <?php if ($is_logged_in): ?>
        
        <h2>Lascia una Recensione</h2>
        <form method="post" action="recensioni.php">
            <label for="recensione">Recensione:</label><br>
         <div id='textrecensione'>
          <textarea id="recensione" name="recensione" required></textarea><br>
         </div>
            <input type="submit" value="INVIA">
        </form>
    <?php else: ?>
        <p><a href="login.php">Accedi</a> per lasciare una recensione.</p>
    <?php endif; ?>
    
    <p><a href="home.php">Torna alla Home</a></p>
    

    
    
</body>
</html>

<?php
//Chiudo la connessione con il database
$conn->close();
?>
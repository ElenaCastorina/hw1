<?php

require_once 'auth.php';

require_once 'dbconfig.php';

if (!$userid = checkAuth()) {
    header("Location: login.php");
    exit;
}

header('Content-Type: application/json');


$conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);


if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$id_utente = $conn->real_escape_string($userid);

$id_prodotto = isset($_GET['id']) ? $conn->real_escape_string($_GET['id']) : 0;

$response = ['success' => false];

if ($id_prodotto > 0) {

    $check = "SELECT * FROM preferiti WHERE id_utente = '$id_utente' AND id_prodotto = '$id_prodotto'";
    $result = $conn->query($check);

    if ($result->num_rows == 0) {
   
        $insert = "INSERT INTO preferiti (id_utente, id_prodotto) VALUES ('$id_utente', '$id_prodotto')";
        if ($conn->query($insert) === TRUE) {
           
            $response['success'] = true;
            $response['action'] = 'aggiunto';
        }
    } else {
      
        $delete = "DELETE FROM preferiti WHERE id_utente = '$id_utente' AND id_prodotto = '$id_prodotto'";
        if ($conn->query($delete) === TRUE) {
      
            $response['success'] = true;
            $response['action'] = 'rimosso';
        }
    }
}

echo json_encode($response);

$conn->close();

?>

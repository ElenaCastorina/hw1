
<?php
require_once '../dbconfig.php';


header('Content-Type: application/json');


$conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

if ($conn->connect_error) {
    
    http_response_code(500);
    echo json_encode(['error' => 'Connessione fallita: ' . $conn->connect_error]);
    exit;
}


$sql = "SELECT id, prodotto, prezzo, image FROM prodotti_in_vendita";
$result = $conn->query($sql);


$prodotti = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $prodotti[] = $row;
    }
} else {
    
    $prodotti = [];
}


echo json_encode($prodotti);


$conn->close();
?>

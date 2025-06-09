<?php
require_once 'auth.php';
require_once 'dbconfig.php';

header('Content-Type: application/json');


if (!$userid = checkAuth()) {
    echo json_encode([]);
    exit;
}

$conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
if ($conn->connect_error) {
    echo json_encode([]);
    exit;
}

$userid = $conn->real_escape_string($userid);

$query = "
SELECT prodotti_in_vendita.id, prodotti_in_vendita.prodotto, prodotti_in_vendita.prezzo, prodotti_in_vendita.image
FROM preferiti
JOIN prodotti_in_vendita ON preferiti.id_prodotto = prodotti_in_vendita.id
WHERE preferiti.id_utente = '$userid'
";
$result = $conn->query($query);

$preferiti = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $preferiti[] = $row;
    }
}

echo json_encode($preferiti);

$conn->close();
?>

<?php 
require_once 'auth.php';
require_once 'dbconfig.php';


$conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']); 


if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}


$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($product_id > 0) {
 
    $sql = "SELECT * FROM prodotti_in_vendita WHERE id = $product_id";
    $result = $conn->query($sql);

 

    
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die('Prodotto non trovato.');
    }
} else {
    
    die('ID prodotto non valido.');
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli Prodotto</title>
    <link rel="stylesheet" href="dettagli_prodotto.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<?php require_once 'header.php'; ?>
<div class="content">
    <section class="secproduct">            
        <div class="product-details">
            <div class="product-image">
               
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['prodotto']); ?>">
            </div>
            <div class="product-description">
               
                <h1><?php echo htmlspecialchars($product['prodotto']); ?></h1>
                
                <div class="price"> 
                    <strong><span><?php echo number_format($product['prezzo'], 2); ?> €</span></strong>
                </div>
            </div>
        </div>   
    </section>
</div>

<?php require_once 'footer.php'; ?>
</body>
</html>
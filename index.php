<?php 
    require_once 'auth.php';
    require_once 'dbconfig.php';
?>


  
<?php 

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $sql = "SELECT * FROM prodotti_in_vendita LIMIT 4";
    $result = $conn->query($sql);
    
    $prodotti = [];
   
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $prodotti[] = $row;
        }
    } else {
        
        die('Nessun prodotto trovato.');
    }
   
    $conn->close();
  ?>


<html>


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amabile</title>
    <link rel="stylesheet" href="hw1.css"> 
    <script src="hw1.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="uploadprodotto.js" defer></script>
    <script src="aggiuntarimozione.js" defer></script>


</head>
<body>

    <!--INIZIO HEADER-->
  <?php require_once 'header.php';?>
  <!--FINE HEADER-->

    <section>

        <div class="nuova-collezione">
            <img src="https://www.theuniquemagazine.it/wp-content/uploads/2023/12/AMABILE_00.webp" alt="NewCollection">
            <div class="button-newcollection">
                <a href="#">SCOPRI LA COLLEZIONE</a>
            </div>
        </div>
        
        
        <div class="container-prodotti ">
            <div class="box">
                <img src="https://amabilejewels.it/media/.renditions/wysiwyg/Lovli_1_.jpg" alt="Lovli">
                <p>Lovli</p>
            </div>
            <div class="box">
                <img src="https://amabilejewels.it/media/.renditions/wysiwyg/Charmi.jpg"  alt="Charmi">
                <p>Charmi</p>
            </div>
            <div class="box">
                <img src="https://amabilejewels.it/media/.renditions/wysiwyg/Orecchini_2_.jpg" alt="Orecchini">
                <p>Orecchini</p>
            </div>
            <div class="box">
                <img src="https://amabilejewels.it/media/.renditions/wysiwyg/Anello.jpg"  alt="Anelli">
                <p>Anelli</p>
            </div>
            <div class="box">
                <img src="https://amabilejewels.it/media/.renditions/wysiwyg/Collana_1_.jpg"  alt="Collane">
                <p>Collane</p>
            </div>
            <div class="box">
                <img src="https://amabilejewels.it/media/.renditions/wysiwyg/Bracciali_2_.jpg"  alt="Bracciali">
                <p>Bracciali</p>
            </div>
        </div>
    
        <div class="button">
            <a href="#">SCOPRI TUTTI I GIOIELLI</a>
        </div>

        <div class="text-best-products">
           <strong> I NOSTRI GIOIELLI PIU AMATI</strong>
        </div>

        <div class="container-best-products">
            <div class="carousel">
                
                <div class="product-card"  >
                    <div class="img-box">
                        <img src="https://amabilejewels.it/media/catalog/product/cache/ebbe3395c1a17951692efe562303167c/a/n/anello-sky-taglio-princess-argento.jpg" alt="Anello Sky Argento">
                        <div class="product-hover">
                            <div class="quickview">👁 Quickview</div>
                            <div class="wishlist">♡</div>
                        </div>
                    </div>
                    <div class="product-detail">
                        <strong class="product-name">
                            <a href="#">ANELLO SKY ARGENTO</a>
                        </strong>
                        <p class="price" data-euro="51.90">51.90 EUR</p>
                    </div>
                    <div class="shop-icon" data-name="Anello Sky Argento" data-price="51.90 €">
                        <i class="material-symbols-outlined">shopping_bag</i>
                    </div>
                </div>
                
                <div class="product-card" >
                    <div class="img-box">
                        <img src="https://amabilejewels.it/media/catalog/product/cache/ebbe3395c1a17951692efe562303167c/b/r/bracciale-shape_oro.jpg" alt="Bracciale Shape Pastello">
                        <div class="product-hover">
                            <div class="quickview">👁 Quickview</div>
                            <div class="wishlist">♡</div>
                        </div>
                    </div>
                    <div class="product-detail">
                        <strong class="product-name">
                            <a href="#">BRACCIALE SHAPE PASTELLO PLACCATO ORO</a>
                        </strong>
                        <p class="price" data-euro="59.90">59.90 EUR</p>
                    </div>
                    <div class="shop-icon" data-name="Bracciale Shape Pastello Placcato" data-price="59.90 €" >
                        <i class="material-symbols-outlined">shopping_bag</i>
                    </div>
                </div>
               
                <div class="product-card" >
                    <div class="img-box">
                        <img src="https://amabilejewels.it/media/catalog/product/cache/ebbe3395c1a17951692efe562303167c/o/r/orecchino-bond-stella-pave_argento.jpg" alt="Orecchino Bond Stella">
                        <div class="product-hover">
                            <div class="quickview">👁 Quickview</div>
                            <div class="wishlist">♡</div>
                        </div>
                    </div>
                    <div class="product-detail">
                        <strong class="product-name">
                            <a href="#">ORECCHINO BOND STELLA PAVé ARGENTO</a>
                        </strong>
                        <p class="price" data-euro="24.90">24.90 EUR</p>
                    </div>
                    <div class="shop-icon" data-name="Orecchino Bond Stella Pavè Argento" data-price="24.90 €" >
                        <i class="material-symbols-outlined">shopping_bag</i>
                    </div>
                </div>
                
                <div class="product-card"  >
                    <div class="img-box">
                        <img src="https://amabilejewels.it/media/catalog/product/cache/ebbe3395c1a17951692efe562303167c/c/o/collana_barret_argento.jpg" alt="Collana Barret">
                        <div class="product-hover">
                            <div class="quickview">👁 Quickview</div>
                            <div class="wishlist">♡</div>
                        </div>
                    </div>
                    <div class="product-detail">
                        <strong class="product-name">
                            <a href="#">COLLANA BARRET ARGENTO</a>
                        </strong>
                        <p class="price" data-euro="59.90">59.90 EUR</p>
                    </div>
                    <div class="shop-icon" data-name="Collana Barret Argento" data-price="59.90 €">
                        <i class="material-symbols-outlined">shopping_bag</i>
                    </div>
                </div>
                
                <div class="product-card"  >
                    <div class="img-box">
                        <img src="https://amabilejewels.it/media/catalog/product/cache/ebbe3395c1a17951692efe562303167c/o/r/orecchino_quadrato_argento.jpg" alt="Hoop Square">
                        <div class="product-hover">
                            <div class="quickview">👁 Quickview</div>
                            <div class="wishlist">♡</div>
                        </div>
                    </div>
                    <div class="product-detail">
                        <strong class="product-name">
                            <a href="#">HOOP SQUARE ARGENTO</a>
                        </strong>
                        <p class="price" data-euro="35.90">35.90 EUR</p>
                    </div>
                    <div class="shop-icon" data-name="Hoop Square Argento" data-price="35.90 €">
                        <i class="material-symbols-outlined">shopping_bag</i>
                    </div>
                </div>
            </div>

        </div>

        
        <div id="notification-addToCart" class="hidden"></div>


         <!--INZIO ARTICOLI IN VENDITA-->

        <div id="scritta-vendita">
           <strong> ULTIMA COLLEZIONE</strong>
        </div>

        <div id="main-container"></div>

        
           
      </div>
      

  <!--FINE ARTICOLI IN VENDITA-->


        <div class="container-storia">
            <div class="image-storia">
                <img src="https://amabilejewels.it/media/.renditions/wysiwyg/about-us-banner-iniziale.jpg"  alt="Due donne con orecchini">
            </div>
            <div class="text-storia">
                <h2>LA STORIA DI AMABILE</h2>
                <p>
                    Quella di Amabile e di Martina Strazzer, CEO e Founder, è una bellissima storia di determinazione, 
                    che ci insegna che non sempre la strada già tracciata è quella giusta, e che per raggiungere i propri 
                    obiettivi bisogna avere il coraggio di mettersi in gioco.
                </p>
                <p id="extra-text" class="hidden">
                    Amabile nasce con l'idea di rivoluzionare il mondo dei gioielli, rendendoli accessibili e unici. 
                    Con una passione per il design e l'innovazione, Martina ha creato un brand che ispira migliaia di persone.
                </p>
                <div class="button">
                    <button id="toggle-button">SCOPRI DI PIÙ</button>
                </div>
            </div>
        </div>

       <div class="spotify-moodboard">
            <h2>La tua moodboard musicale</h2>
            <p> Lasciati ispirare dalle emozioni: scegli il mood che meglio rappresenta il tuo stile.</p>
            <div id="mood-buttons">
                <button data-mood="love">ROMANTICO</button>
                <button data-mood="elegant">ELEGANTE</button>
                <button data-mood="luxury music">LUSSUOSO</button>
                <button data-mood="jazz">SOFISTICATO</button>
            </div>
            <div id="playlist-view"></div>
        </div>


        <div class="container-recensioni">
           
            <div class="carousel-recensioni">
                <div class="review-card">
                    <div class="top-row">
                        <div class="stars">★★★★★</div>
                        <div class="verified">✔ Verificata</div>
                    </div>
                    
                    <div class="review-title">Spedizione rapidissima</div>
                    <div class="review-text">Ho ordinato giovedì sera, arrivato sabato mattina, anche con gli auguri per la laurea...</div>
                    <div class="review-author"><strong>virginia m,</strong> 12 ore fa</div>
                </div>

                <div class="review-card">
                    <div class="top-row">
                        <div class="stars">★★★★★</div>
                    </div>
                    <div class="review-title">Gestione super efficiente ❤️</div>
                    <div class="review-text">Gioielli stupendi, compro da Amabile da quando hanno aperto, gestione di tutto eccell...</div>
                    <div class="review-author"><strong>Rosmery Copparoni,</strong> 20 ore fa</div>
                </div>

                <div class="review-card">
                    <div class="top-row">
                        <div class="stars">★★★★★</div>
                    </div>
                    <div class="review-title">Cinque stelle meritatissime.</div>
                    <div class="review-text">Ho acquistato per la prima volta dal sito "Amabile", dopo che una mia amica mi ha...</div>
                    <div class="review-author"><strong>Marharyta Martynyuk,</strong> 2 giorni fa</div>
                </div>

                <div class="review-card">
                    <div class="top-row">
                        <div class="stars">★★★★★</div>
                        <div class="verified">✔ Verificata</div>
                    </div>
                    <div class="review-title">Orecchini deliziosi</div>
                    <div class="review-text">Orecchini deliziosi, arrivati in fretta e all’altezza delle aspettative</div>
                    <div class="review-author"><strong>Eli,</strong> 4 giorni fa</div>
                </div>

                <div class="review-card">
                    <div class="top-row">
                        <div class="stars">★★★★★</div>
                        <div class="verified">✔ Verificata</div>
                    </div>
                    <div class="review-title">Tutto bene prodotto come richiesto</div>
                    <div class="review-text">Tutto bene prodotto come richiesto</div>
                    <div class="review-author"><strong>Bu,</strong> 4 giorni fa</div>
                </div>
                
            </div>
            
        </div>
        <div class="footer-recensioni">
            <p>Valutata <strong>4.4</strong> su 5 sulla base di <strong class="bold-underline">1.334 recensioni</strong> . Le nostre recensioni a 4 e a 5 stelle.</p>
            <div class="logo-Trustpilot">
                <img src="https://logos-world.net/wp-content/uploads/2023/04/Trustpilot-Logo.png" alt="Logo Trustpilot">
            </div>
        </div>


        <div class="newsletter-container">
            <h3><strong>ISCRIVITI ALLA NOSTRA NEWSLETTER</strong></h3>
            <h4>Riceverai un codice sconto del valore di 5€ da utilizzare su una spesa minima di 70€.</h4>
            <div class="box-email">
                <input class="email-field" type="email" placeholder="La tua mail migliore" />
                <div class="submit">MI ISCRIVO</div>
            </div>
            <p><strong>◻  Ho letto e accetto la <a href="https://www.iubenda.com/privacy-policy/52304325" alt="Privacy policy">Privacy policy</a> e la <a href="https://www.iubenda.com/privacy-policy/52304325/cookie-policy" alt="Cookie policy"> Cookie policy</a></strong> </p>
        </div>

    </section>

<!--INIZIO FOOTER-->
    <?php require_once 'footer.php';?>
    <!--FINE FOOTER-->

</body>

</html>

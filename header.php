<!-- header.php -->
<head> 
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="hw1.css" />
    <title>Header</title>
  </head>

  <header>
  
        <div class="banner">
            <strong>Spedizione gratuita in Italia</strong> sopra i 100€
        </div>

    
        <nav class="navbar">
            <div class="brand-logo">
                <img src="https://amabilejewels.it/media/wysiwyg/logo_amabile.png" alt="Logo Amabile">
            </div>

            <div class="nav-links">
                <div class="nav-item">
                    <a href="#">LILYPAD</a>
                </div>



            <div class="nav-item">
                <a href="https://amabilejewels.it/tutti-i-gioielli">TUTTI I GIOIELLI</a>
                <div class="dropdown">
                    <div class="dropdown-item">
                        <a href="https://amabilejewels.it/tutti-i-gioielli/orecchini">ORECCHINI</a>
                        <div class="sub-dropdown">
                            <a href="#">A LOBO</a>
                            <a href="#">PENDENTI</a>
                            <a href="#">A CERCHIO</a>
                            <a href="#">CON CIONDOLO</a>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <a href="#">COLLANE</a>
                        <div class="sub-dropdown">
                            <a href="#">CHOKER</a>
                            <a href="#">CON CIONDOLO</a>
                            <a href="#">DI PERLE</a>
                        </div>
                    </div>
                    <a href="#">ANELLI</a>
                    <a href="#">BRACCIALI</a>
                </div>
            </div>
                
    
                <div class="nav-item">
                    <a href="#">LOVLI</a>
                    <a href="#">CHARMI</a>
                </div>
    
                <div class="nav-item">
                    <a href="https://amabilejewels.it/categoria-prodotto/collezioni">COLLEZIONI</a>
                    <div class="dropdown">
                        <a href="#">LILYPAD</a>
                        <a href="#">HEARTLY</a>
                        <a href="#">HEAVENLY</a>
                        <a href="#">CHUNKY</a>
                    </div>
                </div>
    
                <div class="nav-item">
                    <a href="https://amabilejewels.it/categoria-prodotto/set">SET</a>
                    <a href="#">REGALI</a>
                    <a href="#">BUONI REGALO</a>
                    <a href="recensioni.php">RECENSIONI</a>
                </div>
            </div>


            <div class="nav-icons">
                <i class="material-symbols-outlined">search</i>
                <!-- form che punta a profilo.php e contiene un bottone che mostra l’icona "person" (profilo utente).-->
                <form action="profilo.php" method="post" style="display: inline;">
                    <button type="submit" class="logout-icon">
                        <i class="material-symbols-outlined">person</i>
                    </button>
                </form>
                <i class="material-symbols-outlined">shopping_bag</i>
                <!-- Icona Logout come bottone -->
                <!--Questo è un form che effettua il logout. Quando premi il bottone con l’icona logout, viene inviata una richiesta POST a logout.php, che termina la sessione utente.-->
                <form action="logout.php" method="post" style="display: inline;">
                    <button type="submit" class="logout-icon">
                        <i class="material-symbols-outlined">logout</i>
                    </button>
                </form>
            </div>

        </nav>
    </header>
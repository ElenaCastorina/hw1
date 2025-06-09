
document.addEventListener('DOMContentLoaded', caricaProdotti);


function caricaProdotti() {
    fetch('api/prodotto.php') 
        .then(mostraRisposta) 
        .then(mostraProdotti)   
        .catch(mostraErrore);  
}


function mostraRisposta(response) {
    return response.json(); 
}

+
function mostraProdotti(prodotti) {
    var contenitore = document.querySelector('#main-container');

    
    for (var i = 0; i < prodotti.length; i++) {
        var prodotto = prodotti[i];
       
        var prodottoDiv = document.createElement('div');
        prodottoDiv.classList.add('container-vendita');

        var linkProdotto = document.createElement('a');
        linkProdotto.href = 'dettagli_prodotto.php?id=' + prodotto.id;

        var immagine = document.createElement('img');
        immagine.src = prodotto.image;
        immagine.alt = prodotto.prodotto;

        linkProdotto.appendChild(immagine);
        prodottoDiv.appendChild(linkProdotto);

        var nomeProdotto = document.createElement('div');
        nomeProdotto.innerHTML = '<a href="dettagli_prodotto.php?id=' + prodotto.id + '">' + prodotto.prodotto + '</a>';
        prodottoDiv.appendChild(nomeProdotto);

        var prezzo = document.createElement('p');
        prezzo.innerHTML = '<strong><span>' + prodotto.prezzo + ' €</span></strong>';
        prodottoDiv.appendChild(prezzo);

        
        var bottone = document.createElement('button');
        bottone.classList.add('preferiti');
        bottone.setAttribute('data-id', prodotto.id);
        
        var immagineCuore = document.createElement('img');
        immagineCuore.src = 'cuorevuoto.png';
        bottone.appendChild(immagineCuore);
        
        prodottoDiv.appendChild(bottone);
        contenitore.appendChild(prodottoDiv);
    }
   
    inizializzaPreferiti();
}


function mostraErrore(error) {
    console.error('Errore durante il recupero dei dati:', error);
}


function inizializzaPreferiti() {
    var bottoni = document.querySelectorAll('.preferiti');

    for (var i = 0; i < bottoni.length; i++) {
        bottoni[i].addEventListener('click', gestisciPreferito);
    }
}



function gestisciPreferito(event) {
    event.preventDefault();

    var bottone = event.currentTarget;
    var prodottoId = bottone.getAttribute('data-id');

    fetch('aggiungiPreferiti.php?id=' + prodottoId)
        .then(handleFetchSuccess)
        .catch(handleFetchError);
}


function handleFetchSuccess() {
    
}


function handleFetchError(error) {
    console.error('Errore durante la richiesta:', error);
}


document.addEventListener('DOMContentLoaded', caricaPreferiti);


function caricaPreferiti() {
    fetch('fetch_preferiti.php')
        .then(mostraRisposta)
        .then(mostraDati)
        .catch(mostraErrore);
}


function mostraRisposta(response) {
    if (!response.ok) {
        throw new Error('Errore nella risposta del server');
    }
    return response.json();
}


function mostraDati(data) {
    if (!Array.isArray(data)) {
        console.error('Formato dei dati non valido');
        return;
    }

    mostraPreferiti(data);
}


function mostraErrore(error) {
    console.error('Errore durante il fetch:', error);
}


function mostraPreferiti(preferiti) {
    var contenitore = document.querySelector('#contenitore-preferiti');

    if (!contenitore) {
        console.error('Contenitore preferiti non trovato');
        return;
    }

    if (preferiti.length === 0) {
        contenitore.innerHTML = '<p>Non hai ancora aggiunto prodotti ai preferiti.</p>';
        return;
    }

    for (var i = 0; i < preferiti.length; i++) {
        creaElementoPreferito(preferiti[i], contenitore);
    }
}


function creaElementoPreferito(prodotto, contenitore) {
    var div = document.createElement('div');
    div.classList.add('preferito');

    var link = document.createElement('a');
    link.href = 'dettagli_prodotto.php?id=' + prodotto.id;

    var img = document.createElement('img');
    img.src = prodotto.image;
    img.alt = prodotto.prodotto;

    var titolo = document.createElement('h3');
    titolo.textContent = prodotto.prodotto;

    var prezzo = document.createElement('p');
    prezzo.innerHTML = '<strong>' + prodotto.prezzo + ' €</strong>';

    link.appendChild(img);
    div.appendChild(link);
    div.appendChild(titolo);
    div.appendChild(prezzo);

    contenitore.appendChild(div);
}

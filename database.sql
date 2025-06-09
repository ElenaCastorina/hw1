
CREATE DATABASE IF NOT EXISTS login_db;


USE login_db;


CREATE TABLE users (
    id integer primary key auto_increment, 
    username varchar(16) not null unique, 
    password varchar(255) not null, 
    email varchar(255) not null unique, 
   
    name varchar(255) not null,
    surname varchar(255) not null
) Engine = InnoDB; 


CREATE TABLE prodotti_in_vendita(
id integer primary key, 
prodotto varchar(255) not null, 
prezzo double, 
image varchar(255) 
)Engine = InnoDB;


INSERT INTO prodotti_in_vendita VALUES( 1 , 'ORECCHINO DAFNE PLACCATO ORO' , '25.9' ,'https://amabilejewels.it/media/catalog/product/cache/34a194b753e1250fa0431ce16fd52d24/o/r/orecchino-dafne-oro-front.jpg' );
INSERT INTO prodotti_in_vendita VALUES(2, 'BRACCIALE IMPERIAL PLACCATO ORO' , '59.90' ,'https://amabilejewels.it/media/catalog/product/cache/b5bac52d4dfc1adc0ee9b20c8ada7aa5/b/r/bracciale-imperial-oro-front.jpg' );
INSERT INTO prodotti_in_vendita VALUES(3, 'ORECCHINO RADIANCE ARGENTO' , '35.90' ,'https://amabilejewels.it/media/catalog/product/cache/34a194b753e1250fa0431ce16fd52d24/o/r/orecchino-radiance-arg-front.jpg' );
INSERT INTO prodotti_in_vendita VALUES(4, 'BRACCIALE RADIANCE ARGENTO' , '74.90' ,'https://amabilejewels.it/media/catalog/product/cache/34a194b753e1250fa0431ce16fd52d24/b/r/bracciale-radiance-arg-front.jpg' );


CREATE TABLE preferiti(
 id_preferiti int primary key auto_increment, 
 id_utente int, 
 id_prodotto int, 

 foreign key (id_utente) references users(id),
 foreign key (id_prodotto) references  prodotti_in_vendita(id) 
)Engine = InnoDB;

CREATE TABLE recensioni(
    id integer, 
    recensione varchar(255) not null, 
    foreign key (id) references users(id)
) Engine = InnoDB;
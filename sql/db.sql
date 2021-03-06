CREATE TABLE IF NOT EXISTS users
(
  user VARCHAR(10) PRIMARY KEY NOT NULL,
  pwd TEXT NOT NULL,
  hash TEXT NOT NULL,
  mail VARCHAR(200) NOT NULL
);

CREATE TABLE IF NOT EXISTS categories
(
  id_categorie INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  type INT NOT NULL,
  code TEXT,
  color VARCHAR(8),
  ordre INT(11) NOT NULL
);

CREATE TABLE IF NOT EXISTS carousel
(
  id_carousel INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  titre VARCHAR(20),
  description TEXT,
  alt VARCHAR(20),
  extension VARCHAR(5),
  ordre INT(11) NOT NULL
);

CREATE TABLE IF NOT EXISTS nav
(
  id_nav INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  titre VARCHAR(20),
  lien TEXT,
  ordre INT(11) NOT NULL
);

CREATE TABLE IF NOT EXISTS contact
(
  id_contact INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  mail VARCHAR(20) NOT NULL,
  nom VARCHAR(20) NOT NULL,
  commentaire TEXT,
  date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS analytique
(
  id_analytique INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  ip VARCHAR(20) NOT NULL,
  navigateur VARCHAR(20),
  page VARCHAR(20),
  date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS parametres
(
  id_parametre INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  valeur VARCHAR(100) NOT NULL,
  description VARCHAR(30)
);

#insert les paramètres configurables
INSERT INTO parametres (id_parametre, valeur, description) VALUES
(1, 'Mon Site', 'Titre du Site'),
(2, 5 , 'Temps slider'),
(3, '' , 'Mail notification')


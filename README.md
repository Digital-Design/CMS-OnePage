# CMS-OnePage

## Installation

### Log

Log backoffice, user : ```admin``` mot de passe : ```s3curit3```.

### Analytique

Pour pouvoir détecter le navigateur il faut installer ```browscap.ini ``` (http://browscap.org/) dans ```/etc/php5/apache2/``` puis rajouter la ligne ```browscap = /etc/php5/apache2/browscap.ini``` dans votre  ```php.ini```.

### Contact

Pour recevoir les notifications des contacts par le formulaire de contact il faut installer sendmail.

Ubuntu :
```sh
$ sudo apt-get install sendmail
```
Aucune configuration n'est nécessaire


## Tâches restantes

<h3>Paramètres</h3>
<p>Liste des id</p>
<ol>
  <li>Titre Site</li>
  <li>Temps slider</li>
</ol>

<h3>Mail Contact</h3>
<ul>
  <li>Tester avec le serveur smtp -> OK</li>
</ul>

<h3>Administration</h3>
<ul>
  <li>Création de compte (hash etc) -> OK</li>
  <li>Interface Profil (IP etc)</li>
  <li>Adresse mail (envoie contact, password oublié)</li>
</ul>
<h3>Module</h3>
<ul>
  <li>Voir architecture</li>
</ul>

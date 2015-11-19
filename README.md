<h1>CMS-OnePage</h1>
<h2>Installation</h2>
<h3>Analytique</h3>
Pour pouvoir détecter le navigateur il faut installer browscap.ini (http://browscap.org/) dans /etc/php5/apache2 puis rajouter la ligne "browscap = /etc/php5/apache2/browscap.ini" dans php.ini.
Sinon la fonction get_browser ne marchera pas.
<h3>Constact</h3>
Pour recevoir des notifications des contacts par le formualire de contact il faut installer sendmail pour installer le serveur d'envoie de mail.
<ul>
<li>Ubuntu : <code>sudo apt-get install sendmail-bin</code></li>
</ul>
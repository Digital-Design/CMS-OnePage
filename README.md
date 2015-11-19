<h1>CMS-OnePage</h1>
<h2>Installation</h2>

<h3>Générals</h3>
Pour activer la redirection d'url.
Pour mettre ne place le rewritting, utilisez les commandes suivantes
<ul>
  <li>Ubuntu :
    <ul>
      <li><code>a2enmod rewrite</code></li>
      <li><code>/etc/init.d/apache2 restart</code></li>
    <ul>
  </li>
</ul>

<h3>Analytique</h3>
Pour pouvoir détecter le navigateur il faut installer <code>browscap.ini</code> (http://browscap.org/) dans <code>/etc/php5/apache2</code> puis rajouter la ligne <code>browscap = /etc/php5/apache2/browscap.ini</code> dans <code>php.ini</code>.
Sinon la fonction get_browser ne marchera pas.

<h3>Contact</h3>
Pour recevoir les notifications des contacts par le formulaire de contact il faut installer sendmail.
<ul>
  <li>Ubuntu : <code>sudo apt-get install sendmail-bin</code></li>
</ul>

<h2>Tâches restantes</h2>

<h3>Paramètres</h3>
<ul>
  <li>Temps slider</li>
  <li>Titre Site</li>
  <li>Favicon</li>
  <li>Temps analytique</li>
</ul>

<h3>Mail Contact</h3>
<ul>
  <li>Tester avec le serveur smtp</li>
</ul>

<h3>Administration</h3>
<ul>
  <li>Création de compte (hash etc)</li>
  <li>Interface Profil (IP etc)</li>
  <li>Adresse mail (envoie contact)</li>
</ul>
<h3>Module</h3>
<ul>
  <li>Voir architecture</li>
</ul>
<h1>CMS-OnePage</h1>
<h2>Installation</h2>
<h3>Analytique</h3>
Pour pouvoir détecter le navigateur il faut installer <code>browscap.ini</code> (http://browscap.org/) dans <code>/etc/php5/apache2</code> puis rajouter la ligne <code>browscap = /etc/php5/apache2/browscap.ini</code> dans <code>php.ini</code>.
Sinon la fonction get_browser ne marchera pas.
<h3>Contact</h3>
Pour recevoir les notifications des contacts par le formulaire de contact il faut installer sendmail.
<ul>
<li>Ubuntu : <code>sudo apt-get install sendmail-bin</code></li>
</ul>
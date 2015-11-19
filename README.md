<h1>CMS-OnePage</h1>
<h2>Installation</h2>

<h3>Analytique</h3>
Pour pouvoir détecter le navigateur il faut installer <code>browscap.ini</code> (http://browscap.org/) dans <code>/etc/php5/apache2</code> puis rajouter la ligne <code>browscap = /etc/php5/apache2/browscap.ini</code> dans <code>php.ini</code>.
Sinon la fonction get_browser ne marchera pas.

# Contact

Pour recevoir les notifications des contacts par le formulaire de contact il faut installer sendmail.

Ubuntu : 
```sh
$ sudo apt-get install sendmail 
```

Configuration de l'adresse d'envoi (L'email qui s'affichera lorsque vous recevrez une notification par mail)

* Ajoutez ces lignes à /etc/mail/sendmail.mc pour activier la fonctionnalité :

    ```
    FEATURE(`genericstable',`hash -o /etc/mail/genericstable.db')dnl
    GENERICS_DOMAIN_FILE(`/etc/mail/generics-domains')dnl
    ```
* Create a /etc/mail/generics-domains file that is just a list of all the domains that should be inspected. Make sure the file includes your server's canonical domain name, which you can obtain using the command: 

    ```sh
    $ sendmail -bt -d0.1 <\/dev/null 
    ```
    Par exemple : 
    ```
    my-site.com
    another-site.com
    bigboy.my-site.com
    ```
    
*  Create your /etc/mail/genericstable file. First sendmail searches the /etc/mail/generics-domains file for a list of domains to reverse map. It then looks at the /etc/mail/genericstable file for an individual email address from a matching domain. The format of the file is 
    ```
    linux-username      username@new-domain.com
    ```
    
    Par exemple si les mails sont envoyés par défaut avec l'utilisateur root : 
    ```
    root        notification@digital-design.com
    ```
    Les mails que vous recevrez viendront de l'adresse 'notification@digital-design.com'
    
Source : http://www.linuxhomenetworking.com/wiki/index.php/Quick_HOWTO_:_Ch21_:_Configuring_Linux_Mail_Servers#Using_Sendmail_to_Change_the_Sender.27s_Email_Address
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

#### Installation

You need Gulp installed globally:

```sh
$ npm i -g gulp
```
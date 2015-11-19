<h1>CMS-OnePage</h1>
<h2>Installation</h2>

# Analytique

Pour pouvoir détecter le navigateur il faut installer ```browscap.ini ``` (http://browscap.org/) dans ```/etc/php5/apache2/``` puis rajouter la ligne ```browscap = /etc/php5/apache2/browscap.ini``` dans votre  ```php.ini```.

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
* Creez le fichier /etc/mail/generics-domains qui est une liste de vos domaines. Mettez-y tous les noms de votre serveur, vous pouvez les obtenir avec la commande : 

    ```sh
    $ sendmail -bt -d0.1 <\/dev/null 
    ```
    Par exemple : 
    ```
    my-site.com
    another-site.com
    bigboy.my-site.com
    ```
    
*  Creez le fichier /etc/mail/genericstable Le format du fichier est :  
    ```
    linux-username      username@new-domain.com
    ```
    Les mails envoyés avec l'utilisateur linux-username apparaitrons venant de l'adresse username@new-domain.com
    Par exemple si les mails sont envoyés par défaut avec l'utilisateur root : 
    ```
    root        notification@digital-design.com
    ```
    Les mails que vous recevrez viendront de l'adresse notification@digital-design.com
    
Source : http://goo.gl/XKVcj3

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
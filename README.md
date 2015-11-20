# CMS-OnePage

## Installation

### Analytique

Pour pouvoir détecter le navigateur il faut installer ```browscap.ini ``` (http://browscap.org/) dans ```/etc/php5/apache2/``` puis rajouter la ligne ```browscap = /etc/php5/apache2/browscap.ini``` dans votre  ```php.ini```.

### Contact

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
    Par défault les mails seront envoyés avew www-data donc :
    ```
    www-data        notification@digital-design.com
    ```
    Les mails que vous recevrez viendront de l'adresse notification@digital-design.com

* N'oubliez pas de redémarrer sendmail une fois les modifications terminées

	```sh
	service sendmail restart
	```

Source : http://goo.gl/XKVcj3

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

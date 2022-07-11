<div align="left"><a href="https://www.univ-grenoble-alpes.fr/" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/0/07/Logo_Universit%C3%A9_Grenoble_Alpes_2020.svg" width="100"></a></div>
<br>

#
<div align="Center"><h2><b>Projet de création d’une application web<br/> avec le framework PHP Laravel<h2></b></div>


# Introduction:

Dans le cadre du projet de programmation web 1, on a conçu un site de recette de cuisine à l’aide du framework PHP Laravel, permettant de mettre en pratique ce qu'on a vue en cours. Ce site est composé de quatre page:
- <b> Une page d’Accueil </b> affichant un texte de bienvenue et les 3 dernières recettes
- <b> La page recettes </b>, qui affichent une liste de toutes les recettes 
- <b> La page d’une recette </b>, affichée après avoir été cliquée sur l’une d’elle dans la liste.
- <b> Une page de contact </b> avec un formulaire
- <b> Une page administration</b>, permet l’affichage d’une liste complète des recettes ainsi que l’ajout, l’édition et la suppression d’une recette.
- Et enfin <b> une page connexion </b> pour permettre à l'administrateur de se connecter et gérer les recettes


# Guide d'instalation:
- Clonez le dépôt SiteLaravelRecettes sur votre machine

  ```shell
  git clone https://github.com/mohabib38/SiteLaravelRecettes.git
  ```
  Sinon vous pouvez télécharger le projet directrement sur Github : https://github.com/mousse98/siteRecettes-Laravel (Bouton <em>Code</em> puis <em>Download Zip</em>)
<br/><br/>
- Installer les dépendances<br/>Laravel regroupe rarement ces dépendances avec lui, vous devrez utiliser composer pour les télécharger.<br/>Placez vous dans le répertoire et lancez la commande:

    ```shell
    composer install
    ```
    Ce processus peut prendre quelques minutes.
<br/><br/>
- Mise en place de la base de données<br/>
Pour la configurer, recherchez un fichier '<b>.env.example</b>' sur le référentiel et renommez-le en '<b>.env</b>' .<br/>
 Après cela, ouvrez votre fichier '<b>.env</b>' dans un éditeur de texte et apportez les modifications suivantes:

    <span style="color:red">-DB_CONNECTION=mysql<br/>-DB_DATABASE=laravel</span><br/>
    <span style="color:green">+DB_CONNECTION=sqlite<br/>+DB_DATABASE=
    <span style="color:Blue"> fullPath</span>/database/database.db</span>

    - <b><span style="color:Blue"> fullPath</span></b> c'est tout le chemin du fichier <em>database.db</em> qui se trouve dans le dossier <em>database</em> du projet.<br/>
    Par exemple : C:/M1WIC/ProgWebServeur/SiteLaravelRecettes/database/database.db<br/>
    <em></em>

    Enfin, ouvrez une fenêtre de terminal et exécutez la commande suivante:
     ```shell
    php artisan migrate
    ```
- Configuration de la clé d'application<br/>
Ouvrez simplement une fenêtre de terminal, exécutez ce qui suit et vous avez terminé!

    ```shell
    php artisan key:generate
    ```

- Faire fonctionner le serveur<br/>
Nous allons utiliser celui intégré de Laravel. Ouvrez une fenêtre de terminal et exécutez la commande suivante:

    ```shell
    php artisan serve
    ```
    Vous devriez maintenant pouvoir accéder au site en utilisant ce lien http://127.0.0.1:8000/
<br/><br/>
<b>C'est tout!</b><br/>
Si tout s'est bien passé, vous devriez maintenant regarder la page d'accueil du projet Laravel. <b>Félicitations</b>





Le Site devrait maintenant être accessible et fonctionnel à l’url http://127.0.0.1:8000



<br/><br/><br/><br/><br/>

<hr/>

<div align="center"><h3><b><u>Un remerciement spécial aux enseignants:</u></b><br/><em>Florian RODRIGUEZ<br/>Pierre BLARRE</em><h3>😊</div>
<hr/>


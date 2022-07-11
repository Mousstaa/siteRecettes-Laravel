<div align="left"><a href="https://www.univ-grenoble-alpes.fr/" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/0/07/Logo_Universit%C3%A9_Grenoble_Alpes_2020.svg" width="100"></a></div>
<br>

#
<div align="Center"><h2><b>Projet de création d’une application web<br/> avec le framework PHP Laravel<h2></b></div>




# 
## Sommaire:

- Introduction
1. Guide d'instalation
2. Parties implémentées
    - TP2  
    - Gestion des commentaires (+)
    - CRUD des recettes améliorés (++)
    - Identification / Authentification qui protège l'accès à l’administration (+)
    - Ajout de fichiers média pour les recettes (+)
    - Surprise!
        - Barre de recherche:
        - Pagination:
  
3. Remarques
- Conclusion 

#
# Introduction:

Dans le cadre du projet de programmation web 1, nous avons avons conçu un site de recette de cuisine à l’aide du framework PHP Laravel, permettant de mettre en pratique ce que nous avons vue en cours. Ce site est composé de quatre page:
- <b> Une page d’Accueil </b> affichant un texte de bienvenue et les 3 dernières recettes
- <b> La page recettes </b>, qui affichent une liste de toutes les recettes 
- <b> La page d’une recette </b>, affichée après avoir été cliquée sur l’une d’elle dans la liste.
- <b> Une page de contact </b> avec un formulaire
- <b> Une page administration</b>, permet l’affichage d’une liste complète des recettes ainsi que l’ajout, l’édition et la suppression d’une recette.
- Et enfin <b> une page connexion </b> pour permettre à l'administrateur de se connecter et gérer les recettes

<em>Pour chaque parties implémentées nous avons mis des GIFs sur ce README qui représentes des démonstrations pour chaque partie implémenter</em><br/><br/>
<b>La qualité des GIFs est 1920x1080(1080p Full HD) donc n'hésitez pas à faire un petit zoom</b>
<br/><br/>



#
# 1. Guide d'instalation:
- Clonez le dépôt SiteLaravelRecettes sur votre machine

  ```shell
  git clone https://github.com/mohabib38/SiteLaravelRecettes.git
  ```
  Sinon vous pouvez télécharger le projet directrement sur Github : https://github.com/mohabib38/SiteLaravelRecettes (Bouton <em>Code</em> puis <em>Download Zip</em>)
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
Si tout s'est bien passé, vous devriez maintenant regarder la page d'accueil du projet Laravel. <b>Félicitations</b> et <b>enjoy!</b>





Le Site devrait maintenant être accessible et fonctionnel à l’url http://127.0.0.1:8000

#
# 2. Parties implémentées:
## TP2:
Cette partie ce compose de 5 URLs des pages à visiter:
- Page accueil : http://127.0.0.1:8000/
    - Vous pouvez naviguer entre les pages en cliquant sur les bouttons du navbar
    - 3 recettes récentes son lister et cliquable pour les consulter 
- Page de liste des recettes : http://127.0.0.1:8000/recipes
    - Toutes les recettes sont listées sur cette page avec la possibilité de cliquer sur une d'entre elles pour la consulter
    - La barre de recherche <b>est conçu dans la partie surprise</b>, car nous n'avons pas remarqué qu'elle était demandée que lors de la rédaction de ce README
- Page d'une recette : http://127.0.0.1:8000/recipes/{URL}
    - Une présentation de la recette par son titre, description, ingrédients et son auteur 
- Page contact : http://127.0.0.1:8000/contact
    - Un formulaire avec une implémentation de la <b>validation des données</b> comme présentée dans le cours
    - Une success alert s'affiche si en rempli bien les champs de saisie en respectent la structure d'un email par exemple et en appuyant sur le boutton <em>Envoyer le message</em>
- Page adminstration : http://127.0.0.1:8000/admin
    - Cette partie avant que nous commencent le projet il n'y avait pas l'authentification qui protège l'accès à la page administration qui est implémenté dans ce site après le TP2
    - Sur cette page nous avons accées à toutes les recettes ainsi que trois actions possible: modification, suppression et consultaion <b>L'ajout est implémenté dans la partie CRUD améliorés</b><br/>
    - Les champs du formulaire de la modification sont remplit avec les anciennes valeurs pour faciliter la modification, après la modification il faut cliquer sur le boutton <em>Enregister</em> un succès alert s'affiche pour informer la bonne prise en compte de la modification de telle recette
    - La suppression se fait toujours après une confirmation de la suppression de telle recette par une boîte de dialogue Javascript <em>alert()</em>
    <br/><br/>
    Ci-dessous une démonstration sur la partie TP2:
    <br/><br/>
            


![alt text here](/public/README_IMAGE/TP2Demo.gif)
<br/><br/>


<hr/>

## Gestion des commentaires (+):
<br/>
Dans cette partie comme tout le monde aime la simplicité :) nous avons conçu un système de commentaire simple et efficace, un formulaire et un boutton de publication du commentaire, après bien sûr l'ériture de quelque mot dans le champ du commentaire vous appuyer sur <em>Publier</em> une success alert vous informe la bonne réception et la publication du commentaire; le commentaire est publier dans la meme page sous le formulaire avec le temps psser depuis la publication de ce dernier 

 <br/><br/>
    Ci-dessous une démonstration sur la partie Gestion des commentaires:
    <br/><br/>

![alt text here](/public/README_IMAGE/CommentaireDemo.gif)
<br/><br/>

<hr/>

## CRUD des recettes améliorés (++):
<br/>
Après l'implémentation d'une première version CRUD dans la partie TP2, nous avons refait une version améliorée du CRUD des recettes qui fonctionnant en <b><em>AJAX</em></b> en plus la possibilité d'ajouter  une nouvelle recette avec une photo<br/>
Trois fonctionnalités sont proposés : ajouter une nouvelle recette, modifier une recette et supprimer une recette. Pour l'ajout et la modification ils se font sur un modal bootstrap.<br/>
Si un des champs est vide le formulaire n'est pas envoyé et il n'affiche rien jusqu'à vous remplissez les champs.
Le modal modification remplie automatiquement les champs par les données actuelles de la recette pour visualiser ce qui est déjà enregistrer.<br/>
La suppression  s'effectue toujours après une confirmation de suppression.



 <br/><br/>
    Ci-dessous une démonstration sur la partie CRUD des recettes améliorés:
<br/><br/>

![alt text here](/public/README_IMAGE/CRUDDemo.gif)
<br/><br/>

<hr/>

## Identification / Authentification qui protège l'accès à l’administration (+):
Afin de protéger l'accès au CRUD qui est réservé à l'administrateur, nous avons utilisé <em>breeze</em>. Pour accéder à l'administration dans le navbar vous cliquez sur <em>Vous êtes administrateur?</em> et vous serez rediriger vers la page login, vous tapez les identifiant ci-dessous:

<b><u>Email:</b></u> admin@pwcs.fr<br/>
<b><u>Mot de passe:</b></u>  adminpwcs

Si tous ce passe bien vous seriez rediriger vers la page admin.
Deux nouveaux boutons apparaît sur le navbar <em>Administration</em> pour la page admin et <em>Déconnexion</em> pour se déconnecter et revenir à la page d'accueil

 <br/><br/>
    Ci-dessous une démonstration sur la partie Identification / Authentification qui protège l'accès à l’administration:
<br/><br/>

![alt text here](/public/README_IMAGE/adminDemo.gif)
<br/><br/>

<hr/>

## Ajout de fichiers média pour les recettes (+):
Sur Git vous trouverez une branche <em>media</em> nous avons implémenté cette étape avant le CRUD amélioré donc sans l'utlisation d'<em>Ajax</em>, maintenant l'implementation de la partie de CRUD améliorés et un git-merge de la branche CRUD_ameliores vers master l'ajout d'une image pour une nouvelle rectte se fait avec <em>Ajax</em>
<br/><br/>
Vous pouvez revoir la démonstration de la partie CRUD améliorée pour voir l'ajout d'une image

<hr/>

## Surprise! 
<br/>

- Barre de recherche:<br/>
C'était une petite surprise jusq'au jour de la rédaction de README et la finalisation de notre projet. La recherche se fait par un des mots similaires à ce qui est entré sur le champ <em>Mot clés de la recette</em> (tags)<br/>

 <br/>
         Ci-dessous une démonstration sur barre de recherche:
<br/><br/>

![alt text here](/public/README_IMAGE/rechercheDemo.gif)
<br/><br/>
- Pagination:<br/>
La pagination est donc notre seule surprise! Simples et efficaces.

<br/>
Une démonstration sur avant et aprés la pagination ci-dessous:
<br/><br/>

![alt text here](/public/README_IMAGE/rechercheDemo.gif)
<br/>

#
# 3. Remarques:

Nous avons mis la barre de recherche comme surprise car nous avons remarqué qu'elle était demandée que lors de la rédaction du README (Elle est citée une seule fois avant la partie 1 - Instaltion dut l'énoncer du TP2)<br/>
Sinon le projet était clair et bien guidé.
<br/><br/>


#
# Conclusion:
Ce projet de Programmation Web Côté Serveur fut un bon moyen d’exercer nos connaissances concernant les Concepts, Programmation Orientée Objet, MVC,
Dependency Injection ainsi la création d'un site web à l'aide du framework PHP Laravel 8, sans oublier l'usage du Git.<br/><br/>

<em>J'espère que ce rapport vous a donné faim :)</em>

<br/><br/><br/><br/><br/>

<hr/>

<div align="center"><h3><b><u>Un remerciement spécial aux enseignants:</u></b><br/><em>Florian RODRIGUEZ<br/>Pierre BLARRE</em><h3>😊</div>
<hr/>


# Connexion à un serveur PHP depuis un front en VueJS ;)

Fonctionnalités existantes : 
 - Front
   - [x] Soumission du formulaire de connexion en JavaScript
   - [x] Lien de déconnexion
   
 - Back
   - [x] Récupération des données de formulaire en PHP 
   - [x] Création d'une session
   - [x] Déconnexion de l'utilisateur


Ce qui serait souhaitable : 
 - Front : 
   - [ ] Formulaire d'enregistrement/inscription
     - [ ] saisie du pseudo, mail, mot de passe et confirmation du mot de passe
   - [ ] Formulaire de login : laisser à l'utilisateur la possibilité de se connecter soit avec son pseudo, soit son email
 - Back 
   - [ ] Ajout d'une base de données pour l'enregistrement des utilisateurs
   - [ ] Traitement du formulaire d'inscription
     - [ ] Vérification des mots de passe donnés dans le formulaire
     - [ ] Vérification de la disponibilité du pseudo (on regarde que l'utilisateur ne soit pas déjà enregistré)
     - [ ] Vérification de la disponibilité de l'email (on regarde que l'utilisateur ne soit pas déjà enregistré)
   - [ ] Insertion de l'utilisateur dans la base de données avec un stockage **sécurisé** du mot de passe
   - [ ] Reprise du traitement de formulaire de connexion pour gérer avec la BDD

## Étape 1 :

S'assurer d'avoir la dernière version du projet (en utilisant les commandes git qui vont bien). 

## Étape 2 :

 - Créer une nouvelle base de données : `coincoinnexion`. 
 - Créer un **nouvel utilisateur de base de donnée** : `canard@localhost`
 - Donner les droits de gestion de la base `coincoinnexion` à `canard@localhost`
 - Créer la table `utilisateurs`, avec `id, pseudo, email, password`. 

Pensez à sauver toute cette procédure dans un script sql dans le dossier `backend`. 

Pour utiliser un script dans mysql, il suffit de se connecter avec un utilisateur qui a pleins de droits (`root` par exemple), 
et d'utiliser la commande suivante dans mysql ! 
```sql
source monfichier.sql
```


## Étape 3 : 

 - Décidons ensemble de ce qui est le mieux à faire. 

### Le login, coté back.

 - on ajoute la gestion de la base de données dans le fichier ??? 
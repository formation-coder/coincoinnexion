<?php
    $user = $_POST['login']; // Comme le formulaire est soumis avec la méthode get, on utilise le tableau $_GET pour récupérer les valeurs des champs du formulaire
    $pass = $_POST['password']; // On a le mot de passe saisi par l'utilisateur

    // Pour récupérer le hash qui est stocké, on va utiliser notre base de données : 
    
    // Construction de notre requête paramétrée 
    $req = "SELECT password FROM utilisateurs WHERE pseudo = '$user'"; // :warning: ATTENTION ACHTUNG : ne pas faire comme ça, mais on verra après pourquoi

   
    include("db.php");
    // Connexion à la BDD et envoi de la requête
    $connexion = new PDO("mysql:host=$dburl;dbname=$dbname", $dbuser, $dbpass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    // Récupérer le mot de passe stocké en BD pour l'utilisateur qui essaye de se connecter. 
    try {
        $statement = $connexion->prepare($req);
        $statement->execute([]);
        $resultats = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo var_dump($resultats);
    } catch(Exception $exception) {
        echo $exception->getMessage();
    }

    

    //On compare les mots avec la fonction password_verify
    if(password_verify($pass, $hash)) { // si vrai le mot de passe correspond au $hash
        // On vient de récupérer l'utilisateur, on créé sa session
        session_start(); 
        $_SESSION['utilisateur'] = $user; // les variable de session sont stockées dans le tableau super global $_SESSION
        
        // On s'occupe de préparer les réponses à envoyer au front en JSON, sans oublier le code de réponse http
        http_response_code(200);
        echo json_encode(["connected" => true]);
    } else { // Sinon, on redirige vers index.php pour qu'il retente de se connecter. 
        // On s'occupe de préparer les réponses à envoyer au front en JSON, sans oublier le code de réponse http
        http_response_code(401); // Non autorisé
        echo json_encode(["connected" => false]);
    }
    
?>
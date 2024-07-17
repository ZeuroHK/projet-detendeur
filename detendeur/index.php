
<?php
session_start();

// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sqlserver = "localhost"; // Adresse du serveur MySQL
    $sqlusername = "kyky"; // Nom d'utilisateur MySQL
    $sqlpassword = "btssnir"; // Mot de passe MySQL
    $basededonnees = "detendeur"; // Nom de la base de données
  
    // Établir la connexion à la base de données
    $connexion = mysqli_connect($sqlserver, $sqlusername, $sqlpassword, $basededonnees);
  
    // Vérifier si la connexion a réussi
    if (!$connexion) 
    {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }
  
    // Exécuter une requête SQL pour récupérer les données de la table
    $table = "Utilisateurs"; // Remplacez par le nom réel de votre table
    $requete = "SELECT * FROM " . $table;
    $resultat = mysqli_query($connexion, $requete);
  
    // Vérifier si la requête a réussi
    if ($resultat) 
    {
        // Parcourir les résultats
        while ($row = mysqli_fetch_assoc($resultat)) 
        {
            // Accéder aux valeurs de chaque ligne
            $colusername = $row['login'];
            $colpassword = $row['password'];
            $colname1 = $row['nom'];
            $colname2 = $row['prenom'];
            $coluserid = $row['id_utilisateur'];
            // ...

            // Faire quelque chose avec les données récupérées
            if($username == $colusername && $password == $colpassword)
            {
                header("Location: detendeur.php?colname2=$colname2");
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $coluserid;
            }
            else 
            {
                // Informations de connexion incorrectes
                $error = "Nom d'utilisateur ou mot de passe incorrect";
            }
        }
    } 
    else 
    {
        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($connexion);
    }
  
    // Fermer la connexion à la base de données
    mysqli_close($connexion);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détendeur - Connexion</title>
    <link rel="icon" href="images/bathysmed2.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: rgb(0, 255, 255);
        }
        /* Superposition semi-transparente */
        .custom-row-background {
            background: linear-gradient(to bottom, rgb(0, 0, 255) , rgb(0, 0, 155));            
        }
        .custom-text-color {
            color: rgb(255, 255, 255);
        }
        .font-family {
            font-family:  'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .backgrnd {
            background-image: url("images/eau5.jpeg");
            background-color: rgba(0, 0, 0, 0.5);
            background-size: cover; /* Redimensionner l'image pour couvrir toute la zone */
            background-position: center; /* Centrer l'image */
            background-repeat: no-repeat; /* Ne pas répéter l'image */
            background-attachment: fixed;
            position: relative;        
        }
        .login-button{
            background-color: rgba(0, 150, 150, 0.5);
            color: white;
            font-size: 14px;
            padding: 8px 20px;
            border-radius: 50px;
        }
        .login-button:hover{
            background-color: rgba(0, 150, 150, 1);
        }
        .login-button:visited{
            text-decoration: none;
        }
        .border{
            border: 3px solid white;
            text-decoration: none;
        }
        
    </style>
</head>

<body>
    <div class="backgrnd">
        <div class="container">
            <div class="row cols-2 d-flex justify-content-center align-items-center custom-row-background rounded-4">
                <div class="col col-4 col-md-4 align-items-center display-3">
                    <center><b>
                    <h1 class="font-family justify-content-center align-items-center">PROJET DÉTENDEUR</h1>
                    <h5 class="font-family justify-content-center align-items-center">KYLLIAN - HEDY - EMMA</h5>
                    </b></center>
                </div>
                <div class="col col-2 col-md-4">
                    <center>
                    <img class="img-fluid rounded w-75" src="images/logo-v2.png" alt="">
                    </center>
                </div>
                <div class="col col-6 col-md-4 d-flex justify-content-center align-items-center">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="">
                            <ion-icon name="person-circle-outline"></ion-icon>
                            <label for="username">Nom d'utilisateur</label>
                            <input class="rounded form-control" type="text" id="username" name="username" required>
                        </div>
                        <div class="">    
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <label for="password">Mot de passe</label>
                            <input class="rounded form-control" type="password" id="password" name="password" required>
                        </div>
                        <br>
                        <?php if(isset($error)) { ?>
                            <center><p class="rounded-3" style="background: rgba(0, 0, 0, 0.5); color: red;"><?php echo $error; ?></p></center>
                        <?php } ?>
                        
                        
                        <div class="d-flex mb-3 justify-content-center align-items-center">
                        <center>
                            <button class="login-button ms-2 me-2 rounded-5" type="submit">Se connecter</button>
                            <a class="login-button ms-2 me-2 rounded-5 border" href="inscription.html">J'ai pas de compte</a>
                        </center>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="row cols-6">
                <div class="col rounded-5 mb-3 mt-3 col-12">
                    <br><br>
                    <h2 class="mt-3"><center>PRÉSENTATION DU SITE</center></h2> 
                    <br>     
                    <center><h4 class="custom-text-color">Bienvenue sur le site Projet Détendeur ! Connectez
                    vous facilement et accédez aux détails de vos séances de respiration pour consulter 
                    l'évolution de votre taux de stress ! Ce site à été crée à l'occasion du projet final
                    du BTS SNIR. </h4></center>
                </div> 
                <div class="col col-12">
                    <br>
                    <div class="w-100 mx-auto">
                        <center><img class="img-fluid rounded-circle" src="images/projetd.png" alt=""></center>
                    </div>
                    <br>
                </div>
                <div class="col col-6">
                    <br>
                    <div class="w-100 pb-5 pt-5 rounded-5 mx-auto" style="background: none;">
                        <img class="img-fluid rounded-circle" src="images/logojeanperrin.png" alt="">
                    </div>
                    <br> 
                </div>
                <div class="col rounded-5 mt-4 mb-4 col-6">
                    <br><br><br>
                    <h2><center>INTITULÉ DU PROJET</center></h2>
                    <br>  
                    <h4 class="custom-text-color"> Le projet détendeur, effectué au Lycée Jean Perrin, 
                        consiste à programmer un détendeur connecté avec un fond sonore marin et la respiration
                        modulée de l'utilisateur pour simuler une respiration en plongée. Nous devons pouvoir
                        relever les données de respiration de l'utilisateur en effectuant des séances enregistrées. </h4>
                </div>
                <div class="col rounded-5 mb-4 mt-4 col-6">
                    <br><br><br>
                    <h2><center>BATHYSMED</center></h2>
                    <br>        
                    <h4 class="custom-text-color"> L'idée de ce projet a été inspiré par l'organisation 
                    Bathysmed, une approche thérapeutique soutenue par la recherche permettant de diminuer significativement
                    le stress de manière durable, grâce à un
                    protocole mettant en synergie les effets positifs de la plongée sous-marine et de la méditation. Notre
                    but est de recréer cette effet relaxant en simulant cette plongée sous-marine. </h4>
                </div>
                <div class="col col-6">
                    <br>
                    <div class="w-100 mx-auto">
                        <img class="img-fluid rounded-circle" src="images/bathysmed4.jpg" alt="">
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>


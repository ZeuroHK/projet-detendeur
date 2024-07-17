<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détendeur - A Propos</title>
    <link rel="icon" href="images/bathysmed2.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <style>
        body {
            /* background-color: rgb(0, 0, 0); */
            background-image: url("images/eau5.jpeg") ;
            background-size: cover; /* Redimensionner l'image pour couvrir toute la zone */
            background-position: center; /* Centrer l'image */
            background-repeat: no-repeat; /* Ne pas répéter l'image */
            background-attachment: fixed;
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
            background: linear-gradient(to top, rgb(0, 0, 220) , rgb(0, 0, 30));
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
        a:visited{
            text-decoration: none;
        }
        .nav-link{
            color: white;
        }
        .nav-link:hover{
            color: rgb(0, 255, 255);
        }
        
    </style>
</head>

<body>
    <div class="container">
        <div class="row cols-3 rounded-4 d-flex justify-content-center align-items-center custom-row-background">
            <div class="col col-4 col-md-4 align-items-center display-3">
                <center><b>
                <h1 class="font-family justify-content-center align-items-center">PROJET DÉTENDEUR</h1>
                <h5 class="font-family justify-content-center align-items-center">KYLLIAN - HEDY - EMMA</h5>
                </b></center>
            </div>
            <div class="col col-2 col-md-4">
                <center>
                <?php
                session_start();
                $colname2 = $_GET['colname2'];
                echo"<a href='detendeur.php?colname2=$colname2'><img class='img-fluid rounded w-75' src='images/logo-v2.png' alt=''></a>"
                ?>                
                </center>
            </div>
            <div class="col cols-2 col-6 col-md-4 d-flex justify-content-center align-items-center">
                <br>
                <?php
                    session_start();

                    // Vérifier si le nom d'utilisateur est présent dans la chaîne de requête
                    if(isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        echo "<h5> Connecté en tant que : $username </h5>";
                        echo "<div class='d-flex mb-3 justify-content-center align-items-center'>";
                        echo "<center><a href='deconnexion.php'><button class='login-button ms-2 me-2 rounded-5'>Se déconnecter</button></a></center></div>";
                    } else {
                        echo "Nom d'utilisateur non spécifié.";
                        echo "<div class='d-flex mb-3 justify-content-center align-items-center'>";
                        echo "<center><a href='deconnexion.php'><button class='login-button ms-2 me-2 rounded-5'>Se déconnecter</button></a></center></div>";
                    }
                ?>
            </div>
            
        </div>
        <br>
        <div class="row cols-2">
            <div class="col backgrnd rounded-3 col-12">
                <center>
                    <h1 class="display-4"> <?php 
                    $colname2 = $_GET['colname2'];
                    echo "Bienvenue, $colname2 !"; 
                    ?> </h1>
                </center>
            </div>
        </div>
        <div class="row">
            <nav class="navbar navbar-expand-lg mt-3 backgrnd rounded-3">
                <div class="container fluid">
                    <div class="collapse navbar-collapse">
                        
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <?php
                                $colname2 = $_GET['colname2'];
                                echo "<a href='historique.php?colname2=$colname2' class='nav-link'>Historique</a>";
                                ?>                            </li>
                            <li class="nav-item">
                                <?php
                                $colname2 = $_GET['colname2'];
                                echo "<a href='graphiques.php?colname2=$colname2' class='nav-link'>Graphiques</a>";
                                ?>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.bathysmed.fr/" target="_blank" class="nav-link">Bathysmed</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Profil</a>
                            </li>
                            <li class="nav-item">
                                <?php
                                $colname2 = $_GET['colname2'];
                                echo "<a href='about.php?colname2=$colname2' class='nav-link'>A Propos</a>";
                                ?>
                            </li>
                        </ul>
                         
                    </div>
                </div>
            </nav>
        </div>
        
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

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
     crossorigin="anonymous"></script>
</body>
</html>


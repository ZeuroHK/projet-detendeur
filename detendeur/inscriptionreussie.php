<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détendeur - Inscription</title>
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
            <div class="col col-6 col-md-4 d-flex display-6 justify-content-center align-items-center">
            <center>Inscrivez vous</center>
            </div>
        </div>
        <br><br><br>
        <div class="row cols-3">
            <div class="col col-4"></div>
            <div class="col col-4 col-md-4 mt-5 d-flex justify-content-center align-items-center rounded-4 backgrnd">
                    <h5 class="display-5"> <?php 
                    $username1 = $_GET['username1'];
                    echo "Le compte $username1 a bien été crée."; 
                    ?> </h5>
                    <br>
                    <a class="login-button ms-2 me-2 rounded-5 border" href="index.php">Page de connexion</a>
            </div>
            <div class="col col-4"></div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
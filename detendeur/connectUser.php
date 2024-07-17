<?php
header('Content-Type: application/json');
session_start();

// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $data = json_decode(file_get_contents("php://input"), true);
    $username = $data['username'];
    $password = $data['password'];

    $sqlserver = "localhost"; // Adresse du serveur MySQL
    $sqlusername = "root"; // Nom d'utilisateur MySQL
    $sqlpassword = "doublepi"; // Mot de passe MySQL
    $basededonnees = "detendeur"; // Nom de la base de données

    // Établir la connexion à la base de données
    $connexion = mysqli_connect($sqlserver, $sqlusername, $sqlpassword, $basededonnees);

    // Vérifier si la connexion a réussi
    if (!$connexion) {
        die(json_encode(array("status" => "error", "message" => "La connexion à la base de données a échoué : " . mysqli_connect_error())));
    }

    // Exécuter une requête SQL pour récupérer les données de la table
    $table = "Utilisateurs"; // Remplacez par le nom réel de votre table
    $requete = "SELECT * FROM Utilisateurs WHERE login = ?";
    $stmt = mysqli_prepare($connexion, $requete);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultat = mysqli_stmt_get_result($stmt);

    // Vérifier si la requête a réussi
    if ($resultat) {
        // Parcourir les résultats
        if ($row = mysqli_fetch_assoc($resultat)) {
            // Accéder aux valeurs de chaque ligne
            $colusername = $row['login'];
            $colpassword = $row['password'];
            $colname1 = $row['nom'];
            $colname2 = $row['prenom'];

            // Faire quelque chose avec les données récupérées
            if ($username == $colusername && $password == $colpassword) {
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['username'] = $username;
                echo json_encode(array("status" => "success", "message" => "Login successful", "nom" => $colname1, "prenom" => $colname2));
            } else {
                // Informations de connexion incorrectes
                echo json_encode(array("status" => "error", "message" => "Nom d'utilisateur ou mot de passe incorrect"));
            }
        } else {
            // Pas de correspondance trouvée
            echo json_encode(array("status" => "error", "message" => "Nom d'utilisateur ou mot de passe incorrect"));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Erreur lors de l'exécution de la requête : " . mysqli_error($connexion)));
    }

    // Fermer la connexion à la base de données
    mysqli_close($connexion);
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
?>

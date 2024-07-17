
<?php
session_start();

// Vérification de la soumission du formulaire
if (isset($_POST['nom1']) && isset($_POST['prenom1']) && isset($_POST['username1']) && isset($_POST['password1']))  {
    // Récupération des données du formulaire
    $nom1 = $_POST['nom1'];
    $prenom1 = $_POST['prenom1'];
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];

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
    $requete = "INSERT INTO `Utilisateurs` (`nom`, `prenom`, `login`, `password`) VALUES ('$nom1', '$prenom1', '$username1', '$password1');";

    // Vérifier si la requête a réussi
    if (mysqli_query($connexion, $requete))  
    {
        header("Location: inscriptionreussie.php?username1=$username1");
    }
    else
    {
        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($connexion);
    }
  
    // Fermer la connexion à la base de données
    mysqli_close($connexion);
}
?>



<?php
session_start();

// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification des informations de connexion (exemple très basique)
    if ($username === 'utilisateur' && $password === 'motdepasse') {
        // Informations de connexion correctes, démarrage de la session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        // Redirection vers la page sécurisée
        header("Location: page_securisee.php");
        exit;
    } else {
        // Informations de connexion incorrectes
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>

    <h2>Connexion</h2>
    
    <?php if(isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Connexion">
    </form>

</body>
</html>
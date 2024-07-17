<?php 
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $seanceid = $_POST['seance'];
        $colname2 = $_GET['colname2'];

        $username = $_SESSION['username'];
        $_SESSION['seance'] = $seanceid;

        header("Location: graphiques.php?colname2=$colname2");
    }
?>
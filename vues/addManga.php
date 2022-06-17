<?php
    require_once '../persistance/DialogueBD.php';
    if (isset($_POST['titre']) && isset($_POST['genre']) && isset($_POST['prix']) && isset($_POST['couverture'])) {
        try {
            $undlg = new DialogueBD();
            $titre = $_POST['titre'];
            $idgenre = $_POST['genre'];
            $dessinateur = $_POST['dessinateur'];
            $prix = $_POST['prix'];
            //$couverture = $_POST['couverture'];
            $ajoutOK = $undlg->addUnManga($titre,/*$couverture,*/$idgenre,$prix,$dessinateur);
            header("location: listerMangas.php");
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
    }

?>


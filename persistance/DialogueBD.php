<?php
require_once 'Connexion.php' ;
class DialogueBD {
    public function getTousLesMangas()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "select distinct * from manga m join genre g on m.id_genre=g.id_genre order by id_manga";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $mesMangas = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $mesMangas;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function addUnManga($titr,$couv,$idge,$px,$dessi) {
        try {
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO manga (titre,/*couverture,*/id_genre,prix,id_dessinateur) VALUES (?,?,?,?,?)";
            $sth = $conn->prepare($sql);
            $sth->execute(array($titr,$couv,$idge,$px,$dessi));
            header('location: /MichaelSantana/mes-mangas/getListeMangas.php');
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getToutdessinateur()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT id_dessinateur, nom_dessinateur FROM dessinateur ORDER BY nom_dessinateur";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $AllDessinateur = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $AllDessinateur;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getToutLesGenre() {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT id_genre, lib_genre FROM genre";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $AllGenres= $sth->fetchAll(PDO::FETCH_ASSOC);
            return $AllGenres;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}
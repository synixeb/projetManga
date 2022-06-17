
<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/dialogueBD.php';
try {
    $undlg = new DialogueBD();
    $AllDessinateur = $undlg->infoparSc();
    $AllGenres = $undlg->getToutLesGenre();

} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>

<html>
<head>
    <title>Ajouter un manga</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body">

</body>
<h1 style="text-align: center">Ajouter un Manga</h1>
<div class="well">
    <form class="form-horizontal" enctype="multipart/form-data" role="form"
          name="mangaForm" action="addManga.php"
          method="POST">

        <!--Titre-->
        <div class="form-group">
            <label class="col-md-3 control-label">Titre : </label>
            <div class="col-md-3">
                <input type="text" name="titre" class="form-control" required
                       autofocus>
            </div>
        </div>

        <!--Genre-->
        <div class="form-group">
            <label class="col-md-3 control-label">Genre : </label>
            <div class="col-md-3">
                <select name="genre" id="genre">
                    <?php
                    foreach ($AllGenres as $ligne) {
                        $genre = $ligne['lib_genre'];
                        $idGenre = $ligne['id_genre'];
                        echo "<option>$genre</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <!--Prix-->
        <div class="form-group">
            <label class="col-md-3 control-label">Prix : </label>
            <label class="col-md-3 control-label">
                <input type="text" name="prix" class="form-control" required autofocus>
        </div>

        <!--Mangaka-->
        <div class="form-group">
            <label class="col-md-3 control-label">Mangaka : </label>
            <div class="col-md-3"><select name="dessinateur" id="idessinateur">
                    <?php
                    foreach ($AllDessinateur as $ligne) {
                        $Mangaka = $ligne['nom_dessinateur'];
                        $idMangaka = $ligne['id_dessinateur'];
                        echo "<option>$Mangaka</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        </br>

        <!--Couverture-->
        <div>
            <label class="col-md-3 control-label">Couverture : </label>
            <div class="col-md-3" name="dessinateur">
                <input type="file" name="couverture" id="couverture"/>
            </div>
        </div>

        <!--Valider/annuler-->
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btnprimary"><span
                            class="glyphicon glyphicon-ok"></span> Valider
                </button>

                <button type="button" class="btn btn-default btn-primary"
                        onclick="javascript: window.location='../index.php';"><span
                            class="glyphicon glyphicon-remove"></span>Annuler
                </button>
            </div>
        </div>
    </form>
</div>
</html>
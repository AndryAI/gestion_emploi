<?php
session_start();
include('../inc/traitement.php/base.php');
include('../inc/traitement.php/fonction.php');
if(!isset($_SESSION['user']['id_utilisateur'])){
    header('Location: login.php');
    exit();
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultat = publierOffre($bdd, $_SESSION['user']['id_utilisateur'], $_POST);
    
    if ($resultat === true) {
        $message = '<div class="alert alert-success">Offre publiée avec succès!</div>';
    } else {
        $message = '<div class="alert alert-danger">'.$resultat.'</div>';
    }
}

$domaines = getDomaine();
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une offre</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <?php include('../inc/pages/header.php') ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">Publier une nouvelle offre</h2>
                
                <?= $message ?>
                
                <form method="post" class="border p-4 rounded">
                    <div class="mb-3">
                        <label class="form-label">Titre du poste*</label>
                        <input type="text" name="titre" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Domaine*</label>
                        <select name="domaine" class="form-select" required>
                            <option value="">Choisir un domaine</option>
                            <?php foreach ($domaines as $domaine): ?>
                                <option value="<?= $domaine['id_domaine'] ?>"><?= $domaine['nom_domaine'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description*</label>
                        <textarea name="description" class="form-control" rows="5" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Salaire minimum (€)*</label>
                        <input type="number" name="salaire" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Combien de jour avant l'expiration</label>
                        <input type="number" name="interval" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Compétences requises*</label>
                        <input type="text" name="competences" class="form-control" required>
                        <small class="text-muted">Séparez par des virgules</small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Publier l'offre</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
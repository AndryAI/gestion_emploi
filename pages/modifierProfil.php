<?php 
    session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);

    include('../inc/traitement.php/fonction.php');
    $type_user  = getTypeUser();
    echo $type_user[0]['id_type_utilisateur'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>Modifier Profil</title>
</head>
<body>
    <header>
        <?php include('../inc/pages/header.php'); ?>
    </header>
    <main>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <?php include('../inc/pages/modifierProfil.php') ?>
                </div>
            </div>
        </div>
    </main>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
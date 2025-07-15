<?php
error_reporting(E_ALL); ini_set('display_errors', 1); 
include('../inc/traitement.php/fonction.php');
$type_user = getTypeUser();
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'connexion';
$allowed_pages = ['connexion', 'inscription'];
$page = in_array($page, $allowed_pages) ? $page : 'connexion';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title><?= ucfirst($page) ?> - OffrEmploie</title>
</head>
<body class="bg-light">
    <header>
        <?php include('../inc/pages/header.php') ?>
    </header>

    <div class="container py-5">
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success text-center">
                <?= $_SESSION['success'] ?>
                <?php unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger text-center">
                <?= $_SESSION['error'] ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <?php include("../inc/pages/$page.php") ?>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
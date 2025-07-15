<?php 
$page_title = "Page non trouvée";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/style.css">
    <title><?= htmlspecialchars($page_title) ?> | Votre Plateforme</title>
</head>
<body>
    <header>
        <?php include('../inc/pages/header.php') ?>
    </header>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Illustration -->
                <div class="mb-4">
                    <img src="../assets/img/404-error.svg" alt="Erreur 404" class="img-fluid" style="max-height: 300px;">
                </div>
                
                <!-- Message d'erreur -->
                <div class="error-card p-4 p-lg-5 mb-4">
                    <h1 class="display-4 text-primary mb-3">
                        <i class="bi bi-exclamation-triangle-fill"></i> Oups !
                    </h1>
                    <h2 class="h3 text-secondary mb-4">La page que vous cherchez n'existe pas.</h2>
                    
                    <p class="lead mb-4">
                        Il semble que la page que vous essayez d'atteindre a été déplacée, supprimée ou n'a jamais existé.
                    </p>
                    
                    <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                        <a href="index.php" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-house-door-fill me-2"></i> Retour à l'accueil
                        </a>
                        <a href="../emplois.php" class="btn btn-outline-primary px-4 py-2">
                            <i class="bi bi-briefcase-fill me-2"></i> Voir les offres d'emploi
                        </a>
                        <a href="../contact.php" class="btn btn-outline-secondary px-4 py-2">
                            <i class="bi bi-envelope-fill me-2"></i> Nous contacter
                        </a>
                    </div>
                </div>
                
                <!-- Recherche -->
                <div class="mb-5">
                    <h3 class="h5 text-secondary mb-3">Essayez une recherche</h3>
                    <form action="../recherche.php" method="get" class="d-flex">
                        <input type="text" name="q" class="form-control form-control-lg me-2" placeholder="Rechercher...">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer py-4">
        <?php include('../inc/pages/footer.php') ?>
    </footer>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
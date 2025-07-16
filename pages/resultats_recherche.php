<?php
require_once('../inc/traitement.php/fonction.php');

$nomDomaine = $_GET['domaine'] ?? null;

$domaines = getDomaine();
$offres = rechercherOffresParDomaine($nomDomaine);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats pour <?= htmlspecialchars($nomDomaine) ?> | OffreEmploie</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/style.css">
    <style>
       
    </style>
</head>
<body>
    <?php include('../inc/pages/header.php'); ?>

    <div class="search-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form class="row g-2" method="GET" action="resultats_recherche.php">
                        <div class="col-md-12">
                            <select class="form-select form-select-lg" name="domaine" required>
                                <option value="" disabled>Domaine que vous recherchez</option>
                                <?php foreach($domaines as $dom): ?>
                                    <option value="<?= htmlspecialchars($dom['nom_domaine']) ?>" 
                                        <?= $nomDomaine == $dom['nom_domaine'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($dom['nom_domaine']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="bi bi-search"></i> Rechercher
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Offres dans le domaine : <?= htmlspecialchars($nomDomaine) ?></h1>
                <p class="result-count">
                    <?= count($offres) ?> offre(s) trouvée(s)
                </p>
            </div>
        </div>

        <?php if (empty($offres)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="no-results">
                        <i class="bi bi-info-circle" style="font-size: 2rem; color: var(--gray);"></i>
                        <h3 class="mt-3">Aucune offre disponible</h3>
                        <p class="text-muted">Aucune offre n'a été trouvée pour ce domaine.</p>
                        <a href="index.php" class="btn btn-outline-primary mt-2">
                            Voir toutes les offres
                        </a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($offres as $offre): ?>
                    <div class="col-md-6">
                        <div class="job-card">
                            <div class="job-header">
                                <h2 class="job-title"><?= htmlspecialchars($offre['nom_emploi']) ?></h2>
                                <p class="company-name mb-0">
                                    <?= htmlspecialchars($offre['nom_entreprises']) ?>
                                </p>
                            </div>
                            
                            <div class="job-body">
                                <div class="mb-3">
                                    <span class="badge badge-domain me-2">
                                        <?= htmlspecialchars($offre['nom_domaine']) ?>
                                    </span>
                                    <?php if ($offre['salaire_min']): ?>
                                        <span class="badge bg-success bg-opacity-10 text-success">
                                            Salaire : <?= number_format($offre['salaire_min'], 0, ',', ' ') ?> €
                                        </span>
                                    <?php endif; ?>
                                </div>
                                
                                <p class="job-description">
                                    <?= nl2br(htmlspecialchars(shortenText($offre['description_poste'], 200))) ?>
                                </p>
                            </div>
                            
                            <div class="job-footer d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i> Publiée <?= timeAgo($offre['date_publication']) ?>
                                </small>
                                <a href="fiche_offre.php?id_pub=<?= $offre['id_publication'] ?>" class="btn btn-sm btn-primary">
                                    Voir l'offre <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <!-- <footer class="footer mt-5 py-4"> -->
        <?php include('../inc/pages/footer.php'); ?>
    <!-- </footer> -->

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php

require('../inc/traitement.php/fonction.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$query = getAllPublication();
$offres = mysqli_fetch_all($query, MYSQLI_ASSOC); // Récupère toutes les lignes

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Toutes les offres d'emploi | Votre Plateforme</title>
</head>
<body>
    <header>
        <?php include('../inc/pages/header.php') ?>
    </header>

    <main class="container my-5">
        <!-- Hero Section -->
        <div class="hero-section p-4 p-lg-5 mb-5 text-center rounded">
            <h1 class="hero-title mb-3">Trouvez votre <span>emploi idéal</span></h1>
            <p class="hero-subtitle mb-4">Parcourez toutes nos offres d'emploi disponibles et postulez en quelques clics</p>
            
            <!-- Formulaire de recherche -->
            <form class="row g-3 justify-content-center">
                <div class="col-md-5">
                    <input type="text" class="form-control form-control-lg" placeholder="Mots-clés, compétences...">
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-lg">
                        <option selected>Tous les domaines</option>
                        <option>Informatique</option>
                        <option>Marketing</option>
                        <option>Finance</option>
                        <option>RH</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-search me-2"></i> Rechercher
                    </button>
                </div>
            </form>
        </div>

        <!-- Filtres -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="h4 text-secondary mb-3 mb-md-0">
                <i class="bi bi-briefcase-fill me-2"></i> 
                <?= count($offres) ?> offre(s) disponible(s)
            </h2>
            
            <div class="d-flex gap-2">
                <select class="form-select">
                    <option selected>Trier par</option>
                    <option>Plus récentes</option>
                    <option>Plus anciennes</option>
                    <option>Salaire (croissant)</option>
                    <option>Salaire (décroissant)</option>
                </select>
                
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#filtersCollapse">
                    <i class="bi bi-funnel-fill"></i> Filtres
                </button>
            </div>
        </div>
        
        <!-- Filtres avancés (collapse) -->
        <div class="collapse mb-5" id="filtersCollapse">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Salaire minimum</label>
                        <input type="number" class="form-control" placeholder="€">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Type de contrat</label>
                        <select class="form-select">
                            <option selected>Tous</option>
                            <option>CDI</option>
                            <option>CDD</option>
                            <option>Freelance</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Expérience</label>
                        <select class="form-select">
                            <option selected>Tous niveaux</option>
                            <option>Débutant</option>
                            <option>Intermédiaire</option>
                            <option>Confirmé</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Localisation</label>
                        <input type="text" class="form-control" placeholder="Ville, pays...">
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-primary me-2">Appliquer</button>
                    <button class="btn btn-outline-secondary">Réinitialiser</button>
                </div>
            </div>
        </div>

        <!-- Liste des offres -->
        <div class="jobs-list">
            <?php if(count($offres) > 0): ?>
                <?php foreach($offres as $offre): ?>
                    <div class="job-card mb-4">
                        <div class="row">
                            <div class="col-md-2 text-center mb-3 mb-md-0">
                                <img src="<?= htmlspecialchars($offre['logo_img'] ? '../uploads/logo/'.$offre['logo_img'] : '../assets/img/default-company.png' ?>" 
                                     alt="Logo <?= htmlspecialchars($offre['nom_entreprises']) ?>" 
                                     class="img-fluid rounded" style="max-height: 80px;">
                            </div>
                            <div class="col-md-7">
                                <div class="job-header mb-2">
                                    <span class="job-date text-muted">
                                        <?= date('d/m/Y', strtotime($offre['date_publication'])) ?>
                                    </span>
                                </div>
                                <h3 class="job-title mb-1">
                                    <a href="fiche-offre.php?id=<?= $offre['id_publication'] ?>" class="text-decoration-none">
                                        <?= htmlspecialchars($offre['nom_emploi']) ?>
                                    </a>
                                </h3>
                                <p class="job-company mb-2"><?= htmlspecialchars($offre['nom_entreprises']) ?></p>
                                <div class="d-flex flex-wrap gap-3 mb-2">
                                    <span class="d-flex align-items-center text-muted small">
                                        <i class="bi bi-geo-alt-fill me-1"></i> <?= htmlspecialchars($offre['ville_entreprise']) ?>
                                    </span>
                                    <span class="d-flex align-items-center text-muted small">
                                        <i class="bi bi-cash-stack me-1"></i> 
                                        <?= number_format($offre['salaire_min'], 0, ',', ' ') ?> - 
                                        <?= number_format($offre['salaire_max'], 0, ',', ' ') ?> €
                                    </span>
                                    <span class="d-flex align-items-center text-muted small">
                                        <i class="bi bi-clock-fill me-1"></i> 
                                        <?= htmlspecialchars($offre['experience_requise']) ?>
                                    </span>
                                </div>
                                <p class="job-description small mb-2">
                                    <?= substr(htmlspecialchars($offre['description_poste']), 0, 200) ?>...
                                </p>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php 
                                    $competences = explode(',', $offre['competences_requises']);
                                    foreach(array_slice($competences, 0, 3) as $competence): 
                                    ?>
                                        <span class="badge bg-primary-light text-primary small"><?= trim(htmlspecialchars($competence)) ?></span>
                                    <?php endforeach; ?>
                                    <?php if(count($competences) > 3): ?>
                                        <span class="badge bg-secondary small">+<?= count($competences) - 3 ?> autres</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex flex-column justify-content-between">
                                <div class="text-end text-muted small mb-2">
                                    Expire le <?= date('d/m/Y', strtotime($offre['date_expiration'])) ?>
                                </div>
                                <div class="d-grid gap-2">
                                    <a href="fiche-offre.php?id=<?= $offre['id_publication'] ?>" class="btn btn-sm btn-outline-primary">
                                        Voir l'offre
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        Postuler
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="bi bi-briefcase display-4 text-muted mb-3"></i>
                    <h3 class="h4 text-secondary mb-2">Aucune offre disponible</h3>
                    <p class="text-muted">Il n'y a actuellement aucune offre d'emploi disponible.</p>
                    <a href="#" class="btn btn-primary mt-3">Créer une alerte emploi</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if(count($offres) > 0): ?>
            <nav aria-label="Pagination" class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Suivant</a>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>
    </main>

    <footer class="footer py-4">
        <?php include('../inc/pages/footer.php') ?>
    </footer>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
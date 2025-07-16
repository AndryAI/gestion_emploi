<?php
    error_reporting(E_ALL); ini_set('display_errors', 1);
    session_start();
    require('../inc/traitement.php/fonction.php');
    $publication = getPublication();
    $domaine =  getDomaine();
    $nbr_offre =nbrOffre();
    $bbr_entreprise = nbrEntreprise();
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/style.css">
    <title>OffreEmploie - Trouvez l'emploi idéal</title>
</head>
<body>
    <div class="container-fluid px-0">
        <header>
            <?php include('../inc/pages/header.php'); ?>
        </header>
    </div>
    
    <main class="main-home">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="sidebar-nav">
                        <?php include('../inc/pages/nav.php') ?>
                    </div>
                    
                    <div class="stats-box mt-4 p-4">
                        <h3>Nos chiffres</h3>
                        <div class="stat-item">
                            <span class="stat-number"><?php echo $nbr_offre; ?>+</span>
                            <span class="stat-label">Offres disponibles</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number"><?= $bbr_entreprise ?>+</span>
                            <span class="stat-label">Entreprises partenaires</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">3,892+</span>
                            <span class="stat-label">Candidats satisfaits</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="hero-section p-4 p-lg-5 mb-4">
                        <h1 class="hero-title">Bienvenue sur <span>OffreEmploie</span></h1>
                        <p class="hero-subtitle">
                            Votre plateforme de confiance pour trouver l'emploi qui correspond à vos compétences
                        </p>
                        <div class="hero-search">
                        <form class="row g-2" method="GET" action="resultats_recherche.php">
                            <div class="col-md-12">
                                <select class="form-select form-select-lg" name="domaine" required>
                                    <option value="" selected disabled>Domaine que vous recherchez</option>
                                    <?php foreach($domaine as $dom) { ?>
                                        <option value="<?= htmlspecialchars($dom['nom_domaine']) ?>">
                                            <?= htmlspecialchars($dom['nom_domaine']) ?>
                                        </option>
                                    <?php } ?>
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
                    
                    <div class="features-section row g-4 mb-4">
                        <div class="col-md-4">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="bi bi-briefcase"></i>
                                </div>
                                <h3>Offres variées</h3>
                                <p>Des centaines d'offres dans tous les secteurs d'activité</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <h3>Fiabilité</h3>
                                <p>Des entreprises vérifiées et des offres authentiques</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="bi bi-person-badge"></i>
                                </div>
                                <h3>Accompagnement</h3>
                                <p>Conseils et outils pour booster votre recherche</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="latest-jobs">
                        <h2 class="section-title">Dernières offres publiées</h2>
                        <div class="jobs-list">
                            <?php foreach($publication as $pub) {?>
                            <div class="job-card">
                                <div class="job-header">
                                    <span class="badge bg-primary">Nouveau</span>
                                    <span class="job-date">Publié il y a 2 jours</span>
                                </div>
                                <h3 class="job-title"><?php echo $pub['nom_emploi'] ?></h3>
                                <div class="job-company"><?php echo $pub['nom_entreprises'] ?></div>
                                <div class="job-location"><?php echo $pub['ville_entreprise'] ?></div>
                                <div class="job-description">
                                    <?php echo $pub['description_poste'];?>
                                    Experience requis : <?php echo $pub['experience_requise'];?>
                                    Competence requis : <?php echo $pub['experience_requise'];?>
                                </div>
                                <a href="fiche_offre.php?id_pub=<?php echo $pub['id_publication'] ?>" class="btn btn-outline-primary">Voir l'offre</a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="text-center mt-3">
                            <a href="emplois.php" class="see-all-jobs">Voir toutes les offres →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- <footer class="footer py-4"> -->
        <?php include('../inc/pages/footer.php') ?>
    <!-- </footer> -->
    
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
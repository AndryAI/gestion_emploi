<?php
error_reporting(E_ALL); ini_set('display_errors', 1); // Affiche toutes les erreurs
include('../inc/traitement.php/fonction.php');

session_start();
$user=$_SESSION['user'];
$offres = getPublicationUser($user['id_utilisateur']);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - OffrEmploie</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boot\strap-icons@1.8.0/font/bootstrap-icons.css">

</head>
<body class="bg-light">
    <header>
        <?php include('../inc/pages/header.php'); ?>
    </header>
    <div class="container py-5">
        <?php if(isset($_SESSION['modif_success'])): ?>
            <div class="alert alert-success text-center">
                <?= $_SESSION['modif_user'] ?>
                <?php unset($_SESSION['modif_success']); ?>
            </div>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['modif_error'])): ?>
            <div class="alert alert-danger text-center">
                <?= $_SESSION['modif_error'] ?>
                <?php unset($_SESSION['modif_error']); ?>
            </div>
        <?php endif; ?>
    </div>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="profile-card bg-white shadow-sm mb-5">
                    <!-- En-tête du profil -->
                    <div class="profile-header text-white text-center p-4">
                        <div class="d-flex justify-content-center mb-3">
                            <?php if(!empty($user['photo_profil'])): ?>
                                <img src="<?= htmlspecialchars($user['photo_profil']) ?>" 
                                     class="profile-picture rounded-circle" 
                                     alt="Photo de profil">
                            <?php else: ?>
                                <div class="profile-picture rounded-circle bg-white text-primary d-flex align-items-center justify-content-center" 
                                     style="font-size: 4rem; font-weight: bold;">
                                    <?= strtoupper(substr($user['prenom'], 0, 1).substr($user['nom'], 0, 1)) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h1><?= htmlspecialchars($user['prenom'].' '.$user['nom']) ?></h1>
                        <p class="mb-0"><?= htmlspecialchars($user['id_type_utilisateur']) ?></p>
                    </div>

                    <!-- Corps du profil -->
                    <div class="p-4 p-md-5">
                        <div class="row">
                            <!-- Colonne Informations personnelles -->
                            <div class="col-md-6 mb-4">
                                <h3 class="mb-4 border-bottom pb-2">
                                    <i class="bi bi-person-lines-fill me-2"></i>Informations personnelles
                                </h3>
                                
                                <div class="mb-3">
                                    <span class="info-label">Email :</span>
                                    <p><?= htmlspecialchars($user['email']) ?></p>
                                </div>
                                
                                <div class="mb-3">
                                    <span class="info-label">Téléphone :</span>
                                    <p><?= !empty($user['telephone']) ? htmlspecialchars($user['telephone']) : 'Non renseigné' ?></p>
                                </div>
                                
                                <div class="mb-3">
                                    <span class="info-label">Adresse :</span>
                                    <p>
                                        <?= !empty($user['adresse']) ? htmlspecialchars($user['adresse']) : 'Non renseignée' ?><br>
                                    </p>
                                </div>

                                <div class="mb-3">
                                    <span class="info-label">Ville :</span>
                                    <p><?= !empty($user['ville']) ? htmlspecialchars($user['ville']) : 'Non renseigné' ?></p>
                                </div>

                                <div class="mb-3">
                                    <span class="info-label">Pays :</span>
                                    <p><?= !empty($user['pays']) ? htmlspecialchars($user['pays']) : 'Non renseigné' ?></p>
                                </div>
                                
                                <div class="mb-3">
                                    <span class="info-label">Date d'inscription :</span>
                                    <p><?= date('d/m/Y', strtotime($user['date_inscription'])) ?></p>
                                </div>
                            </div>
                            
                            <!-- Colonne Actions et CV -->
                            <div class="col-md-6 mb-4">
                                <h3 class="mb-4 border-bottom pb-2">
                                    <i class="bi bi-file-earmark-text me-2"></i>Mon CV
                                </h3>
                                
                                <?php if(!empty($user['cv_path'])): ?>
                                    <div class="alert alert-success">
                                        <i class="bi bi-check-circle-fill me-2"></i>
                                        CV déjà uploadé
                                        <a href="<?= htmlspecialchars($user['cv_path']) ?>" 
                                           target="_blank" 
                                           class="btn btn-sm btn-outline-primary ms-3">
                                            Voir mon CV
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-warning">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                        Aucun CV uploadé
                                    </div>
                                <?php endif; ?>
                                
                                <form class="mb-4">
                                    <div class="mb-3">
                                        <label for="cv" class="form-label">Mettre à jour mon CV</label>
                                        <input class="form-control" type="file" id="cv">
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-upload me-2"></i>Uploader
                                    </button>
                                </form>
                                
                                <h3 class="mt-5 mb-4 border-bottom pb-2">
                                    <i class="bi bi-gear-fill me-2"></i>Paramètres
                                </h3>
                                
                                <div class="d-grid gap-2">
                                    <a href="modifierProfil.php" class="btn btn-outline-primary">
                                        <i class="bi bi-pencil-square me-2"></i>Modifier mon profil & Mots de passe
                                    </a>
                                    <a href="publier.php" class="btn btn-outline-secondary">
                                        <i class="bi bi-shield-lock me-2"></i>Publier un offre
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
               <!-- Liste des offres -->
<div class="jobs-list">
    <?php if(!empty($offres)): ?>
        <?php foreach($offres as $offre): ?>
            <div class="job-card mb-4">
                <div class="row">
                    <div class="col-md-2 text-center mb-3 mb-md-0">
                        <img src="<?= !empty($offre['logo_img']) ? '../uploads/logo/'.htmlspecialchars($offre['logo_img']) : '../assets/img/default-company.png' ?>" 
                             alt="Logo <?= !empty($offre['nom_entreprises']) ? htmlspecialchars($offre['nom_entreprises']) : 'Entreprise' ?>" 
                             class="img-fluid rounded" style="max-height: 80px;">
                    </div>
                    <div class="col-md-7">
                        <div class="job-header mb-2">
                            <span class="job-date text-muted">
                                <?= !empty($offre['date_publication']) ? date('d/m/Y', strtotime($offre['date_publication'])) : 'Date inconnue' ?>
                            </span>
                        </div>
                        <h3 class="job-title mb-1">
                            <a href="fiche-offre.php?id=<?= $offre['id_publication'] ?? '' ?>" class="text-decoration-none">
                                <?= !empty($offre['nom_emploi']) ? htmlspecialchars($offre['nom_emploi']) : 'Poste non spécifié' ?>
                            </a>
                        </h3>
                        <p class="job-company mb-2"><?= !empty($offre['nom_entreprises']) ? htmlspecialchars($offre['nom_entreprises']) : '' ?></p>
                        <div class="d-flex flex-wrap gap-3 mb-2">
                            <span class="d-flex align-items-center text-muted small">
                                <i class="bi bi-geo-alt-fill me-1"></i> 
                                <?= !empty($offre['ville_entreprise']) ? htmlspecialchars($offre['ville_entreprise']) : 'Non spécifié' ?>
                            </span>
                            <span class="d-flex align-items-center text-muted small">
                                <i class="bi bi-cash-stack me-1"></i> 
                                <?= isset($offre['salaire_min']) ? number_format($offre['salaire_min'], 0, ',', ' ') : '0' ?> - 
                                <?= isset($offre['salaire_max']) ? number_format($offre['salaire_max'], 0, ',', ' ') : '0' ?> €
                            </span>
                            <span class="d-flex align-items-center text-muted small">
                                <i class="bi bi-clock-fill me-1"></i> 
                                <?= !empty($offre['experience_requise']) ? htmlspecialchars($offre['experience_requise']) : 'Non spécifié' ?>
                            </span>
                        </div>
                        <p class="job-description small mb-2">
                            <?= !empty($offre['description_poste']) ? substr(htmlspecialchars($offre['description_poste']), 0, 200).'...' : 'Aucune description disponible' ?>
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <?php 
                            $competences = !empty($offre['competences_requises']) ? explode(',', $offre['competences_requises']) : [];
                            foreach(array_slice($competences, 0, 3) as $competence): 
                                if(!empty(trim($competence))): ?>
                                    <span class="badge bg-primary-light text-primary small"><?= htmlspecialchars(trim($competence)) ?></span>
                                <?php endif;
                            endforeach; 
                            if(count($competences) > 3): ?>
                                <span class="badge bg-secondary small">+<?= count($competences) - 3 ?> autres</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex flex-column justify-content-between">
                        <div class="text-end text-muted small mb-2">
                            <?= !empty($offre['date_expiration']) ? 'Expire le '.date('d/m/Y', strtotime($offre['date_expiration'])) : '' ?>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="fiche_offre.php?id_pub=<?= $offre['id_publication'] ?? '' ?>" class="btn btn-sm btn-outline-primary">
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
    </main>

    <footer class="footer py-4">
        <?php include('../inc/pages/footer.php') ?>
    </footer>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
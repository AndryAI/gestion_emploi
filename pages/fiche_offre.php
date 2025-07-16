<?php 
session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);
require('../inc/traitement.php/fonction.php');
$publication;
$id_publication = $_GET['id_pub'];
if(isset($id_publication)){
    $query = getFicheOffre($id_publication);
    $publication = mysqli_fetch_assoc($query);
}

if(!$publication) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Fiche offre - <?= htmlspecialchars($publication['nom_emploi']) ?></title>
</head>
<body>
    <header>
        <?php include('../inc/pages/header.php') ?>
    </header>

    <main class="container my-5">
        <!-- Section principale de l'offre -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Carte de l'offre -->
                <div class="job-card mb-4">
                    <div class="job-header mb-3">
                        <span class="job-date text-muted">
                            Publiée le <?= date('d/m/Y', strtotime($publication['date_publication'])) ?>
                        </span>
                        <span class="badge bg-primary">
                            Expire le <?= date('d/m/Y', strtotime($publication['date_expiration'])) ?>
                        </span>
                    </div>
                    
                    <h1 class="job-title mb-2"><?= htmlspecialchars($publication['nom_emploi']) ?></h1>
                    <h2 class="job-company mb-3"><?= htmlspecialchars($publication['nom_entreprises']) ?></h2>
                    
                    <div class="d-flex gap-3 mb-4">
                        <span class="d-flex align-items-center text-muted">
                            <i class="bi bi-geo-alt-fill me-2"></i> <?= htmlspecialchars($publication['ville_entreprise']) ?>
                        </span>
                        <span class="d-flex align-items-center text-muted">
                            <i class="bi bi-cash-stack me-2"></i> 
                            <?= number_format($publication['salaire_min'], 0, ',', ' ') ?> - 
                            <?= number_format($publication['salaire_max'], 0, ',', ' ') ?> €
                        </span>
                        <span class="d-flex align-items-center text-muted">
                            <i class="bi bi-briefcase-fill me-2"></i> <?= htmlspecialchars($publication['experience_requise']) ?>
                        </span>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="h5 text-secondary mb-3">Description du poste</h3>
                        <div class="job-description"><?= nl2br(htmlspecialchars($publication['description_poste'])) ?></div>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="h5 text-secondary mb-3">Compétences requises</h3>
                        <div class="d-flex flex-wrap gap-2">
                            <?php 
                            $competences = explode(',', $publication['competences_requises']);
                            foreach($competences as $competence): 
                            ?>
                                <span class="badge bg-primary-light text-primary"><?= trim(htmlspecialchars($competence)) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="h5 text-secondary mb-3">Niveau d'étude requis</h3>
                        <p><?= htmlspecialchars($publication['niveau_etude']) ?></p>
                    </div>
                </div>
                
                <!-- Bouton Postuler -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
                    <button class="btn btn-primary px-4 py-2">
                        <i class="bi bi-send-fill me-2"></i> Postuler maintenant
                    </button>
                </div>
            </div>
            
            <!-- Sidebar avec infos entreprise -->
            <div class="col-lg-4">
                <div class="stats-box p-4 mb-4">
                    <div class="text-center mb-4">
                        <img src="<?= htmlspecialchars($publication['logo_img']) ? '../uploads/logo/'.$publication['logo_img'] : '../assets/img/default-company.png' ?>" 
                             alt="Logo <?= htmlspecialchars($publication['nom_entreprises']) ?>" 
                             class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                        <h3><?= htmlspecialchars($publication['nom_entreprises']) ?></h3>
                    </div>
                    
                    <div class="mb-3">
                        <h4 class="h6 text-secondary">À propos de l'entreprise</h4>
                        <p><?= nl2br(htmlspecialchars($publication['description_entreprise'])) ?></p>
                    </div>
                    
                    <div class="mb-3">
                        <h4 class="h6 text-secondary">Informations</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                                <?= htmlspecialchars($publication['adresse_entreprise']) ?>, <?= htmlspecialchars($publication['ville_entreprise']) ?>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-envelope-fill text-primary me-2"></i>
                                <?= htmlspecialchars($publication['email_entreprise']) ?>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-telephone-fill text-primary me-2"></i>
                                <?= htmlspecialchars($publication['contact_entreprise']) ?>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-calendar-event text-primary me-2"></i>
                                Créée en <?= date('Y', strtotime($publication['date_creation_entreprise'])) ?>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="d-grid">
                        <a href="entreprise.php?id_pub=<?= $publication['id_entreprise'] ?>" class="btn btn-outline-primary">
                            Voir plus d'offres de cette entreprise
                        </a>
                    </div>
                </div>
                
                <!-- Contact recruteur -->
                <div class="stats-box p-4">
                    <h4 class="h6 text-secondary mb-3">Contact recruteur</h4>
                    <div class="d-flex align-items-center mb-3">
                        <img src="<?= htmlspecialchars($publication['photo_recruteur']) ? '../uploads/profil/'.$publication['photo_recruteur'] : '../assets/img/default-user.png' ?>" 
                             alt="Photo <?= htmlspecialchars($publication['prenom_recruteur'].' '.$publication['nom_recruteur']) ?>" 
                             class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                        <div>
                            <h5 class="mb-0"><?= htmlspecialchars($publication['prenom_recruteur'].' '.$publication['nom_recruteur']) ?></h5>
                            <small class="text-muted">Recruteur</small>
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="bi bi-envelope-fill text-primary me-2"></i>
                            <?= htmlspecialchars($publication['email_recruteur']) ?>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-telephone-fill text-primary me-2"></i>
                            <?= htmlspecialchars($publication['telephone_recruteur']) ?>
                        </li>
                    </ul>
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
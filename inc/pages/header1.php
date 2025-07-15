
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">OffrEmploie</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="offres.php">Offres d'emploi</a>
        </li>
      </ul>

      <?php if(isset($_SESSION['user'])): ?>
        <!-- Menu utilisateur connecté -->
        <div class="d-flex align-items-center">
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown">
              <span class="me-2"><?= htmlspecialchars($_SESSION['user']['prenom'] ?? 'Profil') ?></span>
              <i class="bi bi-person-circle fs-4"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <h6 class="dropdown-header">
                  Connecté en tant que<br>
                  <strong><?= htmlspecialchars($_SESSION['user']['email']) ?></strong>
                </h6>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="profil.php"><i class="bi bi-person me-2"></i>Mon profil</a></li>
              <li><a class="dropdown-item" href="mes-candidatures.php"><i class="bi bi-file-earmark-text me-2"></i>Mes candidatures</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="deconnexion.php"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</a></li>
            </ul>
          </div>
        </div>
      <?php else: ?>
        <!-- Boutons non connecté -->
        <div class="d-flex">
          <a href="login.php?page=connexion" class="btn btn-outline-primary me-2">
            <i class="bi bi-box-arrow-in-right"></i> Connexion
          </a>
          <a href="login.php?page=inscription" class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Inscription
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</nav>
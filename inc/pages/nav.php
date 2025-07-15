<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="../pages/portefolio.php">Developpeur du site</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="emplois.php">Nos offre d'emploie</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Les administration</a>
  </li>
  <li class="nav-item">
    <a class="nav-link">A propos de notre entreprise</a>
  </li>
  <?php if(isset($_SESSION['user']) && $_SESSION['user']['nom_type'] == 'recruteur') { ?>
    <li>
      <a class="nav-link active" href="publier.php">Publier offre</a>
    </li>
  <?php } ?>

</ul>
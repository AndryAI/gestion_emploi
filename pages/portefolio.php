<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RANDRIANARISON Andry - Portfolio</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/styleportefolio.css">
 
</head>
<body>
  <div class="container my-5">
    <?php include('../inc/pages/header.php') ?>
    
    <header>
      <div class="profile-picture">
        <img src="../assets/images/andry.jpg" alt="Photo de Andry RANDRIANARISON">
      </div>
      <h1>RANDRIANARISON Andry Fanantenana</h1>
      <p>Développeur Web & Logiciel Junior</p>
    </header>

    <main>
      <section>
        <h2><i class="bi bi-person-fill"></i> À propos de moi</h2>
        <p>Je suis un développeur passionné par la création d'applications web et mobiles. Avec une solide base en programmation et une soif d'apprendre, je m'épanouis dans la résolution de problèmes complexes et la création de solutions innovantes.</p>
        <p>Autodidacte et curieux, je me tiens constamment au courant des dernières technologies et tendances du développement web.</p>
      </section>

      <section>
        <h2><i class="bi bi-tools"></i> Compétences</h2>
        <div class="row">
          <div class="col-md-6">
            <h3>Langages de programmation</h3>
            <ul>
              <li><strong>Java</strong> -Mini Applications desktop </li>
              <li><strong>PHP</strong> - Développement back-end</li>
              <li><strong>Python</strong> - Scripting, automatisation</li>
              <li><strong>HTML5/CSS3</strong> - Front-end moderne</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h3>Technologies & Outils</h3>
            <ul>
              <li><strong>Bases de données</strong> : MySQL </li>
              <li><strong>Frameworks</strong> : Bootstrap, Laravel (en apprentissage)</li>
              <li><strong>Outils</strong> : Git, VS Code</li>
              <li><strong>Systèmes</strong> : Linux, Windows</li>
            </ul>
          </div>
        </div>
      </section>

      <section>
        <h2><i class="bi bi-code-slash"></i> Projets Réalisés</h2>
        
        <div class="project">
          <h3><i class="bi bi-facebook"></i> Mini Facebook</h3>
          <p>Réseau social simplifié avec système d'amis, publications et messagerie</p>
          <p><strong>Technologies :</strong> PHP, MySQL, HTML/CSS</p>
          <p><a href="#"><i class="bi bi-github"></i> Voir le code sur GitHub</a></p>
        </div>

        <div class="project">
          <h3><i class="bi bi-camera-reels"></i> Mini TikTok</h3>
          <p>Plateforme de partage de vidéos courtes avec fonctionnalités de like et commentaires</p>
          <p><strong>Technologies :</strong> PHP, SQL</p>
          <p><a href="#"><i class="bi bi-github"></i> Voir le projet</a></p>
        </div>

        <div class="project">
          <h3><i class="bi bi-images"></i> Mini Tumblr</h3>
          <p>Plateforme de blogging avec partage d'images et de textes</p>
          <p><strong>Technologies :</strong> PHP, MySQL, Bootstrap</p>
          <p><a href="#"><i class="bi bi-github"></i> Voir le code</a></p>
        </div>

        <div class="project">
          <h3><i class="bi bi-briefcase"></i> Système de gestion d'emplois</h3>
          <p>Plateforme complète de gestion d'offres d'emploi avec espace recruteur et candidat</p>
          <p><strong>Technologies :</strong> PHP, MySQL, HTML/CSS</p>
          <p><a href="#"><i class="bi bi-link-45deg"></i> Visiter le site</a></p>
        </div>

        <div class="project">
          <h3><i class="bi bi-journal-bookmark"></i> Gestion de notes scolaires (Java)</h3>
          <p>Application console pour gestion des notes et calcul des moyennes</p>
          <p><strong>Technologies :</strong> Java, fichiers texte</p>
          <p><a href="#"><i class="bi bi-github"></i> Code source</a></p>
        </div>
      </section>

      <section>
        <h2><i class="bi bi-file-earmark-person"></i> Mon CV</h2>
        <p>
          <a href="cv-andry.pdf" download class="btn btn-primary">
            <i class="bi bi-download"></i> Télécharger mon CV (PDF)
          </a>
        </p>
      </section>
    </main>

    <section class="contact mt-4">
      <h2><i class="bi bi-envelope"></i> Me contacter</h2>
      <p><i class="bi bi-envelope"></i> Email : <a href="mailto:andryrandria528@email.com">andryrandria528@email.com</a></p>
      <p><i class="bi bi-github"></i> GitHub : <a href="https://github.com/AndryKT" target="_blank">github.com/AndryKT</a></p>
      <p><i class="bi bi-linkedin"></i> LinkedIn : <a href="https://linkedin.com/in/Andry" target="_blank">linkedin.com/in/Andry</a></p>
    </section>
  </div>

  <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
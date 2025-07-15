<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RANDRIANARISON Andry</title>
  <link rel="stylesheet" href="../assets/styleportefolio.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

</head>
<body>
  <div class="container">
    <h1 style="text-align:center ; color:#FFC107">A propos du devellopeur</h1>
<?php include('../inc/pages/header.php') ?>
<header>
  <div class="profile-picture">
    <img src="../assets/images/andry.jpg" alt="Photo de Andry RANDRIANARISON">
  </div>
  <h1>RANDRIANARISON <br> Andry Fanantenana</h1>
  <p>Étudiant en Informatique – Développeur Web & Logiciel Junior</p>
</header>

<main>
  <section>
  <h2>À propos de moi</h2>
  <p>Je suis un étudiant en première année d'informatique à IT University
    , passionné par le développement web, les bases de données, et les technologies 
    open source. J'apprends vite, je suis curieux, et je cherche à appliquer mes 
    compétences dans des projets concrets.</p>
</section>

<section>
  <h2>Compétences</h2>
  <ul>
    <li><strong>Langages :</strong> Java, PHP, HTML5, CSS3, SQL</li>
    <li><strong>Base de données :</strong> MySQL, Microsoft Access</li>
    <li><strong>Outils :</strong> Git, GitHub, Visual Studio Code, NetBeans, Excel</li>
    <li><strong>Système :</strong> Linux (commandes terminal de base, gestion de fichiers, utilisateurs)</li>
  </ul>
</section>

<section>
  <h2>Projets</h2>

  <div class="project">
    <h3>💻 Application Java : Gestion de notes scolaires</h3>
    <p>Application console pour enregistrer les notes d’élèves, calculer les moyennes, et exporter les résultats dans un fichier texte.</p>
    <p><strong>Technologies :</strong> Java, fichiers .txt</p>
    <p><a href="#">Voir le code sur GitHub</a></p>
  </div>

  <div class="project">
    <h3>🌐 Mini site web : Restaurant local</h3>
    <p>Site vitrine statique en HTML/CSS pour présenter un restaurant fictif, avec page menu, contact et galerie photos.</p>
    <p><strong>Technologies :</strong> HTML5, CSS3</p>
    <p><a href="#">Voir le projet</a></p>
  </div>

  <div class="project">
    <h3>📊 Système de vote en PHP/MySQL</h3>
    <p>Site simple permettant d’enregistrer les votes d’un utilisateur et d'afficher les résultats dynamiques depuis une base de données.</p>
    <p><strong>Technologies :</strong> PHP, MySQL</p>
    <p><a href="#">Voir le code sur GitHub</a></p>
  </div>
</section>

<section>
  <h2>Mon CV</h2>
  <p><a href="cv-andry.pdf" download>Télécharger mon CV (PDF)</a></p>
</section>

  </div>
</main>
<section class="contact">
  <h2>Me contacter</h2>
  <p>Email : <a href="mailto:andryrandria528@email.com">andryrandria528@email.com</a></p>
  <p>GitHub : <a href="https://github.com/AndryKT" target="_blank">github.com/AndryKT</a></p>
  <p>LinkedIn : <a href="https://linkedin.com/in/Andry" target="_blank">linkedin.com/in/Andry</a></p>
</section>

</body>
</html>

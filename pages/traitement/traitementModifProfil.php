<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();


include('../../inc/traitement.php/fonction.php');

$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$email = $_POST['email'] ?? '';
$mdp = $_POST['mdp'] ?? '';
$type_user = $_POST['type_utilisateur'] ?? '';
$id_user = $_SESSION['user'];


// echo update_profil($nom, $prenom, $email, $mdp, $type_user, $id_user['id_utilisateur']);

if(update_profil($nom, $prenom, $email, $mdp, $type_user, $id_user['id_utilisateur'])) {
    $_SESSION['modif_success'] = "Votre profil a bien été modifié";
    $user = login($email, $mdp);
    $_SESSION['user'] = $user;
    echo "réussi";
    header('Location: ../profil.php');
} else {
    $_SESSION['modif_error'] = "Erreur lors de la modification";
    echo "échec";
    header('Location: ../profil.php');
}
exit();
?>

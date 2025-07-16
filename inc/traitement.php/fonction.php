<?php
    error_reporting(E_ALL); ini_set('display_errors', 1); 

    function login($email, $mdp) {
        include('base.php');
        $email = addslashes($email);
        $sql = "SELECT * FROM utilisateurs as u
        JOIN type_utilisateur as tu on
        u.id_type_utilisateur = tu.id_type_utilisateur
        WHERE u.email = '$email' LIMIT 1";
        $result = mysqli_query($bdd, $sql);
        
        if($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $pass = password_verify($mdp, $user['mot_de_passe']);
            if($pass){
                return $user;
            }
        }
        
        return false;
    }

    function inserer_sous_type_utilisateur($query){
        include('base.php');
        $result1 = mysqli_fetch_assoc($query);
        if($result1){
            $sql2 = sprintf(
                "INSERT INTO sous_type_utilisateur (id_type_utilisateur, id_utilisateur) VALUES('%s', '%s')",
                $result1['id_type_utilisateur'],
                $result1['id_utilisateur']
            );
            $query2 = mysqli_query($bdd, $sql2);
            if(!$query2) {
                echo "Erreur insert sous_type_utilisateur: " . mysqli_error($bdd);
                return false;
            }
            return true;
        }
        return false;
    }


    function inscription($nom, $prenom, $email, $mdp, $type_user) {
        include('base.php'); 
    
        if(empty($nom) || empty($prenom) || empty($email) || empty($mdp)) {
            return false;
        }
    
        $mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);
    
        $nom = mysqli_real_escape_string($bdd, $nom);
        $prenom = mysqli_real_escape_string($bdd, $prenom);
        $email = mysqli_real_escape_string($bdd, $email);
        $type_user = mysqli_real_escape_string($bdd, $type_user);
    
        $sql = "INSERT INTO utilisateurs 
                (nom, prenom, email, mot_de_passe, id_type_utilisateur, date_inscription, statut) 
                VALUES ('$nom', '$prenom', '$email', '$mdp_hash', '$type_user', NOW(), 'actif')";
        $result = mysqli_query($bdd, $sql);
    
        if(!$result) {
            echo "Erreur insert utilisateurs: " . mysqli_error($bdd);
            return false;
        }
    
        $sql1 = "SELECT * FROM utilisateurs WHERE email = '$email'";
        $query1 = mysqli_query($bdd, $sql1);
        if(!$query1) {
            echo "Erreur select utilisateurs: " . mysqli_error($bdd);
            return false;
        }
        return inserer_sous_type_utilisateur($query1);
    }
    


    function update_profil($nom, $prenom, $email, $mdp, $type_user, $id_user) {
        include('base.php'); 
    
        if(empty($nom) || empty($prenom) || empty($email) || empty($mdp)) {
            return false;
        }
    
        $mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);
    
        $nom = mysqli_real_escape_string($bdd, $nom);
        $prenom = mysqli_real_escape_string($bdd, $prenom);
        $email = mysqli_real_escape_string($bdd, $email);
        $type_user = mysqli_real_escape_string($bdd, $type_user);
        $id_user = mysqli_real_escape_string($bdd, $id_user);
    
        $sql = "UPDATE utilisateurs
                    SET nom = '$nom',
                        prenom = '$prenom',
                        email = '$email',
                        mot_de_passe = '$mdp_hash',
                        id_type_utilisateur = '$type_user',
                        date_inscription = NOW(),
                        statut = 'actif'
                    WHERE id_utilisateur = '$id_user'";

                    
        $result = mysqli_query($bdd, $sql);
    
        if($result){
            if(!$result) {
                echo "Erreur update utilisateurs: " . mysqli_error($bdd);
                return false;
            }
        
            $sql1 = "SELECT * FROM utilisateurs WHERE email = '$email'";
            $query1 = mysqli_query($bdd, $sql1);
            if(!$query1) {
                echo "Erreur select utilisateurs: " . mysqli_error($bdd);
                return false;
            }
            return inserer_sous_type_utilisateur($query1);
        }
    }
    

    function getPublication(){
        include('base.php');

        $sql = "SELECT * FROM v_pub_emploi_entre_user LIMIT 2";
        $query = mysqli_query($bdd,$sql);
        $tab = [];
        while($donne = mysqli_fetch_assoc($query)){
            $tab[]=$donne;
        }
        return $tab;
    }
    function getFicheOffre($id_pub){
        include('base.php');

        $sql = "SELECT * FROM v_pub_emploi_entre_user WHERE id_publication='$id_pub' LIMIT 1";
        $query = mysqli_query($bdd,$sql);
        return $query;
    }

    function getAllPublication(){
        include('base.php');

        $sql = "SELECT * FROM v_pub_emploi_entre_user 
        WHERE date_expiration >= CURDATE() 
        ORDER BY date_publication DESC";
        $query = mysqli_query($bdd,$sql);
        $tab=[];
        while($donne = mysqli_fetch_assoc($query)){
            $tab[]=$donne;
        }
        return $tab;
        
    }
    function getPublicationUser($id_user){
        include('base.php');

        $sql = "SELECT * FROM v_pub_emploi_entre_user WHERE id_createur_publication = $id_user";
        $query = mysqli_query($bdd,$sql);
        $tab=[];
        while($donne = mysqli_fetch_assoc($query)){
            $tab[]=$donne;
        }
        return $tab;
    }
    
    function getDomaine(){
        include('base.php');
        $sql = "SELECT * FROM domaines";
        $query = mysqli_query($bdd,$sql);
        $tab=[];
        while($donne = mysqli_fetch_assoc($query)){
            $tab[]=$donne;
        }
        return $tab;
    }

    function getTypeUser(){
        include('base.php');
        $sql = "SELECT * FROM type_utilisateur";
        $query = mysqli_query($bdd,$sql);
        $tab=[];
        while($donne = mysqli_fetch_assoc($query)){
            $tab[]=$donne;
        }
        return $tab;
    }

    function nbrOffre(){
        include('base.php');
        $sql = "SELECT * FROM emploi";
        $query = mysqli_query($bdd,$sql);
        $tab=[];
        while($donne = mysqli_fetch_assoc($query)){
            $tab[]=$donne;
        }
        return count($tab);
    }
    
    function nbrEntreprise(){
        include('base.php');
        $sql = "SELECT * FROM entreprises";
        $query = mysqli_query($bdd,$sql);
        $tab=[];
        while($donne = mysqli_fetch_assoc($query)){
            $tab[]=$donne;
        }
        return count($tab);
    }

    function publierOffre($bdd, $id_utilisateur, $post) {
        $req = $bdd->prepare("SELECT id_entreprise FROM entreprises WHERE id_recruteur = ?");
        $req->bind_param("i", $id_utilisateur);
        $req->execute();
        $result = $req->get_result();
        $entreprise = $result->fetch_assoc();
        
        if (!$entreprise) {
            return "Vous devez être associé à une entreprise pour publier une offre";
        }
    
        $champs_requis = ['titre', 'domaine', 'description', 'salaire', 'competences', 'interval'];
        foreach ($champs_requis as $champ) {
            if (empty($post[$champ])) {
                return "Le champ '$champ' est obligatoire";
            }
        }
    
        $date_expiration = date('Y-m-d H:i:s', strtotime("+".intval($post['interval'])." days"));
    
        $req = $bdd->prepare("INSERT INTO emploi (
            id_entreprise, id_domaine, nom_emploi, 
            description_emploi, date_publication, 
            competences_requises, salaire_min, date_expiration
        ) VALUES (?, ?, ?, ?, NOW(), ?, ?, ?)");
        
        $req->bind_param(
            "iissdss", // Notez le 's' supplémentaire pour la date
            $entreprise['id_entreprise'],
            $post['domaine'],
            $post['titre'],
            $post['description'],
            $post['competences'],
            $post['salaire'],
            $date_expiration
        );
        
        if (!$req->execute()) {
            return "Erreur lors de la publication de l'offre: " . $bdd->error;
        }
        
        $id_emploi = $bdd->insert_id;
    
        $req = $bdd->prepare("INSERT INTO publication (id_emploi, id_entreprise, id_utilisateur) VALUES (?, ?, ?)");
        $req->bind_param("iii", $id_emploi, $entreprise['id_entreprise'], $id_utilisateur);
        
        if (!$req->execute()) {
            return "Erreur lors de l'enregistrement de la publication: " . $bdd->error;
        }
    
        return true;
    }

    function rechercherOffresParDomaine($nomDomaine) {
        include('base.php');
        $sql = "SELECT * FROM v_pub_emploi_entre_user WHERE nom_domaine = ? ORDER BY date_publication DESC";

        $stmt = $bdd->prepare($sql);
        $stmt->bind_param("s", $nomDomaine);
        $stmt->execute();

        $result = $stmt->get_result();
        $offres = [];

        while ($row = $result->fetch_assoc()) {
            $offres[] = $row;
        }

        return $offres;
    }
    function shortenText($text, $length = 100) {
        if (strlen($text) > $length) {
            return substr($text, 0, $length) . '...';
        }
        return $text;
    }

    function timeAgo($datetime) {
        $time = strtotime($datetime);
        $diff = time() - $time;

        if ($diff < 60) return "à l'instant";
        if ($diff < 3600) return "il y a ".floor($diff/60)." min";
        if ($diff < 86400) return "il y a ".floor($diff/3600)." h";
        if ($diff < 2592000) return "il y a ".floor($diff/86400)." j";
        if ($diff < 31536000) return "il y a ".floor($diff/2592000)." mois";
        return "il y a ".floor($diff/31536000)." an".(floor($diff/31536000) > 1 ? "s" : "");
    }
?>
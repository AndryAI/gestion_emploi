<div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white text-center py-4">
        <h1 class="h3 mb-0">Ravis que vous nous fassiez confiance</h1>
         <p class="mb-0">Modifier votre profil OffrEmploie</p>
    </div>
    
    <div class="card-body p-5">
        <form action="traitement/traitementModifProfil.php" method="post">
            <input type="hidden" name="id_user" value="<?php echo $user['id_utilisateur'] ?>">
            <div class="mb-4">
                <label for="email" class="form-label text-secondary">Nom</label>
                <input type="text" class="form-control form-control-lg" 
                       id="nom" name="nom" 
                       placeholder="Entrer votre nom" required>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label text-secondary">Prenom</label>
                <input type="text" class="form-control form-control-lg" 
                       id="prenom" name="prenom" 
                       placeholder="Entrer votre prenom" required>
            </div>


            <div class="mb-4">
                <label for="type_utilisateur" class="form-label text-secondary">Type d'utilisateur</label>
                    <select class="form-select form-select-lg" id="type_utilisateur" name="type_utilisateur" required>
                        <option value="" disabled selected>Sélectionnez votre profil</option>
                        <?php foreach($type_user as $type){ ?>
                            <option value="<?= $type['id_type_utilisateur']?>"><?= $type['nom_type']?></option>
                        <?php }?>
                    </select>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label text-secondary">Adresse email</label>
                <input type="email" class="form-control form-control-lg" 
                       id="email" name="email" 
                       placeholder="Entrer votre email" required>
            </div>
            
            <div class="mb-4">
                <label for="mdp" class="form-label text-secondary">Mot de passe</label>
                <input type="password" class="form-control form-control-lg" 
                       id="mdp" name="mdp" 
                       placeholder="Entrez votre mot de passe" required>
            </div>
            
            <div class="d-grid mb-4">
                <button type="submit" class="btn btn-primary btn-lg py-3">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

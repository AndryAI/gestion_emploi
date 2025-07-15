<div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white text-center py-4">
        <h1 class="h3 mb-0">Ravis de vous revoir</h1>
        <p class="mb-0">Connectez-vous à votre espace OffrEmploie</p>
    </div>
    
    <div class="card-body p-5">
        <form action="traitement/traitementConnect.php" method="post">
            <input type="hidden" name="page" value="<?php echo $page ?>">
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
                    Se connecter
                </button>
            </div>
            
            <div class="text-center">
                <a href="#" class="text-decoration-none text-primary">Mot de passe oublié ?</a>
                <hr class="my-4">
                <p class="text-muted">Pas encore de compte ? 
                    <a href="login.php?page=inscription" class="text-primary fw-bold" value="inscription">S'inscrire</a>
                </p>
            </div>
        </form>
    </div>
</div>

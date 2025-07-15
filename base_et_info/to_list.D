Objectif: creer un site qui gere l'offre d'emploie d'un entreprise

index.php:page d'accueil:
    .header.php(en tete):
        logo du site tout a gauche 
        un petit nav pour se connecter et s'inscrire
        trouver un style attrayant (couleur degrader)
    Container:
        diviser en 2 colonnes 
            .1 ere colonne a gauche : nav pour lien
                Voir develloper
                Voir nos emploie
                Voir les administrateur
            2 eme colonne a droite : message attrayant pour les emploie
    footer:
        quelques lien 
            facebook
            instagramme
            youtube
            google
    style.css:
            Palette chaleureuse avec l'orange (#FF6B35) comme couleur principale
            Bleu professionnel (#004E89) pour équilibrer
            Fond crème clair (#FFF8F0) pour un look doux et accueillant
            Typographie moderne et lisible
            Effets de hover subtils pour l'interactivité
            Design responsive pour tous les appareils
            Ombres légères pour de la profondeur
            Espacement aéré pour un look professionnel   

portefolio.php:
    contient les informations du devellopeur(moi)

    stylegenrale:
        Header accrocheur :
    
            Dégradé de couleurs orange/bleu
    
            Texte blanc pour un bon contraste
    
            Ombre portée pour la profondeur
    
        Cartes de projets :
    
            Bordure gauche colorée
    
            Effet de hover avec légère élévation
    
            Icônes implicites dans les titres
    
        Cohérence visuelle :
    
            Même palette que le site principal
    
            Animation subtile des liens
    
            Hiérarchie visuelle claire
    
        Section contact :
    
            Fond bleu professionnel
    
            Liens en jaune doré pour visibilité
    
            Centrage du contenu
    
        Adaptabilité :
    
            Design responsive pour mobiles
    
            Taille de texte ajustable
    
            Espacement optimisé


Tandremo fa mbla misy tsy mety kely ilay table emploie nasiana domaine (ex:informatiques , communication ,..)

candidat satisfait
publier offre si recruteur  ok
    formulaire sur les informations de l'administrateur
    traitementFormulaire.php qui verfie si les info entrer sont valable 
        fonction inserer donner dans sql
    redirection sur une page de formulaire sur la publication de l'emploi (si fait)
        
postuler sur un emploi:
    creer table DemanderUseroffre
        id_postuler
        id_user_qui_demande
        id_offre_demander
        acceptation VARCHAR(50)
    fonction qui insert les donnerdans cette table DemanderUseroffre

modifier profil.php :
    ajouter tous les offres publier par l'utilisateur si administrateur
    creer table soustypeutilisateur:    ok
        id_sous_table_utilisateur
        id_type_utilisateur
        id_nom_nouveau_utilisateur
    
    ajouter dans le lien modifier profile l'id de l'id_user ok
    creer fonction updateProfil qui va  updater la table de l'user et Insert dans soustypeutilisateur   ok

modifier la fonction publierOffre ajouter date expiration;














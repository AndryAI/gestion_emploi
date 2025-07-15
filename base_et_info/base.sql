-- CREATE OR REPLACE TABLE admin (
--   id_admin INT AUTO_INCREMENT PRIMARY KEY,
--   email VARCHAR(100) NOT NULL UNIQUE,
--   mot_de_passe VARCHAR(255) NOT NULL
-- );

-- -- Table des offres d'emploi
-- CREATE OR REPLACE TABLE offres (
--   id_offre INT AUTO_INCREMENT PRIMARY KEY,
--   titre VARCHAR(255),
--   description TEXT,
--   domaine VARCHAR(100),
--   date_publication DATE
-- );

-- -- Table des candidatures
-- CREATE OR REPLACE TABLE candidatures (
--   id_candidature INT AUTO_INCREMENT PRIMARY KEY,
--   nom VARCHAR(100),
--   email VARCHAR(100),
--   message TEXT,
--   cv_path VARCHAR(255),
--   id_offre INT,
--   FOREIGN KEY (id_offre) REFERENCES offres(id_offre)
-- );

CREATE OR REPLACE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    type_utilisateur ENUM('candidat', 'recruteur', 'admin') NOT NULL,
    telephone VARCHAR(20),
    adresse TEXT,
    ville VARCHAR(50),
    pays VARCHAR(50),
    photo_profil VARCHAR(255),
    cv_path VARCHAR(255),
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
    dernier_connexion DATETIME,
    statut ENUM('actif', 'inactif', 'suspendu') DEFAULT 'actif',
    token_reset VARCHAR(255),
    token_expiration DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE OR REPLACE TABLE administrateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL,
    niveau_acces ENUM('superadmin', 'moderateur', 'support') NOT NULL,
    departement VARCHAR(50),
    permissions TEXT,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE OR REPLACE TABLE entreprises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    secteur_activite VARCHAR(100),
    logo_path VARCHAR(255),
    site_web VARCHAR(100),
    adresse TEXT,
    ville VARCHAR(50),
    pays VARCHAR(50),
    telephone VARCHAR(20),
    email_contact VARCHAR(100),
    date_creation DATE,
    statut ENUM('verifie', 'en_attente', 'rejete') DEFAULT 'en_attente',
    recruteur_id INT NOT NULL,
    FOREIGN KEY (recruteur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE OR REPLACE TABLE offres_emploi (
    id_offre INT AUTO_INCREMENT PRIMARY KEY,
    titre_offre VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    entreprise_id_offre INT NOT NULL,
    type_contrat ENUM('cdi', 'cdd', 'stage', 'alternance', 'freelance') NOT NULL,
    secteur_activite VARCHAR(100),
    salaire_min DECIMAL(10,2),
    salaire_max DECIMAL(10,2),
    localisation VARCHAR(100) NOT NULL,
    -- Id_travaille
    experience_requise VARCHAR(50),
    niveau_etude VARCHAR(50),
    competences_requises VARCHAR(100),
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_expiration DATE,
    statut ENUM('active', 'inactive', 'pourvue', 'expiree') DEFAULT 'active',
    nombre_vues INT DEFAULT 0,
    slug VARCHAR(255) UNIQUE,
    FOREIGN KEY (entreprise_id) REFERENCES entreprises(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE OR REPLACE TABLE candidatures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    offre_id INT NOT NULL,
    candidat_id INT NOT NULL,
    lettre_motivation TEXT,
    cv_path VARCHAR(255) NOT NULL,
    date_postulation DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('en_attente', 'en_revue', 'entretien', 'acceptee', 'rejetee') DEFAULT 'en_attente',
    notes TEXT,
    evaluation INT(1),
    date_evaluation DATETIME,
    FOREIGN KEY (offre_id) REFERENCES offres_emploi(id) ON DELETE CASCADE,
    FOREIGN KEY (candidat_id) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  //////////////////////////////////////////////////////////////////////////////
CREATE OR REPLACE TABLE competences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL UNIQUE,
    categorie VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE OR REPLACE TABLE competences_offres (
    offre_id INT NOT NULL,
    competence_id INT NOT NULL,
    niveau_requis ENUM('debutant', 'intermediaire', 'avance', 'expert'),
    PRIMARY KEY (offre_id, competence_id),
    FOREIGN KEY (offre_id) REFERENCES offres_emploi(id) ON DELETE CASCADE,
    FOREIGN KEY (competence_id) REFERENCES competences(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE OR REPLACE TABLE competences_utilisateurs (
    utilisateur_id INT NOT NULL,
    competence_id INT NOT NULL,
    niveau ENUM('debutant', 'intermediaire', 'avance', 'expert'),
    experience_annees INT,
    PRIMARY KEY (utilisateur_id, competence_id),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    FOREIGN KEY (competence_id) REFERENCES competences(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE OR REPLACE TABLE favoris (
    utilisateur_id INT NOT NULL,
    offre_id INT NOT NULL,
    date_ajout DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (utilisateur_id, offre_id),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    FOREIGN KEY (offre_id) REFERENCES offres_emploi(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE OR REPLACE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    expediteur_id INT NOT NULL,
    destinataire_id INT NOT NULL,
    sujet VARCHAR(100),
    contenu TEXT NOT NULL,
    date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP,
    lu BOOLEAN DEFAULT FALSE,
    offre_id INT,
    FOREIGN KEY (expediteur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    FOREIGN KEY (destinataire_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    FOREIGN KEY (offre_id) REFERENCES offres_emploi(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE OR REPLACE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL,
    titre VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    type_notification ENUM('nouvelle_offre', 'candidature', 'message', 'alerte') NOT NULL,
    lien VARCHAR(255),
    lue BOOLEAN DEFAULT FALSE,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE OR REPLACE TABLE logs_activite (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    action VARCHAR(50) NOT NULL,
    description TEXT,
    ip_address VARCHAR(45),
    user_agent TEXT,
    date_action DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Index pour les recherches d'offres
CREATE OR REPLACE INDEX idx_offres_titre ON offres_emploi(titre);
CREATE OR REPLACE INDEX idx_offres_localisation ON offres_emploi(localisation);
CREATE OR REPLACE INDEX idx_offres_type_contrat ON offres_emploi(type_contrat);
CREATE OR REPLACE INDEX idx_offres_statut ON offres_emploi(statut);
CREATE OR REPLACE INDEX idx_offres_date_expiration ON offres_emploi(date_expiration);

-- Index pour les recherches d'utilisateurs
CREATE OR REPLACE INDEX idx_utilisateurs_email ON utilisateurs(email);
CREATE OR REPLACE INDEX idx_utilisateurs_type ON utilisateurs(type_utilisateur);

-- Index pour les candidatures
CREATE OR REPLACE INDEX idx_candidatures_statut ON candidatures(statut);
CREATE OR REPLACE INDEX idx_candidatures_offre ON candidatures(offre_id);
CREATE OR REPLACE INDEX idx_candidatures_candidat ON candidatures(candidat_id);;;

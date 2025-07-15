DROP database gestion_emploi;
CREATE database gestion_emploi;
USE gestion_emploi;

CREATE TABLE type_utilisateur (
    id_type_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom_type VARCHAR(50)
);

CREATE TABLE utilisateurs (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    id_type_utilisateur INT,
    telephone VARCHAR(20),
    adresse TEXT,
    ville VARCHAR(50),
    pays VARCHAR(50),
    photo_profil VARCHAR(255),
    cv_path VARCHAR(255),
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
    dernier_connexion DATETIME,
    statut ENUM('actif', 'inactif', 'suspendu') DEFAULT 'actif',
    FOREIGN KEY (id_type_utilisateur) REFERENCES type_utilisateur(id_type_utilisateur)
);

CREATE TABLE sous_type_utilisateur (
    id_sous_type_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    id_type_utilisateur INT,
    id_utilisateur INT,
    FOREIGN KEY (id_type_utilisateur) REFERENCES type_utilisateur(id_type_utilisateur)
);

CREATE TABLE entreprises(
    id_entreprise INT AUTO_INCREMENT PRIMARY KEY,
    id_recruteur INT NOT NULL,
    nom_entreprises VARCHAR(50),
    description_entreprise TEXT,
    date_creation DATETIME,
    pays VARCHAR(50),
    ville VARCHAR(50),
    adresse TEXT,
    contact VARCHAR(20),
    email_contact VARCHAR(100),
    logo_img VARCHAR(100),
    FOREIGN KEY (id_recruteur) REFERENCES utilisateurs(id_utilisateur)
);

CREATE TABLE domaines (
    id_domaine INT AUTO_INCREMENT PRIMARY KEY,
    nom_domaine VARCHAR(50) NOT NULL,
    description TEXT,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE emploi(
    id_emploi INT AUTO_INCREMENT PRIMARY KEY,
    id_entreprise INT,
    id_domaine INT,
    nom_emploi VARCHAR(100),
    description_emploi TEXT,
    date_publication DATETIME,
    date_expiration DATETIME,
    salaire_min DECIMAL(10,2),
    salaire_max DECIMAL(10,2),
    experience_requise VARCHAR(50),
    competences_requises VARCHAR(100),
    niveau_etude VARCHAR(50),
    FOREIGN KEY (id_entreprise) REFERENCES entreprises(id_entreprise),
    FOREIGN KEY (id_domaine) REFERENCES domaines(id_domaine)
);

CREATE TABLE publication(
    id_publication INT AUTO_INCREMENT PRIMARY KEY,
    id_emploi INT,
    id_entreprise INT,
    id_utilisateur INT,
    FOREIGN KEY (id_entreprise) REFERENCES entreprises(id_entreprise),
    FOREIGN KEY (id_emploi) REFERENCES emploi(id_emploi),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur)
);

CREATE TABLE commentaires(
    id_commentaire INT AUTO_INCREMENT PRIMARY KEY,
    id_publication INT,
    contenu TEXT,
    idComser INT,
    idPost INT,
    dateComs DATETIME,
    FOREIGN KEY (id_publication) REFERENCES publication(id_publication)
);

CREATE TABLE aimer(
    id_publication INT,
    idMpanaraka INT,
    nbFollower INT,
    idarahana INT,
    nbFollowing INT,
    FOREIGN KEY (id_publication) REFERENCES publication(id_publication)
);

CREATE OR REPLACE VIEW v_pub_emploi_entre_user AS
SELECT 
    p.id_publication,
    p.id_utilisateur AS id_createur_publication,  -- Ajout de l'ID utilisateur de la publication
    d.id_domaine AS id_domaine_emploi,
    d.nom_domaine,
    d.description,
    emp.id_emploi,
    emp.nom_emploi,
    emp.id_domaine,
    emp.description_emploi AS description_poste,
    emp.date_publication,
    emp.date_expiration,
    emp.salaire_min,
    emp.salaire_max,
    emp.experience_requise,
    emp.competences_requises,
    emp.niveau_etude,
    ent.id_entreprise,
    ent.nom_entreprises,
    ent.description_entreprise,
    ent.date_creation AS date_creation_entreprise,
    ent.pays AS pays_entreprise,
    ent.ville AS ville_entreprise,
    ent.adresse AS adresse_entreprise,
    ent.contact AS contact_entreprise,
    ent.email_contact AS email_entreprise,
    ent.logo_img,
    u.id_utilisateur AS id_recruteur,
    u.nom AS nom_recruteur,
    u.prenom AS prenom_recruteur,
    u.email AS email_recruteur,
    u.telephone AS telephone_recruteur,
    u.adresse AS adresse_recruteur,
    u.ville AS ville_recruteur,
    u.pays AS pays_recruteur,
    u.photo_profil AS photo_recruteur,
    u.date_inscription AS date_inscription_recruteur,
    -- Ajout des informations de l'utilisateur qui a créé la publication
    u2.nom AS nom_createur,
    u2.prenom AS prenom_createur,
    u2.email AS email_createur
FROM publication AS p
JOIN emploi AS emp ON p.id_emploi = emp.id_emploi
JOIN entreprises AS ent ON emp.id_entreprise = ent.id_entreprise
JOIN utilisateurs AS u ON u.id_utilisateur = ent.id_recruteur
JOIN utilisateurs AS u2 ON p.id_utilisateur = u2.id_utilisateur  -- Nouvelle jointure
JOIN domaines AS d ON d.id_domaine = emp.id_domaine;



source /opt/lampp/htdocs/Fianarana+Web/Travaille/base_et_info/donnerinitiale/donne.sql

select u.nom,p.id_publication from publication as p join utilisateurs as u on p.id_utilisateur =u.id_utilisateur ;

USE gestion_emploi;

-- =============================
-- INSERT INTO type_utilisateur
-- =============================
INSERT INTO type_utilisateur (nom_type)
VALUES 
('candidat'),
('recruteur'),
('admin');

-- =============================
-- INSERT INTO sous_type_utilisateur
-- =============================
INSERT INTO sous_type_utilisateur (id_type_utilisateur, nom_sous_type)
VALUES
(1, 'freelance'),
(1, 'stage'),
(1, 'CDD'),
(2, 'PME'),
(2, 'Startup'),
(2, 'Grande Entreprise'),
(3, 'superadmin'),
(3, 'gestionnaire');

-- =============================
-- INSERT INTO utilisateurs
-- =============================
INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, id_type_utilisateur, telephone, adresse, ville, pays, photo_profil, cv_path, dernier_connexion)
VALUES
('Rakoto', 'Jean', 'jeanrakoto@mail.com', 'mdp1', 2, '0321234567', 'Lot II A 45', 'Antananarivo', 'Madagascar', 'jean.png', NULL, NOW()),
('Randria', 'Pauline', 'paulinerandria@mail.com', 'mdp2', 1, '0339876543', 'Lot III B 12', 'Fianarantsoa', 'Madagascar', 'pauline.png', 'pauline_cv.pdf', NOW()),
('Smith', 'John', 'johnsmith@gmail.com', 'mdp3', 3, '0345567890', 'Lot IV C 9', 'Toamasina', 'Madagascar', 'john.png', NULL, NOW()),
('Raher', 'Miora', 'miorarah@gmail.com', 'mdp4', 1, '0324444444', 'Rue Des Palmiers', 'Mahajanga', 'Madagascar', 'miora.png', 'miora_cv.pdf', NOW()),
('Ranaivo', 'Hery', 'heryran@gmail.com', 'mdp5', 2, '0335555555', 'Avenue de l\'Indépendance', 'Antsirabe', 'Madagascar', 'hery.png', NULL, NOW()),
('Ando', 'Fanja', 'fanjaando@gmail.com', 'mdp6', 1, '0346666666', 'Route Nationale', 'Toliara', 'Madagascar', 'fanja.png', 'fanja_cv.pdf', NOW()),
('Tahina', 'Sarah', 'sarahtahina@gmail.com', 'mdp7', 2, '0338888888', 'Rue de la Liberté', 'Fianarantsoa', 'Madagascar', 'sarah.png', NULL, NOW()),
('Tom', 'Doe', 'tomdoe@gmail.com', 'mdp8', 1, '0349999999', 'Boulevard Sud', 'Antsiranana', 'Madagascar', 'tom.png', 'tom_cv.pdf', NOW()),
('Nomena', 'Lova', 'lovanomena@gmail.com', 'mdp9', 1, '0321212121', 'Rue Centrale', 'Manakara', 'Madagascar', 'lova.png', 'lova_cv.pdf', NOW()),
('Jean', 'Louis', 'jeanlouis@gmail.com', 'mdp10', 1, '0331313131', 'Lot X A 10', 'Morondava', 'Madagascar', 'louis.png', 'louis_cv.pdf', NOW());

-- =============================
-- INSERT INTO entreprises
-- =============================
INSERT INTO entreprises (id_recruteur, nom_entreprises, description_entreprise, date_creation, pays, ville, adresse, contact, email_contact, logo_img)
VALUES
(1, 'MadagascarTech', 'Développement logiciel', NOW(), 'Madagascar', 'Antananarivo', 'Tech Park', '0321111111', 'contact@madatech.com', 'mada.png'),
(5, 'BatiMad', 'Entreprise de construction', NOW(), 'Madagascar', 'Antsirabe', 'Zone Industrielle', '0335555555', 'contact@batimad.com', 'bati.png'),
(7, 'AgroExport', 'Exportateur agricole', NOW(), 'Madagascar', 'Fianarantsoa', 'Marché central', '0338888888', 'info@agroexport.mg', 'agro.png'),
(1, 'InnovaIT', 'Services IT', NOW(), 'Madagascar', 'Antananarivo', 'Rue des Entrepreneurs', '0321231234', 'info@innovait.mg', 'innova.png'),
(5, 'BuildPro', 'Génie civil et BTP', NOW(), 'Madagascar', 'Antsirabe', 'Chantier Sud', '0335454545', 'contact@buildpro.com', 'build.png'),
(7, 'GreenAgro', 'Production Bio', NOW(), 'Madagascar', 'Fianarantsoa', 'Plantation Est', '0338787878', 'contact@greenagro.mg', 'green.png'),
(1, 'SoftZone', 'Editeur de logiciels', NOW(), 'Madagascar', 'Antananarivo', 'Logiciel Avenue', '0321321321', 'contact@softzone.mg', 'soft.png'),
(5, 'MegaBTP', 'Travaux publics', NOW(), 'Madagascar', 'Antsirabe', 'Travaux Nord', '0335656565', 'info@megabtp.com', 'mega.png'),
(7, 'AgriPlus', 'Engrais et semences', NOW(), 'Madagascar', 'Fianarantsoa', 'Ferme Centrale', '0338989898', 'contact@agriplus.mg', 'agriplus.png'),
(1, 'WebCorp', 'Sites et e-commerce', NOW(), 'Madagascar', 'Antananarivo', 'Web Center', '0321414141', 'info@webcorp.mg', 'webcorp.png');

-- =============================
-- INSERT INTO domaines
-- =============================
INSERT INTO domaines (nom_domaine, description)
VALUES
('Informatique', 'Dev et admin systèmes'),
('Agriculture', 'Culture et élevage'),
('Bâtiment', 'Construction et travaux publics'),
('Finance', 'Banques et assurances'),
('Santé', 'Soins et hôpitaux'),
('Education', 'Enseignement et formation'),
('Transport', 'Logistique et transport'),
('Tourisme', 'Voyage et accueil'),
('Energie', 'Production et distribution'),
('Commerce', 'Vente et distribution');

-- =============================
-- INSERT INTO emploi
-- =============================
INSERT INTO emploi (id_entreprise, id_domaine, nom_emploi, description_emploi, date_publication, date_expiration, salaire_min, salaire_max, experience_requise, competences_requises, niveau_etude)
VALUES
(1, 1, 'Développeur Web', 'Création de sites', NOW(), DATE_ADD(NOW(), INTERVAL 30 DAY), 500000, 1000000, '2 ans', 'PHP, JS', 'Licence'),
(2, 3, 'Chef de chantier', 'Supervision travaux', NOW(), DATE_ADD(NOW(), INTERVAL 60 DAY), 800000, 1500000, '5 ans', 'Gestion', 'Ingénieur'),
(3, 2, 'Technicien agricole', 'Suivi cultures', NOW(), DATE_ADD(NOW(), INTERVAL 45 DAY), 300000, 600000, '1 an', 'Agroécologie', 'Bac+2'),
(4, 1, 'Analyste SI', 'Systèmes et réseaux', NOW(), DATE_ADD(NOW(), INTERVAL 40 DAY), 700000, 1200000, '3 ans', 'Linux, SQL', 'Licence'),
(5, 3, 'Maçon qualifié', 'Bâtiments publics', NOW(), DATE_ADD(NOW(), INTERVAL 50 DAY), 400000, 700000, '2 ans', 'Maçonnerie', 'CAP'),
(6, 2, 'Responsable ferme', 'Gestion exploitation', NOW(), DATE_ADD(NOW(), INTERVAL 55 DAY), 600000, 900000, '4 ans', 'Gestion Agricole', 'Licence'),
(7, 1, 'Dev Frontend', 'Applications Web', NOW(), DATE_ADD(NOW(), INTERVAL 35 DAY), 550000, 1100000, '2 ans', 'React', 'Licence'),
(8, 3, 'Conducteur travaux', 'Routes et ouvrages', NOW(), DATE_ADD(NOW(), INTERVAL 60 DAY), 900000, 1600000, '6 ans', 'Coordination', 'Ingénieur'),
(9, 2, 'Agronome', 'Analyse sols', NOW(), DATE_ADD(NOW(), INTERVAL 50 DAY), 650000, 950000, '3 ans', 'Analyse', 'Master'),
(10,1, 'UX Designer', 'Interfaces utilisateurs', NOW(), DATE_ADD(NOW(), INTERVAL 30 DAY), 500000, 1000000, '2 ans', 'Figma, UX', 'Licence');

-- =============================
-- INSERT INTO publication
-- =============================
INSERT INTO publication (id_emploi, id_entreprise, id_utilisateur)
VALUES
(1,1,1),(2,2,5),(3,3,7),(4,4,1),(5,5,5),(6,6,7),(7,7,1),(8,8,5),(9,9,7),(10,10,1);

-- =============================
-- INSERT INTO commentaires
-- =============================
INSERT INTO commentaires (id_publication, contenu, idComser, idPost, dateComs)
VALUES
(1, 'Très intéressant !', 2, 1, NOW()),
(2, 'Je veux postuler.', 4, 2, NOW()),
(3, 'Quel est le lieu ?', 6, 3, NOW()),
(4, 'Candidature envoyée.', 8, 4, NOW()),
(5, 'Est-ce toujours ouvert ?', 9, 5, NOW()),
(6, 'Combien de postes ?', 10, 6, NOW()),
(7, 'Quelle entreprise ?', 2, 7, NOW()),
(8, 'Y a-t-il logement ?', 4, 8, NOW()),
(9, 'Salaire négociable ?', 6, 9, NOW()),
(10, 'Contact transmis.', 8, 10, NOW());

-- =============================
-- INSERT INTO aimer
-- =============================
INSERT INTO aimer (id_publication, idMpanaraka, nbFollower, idarahana, nbFollowing)
VALUES
(1, 2, 10, 5, 20),
(2, 4, 8, 3, 15),
(3, 6, 12, 7, 22),
(4, 8, 14, 6, 25),
(5, 9, 9, 4, 18),
(6,10,11, 8, 23),
(7, 2,13, 5, 21),
(8, 4,15, 3, 19),
(9, 6, 7, 7, 16),
(10,8,16, 6, 24);

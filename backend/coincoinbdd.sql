CREATE DATABASE IF NOT EXISTS coincoinnexion;  -- On crée la base si elle n'existe pas
USE coincoinnexion; -- On se positionne sur la base

CREATE USER IF NOT EXISTS canard@localhost IDENTIFIED BY 'ImNotAMagret';--On crée un utilisateur qui aura tout les droits
GRANT ALL ON coincoinnexion.* TO canard@localhost; 

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(255) NOT NULL UNIQUE, 
    email VARCHAR(255) NOT NULL UNIQUE, 
    password VARCHAR(255) NOT NULL, 
    date_naissance DATE DEFAULT NULL
);


INSERT INTO utilisateurs(pseudo, email, password) VALUES ('robin', 'ro@bin.com', '$2y$10$nvt7pQevd6ntxZakEqYKD.lmTafarxSqnz4QJFFNM209efcvWnlv.');  -- ILuvAlbert
INSERT INTO utilisateurs(pseudo, email, password) VALUES ('pikachu', 'pikachu@poke.mon', '$2y$10$NmTTVwU7thXI01dECk0Dm.MlcJPCBanjtVwd3V/DOxVTQKohokYa6');  -- PikaPika
INSERT INTO utilisateurs(pseudo, email, password) VALUES ('bob', 'bob@eponge.com', '$2y$10$evc/DLVw9t0sRZLVIn9.RewYhIeYbiW76tDxjAjkCNkA3fWooc1MG');  --eponge
INSERT INTO utilisateurs(pseudo, email, password) VALUES ('batman', 'bat@man.com', '$2y$10$pPnAVRPzIEaWkzW1wwwoAOBVjLGpIfn3TyiNJSXdjMlvcw7zWnemS');  -- I8Superman
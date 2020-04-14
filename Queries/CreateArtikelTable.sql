CREATE TABLE Artikelen (
    id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    ArtikelTekst mediumtext NOT NULL,
    ArtikelTitel mediumtext NOT NULL,
    ArtikelSamenvatting mediumtext NOT NULL,
    ArtikelTags mediumtext NOT NULL
)
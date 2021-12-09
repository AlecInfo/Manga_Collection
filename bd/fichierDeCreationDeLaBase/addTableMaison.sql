DROP TABLE IF EXISTS maisonEdition; 
CREATE TABLE IF NOT EXISTS maisonEdition (
  idMaison int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(60) NOT NULL,
  img varchar(60) NOT NULL,
  PRIMARY KEY (idMaison),
  UNIQUE KEY nom (nom)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;
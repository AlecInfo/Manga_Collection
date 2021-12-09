DROP TABLE IF EXISTS volumes; 
CREATE TABLE IF NOT EXISTS volumes (
  idVolume int(11) NOT NULL AUTO_INCREMENT,
  idManga int(11) NOT NULL,
  titre varchar(60) NOT NULL,
  volume int(11) NOT NULL,
  cover varchar(50),
  nbPage int(8),
  dateSortie date,
  PRIMARY KEY (idVolume, idManga),
  FOREIGN KEY (idManga) REFERENCES mangas(idManga),
  UNIQUE KEY idVolume (idVolume)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;
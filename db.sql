SET FOREIGN_KEY_CHECKS = 0;

drop table if exists opciones;
drop view if exists  infoObras;
drop table if exists obras;
drop table if exists colecciones;
drop table if exists autores;

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE autores (
       idAut   	   INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
       nombreAut   VARCHAR(200) NOT NULL,
       claveAut	   VARCHAR(1000) NOT NULL,
       infoAut 	   VARCHAR(2000)
);

CREATE TABLE colecciones (
       idCol   	   int PRIMARY KEY NOT NULL AUTO_INCREMENT,
       nombreCol   VARCHAR(200) NOT NULL,
       infoCol	   VARCHAR(2000),
       fechaCol	   TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE obras (
       idObr   	   INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
       nombreObr   VARCHAR(200) NOT NULL,
       infoObr	   VARCHAR(2000),
       imagenObr   VARCHAR(200) NOT NULL,
       tecnicaObr  VARCHAR(200),
       fechaObr	   TIMESTAMP,
       precioObr   INT,
       linkventaObr VARCHAR(200) DEFAULT '#',

       autorId 	   INT NOT NULL,
       		   FOREIGN KEY (autorId) REFERENCES autores(idAut),

       coleccionId INT,
       		   FOREIGN KEY (coleccionId) REFERENCES colecciones(idCol)
);


CREATE VIEW infoObras AS
SELECT idObr, nombreObr, infoObr, imagenObr, tecnicaObr, fechaObr, precioObr, linkventaObr, autorId, coleccionId,
       idCol, nombreCol, infoCol, fechaCol,
       idAut, nombreAut, infoAut FROM obras
       INNER JOIN colecciones
       ON obras.coleccionId = colecciones.idCol
       INNER JOIN autores
       ON obras.autorId = autores.idAut
;

INSERT INTO autores (nombreAut, claveAut, infoAut)
       VALUES 	    ('Estuaria','111','Fusce suscipit, wisi nec facilisis facilisis.');

INSERT INTO colecciones (nombreCol)
       VALUES 		('2022');

-- INSERT INTO obras (nombreObr, infoObr, imagenObr, tecnicaObr, precioObr, linkventaObr, autorId, coleccionId)
--        VALUES 	  ('obra nº1', 'Donec hendrerit tempor tellus.', 'images/gallery/01.jpg','Tinta',20000,'#',1,1);

-- INSERT INTO obras (nombreObr, infoObr, imagenObr, tecnicaObr, precioObr, linkventaObr, autorId, coleccionId)
--        VALUES 	  ('obra nº2', 'Phasellus lacus.  Aliquam erat volutpat.', 'images/gallery/02.jpg','Tinta',20000,'#',1,1);

-- INSERT INTO obras (nombreObr, infoObr, imagenObr, tecnicaObr, precioObr, linkventaObr, autorId, coleccionId)
--        VALUES 	  ('obra nº3', 'Nulla facilisis, risus a rhoncus fermentum, tellus tellus lacinia purus, et dictum nunc justo sit amet elit.', 'images/gallery/03.jpg','Tinta',20000,'#',1,1);

-- INSERT INTO obras (nombreObr, infoObr, imagenObr, tecnicaObr, precioObr, linkventaObr, autorId, coleccionId)
--        VALUES 	  ('obra nº4', 'Sed diam.  Pellentesque condimentum, magna ut suscipit hendrerit, ipsum augue ornare nulla, non luctus diam neque sit amet urna.', 'images/gallery/04.jpg','Tinta',20000,'#',1,1);


-- OPCIONES
CREATE TABLE opciones (
       titulo	   VARCHAR(200),
       indexCol    INT DEFAULT 1
);

INSERT INTO opciones (titulo)
       VALUES 	     ('Galería de Estuaria');

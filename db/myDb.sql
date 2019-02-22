-- Create table.
CREATE TABLE bushings
( bushing_id       SERIAL
, bushing_name     VARCHAR(255)   NOT NULL
, part_number      VARCHAR(255)   NOT NULL
, manufacturer     VARCHAR(255)  
, picture_name     VARCHAR(255) 
, CONSTRAINT pk_bushings_1 PRIMARY KEY(bushing_id)
, CONSTRAINT uq_bushings_1 UNIQUE(bushing_name)
);  

-- Create sequence.
CREATE SEQUENCE bushing_id_s1 START WITH 1001;

CREATE TABLE location
( location_id    SERIAL
, bushing_id     INT        NOT NULL
, location_type  INT        
, location       VARCHAR(255)
, CONSTRAINT pk_location_1    PRIMARY KEY(location_id)
, CONSTRAINT fk_location_1    FOREIGN KEY(bushing_id) REFERENCES bushings(bushing_id)
);

CREATE SEQUENCE location_id_s1 START WITH 1001;

-- test database
INSERT INTO bushings
( bushing_id
, bushing_name
, part_number
, manufacturer
, picture_name
)
VALUES (1, 'Power Pen Pencil', 'PK-POWER-BU', 'Penn State Ind',  'powerpen.jpg');

SELECT * FROM bushings
ORDER BY bushing_id;

SELECT * FROM location
ORDER BY location_id;


DROP TABLE bushings;
DROP TABLE location;
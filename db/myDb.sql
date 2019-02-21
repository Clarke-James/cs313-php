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
DELETE SEQUENCE bushing_id_s1 START WITH 1001;

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
( bushing_name
, part_number
, manufacturer
)
VALUES ('Power Pen Pencil', 'PK-POWER-BU', 'Penn State Ind');
VALUES ('Combo pen pencil', '155-5100', 'Woodcraft');
VALUES ('Slimline Pro', 'PK-PENXXBU', 'Penn State Ind');
VALUES ('Classic American', 'ARTISIAN', 'Craft Supplies USA');

INSERT INTO location
( bushing_id 
, location_type
, location
)
VALUES (1 ,1, '11-B1');
INSERT INTO location
( bushing_id 
, location_type
, location
)
VALUES (2, 1, '11-A1');
INSERT INTO location
( bushing_id 
, location_type
, location
)
VALUES (3, 1, '11-C1');
INSERT INTO location
( bushing_id 
, location_type
, location
)
VALUES (4, 2, '1-D1');


SELECT * FROM bushings
ORDER BY bushing_id;

SELECT * FROM location
ORDER BY bushing_id;

ALTER TABLE location 
DROP COLUMN location_id;

DROP TABLE bushings;
DROP TABLE location;

SELECT * FROM bushings AS b
JOIN location AS l
ON b.bushing_id = l.bushing_id;
.mode column
.headers on

PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS User;

CREATE TABLE User (
    id_user INTEGER  PRIMARY KEY ,
    username VARCHAR NOT NULL,
    password VARCHAR NOT NULL,
    email VARCHAR NOT NULL
);

INSERT INTO User (id_user, username, password, email )VALUES (1, 'merlich', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','merlich@veryhot.com');
INSERT INTO User VALUES (2, 'fabioD', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','fabioD@outlook.com');
INSERT INTO User VALUES (3, 'techn', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','techn25@gmail.com');
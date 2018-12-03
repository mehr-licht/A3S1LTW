PRAGMA foreign_keys=ON;

DROP TABLE IF EXISTS User;

CREATE TABLE User (
    username VARCHAR PRIMARY KEY,
    password VARCHAR NOT NULL,
    email VARCHAR NOT NULL,
    name VARCHAR,
    birthday DATE,
    street VARCHAR(255),
    zipcode VARCHAR(8),
    city VARCHAR,
    country VARCHAR,
    avatar VARCHAR,
    phone INTEGER
);

INSERT INTO User (username, password, email ) VALUES ('mehrlicht', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','merlich@veryhot.com');
INSERT INTO User (username, password, email ) VALUES ('fabioD', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','fabioD@outlook.com');
INSERT INTO User (username, password, email ) VALUES ('techn', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','techn25@gmail.com');

DROP TABLE IF EXISTS Post;

CREATE TABLE Post (
    idPost INTEGER PRIMARY KEY ,
    iduser VARCHAR NOT NULL REFERENCES User(username),
    data DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    titulo VARCHAR NOT NULL,
    conteudo VARCHAR NOT NULL,
    votesUp INTEGER NOT NULL DEFAULT 0,
    votesDown INTEGER NOT NULL DEFAULT 0
    
);

INSERT INTO Post (iduser, data, titulo, conteudo, votesUp, votesDown) VALUES ('mehrlicht', '10/10/2010', 'titulo1_teste', 'conteudo1_teste',1,1);
INSERT INTO Post (iduser, data, titulo, conteudo, votesUp, votesDown) VALUES ('fabioD', '10/11/2011', 'titulo2_teste', 'conteudo2_teste',3,2);
INSERT INTO Post (iduser, data, titulo, conteudo, votesUp, votesDown) VALUES ('techn', '10/12/2010', 'titulo3_teste', 'conteudo3_teste',1,1);
INSERT INTO Post (iduser, data, titulo, conteudo, votesUp, votesDown) VALUES ('fabioD', '10/12/2011', 'titulo4_teste', 'conteudo4_teste',3,2);
INSERT INTO Post (iduser, data, titulo, conteudo, votesUp, votesDown) VALUES ('mehrlicht', '10/12/2010', 'titulo5_teste', 'conteudo5_teste',1,1);
INSERT INTO Post (iduser, data, titulo, conteudo, votesUp, votesDown) VALUES ('techn', '10/12/2011', 'titulo6_teste', 'conteudo6_teste',3,2);



DROP TABLE IF EXISTS Coment;

CREATE TABLE Coment (
    id_coment INTEGER PRIMARY KEY,
    iduser INTEGER NOT NULL REFERENCES User(username),
    data DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    comentConteudo VARCHAR NOT NULL,
    idPost INTEGER NOT NULL REFERENCES Post(idPost),
    idParentComent INTEGER
);

INSERT INTO Coment (iduser, data, comentConteudo, idPost, idParentComent) VALUES ('mehrlicht', '11/12/2010', 'Coment_conteudo_1_teste',1, null);
INSERT INTO Coment (iduser, data, comentConteudo, idPost, idParentComent) VALUES ('fabioD', '11/12/2010', 'Coment_conteudo_2_teste',1, null);
INSERT INTO Coment (iduser, data, comentConteudo, idPost, idParentComent) VALUES ('techn', '11/12/2010', 'Coment_conteudo_3_teste',2, null);
INSERT INTO Coment (iduser, data, comentConteudo, idPost, idParentComent) VALUES ('mehrlicht', '11/12/2010', 'Coment_conteudo_4_teste', 1,1);
INSERT INTO Coment (iduser, data, comentConteudo, idPost, idParentComent) VALUES ('fabioD', '11/12/2010', 'Coment_conteudo_5_teste', 1,2);
INSERT INTO Coment (iduser, data, comentConteudo, idPost, idParentComent) VALUES ('techn', '11/12/2010', 'Coment_conteudo_6_teste', 1,3);


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

INSERT INTO User (id_user, username, password, email ) VALUES (1, 'merlich', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','merlich@veryhot.com');
INSERT INTO User (id_user, username, password, email ) VALUES (2, 'fabioD', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','fabioD@outlook.com');
INSERT INTO User (id_user, username, password, email ) VALUES (3, 'techn', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','techn25@gmail.com');

DROP TABLE IF EXISTS Post;

CREATE TABLE Post (
    id_Post INTEGER  PRIMARY KEY,
    iduser NOT NULL REFERENCES User(id_user),
    data DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    conteudo VARCHAR NOT NULL,
    votesUp INTEGER NOT NULL DEFAULT 0,
    votesDown INTEGER NOT NULL DEFAULT 0,
    totalVotes INTEGER
    
);

INSERT INTO Post (id_Post, iduser, data, conteudo, votesUp, votesDown, totalVotes) VALUES (1, 1, '10/10/2010', 'conteudo1_teste',1,1,0);
INSERT INTO Post (id_Post, iduser, data, conteudo, votesUp, votesDown, totalVotes) VALUES (2, 2, '10/11/2011', 'conteudo2_teste',3,2,0);
INSERT INTO Post (id_Post, iduser, data, conteudo, votesUp, votesDown, totalVotes) VALUES (3, 3, '10/12/2010', 'conteudo3_teste',1,1,0);
INSERT INTO Post (id_Post, iduser, data, conteudo, votesUp, votesDown, totalVotes) VALUES (4, 2, '10/12/2011', 'conteudo4_teste',3,2,0);
INSERT INTO Post (id_Post, iduser, data, conteudo, votesUp, votesDown, totalVotes) VALUES (5, 1, '10/12/2010', 'conteudo5_teste',1,1,0);
INSERT INTO Post (id_Post, iduser, data, conteudo, votesUp, votesDown, totalVotes) VALUES (6, 3, '10/12/2011', 'conteudo6_teste',3,2,0);



DROP TABLE IF EXISTS Coment;

CREATE TABLE Coment (
    id_coment INTEGER PRIMARY KEY,
    iduser INTEGER NOT NULL REFERENCES User(id_user),
    data DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    comentConteudo VARCHAR NOT NULL,
    idPost NOT NULL REFERENCES Post (id_Post),
    idParentComent INTEGER
);

INSERT INTO Coment (id_coment, iduser, data, comentConteudo, idPost, idParentComent) VALUES (1, 1, '11/12/2010', 'Coment_conteudo_1_teste',1, null);
INSERT INTO Coment (id_coment, iduser, data, comentConteudo, idPost, idParentComent) VALUES (2, 2, '11/12/2010', 'Coment_conteudo_2_teste',1, null);
INSERT INTO Coment (id_coment, iduser, data, comentConteudo, idPost, idParentComent) VALUES (3, 3, '11/12/2010', 'Coment_conteudo_3_teste',2, null);
INSERT INTO Coment (id_coment, iduser, data, comentConteudo, idPost, idParentComent) VALUES (4, 1, '11/12/2010', 'Coment_conteudo_4_teste', 1,1);
INSERT INTO Coment (id_coment, iduser, data, comentConteudo, idPost, idParentComent) VALUES (5, 2, '11/12/2010', 'Coment_conteudo_5_teste', 1,2);
INSERT INTO Coment (id_coment, iduser, data, comentConteudo, idPost, idParentComent) VALUES (6, 3, '11/12/2010', 'Coment_conteudo_6_teste', 1,3);


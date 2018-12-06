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
    avatar VARCHAR DEFAULT NULL,
    phone INTEGER
);

INSERT INTO User (username, password, email ) VALUES ('mehrlicht', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','merlich@veryhot.com');
INSERT INTO User (username, password, email ) VALUES ('fabioD', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','fabioD@outlook.com');
INSERT INTO User (username, password, email ) VALUES ('techn', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','techn25@gmail.com');

DROP TABLE IF EXISTS Post;

CREATE TABLE Post (
    idPost INTEGER PRIMARY KEY AUTOINCREMENT,
    iduser VARCHAR NOT NULL REFERENCES User(username),
    data DATE NOT NULL DEFAULT CURRENT_DATE,
    titulo VARCHAR NOT NULL,
    conteudo VARCHAR NOT NULL,
    image VARCHAR DEFAULT NULL
);


INSERT INTO Post (iduser, titulo, conteudo) VALUES ('mehrlicht', 'You know what hackers did when Police showed up at their house?', 'They ransomeware safe');
INSERT INTO Post (iduser, titulo, conteudo) VALUES ('fabioD', 'Found on codecademy', 'There are only two kinds of languages: the ones people complain about and the ones nobody uses');
INSERT INTO Post (iduser, titulo, conteudo) VALUES ('techn', 'yo mama is so fat', '... she weighs -32767 pounds.');
INSERT INTO Post (iduser, titulo, conteudo) VALUES ('fabioD', 'yoooo mama is so fat', 'Yo mama s so fat, SQL Server introduced BIGINT to store her weight');
INSERT INTO Post (iduser, titulo, conteudo) VALUES ('mehrlicht', 'Yo mama is so fat, ', 'even Dijkstra couldn t find a path around her.');
INSERT INTO Post (iduser, titulo, conteudo) VALUES ('techn', 'Your mom s so fat', 'she sat on a binary tree and turned it into a linked list in constant time.');
INSERT INTO Post (iduser, titulo, conteudo) VALUES ('techn', 'Buuuuurn', 'Yo mama s so fat, she needs two pointers.');



DROP TABLE IF EXISTS Coment;

CREATE TABLE Coment (
    id_coment INTEGER PRIMARY KEY AUTOINCREMENT,
    iduser VARCHAR NOT NULL REFERENCES User(username),
    data DATE NOT NULL DEFAULT CURRENT_DATE,
    comentConteudo VARCHAR NOT NULL,
    idPost INTEGER NOT NULL REFERENCES Post(idPost),
    idParentComent INTEGER
);

INSERT INTO Coment (iduser, comentConteudo, idPost, idParentComent) VALUES ('mehrlicht', 'Coment_conteudo_1_teste',1, null);
INSERT INTO Coment (iduser, comentConteudo, idPost, idParentComent) VALUES ('fabioD', 'Coment_conteudo_2_teste',1, null);
INSERT INTO Coment (iduser, comentConteudo, idPost, idParentComent) VALUES ('techn', 'Coment_conteudo_3_teste',2, null);
INSERT INTO Coment (iduser, comentConteudo, idPost, idParentComent) VALUES ('mehrlicht', 'Ohhhhh myyy', 1,1);
INSERT INTO Coment (iduser, comentConteudo, idPost, idParentComent) VALUES ('fabioD', 'Lost my religion now', 1,2);
INSERT INTO Coment (iduser, comentConteudo, idPost, idParentComent) VALUES ('techn', 'I want more of this', 1,3);


DROP TABLE IF EXISTS Votedposts;


CREATE TABLE Votedposts (
    iduser VARCHAR NOT NULL REFERENCES User(username),
    idpost INTEGER NOT NULL REFERENCES Post(idpost),
    votes INTEGER NOT NULL DEFAULT 0, 
    CONSTRAINT id_Votedposts PRIMARY KEY (iduser, idpost)
);


DROP TABLE IF EXISTS Votedcoments;

CREATE TABLE Votedcoments (
    iduser VARCHAR NOT NULL REFERENCES User(username),
    idcoment INTEGER NOT NULL REFERENCES Coment(id_coment),
    votes INTEGER NOT NULL DEFAULT 0, 
    CONSTRAINT id_Votedcoments PRIMARY KEY (iduser, idcoment)
);


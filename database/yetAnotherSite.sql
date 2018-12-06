PRAGMA foreign_keys=ON;

/**
 * USER TABLE
 */
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

/**
 * POST TABLE
 */
DROP TABLE IF EXISTS Post;

CREATE TABLE Post (
    idPost INTEGER PRIMARY KEY AUTOINCREMENT,
    idUser VARCHAR NOT NULL REFERENCES User(username),
    date DATE NOT NULL DEFAULT CURRENT_DATE,
    title VARCHAR NOT NULL,
    content VARCHAR NOT NULL,
    image VARCHAR DEFAULT NULL
);

/**
 * POST VOTES
 */
DROP TABLE IF EXISTS PostVote;

CREATE TABLE PostVote (
    idUser VARCHAR NOT NULL REFERENCES User(username),
    idPost INTEGER NOT NULL REFERENCES Post(idPost),
    vote INTEGER NOT NULL DEFAULT 0, 
    CONSTRAINT idPostVote PRIMARY KEY (idUser, idPost)
);

/**
 * COMENTS TABLE
 */
DROP TABLE IF EXISTS Coment;

CREATE TABLE Coment (
    id_coment INTEGER PRIMARY KEY AUTOINCREMENT,
    iduser VARCHAR NOT NULL REFERENCES User(username),
    data DATE NOT NULL DEFAULT CURRENT_DATE,
    comentConteudo VARCHAR NOT NULL,
    idPost INTEGER NOT NULL REFERENCES Post(idPost),
    idParentComent INTEGER
);

/**
 * COMENTS VOTES TABLE
 */
DROP TABLE IF EXISTS Votedcoments;

CREATE TABLE Votedcoments (
    iduser VARCHAR NOT NULL REFERENCES User(username),
    idcoment INTEGER NOT NULL REFERENCES Coment(id_coment),
    votes INTEGER NOT NULL DEFAULT 0, 
    CONSTRAINT id_Votedcoments PRIMARY KEY (iduser, idcoment)
);


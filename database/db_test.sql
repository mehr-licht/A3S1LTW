INSERT INTO User (username, password, email ) VALUES ('mehrlicht', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','merlich@veryhot.com');
INSERT INTO User (username, password, email ) VALUES ('fabioD', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','fabioD@outlook.com');
INSERT INTO User (username, password, email ) VALUES ('techn', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','techn25@gmail.com');

INSERT INTO Post (idUser, title, content) VALUES ('mehrlicht', 'You know what hackers did when Police showed up at their house?', 'They ransomeware safe');
INSERT INTO Post (idUser, title, content) VALUES ('fabioD', 'Found on codecademy', 'There are only two kinds of languages: the ones people complain about and the ones nobody uses');
INSERT INTO Post (idUser, title, content) VALUES ('techn', 'yo mama is so fat', '... she weighs -32767 pounds.');
INSERT INTO Post (idUser, title, content) VALUES ('fabioD', 'yoooo mama is so fat', 'Yo mama s so fat, SQL Server introduced BIGINT to store her weight');
INSERT INTO Post (idUser, title, content) VALUES ('mehrlicht', 'Yo mama is so fat, ', 'even Dijkstra couldn t find a path around her.');
INSERT INTO Post (idUser, title, content) VALUES ('techn', 'Your mom s so fat', 'she sat on a binary tree and turned it into a linked list in constant time.');
INSERT INTO Post (idUser, title, content) VALUES ('techn', 'Buuuuurn', 'Yo mama s so fat, she needs two pointers.');

INSERT INTO PostVote(idPost, idUser, vote) VALUES (1, 'fabioD', 1);
INSERT INTO PostVote(idPost, idUser, vote) VALUES (2, 'fabioD', -1);
INSERT INTO PostVote(idPost, idUser, vote) VALUES (3, 'mehrlicht', 1);
INSERT INTO PostVote(idPost, idUser, vote) VALUES (1, 'techn', 1);
INSERT INTO PostVote(idPost, idUser, vote) VALUES (1, 'mehrlicht', 1);

INSERT INTO Coment (idUser, comentContent, idPost, idParentComent) VALUES ('mehrlicht', 'Coment_conteudo_1_teste',1, null);
INSERT INTO Coment (idUser, comentContent, idPost, idParentComent) VALUES ('fabioD', 'Coment_conteudo_2_teste',1, null);
INSERT INTO Coment (idUser, comentContent, idPost, idParentComent) VALUES ('techn', 'Coment_conteudo_3_teste',2, null);
INSERT INTO Coment (idUser, comentContent, idPost, idParentComent) VALUES ('mehrlicht', 'Ohhhhh myyy', 1,1);
INSERT INTO Coment (idUser, comentContent, idPost, idParentComent) VALUES ('fabioD', 'Lost my religion now', 1,2);
INSERT INTO Coment (idUser, comentContent, idPost, idParentComent) VALUES ('techn', 'I want more of this', 1,3);
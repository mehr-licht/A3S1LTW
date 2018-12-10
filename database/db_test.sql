INSERT INTO User (username, password, email ) VALUES ('mehrlicht', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','merlich@veryhot.com');
INSERT INTO User (username, password, email ) VALUES ('fabioD', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','fabioD@outlook.com');
INSERT INTO User (username, password, email ) VALUES ('techn', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220','techn25@gmail.com');

INSERT INTO Post (idUser, title, content) VALUES ('mehrlicht', 'You know what hackers did when Police showed up at their house?', 'They ransomeware safe');
INSERT INTO Post (idUser, title, content) VALUES ('fabioD', 'Found on codecademy', 'There are only two kinds of languages: the ones people complain about and the ones nobody uses');
INSERT INTO Post (idUser, title, content) VALUES ('techn', 'yo mama is so fat', '... she weighs -32767 pounds.');
INSERT INTO Post (idUser, title, content) VALUES ('fabioD', 'yoooo mama is so fat', 'Yo mama s so fat, SQL Server introduced BIGINT to store her weight');
INSERT INTO Post (idUser, title, content) VALUES ('mehrlicht', 'Yo mama is so fat, ', 'even Dijkstra couldn t find a path around her.');
INSERT INTO Post (idUser, title, content) VALUES ('techn', 'Your mom s so fat', 'she sat on a binary tree and turned it into a linked list in constant time.');
INSERT INTO Post (idUser, title, content) VALUES ('fabioD', 'curabitur at ipsum ac tellus semper interdum mauris ullamcorper purus sit amet nulla quisque arcu libero rutrum ac lobortis', 'Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.');
INSERT INTO Post (idUser, title, content) VALUES ('fabioD', 'quis turpis sed ante vivamus tortor duis mattis', 'Yo mama s so fat, she needs two pointers.');
INSERT INTO Post (idUser, title, content) VALUES ('techn', 'So many paragraphs', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.
Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.

Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.

Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.

Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.

Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.

Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.');

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
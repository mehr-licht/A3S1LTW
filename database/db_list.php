<?php
include_once('database.php');
// ##############################################################   Coments Votes Managing ###############################
/**
 * @brief Checks if user voted in this post
 * @param username a procurar
 * @param idComent o id do coment a procurar
 * @return return true if a line exists
 */
function can_user_voteComent($username, $idComent){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM  Votedcoments where iduser = ? AND idcoment = ?');
    $stmt->execute(array(
        $username,
        $idPost
    ));
    return $stmt->fetch() ? true : false; // return true if a line exists
}

/**
 * @brief Upvotes a Post
 * @param username de quem vota no coment
 * @param idcoment o id do coment que leva o voto
 */
function upvoteComent($username, $idcoment){
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Votedcoments(iduser, idcoment, votes) VALUES( ?, ?, 1)');
    $stmt->execute(array(
        $username,
        $idcoment
    ));
}

/**
 * @brief downvotes a Post
 * @param username de quem vota
 * @param idcoment o id do coment que leva o voto
 */
function downVoteComent($username, $idcoment){
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Votedcoments(iduser, idcoment, votes) VALUES( ?, ?, -1)');
    $stmt->execute(array(
        $username,
        $idcoment
    ));
}

//##########################################################################  END COMMENTS MANAGER

//##########################################################################  Posts MANAGER ############################
/**
 * @brief Checks if user voted in this post
 * @param username a procurar
 * @param idPost o id do post a procurar
 * @return return true if a line exists
 */
function can_user_votePost($username, $idPost){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM  VotedPosts where iduser = ? AND idpost = ?');
    $stmt->execute(array(
        $username,
        $idPost
    ));
    return $stmt->fetch() ? true : false; // return true if a line exists
}


/**
 * @brief Upvotes a Post
 * @param username de quem vota
 * @param idPost o id do post que leva o voto
 */
function upvotePost($username, $idPost){
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Votedposts(iduser, idpost, votes) VALUES( ?, ?, 1)');
    $stmt->execute(array(
        $username,
        $idPost
    ));
}

/**
 * @brief downvotes a Post
 * @param username de quem vota
 * @param idPost o id do post que leva o voto
 */
function downVotePost($username, $idPost){
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Votedposts(iduser, idpost, votes) VALUES( ?, ?, -1)');
    $stmt->execute(array(
        $username,
        $idPost
    ));
}


/** --------------------------------------------------------------------------- USER
 * @brief Returns all User's information of a certain user. - UPDATED
 * @param username
 * @return username, sha1 and email
 */
function getUserInformation($username){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM User WHERE username = ?');
    $stmt->execute(array(
        $username
    ));
    return $stmt->fetchAll();
}

/**
 * @brief Returns information if user posted something. -UPDATED
 * @param  username
 * @return TRUE OR FALSE if the user has posts
 */
function getUserPost($username, $idPost){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idPost, iduser, data, conteudo, votesUp, votesDown FROM Post WHERE  iduser = ?');
    $stmt->execute(array(
        $username
    ));
    return $stmt->fetch() ? true : false; // return true if a line exists
}

/**
 * @brief Returns All POSTS in db order by date
 * @param
 * @return all table information from Posts
 */
function getAllPostsUSER($username){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idPost, iduser, data, conteudo, votesUp, votesDown FROM Post WHERE  iduser = ?');
    $stmt->execute(array(
        $username
    ));
    return $stmt->fetchAll();
}

/**
 * 
 */
function getPostByID($postID) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Post WHERE idPost = ?');
    $stmt->execute(array($postID));
    return $stmt->fetch();
}

/**
 * @brief Returns all Comment's Information belonging to a certain Post.
 * @param id post que tem comentarios que desejamos ver
 * @return all coments
 */
function getComents($idPost){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Coment WHERE idParentComent = ?');
    $stmt->execute(array(
        $idPost
    ));
    return $stmt->fetchAll();
}


/** --------------------------------------------------------------------------------  POST
 * Inserts a new Post into the database.
 * @param iduser, data, conteudo
 * @param data,
 * @param conteudo  - needs confirmation
 */
function insertPost($iduser, $titulo, $conteudo){
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Post(iduser, titulo, conteudo) VALUES(?, ?, ?)');
    $stmt->execute(array(
        $iduser,
        $titulo,
        $conteudo
    ));
}

/**
 * Inserts a new Coment into a POST.
 * @param iduser,    
 * @param data,
 * @param comentConteudo,
 * @param idPost,
 * @param idParentComent
 */
function insertComent($iduser, $data, $comentConteudo, $idPost){
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Coment VALUES(?, ?, ?, NULL)');
    $stmt->execute(array(
        $iduser,
        $data,
        $comentConteudo,
        $idPost
    ));
}

/**
 * Inserts a new Coment into a COMENT.
 * @param iduser,    
 * @param data,
 * @param comentConteudo,
 * @param idPost,
 * @param idParentComent
 */
function insertComentIntoComent($iduser, $data, $comentConteudo, $idPost, $idParentComent){
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Coment VALUES(?, ?, ?, ?)');
    $stmt->execute(array(
        $iduser,
        $data,
        $comentConteudo,
        $idPost,
        $idParentComent
    ));
}


/**
 * Returns a certain item from the database.
 */
function getItem($item_id){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM item WHERE item_id = ?');
    $stmt->execute(array(
        $item_id
    ));
    return $stmt->fetch();
}
/**
 * Deletes a certain item from the database.
 */
function deleteItem($item_id){
    $db = Database::instance()->db();
    $stmt = $db->prepare('DELETE FROM item WHERE item_id = ?');
    $stmt->execute(array(
        $item_id
    ));
}
?>
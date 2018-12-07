<?php
include_once('database.php');

/*
 * @brief Returns all Posts sorted by date (from newer to older) alonside it's votes number
 * 
 * @return [[
 *  	'idPost' => The post ID
 * 		'idUser' => The user's username who published the post
 * 		'date' => The date when the post was published
 * 		'title' => The post's title
 * 		'content' => The post's content
 * 		'image' => The image path for the post
 * 		'points' => The total points for the post
 * ]]
 */
function getAllPostsOrderByDate(){
    $db = Database::instance()->db();
    $stmt = $db->prepare(
        'SELECT * FROM Post as P LEFT JOIN (SELECT idPost, sum(vote) as points FROM PostVote GROUP BY idPost) as V 
        ON P.idPost = V.idPost
        ORDER BY date DESC'
    );
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Gets post information given an ID
 * @param $postID
 * @return [
 * 		'idPost' =>
 * 		'idUser' =>
 * 		'date' =>
 * 		'title' =>
 * 		'content' =>
 * 		'image' =>
 * ]
 */
function getPostByID($postID) {
    $db = Database::instance()->db();
    $stmt = $db->prepare(
        'SELECT * FROM Post as P LEFT JOIN (SELECT idPost, sum(vote) as points FROM PostVote GROUP BY idPost) as V 
        ON P.idPost = V.idPost
        WHERE P.idPost = ?'
    );
    $stmt->execute(array($postID));
    return $stmt->fetch();
}

/**
 * Returns the user vote for some post
 * @param $idPost The post for which the vote is required
 * @param $username The username
 * @return int If the user has voted, it returns either -1 (downvote) or 1 (upvote). Otherwise, 0 is returned
 */
function getPostVoteByUser($idPost, $username){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT vote FROM PostVote WHERE idUser = ? AND idPost = ?');
    $stmt->execute(array(
        $username,
        $idPost
	));
	$res =  $stmt->fetch();
    return $res ? $res['vote'] : 0; // return true if a line exists
}

/**
 * THIS WILL PROBABLY BECOME A REST API
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
 * THIS WILL PROBABLY BECOME A REST API
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

?>
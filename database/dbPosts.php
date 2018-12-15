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
        'SELECT P.idPost, P.idUser, P.date, P.title, P.content, P.image, V.points
        FROM Post as P 
        LEFT JOIN (SELECT idPost, sum(vote) as points FROM PostVote GROUP BY idPost) as V ON P.idPost = V.idPost
        ORDER BY date DESC'
    );
    $stmt->execute();
    return $stmt->fetchAll();
}

/*
 * @brief Returns all Posts sorted by the total of votes (from highest to lowest) alonside it's votes number
 * Same as the getAllPostsOrderByDate() fuction
 */
function getAllPostsOrderByMostVoted(){
    $db = Database::instance()->db();
    $stmt = $db->prepare(
        'SELECT P.idPost, P.idUser, P.date, P.title, P.content, P.image, V.points
        FROM Post as P 
        LEFT JOIN (SELECT idPost, sum(vote) as points FROM PostVote GROUP BY idPost) as V ON P.idPost = V.idPost
        ORDER BY points DESC'
    );
    $stmt->execute();
    return $stmt->fetchAll();
}
/*
 * @brief Returns all Posts sorted by the total of comments (from highest to lowest) alonside it's votes number
 * Same as the getAllPostsOrderByDate() fuction
 */
function getAllPostsOrderByMostComent(){
    $db = Database::instance()->db();
    $stmt = $db->prepare(
        'SELECT P.idPost, P.idUser, P.date, P.title, P.content, P.image, V.points
        FROM Post as P 
        LEFT JOIN (SELECT idPost, sum(vote) as points FROM PostVote GROUP BY idPost) as V ON P.idPost = V.idPost
        LEFT JOIN (SELECT idPost, COUNT(idComent) as pt FROM Coment GROUP BY idPost) as Z ON P.idPost = Z.idPost 
        ORDER BY Z.pt DESC'
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
 * Tells wether a specific has already voted in some post or not
 * @param $idPost The post for which the information is required
 * @param $username The user's ID (username)
 * @return Returns true if user already voted, else returns false
 */
function hasUserVotedInPost($idPost, $username) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT vote FROM PostVote WHERE idUser = ? AND idPost = ?');
    $stmt->execute(array(
        $username,
        $idPost
    ));
    $res =  $stmt->fetch();
    return $res ? true : false;
}

/**
 * Updates an user vote in some post
 * @return Returns true upon success, false otherwise 
 */
function updatePostVote($idPost, $username, $vote) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('UPDATE PostVote SET vote = ? WHERE idUser = ? AND idPost = ?');
    
    return $stmt->execute(array(
        $vote,
        $username,
        $idPost
    ));

}

/**
 * Records a new user vote on some post in the database
 * @return Returns true upon success, false otherwise
 */
function addPostVote($idPost, $username, $vote) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO PostVote(idUser, idPost, vote) VALUES(?, ?, ?)');
    
    return $stmt->execute(array(
        $username,
        $idPost,
        $vote
    ));
}

/**
 * @brief Returns all Comment's Information belonging to a certain Post, alongside it's author information
 * @param idPost post que tem comentarios que desejamos ver
 * @return Array [
 *      
 * ]
 */
function getCommentsByPost($idPost){
    
    $db = Database::instance()->db();
    $stmt = $db->prepare(
        'SELECT *
        FROM Coment
        WHERE Coment.idPost = ?
        ORDER BY data desc'
    );
    $stmt->execute(array(
        $idPost
    ));
   
    return $stmt->fetchAll();
}

function getCommentById($idComment) {
    $db = Database::instance()->db();
    $stmt = $db->prepare(
        'SELECT *
        FROM Coment
        WHERE Coment.idComent = ?'
    );
    $stmt->execute(array($idComment));
    return $stmt->fetch();
}

/** --------------------------------------------------------------------------------  POST
 * Inserts a new Post into the database.
 * @param iduser, data, conteudo
 * @param today, data of the post published
 * @param titulo, post title
 * @param conteudo, post main text
 */
function insertPost($iduser, $today, $titulo, $conteudo, $url=null){
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Post(idUser, date, title,  content, image) VALUES(?, ?, ?, ?, ?)');
    $stmt->execute(array(
        $iduser,
        $today,
        $titulo,
        $conteudo,
        $url
    ));
}


// function insertComment($idUser, $date, $commentCont, $idPost, $idParentComent){
//     if(is_null($date))
//         $date = date('Y-m-d');
    
//     $db = Database::instance()->db();
//     $stmt = $db->prepare('INSERT INTO Coment(idUser, data, comentContent, idPost, idParentComent) VALUES(?, ?, ?, ?, ?)');
//     $stmt->execute(array(
//         $idUser,
//         $date,
//         $commentCont,
//         $idPost,
//         $idParentComent
//     ));
// }
/**
 * Inserts a new Coment into a POST
 * @param iduser,    
 * @param data,
 * @param comentConteudo,
 * @param idPost,
 * @param idParentComent
 * 
 * @return Integer Returns the ID for the newly created comment
 */
function insertComment($idPost, $idUser, $comment, $date = NULL){
    if(is_null($date))
        $date = date('Y-m-d');
    
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Coment(idPost, idUser, data, comentContent) VALUES(?, ?, ?, ?)');
    $stmt->execute(array(
        $idPost,
        $idUser,
        $date,
        $comment
    ));

    return $db->lastInsertId();
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
 * searches for a user in the database.
 * @param search 
 * @return idUser/username   
 */
function searchUser($search){
    $param = "%$search%";
    $db = Database::instance()->db();
    $stmt = $db->prepare('select username from user where username like ?');
    $stmt->execute(array($param));
    return $stmt->fetchAll();
}


/**
 * searches for the pattern in the Comment contents.
 * @param search  
 * @return idComent  
 */
function searchComments($search){
    $param = "%$search%";
    $db = Database::instance()->db();
    $stmt = $db->prepare('select * from coment where comentContent like ?');
    $stmt->execute(array($param));
    return $stmt->fetchAll();
}

/**
 * searches for the pattern in both Post titles and contents.
 * @param search 
 * @return idPost   
 */
function searchPosts($search){
    $param = "%$search%";
    $db = Database::instance()->db();
    $stmt = $db->prepare('select * from post where title like ? or content like ?');
    $stmt->execute(array($param, $param));
    return $stmt->fetchAll();
}

/**
 * Erases html and Php tags
 */
function trimAndStripHtmlPHPtags($words){
    return trim(strip_tags($words)); 
}

?>
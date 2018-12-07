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

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
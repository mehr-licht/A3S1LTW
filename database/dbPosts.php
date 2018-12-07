<?php
include_once('database.php');

/**---------------------------------------------------------------------------------- Comment
 * @brief Returns all POSTs information froma certain USER -UPDATED
 * @param  username
 * @return all POSTS belonging to $username
 */
function getAllPostsOrderByDate(){
    $db = Database::instance()->db();
    $stmt = $db->prepare(
        'SELECT * FROM Post as P LEFT JOIN (SELECT idPost, sum(vote) as votes FROM PostVote GROUP BY idPost) as V 
        ON P.idPost = V.idPost
        ORDER BY date DESC'
    );
    $stmt->execute();
    return $stmt->fetchAll();
}
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
        'SELECT * 
        FROM Post, User, PostVote 
        ORDER BY data DESC'
    );
    $stmt->execute();
    return $stmt->fetchAll();
}
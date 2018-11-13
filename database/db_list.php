<?php
  include_once('../includes/database.php');
  
  
  /** --------------------------------------------------------------------------- USER
   * @brief Returns all User's information of a certain user. - UPDATED
   * @param username
   * @return username, sha1 and email
   */
  function getUserInformation($username) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM User WHERE username = ?');
    $stmt->execute(array($username));
    return $stmt->fetchAll(); 
  }
    /**
     * @brief Returns information if user posted something. -UPDATED
     * @param  username
     * @return TRUE OR FALSE if the user has posts
     */
  function getUserPost($username, $idPost) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idPost, iduser, data, conteudo, votesUp, votesDown FROM Post WHERE  iduser = ?');
    $stmt->execute(array($username));
    return $stmt->fetch()?true:false; // return true if a line exists
  }

  /**
   * @brief Returns All POSTS in db order by date
   * @param
   * @return all table information from Posts
   */
  function getAllPostsByDate() {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idPost, iduser, data, conteudo, votesUp, votesDown FROM Post WHERE  iduser = ?');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
  }



  /**---------------------------------------------------------------------------------- Comment
     * @brief Returns all POSTs information froma certain USER -UPDATED
     * @param  username
     * @return all POSTS belonging to $username
     */
    function getAllPostsUSER($username) {
      $db = Database::instance()->db();
      $stmt = $db->prepare('SELECT idPost, iduser, data, conteudo, votesUp, votesDown FROM Post ORDER BY data DESC');
      $stmt->execute(array($username));
      return $stmt->fetchAll();
    }


  /**
   * @brief Returns all Comment's Information belonging to a certain Post.
   * @param id post que tem comentarios que desejamos ver
   * @return all coments
   */
  function getAllComentsBelogingToPOST($idPost) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Coment WHERE idParentComent = ?');
    $stmt->execute(array($idPost));
    return $stmt->fetchAll(); 
  }


  /** --------------------------------------------------------------------------------  POST
   * Inserts a new Post into the database.
   * @param iduser, data, conteudo
   * @param data,
   * @param conteudo  - needs confirmation
   */
  function insertPost($iduser, $data, $conteudo) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Post VALUES(?, ?, ?,0,0,0)');
    $stmt->execute(array($iduser, $data, $conteudo,));
  }
  
  /**
   * Inserts a new Coment into a POST.
   * @param iduser,    
   * @param data,
   * @param comentConteudo,
   * @param idPost,
   * @param idParentComent
   */
  function insertComent($iduser, $data, $comentConteudo, $idPost) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Coment VALUES(?, ?, ?, NULL)');
    $stmt->execute(array($iduser, $data, $comentConteudo, $idPost));
  }

  /**
   * Inserts a new Coment into a COMENT.
   * @param iduser,    
   * @param data,
   * @param comentConteudo,
   * @param idPost,
   * @param idParentComent
   */
  function insertComentIntoComent($iduser, $data, $comentConteudo, $idPost,$idParentComent ) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Coment VALUES(?, ?, ?, ?)');
    $stmt->execute(array($iduser, $data, $comentConteudo, $idPost,$idParentComent));
  }


  /**
   * Returns a certain item from the database.
   */
  function getItem($item_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM item WHERE item_id = ?');
    $stmt->execute(array($item_id));
    return $stmt->fetch();
  }
  /**
   * Deletes a certain item from the database.
   */
  function deleteItem($item_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('DELETE FROM item WHERE item_id = ?');
    $stmt->execute(array($item_id));
  }
?>
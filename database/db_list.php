<?php
  include_once('../includes/database.php');
  
  
  /** --------------------------------------------------------------Tabel USER
   * @brief Returns all User's information of a certain user. - UPDATED
   * @ UPDATED and TESTED
   */
  function getUserLists($username) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM User WHERE username = ?');
    $stmt->execute(array($username));
    return $stmt->fetchAll(); 
  }
    /**
     * @brief Returns all Post's information  from a certain User. -UPDATED
     * @ UPDATED and TESTED
     */
  function checkIsListOwner($username, $list_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT Post.id_Post, Post.iduser, Post.data, Post.conteudo, Post.votesUp, Post.votesDown FROM User, Post WHERE User.username = ? AND Post.iduser = User.id_user AND Post.id_Post = ?');
    $stmt->execute(array($username, $list_id));
    return $stmt->fetch()?true:false; // return true if a line exists
  }



  /** --------------------------------------------------------------
   * @brief Returns all Comment's Information belonging to a certain Post.
   * @ UPDATED and TESTED
   */
  function getListItems($list_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Coment WHERE idParentComent = ?');
    $stmt->execute(array($list_id));
    return $stmt->fetchAll(); 
  }

  /**
   * Inserts a new list into the database.
   */
  function insertList($list_name, $username) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO list VALUES(NULL, ?, ?)');
    $stmt->execute(array($list_name, $username));
  }
  
  /**
   * Inserts a new item into a list.
   */
  function insertItem($item_text, $list_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO item VALUES(NULL, ?, 0, ?)');
    $stmt->execute(array($item_text, $list_id));
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
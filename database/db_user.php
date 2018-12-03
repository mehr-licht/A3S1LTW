<?php
  include_once('database.php');
  /**
   * @brief Verifies if a certain username, AND  password combination
   *  exists in the database. Use the sha1 hashing function.
   *  UPDATED 
   * TODO - not sure about the sha1 - NEEDS VERIFICATION ON RUNNING WEBSITE 
   */

  function checkUserPassword($username, $password) {
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * FROM User WHERE username = ? and password = ?");
    $stmt->execute(array($username, sha1($password)));
    return $stmt->fetch()?true:false; // return true if a line exists
  }

  /**
   * @brief Returns true if th $username is already in the databa
  */
  function checkUsername($username){
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * FROM User WHERE username = ?");
    $stmt->execute(array($username));
    return $stmt->fetch()?true:false;
  }

  function checkUserEmail($email){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM User WHERE email = ?');
    $stmt->execute(array($email));
    return $stmt->fetch()?true:false;
  }
  /**
   * @brief Inserts new user in table User -Updated and running
   * 
   */

  function insertUser($username, $password, $email){
      $db = Database::instance()->db();
      $stmt = $db->prepare("INSERT INTO User VALUES(?, ?, ?)");
      $stmt->execute(array($username, $password, $email));
  }
?>

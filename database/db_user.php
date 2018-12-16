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
    $stmt = $db->prepare('SELECT * FROM User WHERE username = ? and password = ?');
    $stmt->execute(array($username, sha1($password)));
    return $stmt->fetch()?true:false; // return true if a line exists
  }

  /**
   * @brief Returns true if th $username is already in the databa
  */
  function checkUsername($username){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM User WHERE username = ?');
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
      $stmt = $db->prepare('INSERT INTO User (username, password, email ) VALUES(?, ?, ?)');
      $stmt->execute(array($username, sha1($password), $email));
  }

/**
   * @brief Updates the user info in table User 
   * 
   */

  function updateUser($username, $email, $name, $street, $zip,$birthday, $city, $country, $phone){
    $db = Database::instance()->db();
    $stmt = $db->prepare("UPDATE User SET email = ?,name= ?,street= ?, zipcode= ?, birthday=?,
    city = ?, country = ?, phone = ? WHERE username = ?");
    $stmt->execute(array($email, $name, $street, $zip, $birthday,$city, $country, $phone, $username));//avatar e passes à parte
  }

  function updatePass($username,$pass){
    $db = Database::instance()->db();
    $stmt = $db->prepare("UPDATE User SET password = ? WHERE username = ?");
    $stmt->execute(array(sha1($pass), $username));
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

/** --------------------------------------------------------------------------- USER
 * @brief Returns all User's information of a certain user. - UPDATED
 * @param username
 * @return username, sha1 and email
 */
function getUserFromEmail($email){
  $db = Database::instance()->db();
  $stmt = $db->prepare('SELECT username FROM User WHERE email = ?');
  $stmt->execute(array(
      $email
  ));
  return $stmt->fetchColumn();
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
  $stmt = $db->prepare('SELECT distinct Post.idPost, Post.idUser, date, title, content, vote image FROM Post join PostVote on (PostVote.idUser = Post.idUser) WHERE Post.iduser =  ?');
  $stmt->execute(array(
      $username
  ));
  return $stmt->fetchAll();
}

/**
* @brief Returns All Comments in db order by date
* @param
* @return all table information from Comments
*/
function getAllCommentsUSER($username){
  $db = Database::instance()->db();
  $stmt = $db->prepare('SELECT distinct coment.idComent, coment.idUser, coment.data, idPost, coment.comentContent FROM Coment  WHERE  coment.iduser = ?');
  $stmt->execute(array(
      $username
  ));
  return $stmt->fetchAll();
}

/*
idComent INTEGER PRIMARY KEY AUTOINCREMENT,
    idUser VARCHAR NOT NULL REFERENCES User(username),
    data DATE NOT NULL DEFAULT CURRENT_DATE,
    comentContent VARCHAR NOT NULL,
    idPost INTEGER NOT NULL REFERENCES Post(idPost),
    idParentComent */

?>

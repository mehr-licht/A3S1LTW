<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');
  
  
  if(!checkUsername($_POST['username'])){
      $_SESSION['ERROR'] = 'Username not in our database';
      header("Location:".$_SERVER['HTTP_REFERER']."");
  }
  /*
  elseif(checkUserEmail($_POST['email'])   ){
    $_SESSION['ERROR'] = 'Email already in use';
    header("Location:".$_SERVER['HTTP_REFERER']."");
  }

  elseif($_POST['password'] != $_POST['password2'] ) {
    $_SESSION['ERROR'] = 'No match passwords';
    header("Location:".$_SERVER['HTTP_REFERER']."");
  }*/

  /*
    // Don't allow certain characters
  if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/signup.php'));
  }
*/

  try {
    updateUser($_POST['username'], $_POST['email'], $_POST['name'], $_POST['street'], $_POST['zipcode'], $_POST['city'], $_POST['country'], $_POST['phone']);
    //updateUserPass($_POST['username'], $_POST['pass1'], $_POST['pass2']);
    //updateUserAvatar($_POST['username'], $_POST['avatar']);
    // insertUser($_POST['username'],$_POST['email'],  $_POST['email']);
    //  $_SESSION['username'] = $username;
      $_SESSION['messages'][] = array('type' => 'success', 'content' => 'database updated!');
      header('Location: ../pages/profile.php'); 
  } catch (PDOException $e) {
      die($e->getMessage("error updatating database"));
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
      header('Location: ../pages/login.php');
  }
  echo 'profile updated';
?>
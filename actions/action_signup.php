<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');
  
  

  if(checkUsername($_POST['username'])){
      $_SESSION['ERROR'] = 'Username already';
      header("Location:".$_SERVER['HTTP_REFERER']."");
  }
  
  elseif(checkUserEmail($_POST['email'])){
    $_SESSION['ERROR'] = 'Email already in use';
    header("Location:".$_SERVER['HTTP_REFERER']."");
  }

  elseif($_POST['password'] != $_POST['password2'] ) {
    $_SESSION['ERROR'] = 'No match passwords';
    header("Location:".$_SERVER['HTTP_REFERER']."");
  }
    // Don't allow certain characters
  if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/signup.php'));
  }

  try {
      insertUser($_POST['username'],$_POST['email'],  $_POST['email']);
      $_SESSION['username'] = $username;
      $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
      header('Location: ../pages/profile.php'); 
  } catch (PDOException $e) {
      die($e->getMessage("MAmamma uuuuuuhhhhh"));
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
      header('Location: ../pages/login.php');
  }
?>
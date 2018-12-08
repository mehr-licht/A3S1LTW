<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');
  include_once('../database/db_list.php');

  //die($_POST['name']);//DEBUG purposes only - delete when ready
  
  /*
  if(!checkUsername($_POST['username'])){
      $_SESSION['ERROR'] = 'Username not in our database';
      header("Location:".$_SERVER['HTTP_REFERER']."");
  }*/


  $username = $_SESSION['username'];


/**
 * Allow only one user per email
 */
 if(checkUserEmail($_POST['email'])  && getUserInformation($username)[0]['email'] != $_POST['email'] ){
    $_SESSION['ERROR'] = 'Email already in use';
    die(header('Location: '.$_SERVER['HTTP_REFERER']));
  }
/*
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

/*
only allows possible characters for dates
*/
$birthday = preg_replace("/[^0-9\-]/", "",$_POST['birthday']);
/*
if not a valid gregorian date (note that both YYYY-mm-dd and dd-mm-YYYY are accepted)
*/
if (checkdate(date('d', strtotime($birthday)) ,date('m', strtotime($birthday)) ,date('Y', strtotime($birthday)))){
  $_SESSION['messages'][] = array('type' => 'error', 'content' => 'invalid date!');
  die(header('Location: ../pages/profile.php')); 
};


  try {
    updateUser($_SESSION['username'], $_POST['email'], $_POST['name'], $_POST['street'], $_POST['zipcode'],$birthday,
     $_POST['city'], $_POST['country'], $_POST['phone']);
      $_SESSION['messages'][] = array('type' => 'success', 'content' => 'database updated!');
      header('Location: ../pages/profile.php'); 
  } catch (PDOException $e) {
      die($e->getMessage("error updatating database"));
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update database!');
      header('Location: ../pages/login.php');
  }
 
?>
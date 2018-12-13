<?php
  include_once '../includes/session.php';
  include_once '../database/db_user.php';
  include_once '../includes/csrf.class.php';
 
  $csrf = new csrf();
   
  // Generate Token Id and Valid
  $token_id = $csrf->get_token_id();
  $token_value = $csrf->get_token($token_id);
  if($csrf->check_valid('post')) {
    var_dump($_POST[$token_id]);
  } else {
    echo 'Not Valid';
  }

  
  if(   !isset($_SESSION['username'])   ){
    die(header('Location: ../pages/login.php'));
    }

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

//Filtering unexpected characters : removed all html and php tags as well\t \n \r \0 \x0B  
$newEmail    =  trim(   strip_tags($_POST['email']) );
$newName    =   trim(   strip_tags($_POST['name']) );
$newStreet  =   trim(   strip_tags($_POST['street']) );
$newZipc    =   trim(   strip_tags($_POST['zipcode']) );
$newCity    =   trim(   strip_tags($_POST['city']) );
$newCountry =   trim(   strip_tags($_POST['country']) );
$newBirth   =   trim(   strip_tags($_POST['birthday']) );
$newphone   =   trim(   strip_tags($_POST['phone'])); 

if($newBirth != ""){
  //only allows possible characters for dates
  $birthday = preg_replace("/[^0-9\-]/", "",$_POST['birthday']);

  //if not a valid gregorian date (note that both YYYY-mm-dd and dd-mm-YYYY are accepted)
  if (!checkdate(date('d', strtotime($birthday)) ,date('m', strtotime($birthday)) ,date('Y', strtotime($birthday)))){
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'invalid date!');
    die(header('Location: ../pages/profile.php')); 
  };
}

//Check for a string only with digits
if( !ctype_digit($newphone) ){
  $newphone = " ";
  $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Error on field phone number !');
  header('Location: ../pages/profile.php');
}

  try {
    updateUser($_SESSION['username'], $newEmail , $newName, $newStreet, $newZipc, $birthday,
    $newCity, $newCountry, $newphone);
      $_SESSION['messages'][] = array('type' => 'success', 'content' => 'database updated!');
      header('Location: ../pages/profile.php'); 
  } catch (PDOException $e) {
      die($e->getMessage("error updating database"));
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update database!');
      header('Location: ../pages/login.php');
  }
 
?>
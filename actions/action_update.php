<?php
  include_once '../includes/session.php';
  include_once '../database/db_user.php';
  
 
  if (!isset($_SESSION['token_id'])) {
    $idSession = $_SESSION['token_id'];
    if (!validateToken($idSession, $_POST[$idSession])) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'invalid session token!');
        die(header('Location: ../pages/login.php'));
    }
}
  
  if(   !isset($_SESSION['username'])   ){
    die(header('Location: ../pages/login.php'));
    }

$username = $_SESSION['username'];

/**
 * Allow only one user per email
 */
try{
  $emailExists = checkUserEmail($_POST['email']);
} catch (PDOException $e) {
  die($e->getMessage("error updating database"));
  $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to check data!');
  header('Location: ../pages/login.php');
}
try{
  $isSameEmail = getUserInformation($username)[0]['email'];
} catch (PDOException $e) {
  die($e->getMessage("error updating database"));
  $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to get data!');
  header('Location: ../pages/login.php');
}


 if( $emailExists && $isSameEmail != $_POST['email'] ){
    $_SESSION['ERROR'] = 'Email already in use';
    die(header('Location: '.$_SERVER['HTTP_REFERER']));
  }

//Filtering unexpected characters : removed all html and php tags as well\t \n \r \0 \x0B  
$newEmail    =  trimAndStripHtmlPHPtags($_POST['email']);
$newName    =   trimAndStripHtmlPHPtags($_POST['name']);
$newStreet  =   trimAndStripHtmlPHPtags($_POST['street']);
$newZipc    =   trimAndStripHtmlPHPtags($_POST['zipcode']);
$newCity    =   trimAndStripHtmlPHPtags($_POST['city']);
$newCountry =   trimAndStripHtmlPHPtags($_POST['country']);
$newBirth   =   trimAndStripHtmlPHPtags($_POST['birthday']);
$newphone   =   trimAndStripHtmlPHPtags($_POST['phone']); 

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
      die(header('Location: ../pages/login.php'));
  }
 
?>
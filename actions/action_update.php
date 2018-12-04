<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');
  include_once('../database/db_list.php');
/*
  die($_POST['username']);//DEBUG purposes only - delete when ready
  
  if(!checkUsername($_POST['username'])){
      $_SESSION['ERROR'] = 'Username not in our database';
      header("Location:".$_SERVER['HTTP_REFERER']."");
  }

  if(checkUsername($_POST['username']) == $_SESSION['username']){*/
  $username = $_SESSION['username'];/*
  }else{
    echo "SAIR";
    die(header('Location: ../pages/signup.php'));
  }
*/
  $sentence="";
  $changed=0;


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
if(!empty($_POST['name']) && $_POST['name'] !=  getUserInformation($username)[0]['name']){
  try {
    updateName($username, $_POST['name']);
    $sentence="You have successfully updated your Name";
    $changed++;
  } catch (PDOException $e) {
    die($e->getMessage("error updatating database"));
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/login.php');
  } 
}
if(!empty($_POST['email']) && $_POST['email'] !=  getUserInformation($username)[0]['email']){
  try {
    updateEmail($_POST['username'], $_POST['email']);
    $sentence="You have successfully updated your Email";
    $changed++;
  } catch (PDOException $e) {
    die($e->getMessage("error updatating database"));
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/login.php');
  }
}
if(!empty($_POST['street']) && $_POST['street'] !=  getUserInformation($username)[0]['street']){
  try {
    updateStreet($_POST['username'], $_POST['street']);
    $sentence="You have successfully updated your Street";
    $changed++;
  } catch (PDOException $e) {
    die($e->getMessage("error updatating database"));
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/login.php');
  }
}
if(!empty($_POST['zipcode']) && $_POST['zipcode'] !=  getUserInformation($username)[0]['zipcode']){
  try {
    updateZip($_POST['username'], $_POST['zipcode']);
    $sentence="You have successfully updated your Zipcode";
    $changed++;
  } catch (PDOException $e) {
    die($e->getMessage("error updatating database"));
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/login.php');
  }
}
if(!empty($_POST['city']) && $_POST['city'] !=  getUserInformation($username)[0]['city']){
  try {
    updateCity($_POST['username'], $_POST['city']);
    $sentence="You have successfully updated your City";
    $changed++;
  } catch (PDOException $e) {
    die($e->getMessage("error updatating database"));
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/login.php');
  }
}
if(!empty($_POST['country']) && $_POST['country'] !=  getUserInformation($username)[0]['country']){
  try {
    updateCountry($_POST['username'], $_POST['country']);
    $sentence="You have successfully updated your Country";
    $changed++;
  } catch (PDOException $e) {
    die($e->getMessage("error updatating database"));
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/login.php');
  }
}
if(!empty($phone) && $phone !=  getUserInformation($username)[0]['phone']){
  try {
    updatePhone($_POST['username'], $_POST['phone']);
    $sentence="You have successfully updated your Phone";
    $changed++;
  } catch (PDOException $e) {
    die($e->getMessage("error updatating database"));
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/login.php');
  }
}
if($changed >1) $sentence="You have successfully updated your profile";
echo $sentence;



/*
  try {
    updateUser($_POST['username'], $_POST['email'], $_POST['name'], $_POST['street'], $_POST['zipcode'],
     $_POST['city'], $_POST['country'], $_POST['phone']);
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
  echo 'profile updated';*/
?>
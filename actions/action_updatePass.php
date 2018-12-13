<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');
  
$username = $_SESSION['username'];
/**
 * check if the two passwords match and that  are different than the current one
 */

if($_POST['pass1'] != $_POST['pass2'] ) {
  $_SESSION['ERROR'] = 'passwords dont match';
  die(header('Location: '.$_SERVER['HTTP_REFERER']));
} elseif(getUserInformation($username)[0]['password'] == sha1($_POST['pass1']) ){
  $_SESSION['ERROR'] = 'same password as previous one';
  die(header('Location: '.$_SERVER['HTTP_REFERER']));
}

if (!preg_match('/^(?=[a-z])(?=[A-Z])[a-zA-Z]{8,}$/', $_POST['pass1']) || !preg_match('/^(?=[a-z])(?=[A-Z])[a-zA-Z]{8,}$/', $_POST['pass2'])) {
  $_SESSION['messages'][] = array('type' => 'error', 'content' => 'password: invalid length or characters!');
  die(header('Location:../pages/profile.php'));
}

try {
  updatePass($username,$_POST['pass1']);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'password changed sucessfully!');
    header('Location: ../pages/profile.php'); 
} catch (PDOException $e) {
    die($e->getMessage("error changing password"));
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to change the password!');
    header('Location: ../pages/profile.ph');
}

  ?>

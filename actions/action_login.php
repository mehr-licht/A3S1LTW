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

  $username = $_POST['username'];
  $password = $_POST['password'];


  if (checkUserPassword($username, $password)) {
    unset($_SESSION['messages']); 
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged in successfully!');
    header('Location: ../pages/list_stories.php');
  } else {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Login failed!');
    header('Location: ../pages/signup.php');
  }

?>
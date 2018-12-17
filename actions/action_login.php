<?php
  include_once '../includes/session.php';
  include_once '../database/db_user.php';
  include_once '../database/dbPosts.php';

  $username = trimAndStripHtmlPHPtags($_POST['username']);
  $password = trimAndStripHtmlPHPtags($_POST['password']);

try{
  $isCorrected = checkUserPassword($username, $password);
} catch (PDOException $e) {
  die($e->getMessage());
  $_SESSION['post'][] = array('type' => 'error', 'content' => 'Failed to log in!');
  header('Location: ../pages/login.php');
}

  if ($isCorrected) {
    unset($_SESSION['messages']); 
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged in successfully!');
    header('Location: ../pages/list_stories.php');
  } else {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Login failed!');
    die(header('Location: ../pages/signup.php'));
  }

?>
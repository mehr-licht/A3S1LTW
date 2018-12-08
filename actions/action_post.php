<?php
  include_once('../includes/session.php');
  include_once('../database/dbPosts.php');

  $today = date("Y-m-d", $timestamp = time());

  try {
      insertPost($_SESSION['username'], $today, $_POST['titulo'], $_POST['content']);  
      $_SESSION['post'][] = array('type' => 'success', 'content' => 'post published!');
      header('Location: ../pages/list_stories.php'); 
  } catch (PDOException $e) {
      die($e->getMessage());
      $_SESSION['post'][] = array('type' => 'error', 'content' => 'Failed to post the post!');
      header('Location: ../pages/create_post.php');
  }
  ?>
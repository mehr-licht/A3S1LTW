<?php
  include_once('../includes/session.php');
  include_once('../database/db_list.php');

//if (!isset($_SESSION['username'])){
//    die(header('Location: ../pages/login.php'));
//}
  /*
  <?php
  // Assuming today is March 10th, 2001, 5:16:18 pm, and that we are in the
  // Mountain Standard Time (MST) Time Zone
  $today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
  $today = date("m.d.y");                         // 03.10.01
  $today = date("j, n, Y");                       // 10, 3, 2001
  $today = date("Ymd");                           // 20010310
  $today = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
  $today = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
  $today = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
  $today = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
  $today = date("H:i:s");                         // 17:16:18
  $today = date("d-m-Y", $timestamp = time());                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
  ?>
*/
  $today = date("d-m-Y", $timestamp = time());                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
 
  try {
      insertPost($_SESSION['username'], $_POST['titulo'], $_POST['newestpost']);  
      $_SESSION['post'][] = array('type' => 'success', 'content' => 'post published!');
      header('Location: ../pages/list_stories.php'); 
  } catch (PDOException $e) {
      die($e->getMessage());
      $_SESSION['post'][] = array('type' => 'error', 'content' => 'Failed to post the post!');
      header('Location: ../pages/create_post.php');
  }
  ?>
<?php
  include_once '../includes/session.php';
  include_once '../database/dbPosts.php';
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

  $today = date("Y-m-d", $timestamp = time());
  
  $nome = $_FILES['imageToUpload']['name'];
  $type = $_FILES['imageToUpload']['type'];
  $target_file = "../res/posts/$nome";
  //die(  print_r($nome) );
  //Array ( [imageToUpload] => Array ( [name] => systemArq.jpeg [type] => image/jpeg 
  //[tmp_name] => /tmp/php7aJm8n [error] => 0 [size] => 10424 ) ) 1
    
// Move the uploaded file to its final destination
move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $target_file);

//Updatar com as funcoes desta pagina
//https://www.w3schools.com/php/php_file_upload.asp

  try {
      insertPost($_SESSION['username'], $today, $_POST['titulo'], $_POST['content'], $target_file);  
      $_SESSION['post'][] = array('type' => 'success', 'content' => 'post published!');
      header('Location: ../pages/list_stories.php'); 
  } catch (PDOException $e) {
      die($e->getMessage());
      $_SESSION['post'][] = array('type' => 'error', 'content' => 'Failed to post the post!');
      header('Location: ../pages/create_post.php');
  }
  ?>
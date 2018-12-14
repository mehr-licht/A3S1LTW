<?php
  include_once '../includes/session.php';
  include_once '../database/dbPosts.php';
  

  $today = date("Y-m-d", $timestamp = time());
  
  $nome = $_FILES['imageToUpload']['name'];
  $type = $_FILES['imageToUpload']['type'];
  $target_file = "../res/posts/$nome";
  //die(  print_r($nome) );
  //Array ( [imageToUpload] => Array ( [name] => systemArq.jpeg [type] => image/jpeg 
  //[tmp_name] => /tmp/php7aJm8n [error] => 0 [size] => 10424 ) ) 1
 
  if( !isset($_SESSION['username'])   ){
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'you are not logged in!');
    die(header('Location: ../pages/login.php'));
    }

  //Filtering unexpected characters : removed all html and php tags as well\t \n \r \0 \x0B
  $conteudo = trim(   strip_tags($_POST['content'])   );
  $titulo =  trim(   strip_tags($_POST['titulo'])     );

  // Move the uploaded file to its final destination
  $imageMoved =  move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $target_file);
  
  if( $imageMoved ){
    try {
        insertPost($_SESSION['username'], $today, $titulo, $conteudo, $target_file);  
        $_SESSION['post'][] = array('type' => 'success', 'content' => 'post published!');
        header('Location: ../pages/list_stories.php'); 
    } catch (PDOException $e) {
        die($e->getMessage());
        $_SESSION['post'][] = array('type' => 'error', 'content' => 'Failed to post the post!');
        header('Location: ../pages/create_post.php');
    }
}else{
  try {
    insertPost($_SESSION['username'], $today, $titulo, $conteudo);  
    $_SESSION['post'][] = array('type' => 'success', 'content' => 'post published!');
    header('Location: ../pages/list_stories.php'); 
} catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['post'][] = array('type' => 'error', 'content' => 'Failed to post the post!');
    header('Location: ../pages/create_post.php');
}


}
  //Updatar com as funcoes desta pagina
//https://www.w3schools.com/php/php_file_upload.asp
// testes die(  var_dump($imageMoved) )
  ?>
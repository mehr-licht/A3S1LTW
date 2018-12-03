<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');
  
  
  function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  //  elseif($_POST['password'] != $_POST['password2'] ) {
//    $_SESSION['ERROR'] = 'No match passwords';
//    header("Location:".$_SERVER['HTTP_REFERER']."");
//  }
    // Don't allow certain characters


  if( checkUsername($_POST['username']) ){
      $_SESSION['messages'] = array('type' => 'error', 'content' => 'Username already in use!');
      header('Location:../pages/signup.php');
  
  }else if(  checkUserEmail($_POST['email']) ){
      $_SESSION['messages'] = array('type' => 'error', 'content' => 'Email already in use!');
      header('Location:../pages/signup.php');
  
  }else if( $_POST['password'] !== $_POST['password2'] ){
      $_SESSION['messages'] = array('type' => 'error', 'content' => 'No match passwords!');
      header('Location:../pages/signup.php');
  
  }else if( !preg_match ('/[a-zA-Z0-9]+/', $_POST['username'])  ){
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
      die(header('Location: ../pages/signup.php'));
  
  }else if( !preg_match ('/[a-zA-Z0-9]+@[a-zA-Z]+\.[a-z]+/', $_POST['email']) ){
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'not numbers in mail can only contain letters and numbers!');
      die(header('Location: ../pages/signup.php'));
  }else{

    try {
        insertUser( $_POST['username'], $_POST['password'], $_POST['email']);
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
        header('Location: ../pages/list_stories.php'); 
    } catch (PDOException $e) {
        die( $e->getMessage());
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
        header('Location: ../pages/login.php');
    }
  }
?>

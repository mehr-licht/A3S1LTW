<?php 
  include_once('../database/database.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');
  
  // Verify if user is logged in
  // Isset returns true if $_SESSION['username'] is true and not null
  //if (isset($_SESSION['username']))
  //$db=returnDataBase();
  //  die(header('Location: ../pages/list_stories.php'));

  //$username = 'techn';
  //$stmt = $db->prepare('SELECT * FROM User');
  //$stmt->execute();
  //echo $stmt->fetch()?true:false; // return true if a l
  echo 'John Dow';
  //while( $vartido = $stmt->fetch() ){
  //echo $vartido['username'];
  //echo $vartido['password'];
  //echo $vartido['email'];
  //}
  echo 'Silva';

  
  draw_header(null);
  
  draw_login();
  
  draw_footer();
?>
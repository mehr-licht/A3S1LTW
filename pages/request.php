<link rel="stylesheet" type="text/css" href="../css/auth.css">
<?php 
  include_once '../database/database.php';
  include_once '../templates/tpl_common.php';
  include_once '../templates/tpl_auth.php';
  
  // Verify if user is logged in
  // Isset returns true if $_SESSION['username'] is true and not null
  if (checkTimeout() || !isset($_SESSION['username'])){
    die(header('Location: ../pages/login.php'));
}

regenerateSession();

  draw_header(null);
  
  draw_request();
  
  draw_footer();
?>
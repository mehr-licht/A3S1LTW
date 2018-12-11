<link rel="stylesheet" type="text/css" href="../css/auth.css">
<?php 
  include_once('../database/database.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');
  
  // Verify if user is logged in
  // Isset returns true if $_SESSION['username'] is true and not null
  if (isset($_SESSION['username']))
    die(header('Location: ../pages/list_stories.php'));
  
  draw_header(null);
  
  draw_request();
  
  draw_footer();
?>
<link rel="stylesheet" type="text/css" href="../css/auth.css">
<?php 
  include_once '../database/database.php';
  include_once '../templates/tpl_common.php';
  include_once '../templates/tpl_auth.php';
  include_once '../includes/session.php';

  // Verify if user is logged in
  if (isset($_SESSION['username']))
  die(header('Location: ../pages/list_stories.php'));

  regenerateSession();

  draw_header(null);
  
  draw_request();
  
  draw_footer();
?>
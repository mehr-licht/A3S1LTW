<?php 
//igual Restivo
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');
  // Verify if user is logged in
  if (isset($_SESSION['username']))
    die(header('Location: /pages/list_stories.php'));
  draw_header(null);
  draw_signup();
  draw_footer();
?>
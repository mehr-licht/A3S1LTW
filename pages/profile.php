<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../database/db_list.php'); //for getUserInformation
//include_once('../templates/tpl_auth.php');

if (!empty($_SESSION['username']))
    die(header('Location: list.php'));
   //    $username=$_SESSION['username'];
   // $array_teste=getUserInformation('mehrlicht');//harrdcoded

  draw_header(null);
  ?>
<!-- PROFILE -->

<div class="profile">

<!-- getPhoto(user) -->
<img src="../res/antman.png" width="10%" class="avatar"> 
<!-- <img src="../res/ <?php // echo $rws['user_avatar'];?>" class="avatar"> -->

                    <br>
<!-- <label class="username"><?php echo $username?></label> -->
<!-- <label class="array_test"><?php echo $array_teste?></label> -->


</div>

<?
  draw_footer();


?>
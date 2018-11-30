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

<form id="profile-form" class="profile" action="#" method="get">

      


<!-- getPhoto(user) -->
<img src="../res/antman.png" width="4%" class="avatar"> 
<!-- <img src="../res/ <?php // echo $rws['user_avatar'];?>" class="avatar"> -->

                    <br>
<!-- <label class="username"><?php echo $username?></label> -->
<!-- <label class="array_test"><?php echo $array_teste?></label> -->
<div contenteditable="true">    
<label id="profile-name" class="profile editable">Luis Oliveira</label></p></div>
<div contenteditable="true">   
<label id="profile-town" class="profile">Póvoa de Varzim</label></p></div>
<div contenteditable="true">   
<label id="profile-age" class="profile">45</label></p></div>
<div contenteditable="true">   
<label id="profile-pass" class="profile">****************</label></p>
<label id="profile-repeat" class="profile">****************</label><img src="../res/editPencil.gif" width="1.5%"></div></p>
<input type="submit" value="edit">
    </form>

</div>

<?
  draw_footer();


?>
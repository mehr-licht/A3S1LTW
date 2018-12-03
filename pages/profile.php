<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../database/db_list.php'); //for getUserInformation
include_once('../templates/tpl_auth.php');



//if (!empty($_SESSION['username']))
//    die(header('Location: ../pages/login.php'));
   //    $username=$_SESSION['username'];
   // $array_teste=getUserInformation('mehrlicht');//harrdcoded

  draw_header($_POST['username']);
  ?>
<!-- PROFILE -->

<div class="profile">

<form id="profile-form" class="profile" action="#" method="get">

      
      <script type="text/javascript" src="js/main.js"></script> 

<!-- getPhoto(user) -->
<img src="../res/antman.png" width="4%" class="avatar"> 
<!-- <img src="../res/ <?php // echo $rws['user_avatar'];?>" class="avatar"> -->

    <br>
<!-- <label class="username"></label> -->
<br>     <?php echo "valor username:"; echo $_SESSION['username']?>
<br>    <?php echo "valor das variaveis post:"?>
<?php               var_dump($_SESSION['username']);
                    var_dump($_SESSION['email']); ?>
   
<br>    <?php //echo $_SESSION['email']?> <br> 


<!-- <label class="array_test"><?php echo $_POST['email']?></label> -->
<div contenteditable="true">    
  <label id="profile-name" class="profile editable">Aquele outro mar que nunca vimos</label></p></div>
<div contenteditable="true">   
  <label id="profile-town" class="profile">Póvoa de Varzim</label></p></div>
<div contenteditable="true">   
  <label id="profile-age" class="profile">45</label></p>
</div>
<div contenteditable="true">   
<label id="profile-pass" class="profile password"> 
  <input id="loginPwd" type="password" placeholder="password" class="password"/>
  <button id="toggleBtn1" class="glyphicon glyphicons-eye-open toggler-ico" 
  style="background-color:transparent; border-color:transparent;" type="button" width="50px"> 
  <img src="../res/glyphicons-eye-open.svg" width="50%"/>
  &nbsp;</button>
      </label></p>
<label id="profile-repeat" class="profile password"> 
  <input id="loginPwd" type="password" placeholder="password" class="password"/>
  <button id="toggleBtn2" class="glyphicon glyphicons-eye-open toggler-ico" type="button">&nbsp;</button>
      </label>
      <img src="../res/editPencil.gif" width="1.5%"></div></p>
<input type="submit" value="edit">
    </form>

</div>

<?
  draw_footer();


?>
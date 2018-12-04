<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');
include_once('../database/db_list.php'); //for getUserInformation
include_once('../templates/tpl_auth.php');


if (!isset($_SESSION['username'])){
    die(header('Location: ../pages/login.php'));
}

$username=$_SESSION['username'];

$user_array=getUserInformation($username);

//print_r($user_array[0]); //em vez de echo var, print_r(var) imprime partes de arrays

  draw_header($username);
  ?>
<!-- PROFILE -->

<div class="profile">
<div>
  <p> <?php
           // para imprimir o que vem dos erros  apos verificaoes no signup  
           $pkl = $_SESSION['signup'][0]['type'];
           $pkk = $_SESSION['signup'][0]['content'];
           print_r($pkl);
           print_r($pkk);
                         
      ?>
  </p>
</div>

<form id="profile-form" class="profile form" action="../actions/action_update.php" method="post">
      
      <script type="text/javascript" src="../js/main.js"></script> 
<br/>
  <label id="profile-avatar" class="profile avatar"><?php echo $user_array[0]['avatar'];?>
  </label></p>
  <input type="image" name="avatar" src="../res/antman.png" width="4%" class="avatar"> 

<br/>    
  <label id="profile-username" class="profile">username: <div contenteditable="true"><?php echo $user_array[0]['username'];?><input type="text" value="<?php echo $user_array[0]['username'];?>" name="username" disabled></div>
  </label></p>

  <label id="profile-name" class="profile editable">email: <div contenteditable="true"><input type="text" name="email" value="<?php echo $user_array[0]['email'];?>"></div>
  </label></p>

    <label id="profile-name" class="profile editable">name: <div contenteditable="true"><?php echo $user_array[0]['name'];?><input type="text" name="name"></div>
  </label></p>

  <label id="profile-birthday" class="profile editable">birthday: <div contenteditable="true"><?php echo $user_array[0]['birthday'];?><input type="text" name="birthday"></div>
  </label></p>

<div contenteditable="true">   
  <label id="profile-age" class="profile">45</label></p>
</div>
    <label id="profile-address" class="profile editable">street: <div contenteditable="true"><?php echo $user_array[0]['street'];?><input type="text" name="street"></div>
  </label></p>

    <label id="profile-zip" class="profile editable" >zip code: <div contenteditable="true"><?php echo $user_array[0]['zipcode'];?><input type="text" name="zipcode"></div>
  </label></p>

    <label id="profile-city" class="profile editable">city: <div contenteditable="true"><?php echo $user_array[0]['city'];?><input type="text" name="city"></div>
  </label></p>

    <label id="profile-country" class="profile editable">country: <div contenteditable="true"><?php echo $user_array[0]['country'];?><input type="text" name="country"></div>
  </label></p>

    <label id="profile-phone" class="profile editable">phone: <div contenteditable="true"><?php echo $user_array[0]['phone'];?><input type="text" name="phone"></div>
  </label></p>


<div contenteditable="true">   
<label id="profile-pass" class="profile password" name="pass1"> 
  <input id="loginPwd" type="password" placeholder="password" class="password"/>
  <button id="toggleBtn1" class="glyphicon glyphicons-eye-open toggler-ico" 
  style="background-color:transparent; border-color:transparent;" type="button" width="50px"> 
  <img src="../res/glyphicons-eye-open.svg" width="50%"/>
  &nbsp;</button>
      </label></p>
<label id="profile-repeat" class="profile password"name="pass2"> 
  <input id="loginPwd2" type="password" placeholder="password" class="password"/>
  <button id="toggleBtn2" class="glyphicon glyphicons-eye-open toggler-ico" type="button">&nbsp;</button>
      </label>
      <img src="../res/editPencil.gif" width="1.5%"></div></p>

  <button type="submit" class="button" formaction="../actions/action_update.php" formmethod="post">Edit</button>
<? print_r($_POST['name']);?>
    </form>

</div>

<?
  draw_footer();


?>
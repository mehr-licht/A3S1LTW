<?php
include_once '../includes/session.php';
include_once '../templates/tpl_common.php';
include_once '../database/db_user.php';//for checkusername  
include_once '../templates/tpl_auth.php';

if (!isset($_SESSION['username'])) {
    die(header('Location: ../pages/login.php'));
}

$editable = false;
$thisuser = $_SESSION['username'];
$username = $_SESSION['username'];
if (isset($_GET['user'])) {
    $username = $_GET['user'];
}

if ($thisuser == $username) {
    $editable = true;
}

if(checkUsername($username)){
 $user_array = getUserInformation($username);
}else{
  $_SESSION['ERROR'] = 'username not in database';
  die(header('Location: ../pages/profile.php'));
}

draw_header($thisuser);

?>

<!-- PROFILE -->
<div class="profile">
  <script type="text/javascript" src="../js/profile.js"></script>
  <link rel="stylesheet" href="../css/profile.css">


  <!-- Change Avatar Form -->
  <?php if($editable){ ?>
  <form id="avatar-form" class="avatar form" action="../actions/action_upload.php" method="post" enctype="multipart/form-data">
    <?php } ?>
   
    <div class="profile show avatar">
      <label id="profile-avatar" class="profile avatar">
      
      </label></p>
     
      <input type="image" name="avatar" src=<?=file_exists("../res/avatars/$username.jpg") ? "../res/avatars/$username.jpg" :
        "../res/default.gif"?> width="8%" class="avatar">
    </div>
    <?php if($editable){?>
    <div class="profile edit avatar" id="avatarEdit">
      <input type="file" name="image" accept="image/*">
      <button type="submit" class="button" formaction="../actions/action_upload.php" formmethod="post" value="Upload">Upload</button>
    </div>
  </form>
  
  <button onclick="toggleEdit(0)" class="btnEdit" id="imgEdit"><img src="../res/editPencil.gif" height="20px" width="20px">change avatar</button>
  <?php } ?>


  <?php if($editable){ ?>
  <form id="profile-form" class="profile form" action="../actions/action_update.php" method="post">
    <?php } ?>
    <label id="profile-username" class="profile">
      <div contenteditable="false">
        <h1>
          <?=$user_array[0]['username']?>
        </h1>
      </div>
    </label></p>

    <?php if($editable){?>
    <label id="profile-email" class="profile editable">email: </label><div contenteditable="false"><input class="profile editable"
          type="text" name="email" value="<?=$user_array[0]['email']?>"></div>
    </p>

    <label id="profile-name" class="profile editable">name: </label><div contenteditable="false">
      <input class="profile editable" type="text" name="name" value="<?=$user_array[0]['name']?>"></div>
    </p>


    <label id="profile-birthday" class="profile editable">birthday: </label><div contenteditable="false">
       <input class="profile editable" type="text" name="birthday" value="<?=$user_array[0]['birthday']?>"></div>
    </p>

    <?php } 
    if(!$editable){

//TODO se nao editable aparece numa label e nao num input!!!!!

      if(isset($user_array[0]['birthday'])){
        $fromdate = new DateTime($user_array[0]['birthday']);
      $today = new DateTime(date("Y/m/d"));
      $age = $fromdate->diff($today)->y;
     
      ?>
    <div contenteditable="false">
      <label id="profile-age" class="profile"><?=$age?></label></p>
    </div>
    <?php } 
    }
     if($editable){?>

    <label id="profile-address" class="profile editable">street: </label><div contenteditable="false">
       <input class="profile editable" type="text" name="street" value="<?=$user_array[0]['street']?>"></div>
    </p>

    <label id="profile-zip" class="profile editable">zip code: </label><div contenteditable="false">
        <input class="profile editable" type="text" name="zipcode" value="<?=$user_array[0]['zipcode']?>"></div>
    </p>

    <?php } ?>

    <label id="profile-city" class="profile editable">city: </label><div contenteditable="false">
        <input class="profile editable" type="text" name="city" value="<?=$user_array[0]['city']?>"></div>
    </p>

    <label id="profile-country" class="profile editable">country: </label><div contenteditable="false">
       <input class="profile editable" type="text" name="country" value="<?=$user_array[0]['country']?>"></div>
    </p>

    <?php if($editable){?>
    <label id="profile-phone" class="profile editable">phone: </label><div contenteditable="false">
        <input class="profile editable" type="text" name="phone" value="<?=$user_array[0]['phone']?>"></div>
    </p>
    <div class="profile prof" id="profileEdit"> 
      <button type="submit" class="button" formaction="../actions/action_update.php" formmethod="post">Save</button>
    </div>
  </form>
 <!-- <button onclick="toggleEdit(1);toggleInput()" class="btnEdit"><img src="../res/editPencil.gif" height="20px" width="20px"></button> -->
  
  <?php } ?>

  <!-- Change Password Form -->
 
  <?php if($editable){ ?> 
    <h1>ANTES</h1> 
  <div class="profile edit avatar" id="passEdit">
  <h1>DEPOIS</h1> 
    <form id="profile-pass" class="profile edit form" action="../actions/action_updatePass.php" method="post">
   
      <div contenteditable="false">
      
        <label id="profile-pass" class="profile edit password">
          <input id="loginPwd" type="password" placeholder="password" class="passEdit" name="pass1" />
          <button onclick="togglePass(0)" id="toggleBtn1" class="glyphicon glyphicons-eye-open toggler-ico" style="background-color:transparent; border-color:transparent;"
            type="button" width="50px">
            <img src="../res/glyphicons-eye-open.svg" width="50%" />
            &nbsp;</button>
        </label></p>
        <label id="profile-repeat" class="profile edit password">
          <input id="loginPwd2" type="password" placeholder="password" class="passEdit" name="pass2" />
          <button onclick="togglePass(1)" id="toggleBtn2" class="glyphicon glyphicons-eye-open toggler-ico" style="background-color:transparent; border-color:transparent;"
            type="button" width="50px">
            <img src="../res/glyphicons-eye-open.svg" width="50%" />
            &nbsp;</button>
        </label>
        <img src="../res/editPencil.gif" width="0%"></div><!-- se apagasse desaparecia a do botao seguinte!!! -->
      </p>

      <button type="submit" class="button" formaction="../actions/action_updatePass.php" formmethod="post">Change
        Password</button>
    </form>
  </div>
  <button onclick="toggleEdit(2)" class="btnEdit" id="pwdEdit"><img src="../res/editPencil.gif" height="20px" width="20px">change password</button>
  <?php } ?>

</div>

<?
draw_footer();
?>
<?php
include_once '../includes/session.php';
include_once '../templates/tpl_common.php';
include_once '../database/db_list.php'; //for getUserInformation
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

draw_header($username);

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
        <?=$user_array[0]['avatar']; ?>
      </label></p>
      <input type="image" name="avatar" src="../res/antman.png" width="4%" class="avatar">
    </div>
    <?php if($editable){?>
    <div class="profile edit avatar" id="avatarEdit">
      <label>Title:
        <input type="text" name="title">
      </label>
      <input type="file" name="image">
      <button type="submit" class="button" formaction="../actions/action_upload.php" formmethod="post" value="Upload">Upload</button>
    </div>
  </form>
  <button onclick="toggleEdit(0)" class="btnEdit"><img src="../res/editPencil.gif" height="20px" width="20px"></button>
  <?php } ?>


  <?php if($editable){ ?>
  <form id="profile-form" class="profile form" action="../actions/action_update.php" method="post">
    <?php } ?>
    <label id="profile-username" class="profile">username: <div contenteditable="false">
       <?=$user_array[0]['username']?></div>
    </label></p>

    <?php if($editable){?>
    <label id="profile-name" class="profile editable">email: <div contenteditable="false"><input class="profile editable" type="text" name="email"
          value="<?=$user_array[0]['email']; ?>"></div>
    </label></p>

    <label id="profile-name" class="profile editable">name: <div contenteditable="false"><input class="profile editable" type="text" name="name"
          value="<?=$user_array[0]['name']; ?>"></div>
    </label></p>


    <label id="profile-birthday" class="profile editable">birthday: <div contenteditable="false">
        <?=$user_array[0]['birthday']; ?><input class="profile editable" type="text" name="birthday"></div>
    </label></p>

    <?php } ?>

    <div contenteditable="false">
      <label id="profile-age" class="profile">45</label></p>
    </div>
    <?php if($editable){?>

    <label id="profile-address" class="profile editable">street: <div contenteditable="false">
        <?=$user_array[0]['street']; ?><input class="profile editable" type="text" name="street"></div>
    </label></p>

    <label id="profile-zip" class="profile editable">zip code: <div contenteditable="false">
        <?=$user_array[0]['zipcode']; ?><input class="profile editable" type="text" name="zipcode"></div>
    </label></p>

    <?php } ?>

    <label id="profile-city" class="profile editable">city: <div contenteditable="false">
        <?=$user_array[0]['city']; ?><input class="profile editable" type="text" name="city"></div>
    </label></p>

    <label id="profile-country" class="profile editable">country: <div contenteditable="false">
        <?=$user_array[0]['country']; ?><input class="profile editable" type="text" name="country"></div>
    </label></p>

    <?php if($editable){?>
    <label id="profile-phone" class="profile editable">phone: <div contenteditable="false">
        <?=$user_array[0]['phone']; ?><input class="profile editable" type="text" name="phone"></div>
    </label></p>
    <div class="profile edit prof" id="profileEdit">
      <button type="submit" class="button" formaction="../actions/action_update.php" formmethod="post">Edit</button>
    </div>
   
  </form>
  <button onclick="toggleEdit(1);toggleInput()" class="btnEdit"><img src="../res/editPencil.gif" height="20px" width="20px"></button>

  <?php } ?>

  <!-- Change Password Form -->
  <?php if($editable){ ?>
  <div class="profile edit avatar" id="passEdit">
   <form id="profile-pass" class="profile form" action="../actions/action_updatePass.php" method="post">

      <div contenteditable="false">
        <label id="profile-pass" class="profile password">
          <input id="loginPwd" type="password" placeholder="password" class="password" name="pass1" />
          <button id="toggleBtn1" class="glyphicon glyphicons-eye-open toggler-ico" style="background-color:transparent; border-color:transparent;"
            type="button" width="50px">
            <img src="../res/glyphicons-eye-open.svg" width="50%" />
            &nbsp;</button>
        </label></p>
        <label id="profile-repeat" class="profile password">
          <input id="loginPwd2" type="password" placeholder="password" class="password" name="pass2" />
          <button id="toggleBtn2" class="glyphicon glyphicons-eye-open toggler-ico" type="button">&nbsp;</button>
        </label>
        <img src="../res/editPencil.gif" width="1.5%"></div>
      </p>

      <button type="submit" class="button" formaction="../actions/action_updatePass.php" formmethod="post">Change
        Password</button>
    </form> 
  </div>
  <button onclick="toggleEdit(2)" class="btnEdit"><img src="../res/editPencil.gif" height="20px" width="20px"></button>
  <?php } ?>

</div>

<?
draw_footer();
?>
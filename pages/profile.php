<?php
include_once '../includes/session.php';
include_once '../templates/tpl_common.php';
include_once '../database/db_user.php';//for checkusername  
include_once '../templates/tpl_auth.php';


if (checkTimeout() || !isset($_SESSION['username'])){
  die(header('Location: ../pages/login.php'));
}

regenerateSession();



$editable = false;
$thisuser = $_SESSION['username'];
$username = $_SESSION['username'];
if (isset($_GET['user'])) {
  $username = $_GET['user'];
}
$imageName=sha1($username);

if ($thisuser == $username) {
  $editable = true;
}

if (checkUsername($username)) {
  $user_array = getUserInformation($username);
} else {
  $_SESSION['ERROR'] = 'username not in database';
  die(header('Location: ../pages/profile.php'));
}

draw_header($thisuser);

?>

<!-- PROFILE -->
<div class="profile">
  <script type="text/javascript" src="../js/eye.js"></script>
  <script type="text/javascript" src="../js/profile.js"></script>
  <link rel="stylesheet" href="../css/profile.css">


  <!-- Change Avatar Form -->
  <?php if ($editable) { ?>
  <form id="avatar-form" class="avatar form" action="../actions/action_upload.php" method="post" enctype="multipart/form-data">
    <?php 
  } ?>

    <div class="profile show avatar">
      <label id="profile-avatar" class="profile avatar">

      </label></p>
      
      <input type="image" name="avatar" src=<?=file_exists("../res/avatars/$imageName.jpg") ?
        "../res/avatars/$imageName.jpg" : "../res/default.gif" ?> width="8%" class="avatar">
    </div>
    <?php if ($editable) { ?>
    <div class="profile edit avatar hide" id="avatarEdit">
      <input type="file" name="image" accept="image/jpg, image/jpeg">
      <button type="submit" class="button" formaction="../actions/action_upload.php" formmethod="post" value="Upload">Upload</button>
    </div>
  </form>

  <button onclick="toggleEdit(0)" class="btnEdit" id="imgEdit"><img src="../res/editPencil.gif" height="20px" width="20px">change
    avatar</button>
  <?php 
} ?>


  <?php if ($editable) { ?>
  <form id="profile-form" class="profile form" action="../actions/action_update.php" method="post">
    <?php 
  } ?>
    <label id="profile-username" class="profile">
      <div contenteditable="false">
        <h1>
          <?= $user_array[0]['username'] ?>
        </h1>
      </div>
    </label></p>

    <?php if ($editable) { ?>
    <label id="profile-email" class="profile editable">email: </label>
    <div contenteditable="false"><input class="profile editable" id="input-email" type="text" name="email" value="<?= $user_array[0]['email'] ?>"
        oninput="clearInputError('input-email')" required><span></span> </div>
    </p>

    <label id="profile-name" class="profile editable">name: </label>
    <div contenteditable="false">
      <input class="profile editable" id="input-name" type="text" name="name" value="<?= $user_array[0]['name'] ?>"
        oninput="clearInputError('input-name')"><span></span> </div>
    </p>


    <label id="profile-birthday" class="profile editable">birthday: </label>
    <div contenteditable="false">
      <input class="profile editable" id="input-birthday" type="text" name="birthday" value="<?= $user_array[0]['birthday'] ?>"
        oninput="clearInputError('input-birthday')"><span></span> </div>
    </p>

    <?php 
  } else {

    if (isset($user_array[0]['birthday'])) {
      $fromdate = new DateTime($user_array[0]['birthday']);
      $today = new DateTime(date("Y/m/d"));
      $age = $fromdate->diff($today)->y;

    }
    ?>
    <div contenteditable="false">
      <label id="profile-age" class="profile">age:
        <?php if ($age !== null) {
          echo $age;
        } ?></label></p>
    </div>
    <?php 
  }

  if ($editable) { ?>

    <label id="profile-address" class="profile editable">street: </label>
    <div contenteditable="false">
      <input class="profile editable" id="input-address" type="text" name="street" value="<?= $user_array[0]['street'] ?>"
        oninput="clearInputError('input-address')"><span></span> </div>
    </p>

    <label id="profile-zip" class="profile editable">zip code: </label>
    <div contenteditable="false">
    
      <input class="profile editable" id="input-zip" type="text" name="zipcode" value="<?= $user_array[0]['zipcode'] ?>"
        oninput="clearInputError('input-zip')"><span></span> </div>
    </p>

    <?php 
  } ?>

    <label id="profile-city" class="profile editable">city:
      <?php if (!$editable) $user_array[0]['city'] ?> </label>
    <div contenteditable="false">
      <?php if ($editable) { ?><input class="profile editable" id="input-city" type="text" name="city" value="<?= $user_array[0]['city'] ?>"
        oninput="clearInputError('input-city')">
      <?php 
    } ?><span></span> </div>
    </p>

    <label id="profile-country" class="profile editable">country:
      <?php if (!$editable) $user_array[0]['country'] ?></label>
    <div contenteditable="false">
      <?php if ($editable) { ?><input class="profile editable" id="input-country" type="text" name="country" value="<?= $user_array[0]['country'] ?>"
        oninput="clearInputError('input-country')">
      <?php 
    } ?><span></span> </div>
    </p>

    <?php if ($editable) { ?>
    <label id="profile-phone" class="profile editable">phone: </label>
    <div contenteditable="false">
      <input class="profile editable" id="input-phone" type="text" name="phone" value="<?= $user_array[0]['phone'] ?>"
        oninput="clearInputError('input-phone')"><span></span> </div>
    </p>
    <div class="profile prof" id="profileEdit">
      <button onclick="return validateInputs()" type="submit" class="button" formaction="../actions/action_update.php"
        formmethod="post">Save</button>
    </div>
    <?php 
  } ?>
  </form>


  <!-- Change Password Form -->
  <?php if ($editable) { ?>

  <div class="profile password hide" id="passEdit">
    <form id="profile-pass" class="profile form" action="../actions/action_updatePass.php" method="post">

      <label id="profile-pass" class="profile edit password">
        <input id="loginPwd" type="password" placeholder="password" class="passEdit" name="pass1" oninput="checkPassword('loginPwd')" />
        <button onclick="togglePass(0)" id="toggleBtn1" class="glyphicon glyphicons-eye-open toggler-ico" style="background-color:transparent; border-color:transparent;"
          type="button" width="50px">
          <img src="../res/glyphicons-eye-open.svg" width="50%" />
          &nbsp;</button><span></span>
      </label></p>
      <label id="profile-repeat" class="profile edit password">
        <input id="loginPwd2" type="password" placeholder="password" class="passEdit" name="pass2" oninput="checkPassword('loginPwd2')" />
        
        <button onclick="togglePass(1)" id="toggleBtn2" class="glyphicon glyphicons-eye-open toggler-ico" style="background-color:transparent; border-color:transparent;"
          type="button" width="50px">
          <img src="../res/glyphicons-eye-open.svg" width="50%" />
          &nbsp;</button><span></span>
      </label>
      </p>

      <button type="submit" class="button" formaction="../actions/action_updatePass.php" formmethod="post">Change
        Password</button>
    </form>
  </div>
  <button onclick="toggleEdit(2)" class="btnEdit" id="pwdEdit"><img src="../res/editPencil.gif" height="20px" width="20px">change
    password</button>
  <?php 
} ?>




  <!-- list of Posts-->
  <section id="posts">
      <div class="profile posts">

      <?php $allPostsByUser = getAllPostsUSER($username) ;
      if (count($allPostsByUser)) { ?> <h1>Posts:</h1> <?php 
      foreach ($allPostsByUser as $postByUser) { ?>
      <article class="postSearch">
        <div class="<?= $postByUser['title'] ?>">
          <a href="../pages/postView.php?postId=<?= $postByUser['idPost'] ?>">
            <?= $postByUser['title'] ?> </a>• 
          <?= $postByUser['date'] ?>
          <!-- plus votes? -->
        </div>
      </article>
      <?php } } ?>
    </div>
    </section>


    <!-- list of Comments-->
    <section id="comments">
      
      <div class="profile comments">
        <?php $allCommentsByUser = getAllCommentsUSER($username); 
        if (count($allCommentsByUser)) { ?> <h1>Comments:</h1> <?php 
         foreach ($allCommentsByUser as $commentByUser) { ?>
        <article class="commentSearch">
          <div class="<?= $commentByUser['idComent']?>">
            <a href="../pages/postView.php?postId=<?= $commentByUser['idPost'] ?>#<?= $commentByUser['idComent'] ?>">
              <?=  substr($commentByUser['comentContent'], 0, 50) ?>                                                                                                                                                                                                                                      </a>• 
            <?= $commentByUser['data']?>
            <!-- plus owner of post? -->
          </div>
        </article>
        <?php } } ?>
      </div>
    </section>



</div>

<?php
draw_footer();
?>
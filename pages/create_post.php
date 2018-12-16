<link rel="stylesheet" type="text/css" href="../css/auth.css">
<?php 
include_once '../includes/session.php';
include_once '../templates/tpl_common.php';


if (checkTimeout() || !isset($_SESSION['username'])){
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Session time-out. Please log in again!');
    die(header('Location: ../pages/login.php'));
}

regenerateSession();

$username=$_SESSION['username'];
draw_header($username); 

/**
 * Form to post a story to the site
 */?>

<div class="create">
    <form action="../actions/action_post.php" enctype="multipart/form-data">
        <p>
        <label id="postTitle" class="createtitle" >
            <input type="text" name="titulo" placeholder="Title">
        </label></p>
        <input type="hidden" name="<?=$_SESSION['token_id']?>" value="<?=$_SESSION['token_value']?>"/>
        <p>
        <label id="postContent" class="createpost">
        
            <input type="textarea" name="content" placeholder="Drop your post here">
        </label>
        </p>
            <input type="file" name="imageToUpload" id="imageToUpLoad" accept="image/jpg, image/jpeg">
            <button id="buttonSubmit" name="submit" type="submmit" formaction="../actions/action_post.php" formmethod="post">Post Me!</button>
        </p>
    </form>
</div>


<?php
  draw_footer();
?>
<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_common.php');

if (!isset($_SESSION['username'])){
    die(header('Location: ../pages/login.php'));
}

$username=$_SESSION['username'];
draw_header($username);

//$user_array=getUserInformation($username);
//print_r($user_array[0]); //em vez de echo var, print_r(var) imprime partes de arrays  

//DEBUG
//$today = date("d-m-Y", $timestamp = time());                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
//print_r("$today"); 

//print_r($_SESSION['signup'][0]['type']);

if( $_SESSION['signup'][0]['type'] == 'error'){
    die(header('Location: ../pages/signup.php'));
}

?>

<div>
    <form action="/action_page.php">
        <label id="postTitle" class="pTitle">Title:
            <input type="text" name="titulo">
        </label></p>
        <!-- //tyle="width:200px; height:600px" -->
        <textarea id="newpost" name="newestpost" maxlength=512>Drop your post here.
        </textarea>
        <button id="buttonSubmit" type="submmit" formaction="../actions/action_post.php" formmethod="post">Post Me!</button>
        
    </form>
</div>



<?
  draw_footer();
?>
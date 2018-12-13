<?php
include_once '../includes/session.php';
include_once '../database/dbPosts.php';
include_once '../includes/csrf.class.php';

//$csrf = new csrf();
   
// Generate Token Id and Valid
//$token_id = $csrf->get_token_id();
//$token_value = $csrf->get_token($token_id);
//if($csrf->check_valid('post')) {
//  var_dump($_POST[$token_id]);
//} else {
//  echo 'Not Valid';
//}


if(   !isset($_SESSION['username'])   ){
    die(header('Location: ../pages/login.php'));
}


//strip html and php tags
$conteudo = trimAndStripHtmlPHPtags($_POST['contentComment'])
 
//data actual
$today = date("Y-m-d", $timestamp = time());
// idUser
$idUser = $_SESSION['username'];
//idPost
$idPost = $_GET['idp'];
//idParentComment = null
$idParentComent = null;

try {
    insertComment($idUser, $today, $conteudo, $idPost, $idParentComent);
    $_SESSION['post'][] = array('type' => 'success', 'content' => 'Comment published!');
    header('Location: ../pages/list_stories.php'); 
} catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['post'][] = array('type' => 'error', 'content' => 'Failed to comment the post!');
    header('Location: ../pages/list_stories.php');
}




?>
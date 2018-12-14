<?php
include_once '../includes/session.php';
include_once '../database/dbPosts.php';


if (!isset($_SESSION['token_id'])) {
    $idSession = $_SESSION['token_id'];
    if (!validateToken($idSession, $_POST[$idSession])) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'invalid session token!');
        die(header('Location: ../pages/login.php'));
    }
}

if (!isset($_SESSION['username'])) {
    die(header('Location: ../pages/login.php'));
}


//strip html and php tags
$conteudo = trimAndStripHtmlPHPtags($_POST['contentComment']);
 
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
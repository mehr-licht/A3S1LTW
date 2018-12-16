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

$today = date("Y-m-d", $timestamp = time());

$nome = $_FILES['imageToUpload']['name'];
$type = $_FILES['imageToUpload']['type'];
$target_file = "../res/posts/$nome";

if (!isset($_SESSION['username'])) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'you are not logged in!');
    die(header('Location: ../pages/login.php'));
}

  //Filtering unexpected characters : removed all html and php tags as well\t \n \r \0 \x0B
$conteudo = trim(strip_tags($_POST['content']));
$titulo = trim(strip_tags($_POST['titulo']));

  // Move the uploaded file to its final destination
$imageMoved = move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $target_file);

if ($imageMoved) {
    try {
        insertPost($_SESSION['username'], $today, $titulo, $conteudo, $target_file);
        $_SESSION['post'][] = array('type' => 'success', 'content' => 'post published!');
        header('Location: ../pages/list_stories.php');
    } catch (PDOException $e) {
        die($e->getMessage());
        $_SESSION['post'][] = array('type' => 'error', 'content' => 'Failed to post the post!');
        header('Location: ../pages/create_post.php');
    }
} else {
    try {
        insertPost($_SESSION['username'], $today, $titulo, $conteudo);
        $_SESSION['post'][] = array('type' => 'success', 'content' => 'post published!');
        header('Location: ../pages/list_stories.php');
    } catch (PDOException $e) {
        die($e->getMessage());
        $_SESSION['post'][] = array('type' => 'error', 'content' => 'Failed to post the post!');
        header('Location: ../pages/create_post.php');
    }

}

?>
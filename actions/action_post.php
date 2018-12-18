<?php
include_once '../includes/session.php';
include_once '../database/dbPosts.php';

if (!isset($_SESSION['token_id'])) {
    $idSession = $_SESSION['token_id'];
    if (!validateToken($idSession, trimAndStripHtmlPHPtags($_POST[$idSession]))) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'invalid session token!');
        die(header('Location: ../pages/login.php'));
    }
}

$today = date("Y-m-d", $timestamp = time());
$datetime = $today . ':' . $timestamp;

$tmpname=random(20);

$nome = $_FILES['imageToUpload']['name'];
$type = $_FILES['imageToUpload']['type'];
$target_file = "../res/posts/$tmpname.jpg";
$mediumFileName="../res/posts/medium_$tmpname.jpg";
$smallFileName="../res/posts/thumb_$tmpname.jpg";


if (!isset($_SESSION['username'])) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'you are not logged in!');
    die(header('Location: ../pages/login.php'));
}

  //Filtering unexpected characters : removed all html and php tags as well\t \n \r \0 \x0B
$conteudo = trim(strip_tags($_POST['content']));
$titulo = trim(strip_tags($_POST['titulo']));

  // Move the uploaded file to its final destination
$imageMoved = move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $target_file);



// Create an image representation of the original image
$original = imagecreatefromjpeg($target_file);

$width = imagesx($original);     // width of the original image
$height = imagesy($original);    // height of the original image
$square = min($width, $height);  // size length of the maximum square

// Create and save a small square thumbnail
$small = imagecreatetruecolor(200, 200);
imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
imagejpeg($small, $smallFileName);

// Calculate width and height of medium sized image (max width: 400)
$mediumwidth = $width;
$mediumheight = $height;
if ($mediumwidth > 400) {
  $mediumwidth = 400;
  $mediumheight = $mediumheight * ( $mediumwidth / $width );
}

// Create and save a medium image
$medium = imagecreatetruecolor($mediumwidth, $mediumheight);
imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
imagejpeg($medium, $mediumFileName);



if ($imageMoved) {
    try {
        insertPost($_SESSION['username'], $datetime, $titulo, $conteudo, $target_file);
        $_SESSION['post'][] = array('type' => 'success', 'content' => 'post published!');
        header('Location: ../pages/list_stories.php');
    } catch (PDOException $e) {
        die($e->getMessage());
        $_SESSION['post'][] = array('type' => 'error', 'content' => 'Failed to post the post!');
        die(header('Location: ../pages/create_post.php'));
    }
} else {
    try {
        insertPost($_SESSION['username'], $datetime, $titulo, $conteudo);
        $_SESSION['post'][] = array('type' => 'success', 'content' => 'post published!');
        header('Location: ../pages/list_stories.php');
    } catch (PDOException $e) {
        die($e->getMessage());
        $_SESSION['post'][] = array('type' => 'error', 'content' => 'Failed to post the post!');
        die(header('Location: ../pages/create_post.php'));
    }

}




?>
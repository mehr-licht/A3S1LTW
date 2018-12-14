<?php
	include_once('../includes/session.php');
	include_once('../database/dbPosts.php');
	

	if (!isset($_SESSION['token_id'])) {
		$idSession = $_SESSION['token_id'];
		if (!validateToken($idSession, $_POST[$idSession])) {
			$_SESSION['messages'][] = array('type' => 'error', 'content' => 'invalid session token!');
			die(header('Location: ../pages/login.php'));
		}
	}
	
	if (!isset($_SESSION['username'])) {
		die(header('Location: ../pages/login.php'));
	} else {
		$username = $_SESSION['username'];
	}

	// only accept json
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	$requestBody = json_decode(file_get_contents("php://input"), true);

	// get the post id
	$idPost = $requestBody['id_post'];

	// get the comment content
	$comment = $requestBody['comment'];

	// ensure required parameters are set (idPost and comment)
	if(is_null($idPost) or is_null($comment)) {
		header("HTTP/1.1 400");
		echo json_encode(array(
			'code'=>-1,
			'description'=>'One of the required parameters is missing'
		));
		exit(-1);
	}

	// perform changes in the database
	try {
		echo $idPost;
		echo $username;
		echo $comment;
		insertComment($idPost, $username, $comment);

		header("HTTP/1.1 200");
		echo json_encode(array(
			'code'=>0,
			'description'=>'Sucess'
		));
	} catch(Exception $e) {
		header("HTTP/1.1 500");
		echo json_encode(array(
			'code'=>-2,
			'description'=>$e->getMessage()
		));
	}

?>
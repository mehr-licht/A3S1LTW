<?php
	include_once('../includes/session.php');
	include_once('../database/dbPosts.php');

	// only accept json
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	$requestBody = json_decode(file_get_contents("php://input"), true);

	// get the post id
	$postId = $requestBody['postId'];
	
	// get the username
	if(!isset($requestBody['username']))
		$username = $_SESSION['username'];
	else 
		$username = $requestBody['username'];

	// get the user body
	$vote = $requestBody['vote'];

	// ensure required parameters are set (postId and vote)
	if(is_null($postId) or is_null($vote)) {
		header("HTTP/1.1 400");
		echo json_encode(array(
			'code'=>-1,
			'description'=>'One of the required parameters is missing'
		));
		exit(-1);
	}

	// perform changes in the database
	try {
		// check if this user has vote in this post
		if(hasUserVotedInPost($postId, $username))
			updatePostVote($postId, $username, $vote);
		// if not, insert a new entry
		else
			addPostVote($postId, $username, $vote);
		// send response
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
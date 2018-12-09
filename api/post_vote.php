<?php
	include_once('../database/dbPosts.php');

	// only accept json
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	$requestBody = json_decode(file_get_contents("php://input"), true);
	/*
		
		{
			postId
			username 
			vote
		}

	*/
	$postId = $requestBody['postId'];
	$username = $requestBody['username'];
	$vote = $requestBody['vote'];


	if(hasUserVotedInPost($postId, $username)) {
		header("HTTP/1.1 200");
		echo json_encode(array("postId"=>$postId, "username"=>$username, "vote"=>$vote));
		updatePostVote($postId, $username, $vote);
	} else  {
		header("HTTP/1.1 400");
		echo json_encode(array("postId"=>$postId, "username"=>$username, "vote"=>$vote));
		addPostVote($postId, $username, $vote);
	}



?>
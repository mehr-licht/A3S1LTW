<?php
	include_once('../database/dbPosts.php');

	// only accept json
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	$requestBody = json_decode(file_get_contents("php://input"));

	/*
		
		{
			postId
			username 
			vote
		}

	*/
	$postId = requestBody['postId'];
	$username = requestBody['username'];
	$vote = requestBody['vote'];
	if(hasUserVotedInPost($postId, $username)) {
		updatePostVote($postId, $username, $vote);
	} else  {
		addPostVote($postId, $username, $vote);
	}

?>
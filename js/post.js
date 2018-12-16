'use strict';

function api_user_voted_post(postId, vote) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', '/api/post_vote.php');
    xmlhttp.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
    xmlhttp.send(JSON.stringify({
        postId: postId,
        vote: vote
    }));
}

function upvoteClickHandler(articleNode) {
    let postId = articleNode.getAttribute("--data-id-post");
    let $upvoteBtn = articleNode.querySelector(".votes.upvote"); // the upvote button DOM
    let $downvoteBtn = articleNode.querySelector(".votes.downvote"); // the downvote button DOM
    let $votesCounter = articleNode.querySelector(".votes > span"); // the span containing votes count DOM
    let upvoteBtnClass = $upvoteBtn.getAttribute('class'); // the classe attr for upvote button
    let downvoteBtnClass = $downvoteBtn.getAttribute('class'); // the class attr for downvote button
    let isUpVoted = (upvoteBtnClass.indexOf('active') == -1) ? false : true; // flag telling if user has voted up
    let isDownVoted = (downvoteBtnClass.indexOf('active') == -1) ? false : true; // flag telling if user has voted down

    let newVote; // the new vote value to insert on the database
    if (isDownVoted) {
        /**
         * The user has downvoted previously, but it's upvoting now
         * The vote becomes +1 instead of -1
         */
        // set upvote button as active
        $upvoteBtn.setAttribute('class', upvoteBtnClass + 'active');
        // removes the active state from downvote
        $downvoteBtn.setAttribute('class', downvoteBtnClass.replace('active', ''));
        // update the votes counter (+2, +1 for reversing the downvote, +1 for new positive vote)
        $votesCounter.innerText = Number($votesCounter.innerText) + 2;
        // 
        newVote = 1;
    } else if (isUpVoted) {
        /**
         * The user has upvoted previously, but it's pressing the upvote button again
         * Thus, the user pretends to undo it's vote
         */
        // remove the active state from upvote button
        $upvoteBtn.setAttribute('class', upvoteBtnClass.replace('active', ''));
        // update the votes counter
        $votesCounter.innerText = Number($votesCounter.innerText) - 1;

        newVote = 0;
    } else {
        // user hasn't voted yet
        $upvoteBtn.setAttribute('class', upvoteBtnClass + ' active');
        // update votes value
        $votesCounter.innerText = Number($votesCounter.innerText) + 1;
        // perform API call
        newVote = 1;
    }

    // perform API call
    api_user_voted_post(postId, newVote);
}

function downvoteClickHandler(articleNode) {
    let postId = articleNode.getAttribute("--data-id-post");
    let $upvoteBtn = articleNode.querySelector(".votes.upvote"); // the upvote button DOM
    let $downvoteBtn = articleNode.querySelector(".votes.downvote"); // the downvote button DOM
    let $votesCounter = articleNode.querySelector(".votes > span"); // the span containing votes count DOM
    let upvoteBtnClass = $upvoteBtn.getAttribute('class'); // the classe attr for upvote button
    let downvoteBtnClass = $downvoteBtn.getAttribute('class'); // the class attr for downvote button
    let isUpVoted = (upvoteBtnClass.indexOf('active') == -1) ? false : true; // flag telling if user has voted up
    let isDownVoted = (downvoteBtnClass.indexOf('active') == -1) ? false : true; // flag telling if user has voted down

    let newVote; // the new vote value to insert on the database

    if (isDownVoted) {
        /* 
         * the user previously downvoted and pressed the down vote button
         * thus the user doesn't have any vote anymore
         */
        // remove the active state from the downvote button
        $downvoteBtn.setAttribute('class', downvoteBtnClass.replace('active', ''));
        // update votes value (by incrementing 1)
        $votesCounter.innerText = Number($votesCounter.innerText) + 1;
        // 
        newVote = 0;
    } else if (isUpVoted) {
        /**
         * The user previously upvoted, but now is pressing the down vote
         * It's vote becomes -1 instead of +1
         */
        // remove active state from upvote button
        $upvoteBtn.setAttribute('class', upvoteBtnClass.replace('active', ''));
        // sets downvote button as active
        $downvoteBtn.setAttribute('class', downvoteBtnClass + ' active');
        // update votes value
        $votesCounter.innerText = Number($votesCounter.innerText) - 2;
        // perform API call
        newVote = -1;
    } else {
        /**
         * The user hasn't voted yet
         */
        // Set downvote as active
        $downvoteBtn.setAttribute('class', downvoteBtnClass + ' active');
        // update votes value
        $votesCounter.innerText = Number($votesCounter.innerText) - 1;
        // perform API call
        newVote = -1;
    }

    api_user_voted_post(postId, newVote);
}

document.addEventListener('DOMContentLoaded', function() {
    // Add click event listeners on all vote buttons
    let allArticles = document.querySelectorAll("#stories > article");

    for (let articleNode of allArticles) {
        articleNode.querySelector("aside > svg.upvote").addEventListener('click', function(ev) {
            upvoteClickHandler(articleNode);
        });

        articleNode.querySelector("aside > svg.downvote").addEventListener('click', function(ev) {
            downvoteClickHandler(articleNode);
        });
    }

}, false);
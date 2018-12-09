'use strict';

function userVoted(username, postId, vote) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', '/api/post_vote.php');
    xmlhttp.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
    xmlhttp.send(JSON.stringify({
        postId: postId,
        vote: vote,
        username: 'fabioD'
    }));
}

function voteClickHandler(articleNode, voteType) {

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

    if(isDownVoted) {
        upvoteBtnClass += " active";
        $upvoteBtn.setAttribute('class', upvoteBtnClass);
        // remove 'active' class from downvote btn
        $downvoteBtn.setAttribute('class', downvoteBtnClass.replace('active', ''));
        // update votes value
        $votesCounter.innerText = Number($votesCounter.innerText) + 2; // remove the current -1, add 1, eq. to adding 2
        // perform API call
        userVoted('fabioD', postId, 1);
        // update flags
        isUpVoted = true;
        isDownVoted = false;
    } else if (isUpVoted) {
        // if user already voted Up, but it's clicking the upvote button, then remove the vote
        $upvoteBtn.setAttribute('class', upvoteBtnClass.replace('active', ''));
        // update votes value
        $votesCounter.innerText = Number($votesCounter.innerText) - 1;
        // perform API call
        userVoted('fabioD', postId, 0);
        // update flag
        isUpVoted = false;
    } else {
        // user hasn't voted yet
        $upvoteBtn.setAttribute('class', upvoteBtnClass + ' active');
        // update votes value
        $votesCounter.innerText = Number($votesCounter.innerText) + 1;
        // perform API call
        userVoted('fabioD', postId, 1);
        // update flag
        isUpVoted = true;
    }
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

    if(isDownVoted) {
        // if user already voted Down, but it's clicking the downvote button, then remove the vote
        $downvoteBtn.setAttribute('class', downvoteBtnClass.replace('active', ''));
        // update votes value
        $votesCounter.innerText = Number($votesCounter.innerText) + 1;
        // perform API call
        userVoted('fabioD', postId, 0);
    } else if (isUpVoted) {
        // if user already voted Up, but it's clicking the downvote button...
        $upvoteBtn.setAttribute('class', upvoteBtnClass.replace('active', ''));
        // update votes value
        $votesCounter.innerText = Number($votesCounter.innerText) - 2;
        // activate downvote button
        $downvoteBtn.setAttribute('class', downvoteBtnClass + ' active');
        // perform API call
        userVoted('fabioD', postId, -1);
    } else {
        // user hasn't voted yet
        $downvoteBtn.setAttribute('class', downvoteBtnClass + ' active');
        // update votes value
        $votesCounter.innerText = Number($votesCounter.innerText) - 1;
        // perform API call
        userVoted('fabioD', postId, -1);
    }
}

document.addEventListener('DOMContentLoaded', function() {

    let allArticles = document.querySelectorAll("#stories > article");

    for(let articleNode of allArticles) {
        articleNode.querySelector("aside > svg.upvote").addEventListener('click', function(ev) {
            upvoteClickHandler(articleNode);
        });

        articleNode.querySelector("aside > svg.downvote").addEventListener('click', function(ev) {
            downvoteClickHandler(articleNode);
        });
    }

}, false);


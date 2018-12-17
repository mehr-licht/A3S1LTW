<?php 
/**
 * Draws the comment. 
 * @param idComment id of the comment
 * @param idUser username that commented
 * @param commentTxt text of the comment
 * @param commentDate date of the comment
 */
function draw_comment($idComment, $idUser, $commentTxt, $commentDate) {
    $html = get_comment_html($idComment, $idUser, $commentTxt, $commentDate);
    echo $html;
} 

function draw_comment_with_replies($idComment, $idUser, $commentTxt, $commentDate) {
    $html = "<article class=\"comment\" id=\"$idComment\">";
    $html .= get_comment_innerContent_html($idUser, $commentTxt, $commentDate);
    // nest all replies
    $html .= "<section>";
    foreach(getCommentsReply($idComment) as $reply) {
        $html .= get_comment_html($reply['idComent'], $reply['idUser'], $reply['comentContent'], $reply['data']);
    }
    $html .= "</section>";
    $html .= "</article>";
    echo $html;
}
 
/**
 * @param idComment
 * @param idUser
 * @param commentTxt
 * @param commentDate
 * @return html
 */
function get_comment_html($idComment, $idUser, $commentTxt, $commentDate) {
    $html = "<article class=\"comment\" id=\"$idComment\">";
    $html .= get_comment_innerContent_html($idUser, $commentTxt, $commentDate);
    $html .= "</article>";

    return $html;
}

function get_comment_innerContent_html($idUser, $commentTxt, $commentDate) {
    $html = "";
    $imageName = sha1($idUser);
    if(!file_exists("../res/avatars/$imageName.jpg")) {
        $html .= "<a href=\"/pages/profile.php?user=$idUser\"> <img alt=\"User profile\" src=\"/res/avatars/default.png\"></a>";
    } else {
        $html .= "<a href=\"/pages/profile.php?user=$idUser\"> <img alt=\"User profile\" src=\"/res/avatars/$imageName.jpg\"></a>";
    }
    $html .= "
    <div>
        <h1 class=\"header\">
            <span class=\"author\"><a href=\"/pages/profile.php?user=$idUser\">$idUser</a></span>
            said
            <span class=\"date\"> • $commentDate</span>
        </h1>
        <p>$commentTxt</p>
        <a>Reply</a>
    </div>";

    return $html;
}
?>
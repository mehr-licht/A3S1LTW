<?php 

function draw_comment($idComment, $idUser, $commentTxt, $commentDate) { ?>
    <article class="comment" id="$idComment">
        <?php 
        $imageName = sha1($idUser);
        if(!file_exists("../res/avatars/$imageName.jpg")) { ?>
            <a href="/pages/profile.php?user=<?=$idUser?>"> <img alt="User profile" src="/res/avatars/default.png"></a>
        <?php } else { ?>
            <a href="/pages/profile.php?user=<?=$idUser?>"> <img alt="User profile" src="/res/avatars/<?=$imageName?>.jpg"></a>
        <?php } ?>
        <div>
            <h1 class="header">
                <span class="author"><a href="/pages/profile.php?user=<?=$idUser?>"> <?=$idUser?></a></span>
                said
                <span class="date"> • <?=$commentDate?></span>
            </h1>
            <p><?=$commentTxt?></p>
            <div>Votes stuff</div>
            <!--<a href="postView.php?comId=<?=$idComment?>">Reply</a>-->
        </div>
    </article>
<?php } ?>

<?php 
function get_comment_html($idComment, $idUser, $commentTxt, $commentDate) {
    $html = "<article class=\"comment\" id=\"$idComment\">";
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
        <div>Votes stuff</div>
        <!--<a href=\"postView.php?comId=<?=$idComment?>\">Reply</a>-->
    </div>
    </article>";

    return $html;
}
?>
<?php 

/**
 * Draws the header for all pages. Receives an username
 * if the user is logged in in order to draw the logout
 * link.
 */
function draw_header($username){
?>
<!DOCTYPE html>
<html lang="en-US">
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <p>Yet Another Site</p>
        <?php if ($username == NULL) { ?>
        <a id="loginhref" href="login.html">Login</a>
            <a id="signuphref" href="signup.html">Signup</a>
                <?php }?>
                <?php if ($username != NULL) { ?>
                <nav>
                    <ul>
                        <li>
                            <?=$username?>
                        </li>
                        <li>Logout</li>
                    </ul>
                </nav>
                <?php }?>
    </header>
<?php } ?>


<?php 
/**
 * Draws the footer for all pages.
 */
function draw_footer() { ?>
        <footer>
            <p>(c)MIEIC - LTW 2018/2019 T3G05</p>
            <p>Luis Oliveira; Ricardo Silva; Fábio Gaspar</p>
        </footer>
    </body>
</html>
<?php } ?>
<?php function draw_header($username) { 
/**
 * Draws the header for all pages. Receives an username
 * if the user is logged in in order to draw the logout
 * link.
 */?>
  <!DOCTYPE html>
<html lang="en-US">
<html>

<head>
    <title>signup - Yet Another Site - T1G05 - LTW 2018/2019 - MIEIC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <p>Yet Another Site</p>
<<<<<<< HEAD
        <a id="loginhref" href="../pages/login.php">Login</a>
        <a id="signuphref" href="../pages/signup.php">Signup</a>
        <p>Logout</p>
=======
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
>>>>>>> 19f74840529628105fd9e9356d5fb7d78df3c60a
    </header>
    <?php } ?>




<?php function draw_footer() { 
/**
 * Draws the footer for all pages.
 */ ?>
 <footer>
        <p>(c)MIEIC - LTW 2018/2019 T3G05</p>
        <p>Fábio Gaspar; Luis Oliveira; Ricardo Silva</p>
    </footer>
</body>

</html>
<?php } ?>
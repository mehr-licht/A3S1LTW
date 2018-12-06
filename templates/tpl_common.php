<?php function draw_header($username){
/**
 * Draws the header for all pages. Receives an username
 * if the user is logged in in order to draw the logout
 * link.
 */ ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Yet Another Site</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="../js/main.js"></script> 
    <!-- <link rel="stylesheet" href="../css/style.css">-->
    <link rel="stylesheet" href="../css/password.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
</head>

<body>
    <nav class="navbar">
        <div class="navbar left">
            <span class="navbar title">Yet Another Site</span>
        </div>
        <?php if ($username != NULL) { ?>
            <div class="navbar right">
                <a class="navbar user" href="../pages/profile.php"><?=$username?></a>
                <a class="navbar user" href="../actions/action_logout.php">Logout</a>
            </div>
        <?php } ?>
    </nav>
    <main>
<?php } ?>

<?php 
/**
 * Draws the footer for all pages.
 */
function draw_footer() { ?>
    </main>
    <footer>
        <h1>(c)MIEIC - LTW 2018/2019 T3G05</h1>
        <p>Luis Oliveira; Ricardo Silva; Fábio Gaspar</p>
    </footer>
</body>

</html>
<?php } ?>
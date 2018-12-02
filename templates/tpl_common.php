<?php function draw_header($username){
/**
 * Draws the header for all pages. Receives an username
 * if the user is logged in in order to draw the logout
 * link.
 */ ?>
<!DOCTYPE html>
<html lang="en-US">
<html>

<head>
    <meta charset="utf-8">
 <script type="text/javascript" src="../js/main.js"></script> 
    <!-- <link rel="stylesheet" href="../css/style.css">-->
    <link rel="stylesheet" href="../css/password.css">
</head>

<body>
    <header>
        <p>Yet Another Site</p>
        <?php if ($username == NULL) { ?>
          <!-- TODO: SE JA ESTIVER LOGGADO APARECE LOGOUT E PROFILE EM VEZ DE LOGIN E SIGNUP-->
            <a id="loginl" href="../pages/login.php">Login</a>
            <?php if ($username != NULL) { ?>
          <nav>
            <ul>
              <li><?=$username?></li>
              <li><a href="../actions/action_logout.php">Logout</a></li>
            </ul>
          </nav>
          <?php } ?>
            <a id="signupl" href="../pages/signup.php">Signup</a>
        <?php } else { ?>
            <nav>
                <ul>
                    <li><?=$username?></li>
                    <li>Logout</li>
                    <li>Estou logado</li>
                </ul>
            </nav>
        <?php }?>
    </header>
<?php } ?>

<?php function draw_footer() { 
/**
 * Draws the footer for all pages.
 */ ?>
    <footer>
        <p>(c)MIEIC - LTW 2018/2019 T3G05</p>
        <p>Luis Oliveira; Ricardo Silva; Fábio Gaspar</p>
    </footer>
</body>

</html>
<?php } ?>
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
        <nav>
          <ul>
            <a id="loginl" href="../pages/login.php">Login</a>
            <a id="signupl" href="../pages/signup.php">Signup</a> 
          </ul>
        </nav>
        <?php } ?>

        <?php if ($username != NULL) { ?>
          <nav>
            <ul>
              <li><?=$username?></li>
              <a href="../pages/profile.php">Profile</a>
              <a href="../actions/action_logout.php">Logout</a>
            </ul>
          </nav>
        <?php } ?>

        <!--    <nav>
                <ul>
                    <?=$username?>
                <div id="buttons">
                     <input id="submitButton" type="submit" value="login"> 
                    <label id="LblBtn"> </label>
                    <button type="submit" class="button" formaction="../actions/action_signup.php" formmethod="post">SignUp</button>
                </ul>
            </nav>-->
        
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
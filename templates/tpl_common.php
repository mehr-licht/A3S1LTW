<<<<<<< HEAD
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

=======
<?php function draw_login() { 
/**
 * Draws the login section.
 */ ?>
  <section id="login">
    
    <header><h2>Welcome Back</h2></header>

    <form method="post" action="../actions/action_login.php">
      <input type="text" name="username" placeholder="username" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="submit" value="Login">
    </form>
>>>>>>> master

    <footer>
      <p>Don't have an account? <a href="signup.php">Signup!</a></p>
    </footer>

  </section>
<?php } ?>

<<<<<<< HEAD

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
=======
<?php function draw_signup() { 
/**
 * Draws the signup section.
 */ ?>
  <section id="signup">

    <header><h2>New Account</h2></header>

    <form method="post" action="../actions/action_signup.php">
      <input type="text" name="username" placeholder="username" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="submit" value="Signup">
    </form>

    <footer>
      <p>Already have an account? <a href="login.php">Login!</a></p>
    </footer>

  </section>
<?php } ?>
>>>>>>> master

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
    <title>Yet Another Site</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="../js/eye.js"></script>

    <!-- <link rel="stylesheet" href="../css/style.css">-->
    <link rel="stylesheet" href="../css/password.css">
    <link rel="stylesheet" href="../css/footer.css">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>

<body>
    <header>
        <p>Yet Another Site</p>

        <?php if ($username == NULL) { ?>
        <!-- SE NAO ESTIVER LOGADO; O HEADER SO MOSTRA O NOME DO SITE -->
        <!-- <a id="loginl" href="../pages/login.php">Login</a>
            <a id="signupl" href="../pages/signup.php">Signup</a>-->
        <?php } else { ?>
        <!-- SE JA ESTIVER LOGGADO APARECE LOGOUT E PROFILE EM VEZ DE LOGIN E SIGNUP-->
        <nav>
            <input type="image" name="avatar" src=<?=file_exists("../res/avatars/$username.jpg") ?
                "../res/avatars/$username.jpg" : "../res/default.gif" ?> width="4%" class="avatar">
            <a id="profilel" href="../pages/profile.php">
                <?=$username?></a>
            <a href="../actions/action_logout.php">Logout</a>
        </nav>
        <?php }?>
    </header>
    <div id="message">
        <?php if (isset($_SESSION['messages']) ) {?>
        <section id="messages">
         
            <?php foreach($_SESSION['messages'] as $message) { ?>
            <div class="<?=$message['type']?>">
                <?=$message['content']?>
            </div>

            <?php } 
           unset($_SESSION['messages']); } ?>
        </section>

        <?php  if(isset($_SESSION['ERROR'])){?>
        <section id="error">


            <div class="error">
                <?=$_SESSION['ERROR']?>
            </div>
            <?php   unset($_SESSION['ERROR']); } ?>
        </section>

    </div>
    <main>

        <?php } ?>

        <?php function draw_footer() { 
/**
 * Draws the footer for all pages.
 */ ?>

        <footer>
            <h1>(c)MIEIC - LTW 2018/2019 T3G05</h1>
            <p>Luis Oliveira; Ricardo Silva; Fábio Gaspar</p>
        </footer>
    </main>
</body>

</html>
<?php } 

function sendEmail($emailAddress,$emailUser,$emailPass) {

$to = $emailAddress;
$subject = "Yet Another Site: account information";
$body = "your username is $emailUser\r\nand password is $emailPass";
$headers = "From: webmaster@yetanothersite.com\r\nReply-To: no-reply@pubfish.com\r\n X-Mailer: PHP/" . phpversion(); ;
mail($to,$subject,$body,$headers);
   
    if (!mail($to, $subject, $body, $headers)) {
    throw new Exception("Failed to send email");
    }
}



/**
 * Generate a random string, using a cryptographically secure 
 * pseudorandom number generator (random_int)
 * 
 * For PHP 7, random_int is a PHP core function
 * For PHP 5.x, depends on https://github.com/paragonie/random_compat
 * 
 * @param int $length      How many characters do we want?
 * @param string $keyspace A string of all possible characters
 *                         to select from
 * @return string
 */
function random_str(
    $length,
    $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
) {
    $str = '';
    $max = strlen($keyspace) - 1;
    if ($max < 1) {
        throw new Exception('$keyspace must be at least two characters long');
    }
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}

?>
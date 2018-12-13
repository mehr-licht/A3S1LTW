<?php 


/**
 * Draws the header for all pages. Receives an username
 * if the user is logged in in order to draw the logout
 * link.
 */
function draw_header($username)
{  
   $imageName=sha1($username);
   ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Yet Another Site</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/password.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/post.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <script type="text/javascript" src="../js/eye.js"></script>
    <script type="text/javascript" src="../js/comment.js"></script>
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="navbar left">
                <a href="../pages/list_stories.php">
                    <span class="navbar title">Yet Another Site</span>
                </a>
            </div>
            <div class="navbar message">
                <?php if (isset($_SESSION['messages'])) { ?>
                <section id="messages">

                    <?php foreach ($_SESSION['messages'] as $message) { ?>
                    <div class="<?= $message['type'] ?>">
                        <?= $message['content'] ?>
                    </div>

                    <?php 
                }
                unset($_SESSION['messages']);
            } ?>
                </section>

                <?php if (isset($_SESSION['ERROR'])) { ?>
                <section id="error">


                    <div class="error">
                        <?= $_SESSION['ERROR'] ?>
                    </div>
                    <?php unset($_SESSION['ERROR']);
                } ?>
                </section>
            </div>
            <?php if ($username != null) { ?>
                
            <div class="navbar right">
                <div class="search-container">
                    <form id="searchbox" action="/actions/action_search.php">
                    
                        <div class="dropdown">
                            <select name="choice">
                                <option value="any">Any</option>
                                <option value="posts">Posts</option>
                                <option value="comments">Comments</option>
                                <option value="users">Users</option>
                            </select>
                        </div>

                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="search-button"></i></button>
                    </form>
                </div>
                <input type="image" name="avatar" src=<?=file_exists("../res/avatars/$imageName.jpg") ?
        "../res/avatars/$imageName.jpg" : "../res/default.gif" ?> width="4%" class="avatar">
                <a class="navbar user" href="../pages/profile.php">
                    <?= $username ?></a>
                <a class="navbar user" href="../pages/create_post.php">Create post</a>
                <a class="navbar user" href="../actions/action_logout.php">Logout</a>
            </div>

            <?php 
        } ?>
        </nav>
    </header>

    <main>
        <?php 
    } ?>

        <?php 
        /**
         * Draws the footer for all pages.
         */
        function draw_footer()
        { ?>
    </main>
    <footer>
        <h1>(c)MIEIC - LTW 2018/2019 T3G05</h1>
        <p>Luis Oliveira; Ricardo Silva; Fábio Gaspar</p>
    </footer>
</body>

</html>
<?php 
}

function sendEmail($emailAddress, $emailUser, $emailPass)
{

    $to = $emailAddress;
    $subject = "Yet Another Site: account information";
    $body = "your username is $emailUser\r\nand password is $emailPass";
    $headers = "From: webmaster@yetanothersite.com\r\nReply-To: no-reply@pubfish.com\r\n X-Mailer: PHP/" . phpversion();;
    mail($to, $subject, $body, $headers);

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
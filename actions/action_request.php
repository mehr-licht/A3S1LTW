<?php
include_once '../includes/session.php';
include_once '../database/db_user.php';
include_once '../templates/tpl_common.php';


if ($_POST['username']!="" && !checkUsername($_POST['username'])) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username not in the database, please signup!');
    header('Location:../pages/signup.php');

} else if ($_POST['email']!="" && !checkUserEmail($_POST['email'])) {//nao encontra
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Email not in the database!');
    header('Location:../pages/signup.php');

} else {

$pass = random_str(10);

    if (isset($_POST['username']) && checkUsername($_POST['username'])) {
        $user_array = getUserInformation($_POST['username']);
        $email = $user_array[0]['email'];


    } else {
        if (isset($_POST['email']) && checkUserEmail($_POST['email'])) {
            $email = getUserFromEmail($_POST['email']);
        }
    }


    try {
        sendEmail($email, $_POST['username'], $pass);
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'please check your mailbox for an email with your account information!');
    } catch (Exception $e) {
        die($e->getMessage());
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to send email!');
        header('Location: ../pages/request.php');
    }

    try {
        updatePass($username, $pass);
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'password changed sucessfully!');
        header('Location: ../pages/login.php');
    } catch (PDOException $e) {
        die($e->getMessage("error changing password"));
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to change the password!');
        header('Location: ../pages/request.php');
    }

}
?>

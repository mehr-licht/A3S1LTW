<?php
include_once '../includes/session.php';
include_once '../database/db_user.php';
include_once '../templates/tpl_common.php';


try{
    $userExists = checkUsername($_POST['username']);
    $username=$_POST['username'];
} catch (Exception $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username not corresponding!');
    die(header('Location: ../pages/signup.php'));
}
$emailExists =false;
try{
    if(checkUserEmail($_POST['email'])){
        $emailExists = true;
        $email=$_POST['email'];
        $username=getUserFromEmail($email);
    }else{
        $emailExists = false;
    }
} catch (Exception $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Email not corresponding!');
    die(header('Location: ../pages/signup.php'));
}

if ($_POST['username']!="" && !$userExists) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username not in the database, please signup!');
    die(header('Location:../pages/signup.php'));
} else if ($_POST['email']!="" && !$emailExists ) {//nao encontra
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Email not in the database!');
    die(header('Location:../pages/signup.php'));
} else {

    $pass = random_str(10);
    
    if (isset($_POST['username']) && $userExists) {
        try{    
            $user_array = getUserInformation($_POST['username']);
            $email = $user_array[0]['email'];
        } catch (Exception $e) {
            die($e->getMessage());
            $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to get information!');
            header('Location: ../pages/request.php');
        }
    } 
    try {
        sendEmail($email, $username, $pass);
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
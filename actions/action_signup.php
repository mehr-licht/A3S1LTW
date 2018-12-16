<?php
include_once '../includes/session.php';
include_once '../database/db_user.php';
include_once '../templates/tpl_common.php';

try{
    $userExists = checkUsername($_POST['username']);
} catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'No user name!');
    header('Location: ../pages/login.php');
}
try{
    $emailExists = checkUserEmail($_POST['email']);
} catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'No email!');
    die(header('Location: ../pages/login.php'));
}

if ($userExists ) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username already in use!');
    die(header('Location:../pages/signup.php'));

} else if ($emailExists) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Email already in use!');
    die(header('Location:../pages/signup.php'));

}else if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $_POST['password2']) || !preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $_POST['password'])) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'password: minumum 8 characters, must include one letter and one number!');
    die(header('Location:../pages/signup.php'));
} else if ($_POST['password'] !== $_POST['password2']) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'No matching passwords!');
        die(header('Location:../pages/signup.php'));
} else if (!preg_match('/[a-zA-Z0-9]+/', $_POST['username'])) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/signup.php'));

} else if (!preg_match('/[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]+/', $_POST['email'])) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'not numbers in mail can only contain letters and numbers!');
die(header('Location: ../pages/signup.php'));
} else {

    try {
        insertUser($_POST['username'], $_POST['password'], $_POST['email']);
        sendEmail($_POST['email'],$_POST['username'], $_POST['password']);
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
        header('Location: ../pages/list_stories.php');
    } catch (PDOException $e) {
        die($e->getMessage());
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
        die(header('Location: ../pages/login.php'));
    }
}
?>

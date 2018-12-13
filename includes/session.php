<?php

/**
 * Populates $_SESSION
 */
session_start();
  
  /*function generate_random_token() {
    return bin2hex(openssl_random_pseudo_bytes(32));
  }
  if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = generate_random_token();
  }*/

function checkTimeout()
{
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
    // last request was more than 5 minutes ago
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    //return true;
  }//else{
  $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
  //return false;}
}



/*
 * avoid attacks on sessions like session fixation:
 */
function regenerateSession($reload = false)
{
    // This token is used by forms to prevent cross site forgery attempts
  if (!isset($_SESSION['nonce']) || $reload)
    $_SESSION['nonce'] = md5(microtime(true));

  if (!isset($_SESSION['IPaddress']) || $reload)
    $_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];

  if (!isset($_SESSION['userAgent']) || $reload)
    $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];

  
    // Set current session to expire in 1 minute
    //$_SESSION['OBSOLETE'] = true;
    //$_SESSION['EXPIRES'] = time() + 60;

    // Create new session without destroying the old one
  session_regenerate_id(false);

    // Grab current session ID and close both sessions to allow other scripts to use them
  $newSession = session_id();
  session_write_close();

    // Set session ID to the new one, and start it back up again
  session_id($newSession);
  
  session_start();

    // Don't want this one to expire
    //unset($_SESSION['OBSOLETE']);
    //unset($_SESSION['EXPIRES']);
}
?>

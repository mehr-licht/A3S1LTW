<?php

/**
 * Populates $_SESSION
 */
session_start();
  
/**
 * checks if it has passed the number of seconds stored in timeout since the last session activity in the site
 */
const timeout = 300;
function checkTimeout()
{
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > timeout)) {
    // last request was more than 5 minutes ago
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
  }
  $_SESSION['LAST_ACTIVITY'] = time(); // update last activity timestamp
}


/*
 * avoid attacks on sessions like session fixation:
 * also includes anti-CSRF token generation
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


  // Create new session without destroying the old one
  session_regenerate_id(false);

    // Grab current session ID and close both sessions to allow other scripts to use them
  $newSession = session_id();
  session_write_close();

    // Set session ID to the new one, and start it back up again
  session_id($newSession);

  session_start();
   
  //generate token_id and token_value
  generateToken();
}


/**
 * generate token_id and token_value
 */
function generateToken(){
  if (!isset($_SESSION['token_id'])) {
    $_SESSION['token_id'] = random(10);
  }

  if (!isset($_SESSION['token_value'])) {
    $_SESSION['token_value'] = hash('sha256', $_SESSION['token_id']);
  }
 
}

/**
 * function to verify if the provided token_id and token_value correspond to the calling session values
 * to prevent CSRF attacks
 */
function validateToken($id, $value)
{
  if ($id == $_SESSION['token_id'] && $value == hash('sha256', $id)) {
    return true;
  }
  return false;
}

/**
 * generate random strings using Mersenne Twister Random Number Generator
 * with mt_srand seeding using time and microtime
 */
function random($len)
{
        if (function_exists('openssl_random_pseudo_bytes')) {
                $byteLen = intval(($len / 2) + 1);
                $return = substr(bin2hex(openssl_random_pseudo_bytes($byteLen)), 0, $len);
        } elseif (@is_readable('/dev/urandom')) {
                $f = fopen('/dev/urandom', 'r');
                $urandom = fread($f, $len);
                fclose($f);
                $return = '';
        }

        if (empty($return)) {
                for ($i = 0; $i < $len; ++$i) {
                        if (!isset($urandom)) {
                                if ($i % 2 == 0) {
                                        mt_srand(time() % 2147 * 1000000 + (double)microtime() * 1000000);
                                }
                                $rand = 48 + mt_rand() % 64;
                        } else {
                                $rand = 48 + ord($urandom[$i]) % 64;
                        }

                        if ($rand > 57)
                                $rand += 7;
                        if ($rand > 90)
                                $rand += 6;

                        if ($rand == 123) $rand = 52;
                        if ($rand == 124) $rand = 53;
                        $return .= chr($rand);
                }
        }

        return $return;
}
?>

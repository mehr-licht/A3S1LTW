<?php 
//igual Restivo
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');
 
  // Verify if user is logged in
  if (isset($_SESSION['username']))
    die(header('Location: ../pages/list_stories.php'));
 
  draw_header(null);
  

  draw_signup();
  ?>
       <nav>
          <ul>
            <p> <?php
           // para imprimir o que vem dos erros  apos verificaoes no signup  
           $pkl = $_SESSION['messages'][0]['type'];
           $pkk = $_SESSION['messages'][0]['content'];
           
           print_r($pkl);
           print_r($pkk);
                 
               
                ?>
            </p>
            <a id="loginl" href="../pages/login.php">Login</a>
            <a id="signupl" href="../pages/signup.php">Signup</a> 
          </ul>
        </nav>
        
<?php
  draw_footer();
?>
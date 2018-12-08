<?php function draw_login() { 
/**
 * Draws the login section.
 */ ?>
  <div id="login">

<form class="form" action="../actions/action_login.php" method="post">
    <!-- username field -->
    <label>Username:
        <input name="username" type="text" placeholder="username" required="required" />
    </label>
    <!-- password field -->
    <label>Password:
        <input name="password" type="password" placeholder="password" class="passEdit" required="required"/>
        <button onclick="togglePass(0)" id="toggleBtn3" class="glyphicon glyphicons-eye-open toggler-ico" style="background-color:transparent; border-color:transparent;"
            type="button" width="50px">
            <img src="../res/glyphicons-eye-open.svg" width="50%" />
            &nbsp;</button>
    </label>
    <!-- login button -->
    <input name="submit" type="submit" value="Login"/>

    <div id="buttons">
        <label class="LblBtn"></label>
       <!-- <button class="button" formaction="../pages/signup.php" formmethod="post">login</button> -->
        <label id="please">if you still have no account please register first</label><button class="button" onclick="location.href='../pages/signup.php'" type="button">
    signup</button>
</div>
    <div id="buttonReq">
    <label id="req">if you don't remember your username or password</label><button class="button" onclick="location.href='../pages/request.php'" type="button">
    request</button>
    </div>
</form>


</div>
<?php } ?>

<?php function draw_signup() { 
/**
 * Draws the signup section.
 */ ?>
   <div id="signup">
        <form class="form" action="../actions/action_signup.php" method="post">
            <div id="userinput" class="inputs">
                <label class="label1">Desired username: </label>
                <input id="SignupUsername" name="username" type="text" placeholder="desired username" required="required" />
            </div>
            <div id="pwdinput" class="inputs">
                <label class="label2">password: </label>
                <input id="SignupPwd" type="password" name="password" class="passEdit"placeholder="password" />
          <!--      <button id="toggleBtn4" class="glyphicon glyphicons-eye-open toggler-ico" type="button">&nbsp;</button> -->
                <button onclick="togglePass(0)" id="toggleBtn4" class="glyphicon glyphicons-eye-open toggler-ico" style="background-color:transparent; border-color:transparent;"
            type="button" width="50px">
            <img src="../res/glyphicons-eye-open.svg" width="50%" />
            &nbsp;</button>
            
            </div>
            <div id="repwdinput" class="inputs">
                <label class="label3"> repeat password: </label>
                <input id="SignupRepeatPwd" type="password" name="password2"class="passEdit" placeholder="password" />
               <!-- <button id="toggleBtn5" class="glyphicon glyphicons-eye-open toggler-ico" type="button">&nbsp;</button> -->

          <button onclick="togglePass(1)" id="toggleBtn5" class="glyphicon glyphicons-eye-open toggler-ico" style="background-color:transparent; border-color:transparent;"
            type="button" width="50px">
            <img src="../res/glyphicons-eye-open.svg" width="50%" />
            &nbsp;</button>

            </div>
            
            <div id="insrtemail" class="emailc">
                <label class="label4"> Email: </label>
                <input id="signupEmail" name="email" type="email" placeholder="email" />
            </div>
            <div id="buttons">
                <!-- <input id="submitButton" type="submit" value="login"> -->
                <label id="LblBtn"> </label>
                <button type="submit" class="button" formaction="../actions/action_signup.php" formmethod="post">SignUp</button>
                <label id="please">already have an account? please login</label><button class="button" onclick="location.href='../pages/login.php'" type="button">login</button>
                </div>
    <div id="buttonReq">
    <label id="req">if you don't remember your username or password</label><button class="button" onclick="location.href='../pages/request.php'" type="button">
    request</button>
            </div>
        </form>
    </div>
<?php } ?>




<?php function draw_request() { 
/**
 * Draws the request section.
 */ ?>
  <div id="resquest">

<form class="form" action="../actions/action_request.php" method="post">
    <!-- username field -->
    <label>Username:
        <input name="username" type="text" placeholder="username" />
    </label><h2>OR</h2>
    <!-- email field -->
    <label>email:
        <input name="email" type="text" placeholder="email"/>
        
    </label>
    <!-- login button -->
    <input name="request" type="submit" value="request username and new password"/>

    <div id="buttons">
        <label class="RblBtn"></label>
       <!-- <button class="button" formaction="../pages/signup.php" formmethod="post">login</button> -->
        <label id="please">if you still have no account please register first</label><button class="button" onclick="location.href='../pages/signup.php'" type="button">
    signup</button>
</div>
    <div id="buttonReq">
    <label id="please">already have an account? please login</label><button class="button" onclick="location.href='../pages/login.php'" type="button">login</button>
                
    </div>
</form>


</div>
<?php } ?>

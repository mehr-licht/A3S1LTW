<?php 

/**
 * Draws the login section.
 * form to log into the site submiting a username and password
 */
function draw_login()
{ ?>
<div id="login">
    <script type="text/javascript" src="../js/eye.js"></script>
    <form class="form" action="../actions/action_login.php" method="post">
        <!-- username field -->
        <div class="form-group">
            <label>Username:
                <input name="username" type="text" placeholder="username" required="required" />
            </label>
        </div>
        <!-- password field -->
        <div class="form-group">
            <label>Password:
                <div class="buttonInside">
                    <input name="password" class="passEdit" type="password" placeholder="password" required="required" />
                    <button onclick="togglePass(0)" id="toggleBtn3" class="glyphicon glyphicons-eye-open toggler-ico"
                        style="background-color:transparent; border-color:transparent;" type="button" width="50px">
                        <img src="../res/glyphicons-eye-open.svg" width="50%" class="eye" />
                    </button>
                </div>
            </label>
        </div>
        <!-- login button -->
        <div class="form-group">
            <input name="submit" type="submit" value="Login" />
        </div>
        <!-- Link for signup -->
        <div class="form-group">
            <span>If you still have no account please <a href="../pages/signup.php">register</a> first!</span>
        </div>
        <!-- Link for request -->
        <div class="form-group">
            <span>if you don't remember your username or password please <a href="../pages/request.php">request</a> it
                again</span>
        </div>
    </form>

</div>
<?php 
} ?>

<?php 
/**
* Draws the signup section.
* form to create a new account submitting a username, password and email address
*/
function draw_signup()
{ ?>
<div id="signup">
    <script type="text/javascript" src="../js/eye.js"></script>
    <script type="text/javascript" src="../js/su.js"></script>
    <form class="form" action="../actions/action_signup.php" method="post">
        <div id="userinput" class="inputs">
            <label class="label1">Desired username:
            <input id="SignupUsername" name="username" type="text" placeholder="desired username" required="required"
                oninput="validateNameSignup()" /><span></span>
            </label>
        </div>
        <div id="pwdinput" class="inputs">
            <label class="label2">password:
                <div class="buttonInside">
                    <input id="SignupPwd" class="passEdit" type="password" name="password" class="passEdit" placeholder="password"
                        oninput="checkPassword('SignupPwd')" />
                    <button onclick="togglePass(0)" id="toggleBtn4" class="glyphicon glyphicons-eye-open toggler-ico"
                        style="background-color:transparent; border-color:transparent;" type="button" width="50px">
                        <img src="../res/glyphicons-eye-open.svg" width="50%" class="eye" />
                        &nbsp;</button><span></span>
            </label>
        </div>
        <div id="repwdinput" class="inputs">
            <label class="label3"> repeat password:
                <div class="buttonInside">
                    <input id="SignupRepeatPwd" type="password" name="password2" class="passEdit" placeholder="password"
                        oninput="checkPassword('SignupRepeatPwd')" />
                    <button onclick="togglePass(1)" id="toggleBtn5" class="glyphicon glyphicons-eye-open toggler-ico"
                        style="background-color:transparent; border-color:transparent;" type="button" width="50px">
                        <img src="../res/glyphicons-eye-open.svg" width="50%" class="eye" />
                        &nbsp;</button><span></span>
            </label>
        </div>

        <div id="insrtemail" class="emailc">
            <label class="label4"> Email: </label>
            <input id="signupEmail" name="email" type="email" placeholder="email" oninput="validateEmailSignup()" />

        </div>
        <div id="buttons">
            <!-- <input id="submitButton" type="submit" value="login"> -->
            <label id="LblBtn"> </label>
            <button onclick="return validateFields()" type="submit" class="button" formaction="../actions/action_signup.php"
                formmethod="post">SignUp</button>
        </div>

        <!-- Link for login -->
        <div class="form-group">
            <span>already have an account? please <a href="../pages/login.php">login</a></span>
        </div>
        <!-- Link for request -->
        <div class="form-group">
            <span>if you don't remember your username or password please <a href="../pages/request.php">request</a> it
                again</span>
        </div>
</div>
</form>
</div>
<?php 
} ?>




<?php
    /**
     * Draws the request section.
     * form to request a new password by submitting a username or email address
     */
function draw_request()
{  ?>
<div id="request">

    <form class="form" action="../actions/action_request.php" method="post">
        <!-- username field -->
        <label>Username:
            <input name="username" type="text" placeholder="username" />
        </label>
        <h2>OR</h2>
        <!-- email field -->
        <label>email:
            <input name="email" type="text" placeholder="email" />

        </label>
        <!-- login button -->
        <input name="request" type="submit" value="request username and new password" />

      
        <!-- Link for login -->
        <div class="form-group">
            <span>already have an account? please <a href="../pages/login.php">login</a></span>
        </div>
        <!-- Link for signup -->
        <div class="form-group">
            <span>If you still have no account please <a href="../pages/signup.php">register</a> first!</span>
        </div>
    </form>
</div>
<?php 
} ?>

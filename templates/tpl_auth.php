<?php 
/**
 * Draws the login section.
 */ 
function draw_login() { 
?>
    <div id="login">
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
                    <input name="password" type="password" placeholder="password" required="required"/>
                    <!-- TODO -->
                    <!--<button id="toggleBtn3" class="glyphicon glyphicon-eye-open toggler-ico" type="button">&nbsp;</button>-->
                </label>
            </div>
            <!-- login button -->
            <div class="form-group">
                <input name="submit" type="submit" value="Login"/>
            </div>
            <!-- Link for signup -->
            <span>If you still have no account please <a href="/pages/signup.php">register</a> first!</span>
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
                <input id="SignupPwd" type="password" name="password" placeholder="password" />
                <button id="toggleBtn4" class="glyphicon glyphicons-eye-open toggler-ico" type="button">&nbsp;</button>
            </div>
            <div id="repwdinput" class="inputs">
                <label class="label3"> repeat password: </label>
                <input id="SignupRepeatPwd" type="password" name="password2" placeholder="password" />
                <button id="toggleBtn5" class="glyphicon glyphicons-eye-open toggler-ico" type="button">&nbsp;</button>
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
        </form>
    </div>
<?php } ?>
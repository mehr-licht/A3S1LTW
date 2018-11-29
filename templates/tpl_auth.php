<?php function draw_login() { 
/**
 * Draws the login section.
 */ ?>
  <div id="login">

<form class="form" action="login.php" method="post">
    <div id="userinput" class="inputs">
        <label class="labeluser">username: </label>
        <input id="loginUsername" type="text" placeholder="username" required="required" />
    </div>
    <div id="pwdinput" class="inputs">
        <label class="labelpwd">password:</label>
        <input id="loginPwd" type="password" placeholder="password" />
    </div>
    <!-- <input id="submitButton" type="submit" value="login"> -->
    <div id="buttons">
        <label class="LblBtn"></label>
        <button class="button" formaction="login.php" formmethod="post">login</button>
        <label id="please">if you still have no account please register first</label><button class="button" onclick="location.href='signup.php'" type="button">
    signup</button>
    </div>
</form>


</div>
<?php } ?>

<?php function draw_signup() { 
/**
 * Draws the signup section.
 */ ?>
   <div id="signup">
        <form class="form" action="signup.php" method="post">
            <div id="userinput" class="inputs">
                <label class="label1">desired username: </label>
                <input id="SignupUsername" type="text" placeholder="desired username" required="required" />
            </div>
            <div id="pwdinput" class="inputs">
                <label class="label2">password: </label>
                <input id="SignupPwd" type="password" placeholder="password" />
            </div>
            <div id="repwdinput" class="inputs">
                <label class="label3"> repeat password: </label>
                <input id="SignupRepeatPwd" type="password" placeholder="password" />
            </div>
            <div id="buttons">
                <!-- <input id="submitButton" type="submit" value="login"> -->
                <label id="LblBtn"> </label>
                <button class="button" formaction="signup.php" formmethod="post">signup</button>
                <label id="please">already have an account? please login</label><button class="button" onclick="location.href='login.php'" type="button">login</button>
            </div>
        </form>
    </div>
<?php } ?>
<?php 
$context['blocks']['main'] = <<<END
    <div>
    <h2>Login</h2>
    <form class="login-form" name="form1" method="post" action="login_go.php">
        <div class=login-form-item><label>Name:</label><input name="UserName" type="text" size="20" id="UserName"></input></div>
        <div class=login-form-item><label>Password:</label><input name="Password" type="password" size="20"
                            id="Password"></input></div>
        <div class=login-form-item><input name="KeepInfo" type="checkbox" value="KeepInfo"></input>
        Save Information (7 days)</div>
        <div class=login-form-item><input name="Submit" type="submit" value="Log in"></input></div>
    </form>
    <div class=login-form-item>
        <a href="forgot.php">Forgot password?</a>
        <a href="SignUp.php">New Account</a>
    </div>
    </div>
END;

include 'base_template.php';
?>
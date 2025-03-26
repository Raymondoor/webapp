<?php require_once(__DIR__.'/../vendor/autoload.php'); // Copy the file and paste it where it belongs. change autoload path accordingly.
// Functions and loaded data here.
use raymondoor\rqst_validate;
use function raymondoor\return_header;
session_start();
$request = new rqst_validate();
if($request->ip_gate()){
    $_SESSION['raymondoor_csrf'] = bin2hex(random_bytes(32));
}else{
    return_header('/');
}
//Until here.
// Page specific data here.
$TITLE = 'Admin Page Login';
$INDEX = 'admin-login';

// Until here. (keep above the html content)
include_once(TEMPLATE_DIR.'/html-head.php');
include_once(TEMPLATE_DIR.'/html-header.php');
?>
<main>
    <div id="maincontent">
        <h2>Login</h2>
        <div id="form">
<?php if(!isset($_SESSION['raymondoor_login-over'])){ ?>
            <form action="<?=FORM_URL.'/adm-login.php'?>" method="post">
                <input type="hidden" name="csrf" value="<?=$_SESSION['raymondoor_csrf']?>">
                <label>Username:</label><br>
                <input type="text" name="username" autofocus autocomplete="off"><br>
                <label>Password:</label><br>
                <input type="password" name="password"><br>
                <input type="submit" value="Login">
            </form>
<?php if(isset($_SESSION['raymondoor_formerror'])){ ?>
            <p><?=$_SESSION['raymondoor_formerror']?></p>
    <?php unset($_SESSION['raymondoor_formerror']);
}else{ ?>
            <p></p>
<?php }} ?>
        </div>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/html-footer.php');
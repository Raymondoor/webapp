<?php require_once(__DIR__.'/../vendor/autoload.php'); // Copy the file and paste it where it belongs. change autoload path accordingly.
// Functions and loaded data here.
use raymondoor\rqst_validate;
use function raymondoor\return_header;
session_start();
$request = new rqst_validate();
if($request->admin_gate() === false){
    return_header('/admin/login.php?error=Please_Login_First');
}
//Until here.
// Page specific data here.
$TITLE = 'Admin Page';
$INDEX = 'admin';

// Until here. (keep above the html content)
include_once(TEMPLATE_DIR.'/html-head.php');
include_once(TEMPLATE_DIR.'/html-header.php');
?>
<main>
    <div id="maincontent">
        <h1 id="welcome">Welcome to admin Page!</h1>
        <pre>
<?php print_r($_SESSION); ?>
        </pre>
        <a href="./phpinfo.php">phpinfo()</a>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/html-footer.php');
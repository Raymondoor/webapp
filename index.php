<?php require_once(__DIR__.'/vendor/autoload.php'); // Copy the file and paste it where it belongs. change autoload path accordingly.
// Functions and loaded data here.
use raymondoor\DBstatement;
use function raymondoor\request_url_schm_usr;

try{
    $query = new DBstatement('SELECT * FROM user');
    $result = $query->execute([]);
    $data = str_rot13($result[0]['username']);
}catch(Exception $e){
    $data = $e->getMessage();
}
//Until here.
// Page specific data here.
$TITLE = 'My Website'; // This will be displayed in <title></titile>
$INDEX = 'home'; // This is used to tell what style/script file to use, or as a reference to load specific data.

// Until here. (keep above the html content)
include_once(TEMPLATE_DIR.'/html-head.php');
include_once(TEMPLATE_DIR.'/html-header.php');
?>
<main>
    <h1>Welcome!</h1>
    <p>If you see this page, it means it works!</p>
    <p>Current URL: <?=request_url_schm_usr().$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?></p>
    <p>Username & Password: <?=$data?></p>
    <p>Admin Page: <a href="<?=ADMIN_URL?>/"><?=ADMIN_URL?>/</a></p>
</main>
<?php
include_once(TEMPLATE_DIR.'/html-footer.php');
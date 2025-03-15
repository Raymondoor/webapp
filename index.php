<?php require_once(__DIR__.'/vendor/autoload.php'); // Copy the file and paste it where it belongs. change autoload path accordingly.
// Functions and loaded data here.

//Until here.
// Page specific data here.
$TITLE = 'My Website'; // This will be displayed in <title></titile>
$INDEX = 'home'; // This is used to tell what style/script file to use, or as a reference to load specific data.

// Until here. (keep above the html content)
include_once(TEMPLATE_DIR.'/html-head.php');
include_once(TEMPLATE_DIR.'/html-header.php');
?>
<main>

</main>
<?php
include_once(TEMPLATE_DIR.'/html-footer.php');
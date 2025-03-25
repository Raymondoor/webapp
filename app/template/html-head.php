<?php require_once(__DIR__.'/../../vendor/autoload.php');
use function raymondoor\request_url_schm_usr;
header('Content-Type: text/html; charset=utf-8; Content-Security-Policy: script-src "self" frame-src "self";');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$TITLE?></title>
    <link rel="icon" href="<?=IMAGE_URL.'/brand/php.png'?>" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- cards, seo, etc -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta property="og:title" content="<?=$TITLE?>">
    <meta name="twitter:title" content="<?=$TITLE?>">
    <meta property="og:image" content="<?=IMAGE_URL.'/brand/'?>" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="<?=IMAGE_URL.'/brand/'?>" />
    <meta property="og:url" content="<?=request_url_schm_usr().$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" />

    <meta property="og:type" content="website" />
    <meta name="google-site-verification" content="" />
    <meta name="msvalidate.01" content="" />
    <style>
<?php
// style
include_once(STYLE_DIR.'/style.php');
if(file_exists(STYLIB_DIR.'/'.$INDEX.'.php')){include_once(STYLIB_DIR.'/'.$INDEX.'.php');}
?>
    </style>
</head>

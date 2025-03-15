<?php
namespace raymondoor{
require_once(__DIR__.'/dirlink.php');

function request_url_schm_usr(){
    if(isset($_SERVER['HTTPS'])){return "https://";}else{return "http://";}
}
function return_header($uri, $fullrefresh = false){
    if($fullrefresh){
        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
        header("Pragma: no-cache"); // HTTP 1.0
        header("Expires: 0"); // Proxies
    }
    header("Location: ".HOME_URL.$uri);
    exit;
}

}
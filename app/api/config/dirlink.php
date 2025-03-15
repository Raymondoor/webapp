<?php
namespace raymondoor{
require_once(__DIR__.'/url_location.php');
// Directory
define('ROOT_DIR', realpath(__DIR__.'/../../../')); // '/'
    define('APP_DIR', ROOT_DIR.DIRECTORY_SEPARATOR.'app'); // '/app'
        define('API_DIR', APP_DIR.DIRECTORY_SEPARATOR.'api'); // '/app/api'
            define('CONFIG_DIR', API_DIR.DIRECTORY_SEPARATOR.'config'); // '/app/api/config'
        define('DATA_DIR', APP_DIR.DIRECTORY_SEPARATOR.'data'); // '/app/data'
        define('TEMPLATE_DIR', APP_DIR.DIRECTORY_SEPARATOR.'template'); // '/app/template'
        define('ASSET_DIR', APP_DIR.DIRECTORY_SEPARATOR.'asset'); // '/app/asset'
            define('STYLE_DIR', ASSET_DIR.DIRECTORY_SEPARATOR.'style'); // '/app/asset/style'
                define('STYLIB_DIR', STYLE_DIR.DIRECTORY_SEPARATOR.'lib'); // '/app/asset/style/lib'
                define('FONT_DIR', STYLE_DIR.DIRECTORY_SEPARATOR.'font'); // '/app/asset/style/font'
            define('SCRIPT_DIR', ASSET_DIR.DIRECTORY_SEPARATOR.'script'); // '/app/asset/script'
                define('SCRLIB_DIR', SCRIPT_DIR.DIRECTORY_SEPARATOR.'lib'); // '/app/asset/script/lib'

// Link
const HOME_PATH = ''; // Leave blank if host is the root point. Add '/' in head if is not. e.g. '/secondapp' This will map https://domain.com/secondapp as home path.
define('HOME_URL', request_url_schm_usr().$_SERVER['SERVER_NAME'].HOME_PATH);
define('FORM_URL',HOME_URL.'/app/api/form');
define('ASSET_URL',HOME_URL.'/app/asset');
    define('IMAGE_URL',ASSET_URL.'/image');
    define('STYLE_URL',ASSET_URL.'/style');
        define('STYLIB_URL', STYLE_URL.'/lib');
        define('FONT_URL',STYLE_URL.'/font');
    define('SCRIPT_URL',ASSET_URL.'/script');
        define('SCRLIB_URL', SCRIPT_URL.'/lib');
//example
define('ADMIN_URL', HOME_URL.'/admin'); // This prints out https://domain.com/secondapp/admin from the HOME_PATH example.
}
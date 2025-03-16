<?php
namespace raymondoor{

function generate_log($name, $data){
    $dir = DATA_DIR.DIRECTORY_SEPARATOR.'log'.dirname($name);
    if(!is_dir($dir)){mkdir($dir, 0755, true);}
    $filename = $dir.DIRECTORY_SEPARATOR.basename($name).date('Y-m').'.log';
    $file = fopen($filename, 'a');
    if($file){fwrite($file, $data.PHP_EOL);fclose($file);}
}
/*
// This will be written as log. \n is not required, the function handles it.
$log_data = '"'.date("Y-m-d H:i:s").'", "Login"';
// This will make a /login directory inside DATA_DIR, make a file called login-YYYY-mm.log
generate_log('/login/login-', $log_data);
*/

}
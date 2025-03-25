<?php
namespace raymondoor{
// Limit Access to an URL accordingly
class rqst_validate{
    private static $ip = '127.0.'; // limit url access thru ip address e.g. '192.168.'
    private static $ip6 = '::1'; // ipv6 e.g. '::1'

    public function ip_gate(){
        if(empty(self::$ip) && empty(self::$ip6)){
            return true;
        }else{
            if(strpos($_SERVER['REMOTE_ADDR'], self::$ip) === 0 || strpos($_SERVER['REMOTE_ADDR'], self::$ip6) === 0){
                return true;
            }else{
                return false;
            }
        }
    }
    public function admin_gate(){ // limit url access thru login state
        if(self::ip_gate()){
            if(isset($_SESSION['raymondoor_username'])){
                $sname = $_SESSION['raymondoor_username'];
                $result = '';
                try{
                    $query = new DBstatement("SELECT user.username FROM user WHERE username = :username");
                    $result = $query->execute([':username' => $sname]);
                }catch(\Exception){
                    $result = '';
                }
                if(!empty($result)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function csrf_gate($message = 'undefined'){ // check token and generate a new one. $message is used as log data, to describe where the blockage happened.
        if(!isset($_POST['csrf']) || !hash_equals($_SESSION['raymondoor_csrf'], $_POST['csrf'])){
            $log_data = date("Y-m-d H:i:s").', "at '.$message.'", "'.$_SERVER['HTTP_USER_AGENT'].'", "'.$_SERVER['REMOTE_ADDR'].'"';
            generate_log('/csrf/csrf-', $log_data);
            return false;
        }else {
            $_SESSION['raymondoor_csrf'] = bin2hex(random_bytes(32));
            return true;
        }
    }
}

}